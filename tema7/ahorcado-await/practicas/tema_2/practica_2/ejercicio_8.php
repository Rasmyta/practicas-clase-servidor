<?php include_once(__DIR__ . "/../../../templates/header.php") ?>
<div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-2 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>

  <?php
  // book: title, isbn, pageCount, publishedDate(array), thumbnailUrl, shortDescription, status, authors(array), categories(array)

  include_once("ejercicio_8/books.php");
  include_once("ejercicio_8/cardBook.php");

  $booksByGroup = array();

  foreach ($books as $key => $book) {
    $booksByGroup[$book['categories']][] = $book;
  }

  // echo "<pre>" . print_r($booksByGroup, true) . "</pre>";

  ?>
  <div class="box">
    <?php
    foreach ($booksByGroup as $key => $books) {
      echo '<h1 class="title">' . $key . '</h1>';
      echo '<div class="" style="display:flex; flex-wrap:wrap; justify-content: flex-start">';
      foreach ($books as $book) {
        displayCardBook($book);
      }
      echo '</div>';
    }

    ?>
  </div>

</div>
</div>
</div>
<?php include_once(__DIR__ . "/../../../templates/footer.php") ?>