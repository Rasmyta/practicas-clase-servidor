# PHP Practicas for DWS

[Website live on Heroku](https://dws-practicas.herokuapp.com/)

## Description

This project was made for class DWS where we work with php. Because we have a lot of exercises I decided to make this webpage where all my practicas from DWS live.

**Features:**

1. (Removed because I want to use an external script in future) Pages are created automatically when visiting the index.php so I dont have to write a bunch of starting code
2. It is easier for the professor because he has all the practicas in one single place which is accessible via the side menu
3. Lastly it is a good practice for me to do so. It is my first time writing php but i've touched alot of subjects like *includes, reading/writing files, creating templates like header and footer*

## How it works

It is important that I document this because if it works nicely I can do this to all my practices that involve exercises inside a website.

### Firstly the folder structure

```bash
.
├── README.md
├── composer.json
├── config.php
├── index.php
├── practicas
│   └── tema_2_practica_1
│       ├── e1.php
│       ├── e2.php
│       ├── e3.php
│       ├── e4.php
│       . . .
│   └── tema_2_practica_2
│       ├── e1.php
│       ├── e2.php
│       ├── e3.php
│       ├── e4.php
│       . . .
├── scripts
│   └── storeDetailsMenu.js
└── templates
    ├── footer.php
    └── header.php
```

### config.php

This is where i define global variables like SERVER_TYPE that helps me set paths based on the server

### index.php

In order to programatically create the files you must visit index.php because that's where the code start from. I still need to find a way to generate the files when the server starts but it is not such a big of a deal since when you visit the server you will instantly go to index.php.

### header.php and footer.php

They are simply templates that are applyed to every page created automatically and to the index.php

In header we have a navbar where we create dinamically the links to the ejerciciosa. However modifing the practicas will result in fake links that dont have a page generated or if we change the numberOfExercises lower even hide some pages. So be careful with that.

### createPage.php

This is the actual script that creates the pages.

## TODO

* Change global variable SERVER_TYPE to an env variable so I dont have to commit and push everytime I want to test the website in production or production test
