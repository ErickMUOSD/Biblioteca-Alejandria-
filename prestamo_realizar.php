<?php
print_r($_REQUEST);
require_once './conexion.php';

$sql = 'insert into direcciones(id_estado, ciudad,colonia,calle,numero_exterior, numero_interior, 
codigo_postal, estatus_direccion) 
values( :estado, :ciudad,  :colonia, :calle, :numero_exterior, :numero_interior, :codigo_postal,  "Activo") ';

$sentencia = $conexion->prepare($sql);
$sentencia->bindValue(':estado', $_POST['estado'], PDO::PARAM_INT);
$sentencia->bindValue(':ciudad', $_POST['ciudad'], PDO::PARAM_STR);
$sentencia->bindValue(':colonia', $_POST['colonia'], PDO::PARAM_STR);
$sentencia->bindValue(':calle', $_POST['calle'], PDO::PARAM_STR);
$sentencia->bindValue(':numero_exterior', $_POST['numero_exterior'], PDO::PARAM_STR);
$sentencia->bindValue(':numero_interior', $_POST['numero_interior'], PDO::PARAM_STR);
$sentencia->bindValue(':codigo_postal', $_POST['codigo_postal'], PDO::PARAM_STR);
$sentencia->execute();


$direccion_id = $conexion->lastInsertId();
$sql = 'update usuarios set direccion_id = :direccion_id where id_usuario = :id_usuario';
$sentencia = $conexion->prepare($sql);
$sentencia->bindValue(':direccion_id', $direccion_id, PDO::PARAM_INT);
$sentencia->bindValue(':id_usuario', $_POST['id_usuario'], PDO::PARAM_INT);
$sentencia->execute();

$sql = '
INSERT INTO prestamos ( id_usuario, salida, vencimiento, cantidad_libro, estado, estatus_prestamo, dias_prestamo, total) 
 VALUES (:id_usuario,  NOW(), DATE_ADD(NOW(), INTERVAL 30 DAY), 1, "Habilitado", "Activo", 30, :total);
';
$sentencia = $conexion->prepare($sql);
$sentencia->bindValue(':id_usuario', $_POST['id_usuario'], PDO::PARAM_INT);
$sentencia->bindValue(':total', $_POST['total'], PDO::PARAM_INT);
$sentencia->execute();



$prestamo_id = $conexion->lastInsertId();
$sql = "
INSERT INTO prestamos_detalle (id_libro, id_prestamo, estatus_prestamodetalle) 
VALUES ( :id_libro , :id_prestamo , 'Activo');
";

$sentencia = $conexion->prepare($sql);
$sentencia->bindValue(':id_libro', $_POST['id_libro'], PDO::PARAM_INT);
$sentencia->bindValue(':id_prestamo', $prestamo_id, PDO::PARAM_INT);
$sentencia->execute();

$sql = "
update libros set cantidad_libros = (cantidad_libros-1) where id_libro = :id_libro
";
$sentencia = $conexion->prepare($sql);
$sentencia->bindValue(':id_libro', $_POST['id_libro'], PDO::PARAM_INT);
$sentencia->execute();

/*
1.- si hay 0 descativvar
*/