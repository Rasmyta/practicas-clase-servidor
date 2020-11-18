<?php include_once(__DIR__ . "/../../../templates/header.php") ?>
<div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-2 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <div class="notification is-warning is-light"><strong>You need to refresh again after submiting!</strong></div>
  <?php
  include('ejercicio_4/ads.php');
  include('ejercicio_4/tags.php');

  // cookie params
  $path = '/practicas/dws/practicas/tema_3/practica_1/';
  $domain = $_SERVER['SERVER_NAME'];


  $userPreferences = array();
  $ad = getRandomAd($ads);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach (array_keys($tagsByCategory) as $category) {
      if (isset($_POST[$category])) {
        $userPreferences[$category] = $_POST[$category];
      }
    }
    setcookie('userPreferences', json_encode($userPreferences), time() + 60 * 60 * 24, $path, $domain, false, true);
  }

  // read userPreferences from cookie only if it exists and if the request method is not a get
  if (isset($_COOKIE['userPreferences'])) {
    $userPreferences = json_decode($_COOKIE['userPreferences'], true);
    if (count($userPreferences) > 0) {
      $ad = getPersonalizedAd($ads, $userPreferences);
    }
  }

  /**
   * This will return the ID of the best possible ad based by the number of tags in common
   */
  function getPersonalizedAd(&$ads, $userPreferences)
  {
    // filter ads that don't match with any category
    // *note* the 'use' ads a closure to the anonymous function. - https://stackoverflow.com/questions/5482989/php-array-filter-with-arguments 
    $filteredAds = array_filter($ads, function ($ad) use ($userPreferences) {
      $matchedCount = 0;
      // because we use category only for creating the form fields and not in the actual ads we combine them together with tags
      // userPreferences is also a multidimensional array so we spread the values with '...' and merge them after that we merge again with the keys
      $flatUserPreferences = array_merge(array_keys($userPreferences), array_merge(...array_values($userPreferences)));

      // counts how many tags from user preferences have been found in the ad
      foreach ($flatUserPreferences as $tag) {
        if (in_array($tag, $ad['tags'])) {
          $matchedCount++;
        }
      }

      // add it as a potential ad if there are more than 2 items in common
      return ($matchedCount >= 2);
    });

    // reset the indexes
    $filteredAds = array_values($filteredAds);
    // now return a random one from the filtered array
    return $filteredAds[rand(0, count($filteredAds) - 1)];
  }

  function getRandomAd(&$ads)
  {
    $ad = $ads[rand(0, count($ads) - 1)];
    $ad['imgUrl'] = createImgUrl($ad['desc']);
    return $ad;
  }

  function createImgUrl($desc)
  {
    return 'https://dummyimage.com/400x600/ddd/000.png&text=' . preg_replace('/\s+/', '+', $desc);
  }

  // create the image for the ad
  $ad['imgUrl'] = createImgUrl($ad['desc']);
  ?>
  <div class="columns">
    <div class="column is-9">
      <article class="p-6 has-background-primary-light">
        <p class="title">Personalize your ads</p>
        <div class="content">
          <form action="" method="POST">
            <?php

            foreach ($tagsByCategory as $category => $tags) {

              $tagsHtml = ' <label class="label">' . ucfirst($category) . '</label>';

              foreach ($tags as $tag) {
                $tagsHtml .= '
                <div class="field">
                  <label class="checkbox"> <input name="' . $category . '[]" value="' . $tag . '" type="checkbox"> ' . ucfirst($tag) . ' </label>
                </div>';
              }
              $tagsHtml .= '<hr>';
              echo $tagsHtml;
            }
            ?>
            <button type="submit" class="button is-primary">Submit</button>
          </form>
        </div>
      </article>
    </div>
    <div class="column">
      <div class="tile is-child">
        <figure class="tile is-child image is-3by4">
          <img src="<?= $ad['imgUrl'] ?>">
        </figure>
      </div>
    </div>
  </div>
</div> <?php include_once(__DIR__ . "/../../../templates/footer.php") ?>