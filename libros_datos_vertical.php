<?php
require_once './conexion.php';
    $sql = 'select * from libros where id_libro = :id ';
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $sentencia->execute();
    echo json_encode([
        'estatus' => true, 'data' => $sentencia->fetchAll(PDO::FETCH_ASSOC)
    ]);
