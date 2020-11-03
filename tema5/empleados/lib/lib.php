<?php

    //FILTRADO 

    //Función para filtrar los valores recibidos de un formulario
    function filtrado($datos){
        $datos = trim($datos);                                  // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos);                          // Elimina backslashes \
        $datos = filter_var($datos,FILTER_SANITIZE_STRING);     // Elimina todas las etiquetas    
        return $datos;
    }    

    //ACCESO A BASES DE DATOS

    //Conexión a BD
    function conectar($basededatos) {
        //CONECTAR EN LOCAL
/*
        $MySQL_host = "localhost";
        $MySQL_user = "admin";
        $MySQL_password = "admin";
        try {
		    $dsn = "mysql:host=$MySQL_host;dbname=$basededatos";
            $conexion = new PDO($dsn, $MySQL_user,  $MySQL_password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
		} catch (PDOException $e){
		    echo $e->getMessage();
        }
 */      
        //HEROKU CLEARDB
  /*      
        $MySQL_host = "eu-cdbr-west-03.cleardb.net";
        $MySQL_user = "b769522ed9fce5";
        $MySQL_password = "7d9d2daf";
        try {
		    $dsn = "mysql:host=$MySQL_host;dbname=heroku_c83ad5338f4fd88";
            $conexion = new PDO($dsn, $MySQL_user,  $MySQL_password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
		} catch (PDOException $e){
		    echo $e->getMessage();
		}
    }
*/

        //HEROKU POSTGRES      
        try {
            $db = parse_url(getenv("DATABASE_URL"));

            $pdo = new PDO("pgsql:" . sprintf(
                "host=%s;port=%s;user=%s;password=%s;dbname=%s",
                $db["host"],
                $db["port"],
                $db["user"],
                $db["pass"],
                ltrim($db["path"], "/")
            ));
            return $pdo;
        } catch (PDOException $e){
		    echo $e->getMessage();
        }

    }


    /*
     *  FUNCIONES PARA EMPLEADOS
     *  ------------------------------------------------------------------
     * */

    //Obtener el número de páginas de empleados
    define("RESPP",3);
    function numPaginas($filtro) {
        $consulta = "SELECT * FROM empleados";
        if (strlen($filtro) > 0) {                
            $consulta .= " WHERE dni = :filtro ";
            $consulta .= " OR apellidos LIKE CONCAT('%', :filtro, '%')";
            $consulta .= " OR nombre LIKE CONCAT('%', :filtro, '%')";
        }
        $conexion = conectar("2daw");
        $stmt = $conexion->prepare($consulta);
        if (strlen($filtro) > 0)
            $stmt->bindParam(":filtro",$filtro);
        $stmt->execute();
        $count = $stmt->rowCount();
        $conexion = null;

        return ceil($count / RESPP);
    }

    //Hacer consulta
    function hacerSelect($filtro,$pagina) {
        //Resultados por página a mostrar

        try {
            //Establecer conexión
            $conexion = conectar("2daw");
            //Para evitar problemas con caracteres especiales
            $conexion->query("SET NAMES utf8");            
            //Consulta de todos los empleados
            $consulta = "SELECT * FROM empleados ";
            if (strlen($filtro) > 0) {                
                $consulta .= " WHERE dni = :filtro ";
                $consulta .= " OR apellidos LIKE CONCAT('%', :filtro, '%')";
                $consulta .= " OR nombre LIKE CONCAT('%', :filtro, '%')";
            }
            //Añadimos la búsqueda a la consulta
            $consulta .= " ORDER BY apellidos";
            //Paginador
            if ($pagina > 0) {
                $start = (($pagina-1) * RESPP);
                $consulta .= " LIMIT ".$start." , ".RESPP;
            }

            //Preparamos la consulta
            $stmt = $conexion->prepare($consulta);
            if (strlen($filtro) > 0)
                $stmt->bindParam(":filtro",$filtro);
            //Ejecutamos la consulta
            $stmt->execute();
            //Devolvemos los resultados
            $empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $conexion = null;
        } catch (PDOException $e){
            file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
        }

        return $empleados;
    }

    //Hacer consulta para sacar un empleado por id
    function hacerSelectId($id) {
        try {
            //Establecer conexión
            $conexion = conectar("2daw");
            //Para evitar problemas con caracteres especiales
            $conexion->query("SET NAMES utf8");            
            //Consulta sólo del empleado por id
            $consulta = "SELECT * FROM empleados WHERE id = :id";
            //Preparamos la consulta
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(":id", $id);
            //Ejecutamos la consulta
            $stmt->execute();
            //Devolvemos los resultados
            $empleado = $stmt->fetch(PDO::FETCH_ASSOC);
            $conexion = null;
        } catch (PDOException $e){
            file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
        }

        return $empleado;
    }


    //Insertar nuevo empleado
    function insertarEmpleado($dni,$nombre,$apellidos,$email,$telefono,$fechanac,$cargo,$estado) {
        try {
            //Establecer conexión
            $conexion = conectar("2daw");
            //Para evitar problemas con caracteres especiales
            $conexion->query("SET NAMES utf8");
            //Preparamos la consulta
            $consulta = "INSERT INTO empleados (dni,nombre,apellidos,email,telefono,fechanac,cargo,estado) VALUES (";
            $consulta .= ":dni, :nombre, :apellidos, :email, :telefono, :fechanac, :cargo, :estado)";
            $stmt = $conexion->prepare($consulta);

            $stmt->bindParam(':dni', $dni);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellidos', $apellidos);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':fechanac', $fechanac);
            $stmt->bindParam(':cargo', $cargo);
            $stmt->bindParam(':estado', $estado);

            $stmt->execute();
            $conexion = null;
        } catch (PDOException $e){
            file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
        }
    }

    //Borrar empleado
    function borrarEmpleado($id) {
        try {
            //Establecer conexión
            $conexion = conectar("2daw");
            //Preparamos la consulta
            $consulta = "DELETE FROM empleados WHERE id = :id";
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(':id',$id);

            $stmt->execute();
            $conexion = null;
        } catch (PDOException $e){
            file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
        }

    }

    //Borrar varios empleados
    function borrarVariosEmpleados($ids) {
        try {
            //Establecer conexión
            $conexion = conectar("2daw");
            //Preparamos la consulta
            $consulta = "DELETE FROM empleados WHERE id IN (";
            foreach ($ids as $id) {
                $consulta .= $id.",";
            }
            $consulta = substr($consulta,0,strlen($consulta)-2);
            $consulta .= ")";

            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(':id',$id);

            $stmt->execute();
            $conexion = null;
        } catch (PDOException $e){
            file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
        }

    }

    //Modificar un empleado existente
    function modificarEmpleado($id,$dni,$nombre,$apellidos,$email,$telefono,$fechanac,$cargo,$estado) {
        try {
            //Establecer conexión
            $conexion = conectar("2daw");
            //Para evitar problemas con caracteres especiales
            $conexion->query("SET NAMES utf8");
            //Preparamos la consulta
            $consulta = "UPDATE empleados SET dni=:dni,nombre=:nombre,apellidos=:apellidos,email=:email";
            $consulta .= ",telefono=:telefono,fechanac=:fechanac,cargo=:cargo,estado=:estado ";
            $consulta .= "WHERE id=:id";
            $stmt = $conexion->prepare($consulta);

            $stmt->bindParam(':dni', $dni);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellidos', $apellidos);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':fechanac', $fechanac);
            $stmt->bindParam(':cargo', $cargo);
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':id', $id);

            $stmt->execute();
            $conexion = null;
        } catch (PDOException $e){
            file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
        }
    }  
    

    /*
     *  FUNCIONES PARA PROYECTOS
     *  ------------------------------------------------------------------
     * */


?>