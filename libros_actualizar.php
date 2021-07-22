<?php
print_r($_REQUEST);
require_once './conexion.php';
$sql = 'update libros set
titulo = :titulo ,
autor = :autor ,
idioma = :idioma ,
descripcion = :descripcion ,
numero_paginas = :numero_paginas ,
anio_edicion = :anio_edicion ,
disponible_para = :disponible_para ,
precio = :precio ,
cantidad_libros = :cantidad_libros,
estatus_libro = :estatus_libro    
where id_libro = :id ';
$sentencia = $conexion->prepare($sql);
$sentencia->bindValue(':titulo', $_POST['titulo'], PDO::PARAM_STR);
$sentencia->bindValue(':autor', $_POST['autor'], PDO::PARAM_STR);
$sentencia->bindValue(':idioma', $_POST['idioma'], PDO::PARAM_STR);
$sentencia->bindValue(':descripcion', $_POST['descripcion'], PDO::PARAM_STR);
$sentencia->bindValue(':numero_paginas', $_POST['numero_paginas'], PDO::PARAM_INT);
$sentencia->bindValue(':anio_edicion', $_POST['anio_edicion'], PDO::PARAM_INT);
$sentencia->bindValue(':cantidad_libros', $_POST['cantidad_libros'], PDO::PARAM_INT);
$sentencia->bindValue(':precio', $_POST['precio'], PDO::PARAM_STR);
$sentencia->bindValue(':disponible_para', $_POST['disponible_para'], PDO::PARAM_STR);
$sentencia->bindValue(':cantidad_libros', $_POST['cantidad_libros'], PDO::PARAM_STR);
$sentencia->bindValue(':estatus_libro', $_POST['estatus_libro'], PDO::PARAM_STR);
$sentencia->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
$sentencia->execute();
