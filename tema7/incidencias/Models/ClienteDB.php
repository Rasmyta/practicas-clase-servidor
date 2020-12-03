<?php
namespace Incidencias;

use Incidencias\Cliente;
use Incidencias\ConexionDB;
use \PDO;
use \PDOException;

class ClienteDB {

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
