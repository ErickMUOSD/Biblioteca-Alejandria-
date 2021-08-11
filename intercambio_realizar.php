<?php
print_r($_REQUEST);
print_r($_FILES);
require_once './conexion.php';

if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
    $filename = $_FILES['foto']['name'];
    $nombre_archivo = uniqid('lib-', true) . '.jpg';
    $image_Path = "./images/" . $nombre_archivo;
    move_uploaded_file($_FILES['foto']['tmp_name'], $image_Path);
    $fotoNombre = $nombre_archivo;
}


$sql = ' insert into libros(id_categoria,id_editorial, titulo,autor,idioma,descripcion,
numero_paginas,anio_edicion, foto, disponible_para, precio, cantidad_libros,estatus_libro)
values( :id_categoria , :id_editorial , :titulo , :autor, :idioma, :descripcion, :numero_paginas ,:anio_edicion, :foto ,
 :disponible_para, :precio, :cantidad_libro, :estatus_libro ); ';

$sentencia = $conexion->prepare($sql);
$sentencia->bindValue(':id_categoria', $_POST['categoria_libro'], PDO::PARAM_STR);
$sentencia->bindValue(':id_editorial', $_POST['editorial_libro'], PDO::PARAM_STR);
$sentencia->bindValue(':titulo', $_POST['titulo'], PDO::PARAM_STR);
$sentencia->bindValue(':autor', $_POST['autor'], PDO::PARAM_STR);
$sentencia->bindValue(':idioma', $_POST['idioma'], PDO::PARAM_STR);
$sentencia->bindValue(':descripcion', $_POST['descripcion'], PDO::PARAM_STR);
$sentencia->bindValue(':numero_paginas', $_POST['numero_paginas'], PDO::PARAM_INT);
$sentencia->bindValue(':anio_edicion', $_POST['anio_edicion'], PDO::PARAM_INT);
$sentencia->bindValue(':foto', $fotoNombre, PDO::PARAM_STR);
$sentencia->bindValue(':disponible_para', $_POST['disponible'], PDO::PARAM_STR);
$sentencia->bindValue(':precio', $_POST['precio'], PDO::PARAM_STR);
$sentencia->bindValue(':cantidad_libro', $_POST['cantidad_libros'], PDO::PARAM_INT);
$sentencia->bindValue(':estatus_libro', $_POST['estatus'], PDO::PARAM_STR);
// $sentencia->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
$sentencia->execute();

$libro_nuevo = $conexion->lastInsertId();

$sql = '
INSERT INTO intercambios (id_usuario_entra, id_usuarios_salida,
 id_libro_salida,id_libro_entrada,fecha_hora_intercambio, estatus_intercambio) 
VALUES (:id_usuario_entra, :id_usuario_salida, :id_libro_salida, :id_libro_entra ,NOW(),"Activo"); ';
$sentencia = $conexion->prepare($sql);
$sentencia->bindValue(':id_usuario_entra', $_POST['id_usuario'], PDO::PARAM_STR);
$sentencia->bindValue(':id_usuario_salida', $_POST['id_usuario'], PDO::PARAM_STR);
$sentencia->bindValue(':id_libro_salida', $_POST['id_libro_llevar'], PDO::PARAM_STR);
$sentencia->bindValue(':id_libro_entra', $libro_nuevo, PDO::PARAM_STR);
$sentencia->execute();