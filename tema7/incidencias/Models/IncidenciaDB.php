<?php
namespace Incidencias;

use Incidencias\Incidencia;
use Incidencias\ConexionDB;
use \PDO;
use \PDOException;

class IncidenciaDB {

    //Inserta incidencia
    public static function insertInc($latitud,$longitud,$ciudad,$direccion,$etiqueta,$descripcion,$id_cliente) {

        $consulta = "INSERT INTO incidencias (latitud,longitud,ciudad,direccion,etiqueta,descripcion,estado,id_cliente) VALUES (:latitud, :longitud, :ciudad, :direccion, :etiqueta, :descripcion, 'abierta', :id_cliente)";
        $conexion = ConexionDB::conectar("incidencias");

        try {
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(":latitud",$latitud);
            $stmt->bindParam(":longitud",$longitud);
            $stmt->bindParam(":ciudad",$ciudad);
            $stmt->bindParam(":direccion",$direccion);
            $stmt->bindParam(":etiqueta",$etiqueta);
            $stmt->bindParam(":descripcion",$descripcion);
            $stmt->bindParam(":id_cliente",$id_cliente);
            $stmt->execute();
        } catch (PDOException $e){
		    echo $e->getMessage();
        }  
          
        ConexionDB::desconectar();  

    }

    //Ver incidencias
    public static function getIncidencias() {
        $consulta = "SELECT * FROM Incidencias";

        $conexion = ConexionDB::conectar("incidencias");

        try {
            $stmt = $conexion->prepare($consulta);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Incidencias\Incidencia");
            $resultado = $stmt->fetchAll();
        } catch (PDOException $e){
		    echo $e->getMessage();
        }  
          
        ConexionDB::desconectar();
        return $resultado;
    }



}
