<?php
session_start();
include('../model/products.php');

if (isset($_POST['productAction'])) {
  $res = 'error';
  switch ($_POST['productAction']) {
    case 'getProducts':
      $res = getProducts($products);
      break;
  }

  echo $res;
}

function getProducts($products)
{
  $output = '';
  $output .= '<div class="columns is-multiline">';
  foreach ($products as $product) {
    $productHTML = '
  <div class="product column is-narrow is-one-third">
    <div class="card">
      <div class="card-image">
        <figure class="image is-4by3">
          <img src="' . $product['imgUrl'] . '" alt="Placeholder image">
        </figure>
      </div>
      <div class="card-content">
        <p class="title is-4">' . $product['title'] . '</p>
        <div class="content">
          ' . $product['desc'] . '
          <p class="mt-4 has-text-primary is-size-4">' . $product['price'] . '€</p>
        </div>
      </div>
      <footer class="card-footer">
        <a data-id="' . $product['id'] . '" class="add-product card-footer-item">
          <span class="icon mr-2">
            <i class="fas fa-cart-plus"></i>
          </span>
          <span>Add to cart</span>
        </a>
        <a href="#" class="card-footer-item">
          <span class="icon mr-2">
            <i class="fas fa-ellipsis-h"></i>
          </span>
          <span>See details</span>
        </a>
      </footer>
    </div>
  </div> ';

    $output .= $productHTML;
  }
  $output .= '</div>';

  return $output;
}
