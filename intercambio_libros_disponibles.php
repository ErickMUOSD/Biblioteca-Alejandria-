<?php
print_r($_REQUEST);
require_once './conexion.php';
    $sql = 'select id_libro, titulo from libros where precio < :precio and estatus_libro = "Activo" and disponible_para = "Intercambio"; ';
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindValue(':precio', $_GET['precio_lib'], PDO::PARAM_STR);
    $sentencia->execute();
    echo json_encode([
        'estatus' => true, 'data' => $sentencia->fetchAll(PDO::FETCH_ASSOC)
    ]);
