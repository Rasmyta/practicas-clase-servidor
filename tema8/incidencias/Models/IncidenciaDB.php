<?php
namespace Incidencias;

use Incidencias\Incidencia;
use Incidencias\ConexionDB;
use \PDO;
use \PDOException;

class IncidenciaDB {

    //Ver incidencias
    public static function getIncidencias() {
        try {
            $conexion = ConexionDB::conectar("Incidencias");
            $cursor = $conexion->Incidencias->find();
            $result = array();
            foreach ($cursor as $doc) {
                $result[] = new Incidencia($doc['id'],$doc['latitud'],$doc['longitud'],$doc['ciudad'],$doc['direccion'],$doc['etiqueta'],$doc['descripcion'],$doc['estado'],$doc['id_cliente']);
            }

        } catch(Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        $conexion = null;
        return $result;
    }

    //Insertar incidencia
    public static function newIncidencia($post) {

        //Quitamos action de $post si se manda con Ajax una acción
        array_pop($post);

        try {
            $conexion = ConexionDB::conectar("Incidencias");
  
            //Primero sacamos el máximo id
            $inc = $conexion->Incidencias->findOne(
                [],
                [
                    'sort' => ['id' => -1],
                ]);
            if (isset($inc['id']))
                $max = $inc['id'] + 1;
            else 
                $max = 1;

            //Hay que añadir un array. El primero elemento es el id autoincrementado
            $array_insert = ['id' => $max];
            //El resto de campos los saco de $_POST, añadiendo $key => $value
            foreach($post as $key => $value) {
                $array_insert += [ "$key" => $value ];
            }
            $result = $conexion->Incidencias->insertOne($array_insert);

          } catch(Exception $e) {
            $result = 'Error: ' . $e->getMessage();
          }
          $conexion = null;
          return $result;        
    }

    //Borrar incidencia
    public static function deleteIncidencia($id) {
        try {
            $conexion = ConexionDB::conectar("Incidencias");
            $cursor = $conexion->Incidencias->deleteOne(array('id' => intval($id)));  
        } catch(Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        $conexion = null;
    }

    //Update incidencia
    public static function updateIncidencia($estado,$id) {
        try {
            $conexion = ConexionDB::conectar("Incidencias");

            $cursor = $conexion->Incidencias->updateOne(
                ['id' => intval($id)],
                ['$set' =>  [ 'estado' => $estado ]
                ]
            );
        
        } catch(Exception $e) {
            $result = 'Error: ' . $e->getMessage();
        }
        $conexion = null;       
    } 



}
