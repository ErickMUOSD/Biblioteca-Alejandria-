<?php
require_once './conexion.php';
    $sql = 'select *from libros ';
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute();
    echo json_encode([
        'estatus' => true, 'data' => $sentencia->fetchAll(PDO::FETCH_ASSOC)
    ]);
   
    ?>