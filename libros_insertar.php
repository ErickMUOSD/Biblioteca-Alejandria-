<?php
print_r($_REQUEST);
require_once './conexion.php';
$sql = ' insert into libros(id_categoria,id_editorial, titulo,autor,idioma,descripcion,
numero_paginas,anio_edicion, foto, disponible_para, precio, cantidad_libros,estatus_libro)
values( :id_categoria , :id_editorial , :titulo , :autor, :idioma, :descripcion, :numero_paginas ,:anio_edicion, "foto.jpe",
 :disponible_para, :precio, :cantidad_libro, :estatus_libro ); ';

$sentencia = $conexion->prepare($sql);
$sentencia->bindValue(':id_categoria', $_POST['id_categoria'], PDO::PARAM_STR);
$sentencia->bindValue(':id_editorial', $_POST['id_editorial'], PDO::PARAM_STR);
$sentencia->bindValue(':titulo', $_POST['titulo'], PDO::PARAM_STR);
$sentencia->bindValue(':autor', $_POST['autor'], PDO::PARAM_STR);
$sentencia->bindValue(':idioma', $_POST['idioma'], PDO::PARAM_STR);
$sentencia->bindValue(':descripcion', $_POST['descripcion'], PDO::PARAM_STR);
$sentencia->bindValue(':numero_paginas', $_POST['numero_paginas'], PDO::PARAM_INT);
$sentencia->bindValue(':anio_edicion', $_POST['anio_edicion'], PDO::PARAM_INT);
//foto
$sentencia->bindValue(':disponible_para', $_POST['disponible_para'], PDO::PARAM_STR);
$sentencia->bindValue(':precio', $_POST['precio'], PDO::PARAM_STR);
$sentencia->bindValue(':cantidad_libro', $_POST['cantidad_libros'], PDO::PARAM_INT);
$sentencia->bindValue(':estatus_libro', $_POST['estatus_libro'], PDO::PARAM_STR);
// $sentencia->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
$sentencia->execute();
