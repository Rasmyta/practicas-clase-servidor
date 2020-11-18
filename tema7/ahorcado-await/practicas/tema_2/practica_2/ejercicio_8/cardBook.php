<style>
  .card {
    border: 1px solid #eee;
    width: 20rem;
    display: flex;
    flex-direction: column;
    transition: all .2s;
  }

  .card:hover {
    transform: scale(1.02);
    filter: contrast(120%);
    cursor: pointer;
  }
</style>
<?php

function displayCardBook($book)
{
  echo "<div class='card mx-4 has-background-light my-3 is-bordered'>";
  echo "  <div class='card-image'>";
  echo "    <figure class='image is-4by2'>";
  echo "      <img src='" . $book["thumbnailUrl"] . "' alt='book cover'>";
  echo "    </figure>";
  echo "  </div>";
  echo "  <div class='card-content' style='flex-grow: 1; display: flex; flex-direction:column; justify-content: space-between'>";
  echo "    <div class='media'>";
  echo "      <div class='media-content'>";
  echo "        <p class='title is-4'>" . $book["title"] . "</p>";
  echo "        <p class='subtitle is-6'>" . $book["authors"][0] . "</p>";
  echo "      </div>";
  echo "    </div>";
  echo "    <div class='content' style='flex-grow: 1; display:flex; flex-direction: column; justify-content: space-between; align-items: flex-start'>";
  if (isset($book["shortDescription"])) {
    $shortDescription = substr($book["shortDescription"], 0, 100) . "...";
    echo "      <p class='has-text-grey' style='flex-grow: 1; justify-self: flex-start'> " . $shortDescription . "</p>";
  } else {
    echo "<p class='has-text-grey-light is-italic'>No description provided.</p>";
  }
  echo "      <div>";
  echo "        <time class='is-block is-size-7' datetime='" . $book["publishedDate"]["date"] . "'>Published: " . $book["publishedDate"]["date"] . "</time>";
  echo "      <span class='tag is-primary mt-2'>" . $book['categories'] . "</span>";
  echo "      </div>";
  echo "    </div>";
  echo "    <div class='media'>";
  echo "      <div class='media-content'>";
  echo "        <p class='title is-4'>" . rand(10, 20) . "," . rand(10, 99) . "€</p>";
  echo "      </div>";
  echo "    </div>";
  echo "  </div>";
  echo "</div>";
}
