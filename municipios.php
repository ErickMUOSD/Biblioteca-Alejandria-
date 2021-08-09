<?php

require_once './conexion.php';
$sql = 'select id_municipio, municipio from municipios where estado_id =
 :estado_id order by municipio asc';
$sentencia = $conexion->prepare($sql);
$sentencia->bindParam(':estado_id', $_REQUEST['estado_id'], PDO::PARAM_INT);
$sentencia->execute();
// $usuario->fetch(PDO::FETCH_ASSOC);
echo json_encode([
    'estatus' => true
    , 'data' => $sentencia->fetchAll(PDO::FETCH_ASSOC)
]);
