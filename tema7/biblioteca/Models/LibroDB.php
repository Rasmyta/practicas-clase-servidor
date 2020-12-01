<?php
namespace Biblioteca;

use Biblioteca\Libro;
use Biblioteca\ConexionDB;
use \PDO;
use \PDOException;

class LibroDB {

    //Devuelve todos los libros de la BD como objetos
    public static function getLibros() {

        $consulta = "SELECT * FROM libros";

        $conexion = ConexionDB::conectar("biblioteca");

        try {
            $stmt = $conexion->prepare($consulta);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Biblioteca\Libro");
        } catch (PDOException $e){
		    echo $e->getMessage();
        }  
          
        ConexionDB::desconectar();
        return $resultado;
    }

    //Borra un libro por id
    public static function deleteBook($id) {
    
        $consulta = "DELETE FROM libros WHERE id=:id";

        $conexion = ConexionDB::conectar("biblioteca");

        try {
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
        } catch (PDOException $e){
		    echo $e->getMessage();
        }  
          
        ConexionDB::desconectar();        
    }

    //Inserta un nuevo libro
    public static function insertBook($titulo,$subtitulo,$descripcion,$autor,$editorial,$imagen,$numejem,$numejemdisp) {

        $consulta = "INSERT INTO libros (titulo,subtitulo,descripcion,autor,editorial,imagen,numejem,numejemdisp) VALUES (:titulo, :subtitulo, :descripcion, :autor, :editorial, :imagen, :numejem, :numejemdisp)";
        $conexion = ConexionDB::conectar("biblioteca");

        try {
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(":titulo",$titulo);
            $stmt->bindParam(":subtitulo",$subtitulo);
            $stmt->bindParam(":descripcion",$descripcion);
            $stmt->bindParam(":autor",$autor);
            $stmt->bindParam(":editorial",$editorial);
            $stmt->bindParam(":imagen",$imagen);
            $stmt->bindParam(":numejem",$numejem);
            $stmt->bindParam(":numejemdisp",$numejemdisp);
            $stmt->execute();
        } catch (PDOException $e){
		    echo $e->getMessage();
        }  
          
        ConexionDB::desconectar();  

    }



}
