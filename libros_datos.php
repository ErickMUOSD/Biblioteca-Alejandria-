<?php
require_once './conexion.php';
    $sql = 'select id_libro, titulo, autor, idioma,descripcion, numero_paginas,anio_edicion, disponible_para,precio, cantidad_libros from libros ';
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute();
    echo json_encode([
        'estatus' => true, 'data' => $sentencia->fetchAll(PDO::FETCH_ASSOC)
    ]);
   
    ?>