
CREATE TABLE empleados (
  id int NOT NULL,
  dni varchar(11) NOT NULL,
  nombre varchar(45) NOT NULL,
  apellidos varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  telefono varchar(12) DEFAULT NULL,
  fechanac date DEFAULT NULL,
  cargo varchar(45) DEFAULT NULL,
  estado varchar(45) DEFAULT NULL,
  PRIMARY KEY (id)
);


INSERT INTO empleados VALUES (2,'47526684-B','Antonio','Almeida','antonioal@gmail.com','632335544','2000-05-09','RRHH','Activo'),(7,'34454398-F','Manolo','G�mez','manologomez@gmail.com','65625998','1998-05-10','Director t�cnico','activo'),(10,'34454391-F','Uno','1','luis@gmail.com','646251447','1998-05-10','CEO2','activo'),(11,'34454392-F','Dos','2','luis@gmail.com','646251447','1998-05-10','CEO2','activo'),(12,'34454393-F','Tres','3','luis@gmail.com','646251447','1998-05-10','CEO2','activo'),(13,'34454394-F','Cuatro','4','luis@gmail.com','646251447','1998-05-10','CEO2','activo'),(14,'34454395-F','Cinco','5','luis@gmail.com','646251447','1998-05-10','CEO2','activo'),(15,'34454396-F','Seis','6','luis@gmail.com','646251447','1998-05-10','CEO2','activo'),(16,'34454397-F','Siete','7','luis@gmail.com','646251447','1998-05-10','CEO2','activo'),(17,'34454398-F','Ocho','8','luis@gmail.com','646251447','1998-05-10','CEO2','activo');

