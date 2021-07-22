<?php
require_once './conexion.php';
    $sql = 'select id_categoria,nombre_categoria from categorias ';
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute();
    echo json_encode([
        'estatus' => true, 'data' => $sentencia->fetchAll(PDO::FETCH_ASSOC)
    ]);
   
    ?>