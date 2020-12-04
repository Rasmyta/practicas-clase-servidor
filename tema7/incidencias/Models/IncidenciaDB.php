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
        $consulta = "SELECT * FROM incidencias";

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

    //Insertar incidencia
    public static function newIncidencia($post) {

        //Quitamos action de $post si se manda con Ajax una acción
        array_pop($post);

        $consulta = "INSERT INTO incidencias (";
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

    //Borrar incidencia
    public static function deleteIncidencia($id) {
        $consulta = "DELETE FROM incidencias WHERE id=:id";
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

    //Update incidencia
    public static function updateIncidencia($estado,$id) {
        $consulta = "UPDATE incidencias SET estado=:estado WHERE id=:id";
        $conexion = ConexionDB::conectar("incidencias");

        try {
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(":estado",$estado);
            $stmt->bindParam(":id",$id);
            $stmt->execute();            
        } catch (PDOException $e){
		    echo $e->getMessage();
        }  
          
        ConexionDB::desconectar();
    } 



}
