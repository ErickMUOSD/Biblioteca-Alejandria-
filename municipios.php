<?php

require_once './conexion.php';
$sql = 'select id_municipio, municipio from municipios where id_estado =
 :id_estado order by municipio asc';
$sentencia = $conexion->prepare($sql);
$sentencia->bindParam(':id_estado', $_REQUEST['estado_id'], PDO::PARAM_INT);
$sentencia->execute();
// $usuario->fetch(PDO::FETCH_ASSOC);
echo json_encode([
    'estatus' => true
    , 'data' => $sentencia->fetchAll(PDO::FETCH_ASSOC)
]);
