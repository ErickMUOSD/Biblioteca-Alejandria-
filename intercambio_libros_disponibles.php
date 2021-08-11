<?php

require_once './conexion.php';
$sql = 'select id_libro, titulo from libros where precio < :precio and estatus_libro = "Activo" 
and disponible_para = "Intercambio" ';
$sentencia = $conexion->prepare($sql);
$sentencia->bindValue(':precio', $_REQUEST['precio_lib'], PDO::PARAM_INT);
$sentencia->execute();
echo json_encode([
    'estatus' => true, 'data' => $sentencia->fetchAll(PDO::FETCH_ASSOC)
]);