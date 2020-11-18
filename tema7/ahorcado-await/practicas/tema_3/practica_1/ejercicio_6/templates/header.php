<!DOCTYPE html>
<html class="has-navbar-fixed-top" lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
</head>

<body>
  <nav class="navbar is-dark is-fixed-top">
    <div class="container">
      <div class="navbar-brand">
        <a class="navbar-item" href="index.php">
          <h1 class="title has-text-white">Logo</h1>
        </a>
        <div class="navbar-burger burger" data-target="navbar-menu">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>

      <div id="navbar-menu" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item" href="index.php">
            Productos
          </a>
        </div>
      </div>

      <div class="navbar-end">
        <div class="navbar-item">
          <div class="field is-grouped">
            <p class="control">
              <a class="button is-light" href="cart.php">
                <span class="icon">
                  <i class="fas fa-shopping-cart"></i>
                </span>
                <span>
                  <span id="cart-num-items">0</span>
                  Items
                </span>
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </nav>