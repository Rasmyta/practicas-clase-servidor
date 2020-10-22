<?php


    //Conexión a BD
    function conectar($basededatos) {
        $MySQL_host = "localhost";
        $MySQL_user = "admin";
        $MySQL_password = "admin";
        try {
		    $dsn = "mysql:host=$MySQL_host;dbname=$basededatos";
            $conexion = new PDO($dsn, $MySQL_user,  $MySQL_password);
            return $conexion;
		} catch (PDOException $e){
		    echo $e->getMessage();
		}   
    }

    //Hacer consulta
    function hacerSelect($conexion,$consulta) {
        $conexion->query("SET NAMES utf8");
        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


?>