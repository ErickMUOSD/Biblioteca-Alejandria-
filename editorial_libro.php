<?php
require_once './conexion.php';
    $sql = 'select id_editorial,nombre_editorial from editoriales ';
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute();
    echo json_encode([
        'estatus' => true, 'data' => $sentencia->fetchAll(PDO::FETCH_ASSOC)
    ]);
   
    ?>