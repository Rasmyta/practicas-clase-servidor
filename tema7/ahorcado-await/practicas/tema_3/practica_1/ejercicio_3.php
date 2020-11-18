<?php include_once(__DIR__ . "/../../../templates/header.php") ?>
<div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-2 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <?php
  include('../../tema_2/practica_2/ejercicio_4/dictionary.php');
  include('../../tema_2/practica_2/ejercicio_4/translateWord.php');
  include('ejercicio_3/findWord.php');

  $errors = array(
    'englishWordError' => '',
    'spanishWordError' => ''
  );

  $querySearch = '';
  $translatedWord = '';
  $wordToDelete = '';
  $newEnglishWord = '';
  $newSpanishWord = '';

  // create the dictionaries if they dont exist
  if (!isset($_SESSION['dict'])) {
    $_SESSION['dict'] = array_combine($word_list_en, $word_list_es);
  } else {
    // add words to the lists if they don't exist already 
    if (isset($_POST['new-english-word']) && isset($_POST['new-spanish-word'])) {
      $newEnglishWord = $_POST['new-english-word'];
      $newSpanishWord = $_POST['new-spanish-word'];
      // clear the word in search input
      $querySearch = '';

      $spanishWordExists = findWord($newSpanishWord, $_SESSION['dict']);
      $englishWordExists = findWord($newEnglishWord, $_SESSION['dict']);

      if (!is_null($spanishWordExists)) {
        $errors['spanishWordError'] = 'The word <strong>' . $spanishWordExists[1] . '</strong> was found in the ' . $spanishWordExists[0] . ' dictionary';
      }

      if (!is_null($englishWordExists)) {
        $errors['englishWordError'] = 'The word <strong>' . $englishWordExists[1] . '</strong> was found in the ' . $englishWordExists[0] . ' dictionary';
      }

      // if the errors are empty that means no word has been found for neither
      echo anyErrors($errors);
      if (!anyErrors($errors)) {
        $_SESSION['dict'][$newEnglishWord] = $newSpanishWord;
      }
    } elseif (isset($_GET['word'])) {
      $querySearch = $_GET['word'];
      $translatedWord = translateWord($querySearch, array_keys($_SESSION['dict']), array_values($_SESSION['dict']));
    } elseif (isset($_GET['wordToDelete'])) {
      $querySearch = '';
      $wordToDelete = $_GET['wordToDelete'];
      if (isset($_SESSION[$wordToDelete])) {
        unset($_SESSION['dict'][$wordToDelete]);
      } else {
        $keyFound = array_search($wordToDelete, $_SESSION['dict']);
        if ($keyFound != false) {
          unset($_SESSION['dict'][$keyFound]);
        }
      }
    }
  }


  function anyErrors($errors)
  {
    if ($errors['englishWordError'] == '' && $errors['spanishWordError'] == '') {
      return false;
    }

    return true;
  }

  ?>
  <div>
    <div class="box">
      <h2 class="title is-4">English - Spanish Translator</h2>

      <!-- SEARCH FORM -->
      <form class="" action="" method="GET">
        <div class="field has-addons">
          <div class="control has-icons-left">
            <?php
            echo '<input required name="word" value="' . $querySearch . '" class="input" type="text" placeholder="Search">';
            ?>
            <span class="icon is-small is-left">
              <i class="fas fa-search"></i>
            </span>
          </div>
          <div class="control">
            <button class="button is-primary" type="submit">Translate</button>
          </div>
        </div>

      </form>

      <!-- NOTIFICATIONS -->
      <div>
        <?php
        if ($querySearch != '') {
          if ($translatedWord != '') {
            echo '<div class="notification is-success is-light" style="display:flex; align-items:center">';
            echo '  <span class="icon is-size-4 mr-2"><i class="fas fa-check"></i></span>';
            echo '<span> Word <strong>' . $translatedWord[1] . '</strong> found in ' . $translatedWord[0] . ' dictionary for the word <strong>' . $querySearch . '</strong>.</span>';
            echo '<a href="?wordToDelete=' . $translatedWord[1] . '" class="ml-2 button is-small is-danger is-outlined is-rounded">';
            echo '  <span>Delete</span>';
            echo '  <span class="icon">';
            echo '    <i class="fas fa-trash-alt"></i>';
            echo '  </span>';
            echo '</a>';
            echo '</div>';
          } else {
            echo '<div class="message is-warning is-light" style="max-width: 350px">';
            echo '  <div class="message-header"';
            echo '    <p>';
            echo '    <span class="icon is-size-4 mr-2"><i class="fas fa-exclamation-circle"></i></span>';
            echo '    <span>Word not found. </span>';
            echo '    </p>';
            echo '  </div>';
            echo '  <div class="message-body"';
            echo '      <p>Alternatively you can add a new word to the dictionary.</p>';
            echo '  </div>';
            echo '</div>';
          }
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && !anyErrors($errors)) {
          echo '<div class="notification is-success is-light" style="display:flex; align-items:center">';
          echo '  <span class="icon is-size-4 mr-2"><i class="fas fa-check"></i></span>';
          echo '  <span>The new english word <strong>' . $newEnglishWord . '</strong> with translation in spanish <strong>' . $newSpanishWord . '</strong> was added to the dictionary.</span>';
          echo '</div>';
        } elseif ($wordToDelete != '') {
          echo '<div class="notification is-success is-light" style="display:flex; align-items:center">';
          echo '  <span class="icon is-size-4 mr-2"><i class="fas fa-check"></i></span>';
          echo '  <span>The word <strong>' . $wordToDelete . '</strong> and it\'s translation has been removed from the dictionary.</span>';
          echo '</div>';
        } else {
          echo '<div class="notification is-info is-light" style="display:flex; align-items:center">';
          echo '  <span class="icon is-size-4 mr-2"><i class="fas fa-info-circle"></i></span>';
          echo '  <span>Type a word in english or spanish and see the translation.</span>';
          echo '</div>';
        }

        echo '<button id="show-modal-btn" class="button is-primary-light">Add a new word</button>';
        ?>
      </div>

      <!-- MODAL ADD NEW WORD FORM -->
      <div id="add-word-modal" class="modal <?= (anyErrors($errors) ? 'is-active' : '') ?>">
        <div class="modal-background"></div>
        <div class="modal-content">
          <div class="box">
            <form action="" method="POST">
              <h2 class="title is-4">Add a new word</h2>
              <div class="field">
                <label class="label">English word: </label>
                <div class="control has-icons-right">
                  <?php
                  $isDanger = $errors['englishWordError'] != '' ? 'is-danger' : '';
                  $englishValue = anyErrors($errors) ? $newEnglishWord : '';
                  ?>
                  <input required name="new-english-word" value="<?= $englishValue ?>" class="input <?= $isDanger ?>" type="text" placeholder="English word">
                  <?php
                  if ($errors['englishWordError'] != '') {
                    echo '<span class="icon is-small is-right">';
                    echo '<i class="fas fa-exclamation-triangle"></i>';
                    echo '</span>';
                  }
                  ?>
                </div>
                <p class="help is-danger"><?= $errors['englishWordError'] ?></p>
              </div>
              <div class="field">
                <label class="label">Spanish word:</label>
                <div class="control has-icons-right">
                  <?php
                  $isDanger = $errors['spanishWordError'] != '' ? 'is-danger' : '';
                  $spanishValue = anyErrors($errors) ? $newSpanishWord : '';
                  ?>
                  <input required name="new-spanish-word" value="<?= $spanishValue ?>" class="input <?= $isDanger ?>" type="text" placeholder="Spanish word">
                  <?php
                  if ($errors['spanishWordError'] != '') {
                    echo '<span class="icon is-small is-right">';
                    echo '<i class="fas fa-exclamation-triangle"></i>';
                    echo '</span>';
                  }
                  ?>
                </div>
                <p class="help is-danger"><?= $errors['spanishWordError'] ?></p>
              </div>

              <button type="submit" class="button is-primary">Add word to dictionary</button>
            </form>
          </div>
        </div>
        <button class="modal-close is-large" aria-label="close"></button>
      </div>
    </div>
  </div>
</div>
<script src="ejercicio_3/popModal.js"></script>
<?php include_once(__DIR__ . "/../../../templates/footer.php") ?>