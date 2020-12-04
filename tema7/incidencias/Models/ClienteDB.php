<?php
namespace Incidencias;

use Incidencias\Cliente;
use Incidencias\ConexionDB;
use \PDO;
use \PDOException;

class ClienteDB {

    //Insertar incidencia
    public static function newCliente($post) {

        //Quitamos action de $post si se manda con Ajax una acción
        array_pop($post);

        $consulta = "INSERT INTO clientes (";
        foreach($post as $key => $value) {
            $consulta .= $key.", ";
        }
        $consulta = substr($consulta, 0, -2); //Quitamos última coma y el espacio
        $consulta .= ") VALUES (";
        foreach($post as $key => $value) {
            $consulta .= ":".$key.", ";
        }
        $consulta = substr($consulta, 0, -2); //Quitamos última coma y el espacio
        $consulta .= ");";

        $conexion = ConexionDB::conectar("incidencias");

        try {
            $stmt = $conexion->prepare($consulta);

            foreach($post as $key => $value) {
                $param = ":".$key;
                $stmt->bindValue($param,$value); //Ojo aquí que es bindValue
            }

            $stmt->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
        }  
        
        ConexionDB::desconectar(); 
    }


    public static function getId($movil) {

        $consulta = "SELECT * FROM Clientes WHERE movil=:movil";

        $conexion = ConexionDB::conectar("incidencias");

        try {
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(":movil",$movil);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Incidencias\Cliente");
            $resultado = $stmt->fetch();
        } catch (PDOException $e){
		    echo $e->getMessage();
        }  
          
        ConexionDB::desconectar();
        return $resultado;

    }

    public static function getClientes() {
        $consulta = "SELECT * FROM Clientes";

        $conexion = ConexionDB::conectar("incidencias");

        try {
            $stmt = $conexion->prepare($consulta);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Incidencias\Cliente");
            $resultado = $stmt->fetchAll();
        } catch (PDOException $e){
		    echo $e->getMessage();
        }  
          
        ConexionDB::desconectar();
        return $resultado;
    }

    
    //Borrar cliente
    public static function deleteCliente($id) {
        $consulta = "DELETE FROM clientes WHERE id=:id";
        $conexion = ConexionDB::conectar("incidencias");

        try {
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(":id",$id);
            $stmt->execute();            
        } catch (PDOException $e){
		    echo $e->getMessage();
        }  
          
        ConexionDB::desconectar();
    }


}
