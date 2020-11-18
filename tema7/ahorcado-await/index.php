  <?php include_once(__DIR__ . "/templates/header.php"); ?>
  <div class="content">
    <h1 id="php-practicas-for-dws">PHP Practicas for DWS</h1>
    <p><a href="https://dws-practicas.herokuapp.com/">Website live on Heroku</a></p>
    <h2 id="description">Description</h2>
    <p>This project was made for class DWS where we work with php. Because we have a lot of exercises I decided to make this webpage where all my practicas from DWS live.</p>
    <p><strong>Features:</strong></p>
    <ol>
      <li>(Removed because I want to use an external script in future) Pages are created automatically when visiting the index.php so I dont have to write a bunch of starting code</li>
      <li>It is easier for the professor because he has all the practicas in one single place which is accessible via the side menu</li>
      <li>Lastly it is a good practice for me to do so. It is my first time writing php but i&#39;ve touched alot of subjects like <em>includes, reading/writing files, creating templates like header and footer</em></li>
    </ol>
    <h2 id="how-it-works">How it works</h2>
    <p>It is important that I document this because if it works nicely I can do this to all my practices that involve exercises inside a website.</p>
    <h3 id="firstly-the-folder-structure">Firstly the folder structure</h3>
    <pre><code class="lang-bash">.
├── README<span class="hljs-selector-class">.md</span>
├── composer<span class="hljs-selector-class">.json</span>
├── config<span class="hljs-selector-class">.php</span>
├── index<span class="hljs-selector-class">.php</span>
├── practicas
│   └── tema_2_practica_1
│       ├── e1<span class="hljs-selector-class">.php</span>
│       ├── e2<span class="hljs-selector-class">.php</span>
│       ├── e3<span class="hljs-selector-class">.php</span>
│       ├── e4<span class="hljs-selector-class">.php</span>
│       . . .
│   └── tema_2_practica_2
│       ├── e1<span class="hljs-selector-class">.php</span>
│       ├── e2<span class="hljs-selector-class">.php</span>
│       ├── e3<span class="hljs-selector-class">.php</span>
│       ├── e4<span class="hljs-selector-class">.php</span>
│       . . .
├── scripts
│   └── storeDetailsMenu<span class="hljs-selector-class">.js</span>
└── templates
    ├── <span class="hljs-selector-tag">footer</span><span class="hljs-selector-class">.php</span>
    └── <span class="hljs-selector-tag">header</span>.php
</code></pre>
    <h3 id="config-php">config.php</h3>
    <p>This is where i define global variables like SERVER_TYPE that helps me set paths based on the server</p>
    <h3 id="index-php">index.php</h3>
    <p>In order to programatically create the files you must visit index.php because that&#39;s where the code start from. I still need to find a way to generate the files when the server starts but it is not such a big of a deal since when you visit the server you will instantly go to index.php.</p>
    <h3 id="header-php-and-footer-php">header.php and footer.php</h3>
    <p>They are simply templates that are applyed to every page created automatically and to the index.php</p>
    <p>In header we have a navbar where we create dinamically the links to the ejerciciosa. However modifing the practicas will result in fake links that dont have a page generated or if we change the numberOfExercises lower even hide some pages. So be careful with that.</p>
    <h3 id="createpage-php">createPage.php</h3>
    <p>This is the actual script that creates the pages.</p>
    <h2 id="todo">TODO</h2>
    <ul>
      <li>Change global variable SERVER_TYPE to an env variable so I dont have to commit and push everytime I want to test the website in production or production test</li>
    </ul>
  </div>
  <?php include_once(__DIR__ . "/templates/footer.php"); ?>