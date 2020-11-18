<style>
  .card {
    width: 40rem;
    border: 1px solid #eee;
  }

  .card-image img {
    object-fit: cover;
  }
</style>
<?php
function displayPost($post)
{
  echo '  <div class="card my-4 is-shadowless">';
  echo '     <div class="mt-4 ml-4 level">';
  echo '      <div class="level-left">';
  echo '        <div class=" level-item">';
  echo '          <figure class="image is-48x48">';
  echo '            <img class="is-rounded" src="' . $post["userProfilePicture"] . '" alt="Placeholder image">';
  echo '          </figure>';
  echo '         </div>';
  echo '         <div class="level-item">';
  echo '           <strong>' . $post["user"] . '</strong>';
  echo '         </div>';
  echo '       </div>';
  echo '     </div>';
  echo '     <div class="card-image">';
  echo '       <figure class="image is-4by3" style="margin: 0">';
  echo '         <img src="' . $post["pictureUrl"]  . '" alt="Placeholder image">';
  echo '       </figure>';
  echo '     </div>';
  echo '     <div class="card-content">';
  echo '       <div class="level">';
  echo '         <div class="level-left">';
  echo '           <div class="level-item"><i class="far fa-heart is-clickable is-size-4 mr-3"></i></div>';
  echo '           <div class="level-item"><i class="far fa-comment is-clickable is-size-4 mr-3"></i></div>';
  echo '           <div class="level-item"><i class="far fa-paper-plane is-clickable is-size-4"></i></div>';
  echo '         </div>';
  echo '         <div class="level-right">';
  echo '           <div class="level-item"><i class="far fa-bookmark is-clickable is-size-4"></i></div>';
  echo '         </div>';
  echo '       </div>';
  echo '       <div class="is-size-6"><strong>' . $post["likes"] . ' likes</strong></div>';
  echo '       <div>';
  echo '         <strong>' . $post["user"] . '</strong> ' . $post["description"] . ' ';
  foreach ($post["tags"] as $tag) {
    echo '        <a href="#">#' . $tag . '</a> ';
  }
  echo '       </div>';
  echo '       <p class="has-text-grey-light">View all ' . rand(2, 30) . ' comments</p>';
  foreach ($post["comments"] as $comment) {
    echo '     <div>';
    echo '       <strong>' . $comment["user"] . '</strong> ' . $comment["comment"];
    echo '     </div>';
  }
  echo '     </div>';
  echo '     <time class="has-text-grey-light m-5 is-size-7" datetime="' . $post["datePosted"] . '">' . $post["datePosted"] . '</time>';
  echo '     <hr>';
  echo '     <div class="has-text-grey-light m-4" style="display:flex; align-items:baseline; justify-content:space-between">';
  echo '       <p class="">Add a comment...</p>';
  echo '       <p>Post</p>';
  echo '     </div>';
  echo '   </div>';
}
