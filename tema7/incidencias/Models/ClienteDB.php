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



}
