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

        try {
            $conexion = ConexionDB::conectar("Incidencias");

            //Primero sacamos el máximo id
            $inc = $conexion->usuarios->findOne(
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
            $result = $conexion->usuarios->insertOne($array_insert);

        } catch(Exception $e) {
            $result = 'Error: ' . $e->getMessage();
        }
        $conexion = null;  
    }


    public static function getId($movil) {
        try {
            $conexion = ConexionDB::conectar("Incidencias");
            $cursor = $conexion->usuarios->find(['movil' => $movil]);
            $result = array();
            foreach ($cursor as $doc) {
                $result[] = new Cliente($doc['id'],$doc['nombre'],$doc['direccion'],$doc['localidad'],$doc['movil'],$doc['dni']);
            }

        } catch(Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        $conexion = null;
        return $result;
    }

    public static function getClientes() {
        try {
            $conexion = ConexionDB::conectar("Incidencias");
            $cursor = $conexion->usuarios->find();
            $result = array();
            foreach ($cursor as $doc) {
                $result[] = new Cliente($doc['id'],$doc['nombre'],$doc['direccion'],$doc['localidad'],$doc['movil'],$doc['dni']);
            }

        } catch(Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        $conexion = null;
        return $result;
    }

    
    //Borrar cliente
    public static function deleteCliente($id) {
        try {
            $conexion = ConexionDB::conectar("Incidencias");
            $cursor = $conexion->usuarios->deleteOne(array('id' => intval($id)));  
        } catch(Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        $conexion = null;
    }


}
