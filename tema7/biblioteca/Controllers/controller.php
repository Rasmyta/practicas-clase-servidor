<?php
    include_once("..\autoload.php");
    use Biblioteca\LibroDB;
    use Biblioteca\VistaIndex;


    //Acción de cargar los libros en la página principal
    if (isset($_POST['action'])) {
        if ($_POST['action'] == "loadBooks") {
             //Recuperar los libros de la BD como objetos
             $libros = LibroDB::getLibros();
             VistaIndex::render($libros);
        }

        if ($_POST['action'] == "deleteBook") {
            //Recuperar los libros de la BD como objetos
            LibroDB::deleteBook($_POST['id']);
            $libros = LibroDB::getLibros();
            VistaIndex::render($libros);
       }

       if ($_POST['action'] == "newBook") {
           LibroDB::insertBook($_POST['titulo'],$_POST['subtitulo'],$_POST['descripcion'],$_POST['autor'],$_POST['editorial'],$_POST['imagen'], $_POST["numejem"],$_POST["numejemdisp"]);
           $libros = LibroDB::getLibros();
           VistaIndex::render($libros);
       }

    }


?>