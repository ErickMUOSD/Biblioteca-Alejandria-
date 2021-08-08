<?php
require_once './conexion.php';

print_r($_FILES);
print_r($_REQUEST);
$fotoNombre;
//$_FILES['foto']['error'] == 0

if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
    $filename = $_FILES['foto']['name'];
    $nombre_archivo = uniqid('lib-', true) . '.jpg';
    $image_Path = "./images/" . $nombre_archivo;
    move_uploaded_file($_FILES['foto']['tmp_name'], $image_Path);
    $fotoNombre = $nombre_archivo;
    if (file_exists("./images/" . $_POST['foto_nombre'])) {
        unlink("./images/" . $_POST['foto_nombre']);
        echo 'File ' . $filename . ' has been deleted';
    }
} else if ($_FILES['foto']['error'] == 4) {
    $fotoNombre = $_POST['foto_nombre'];
}

/*

2.- validacion server
3.- reescalar


*/


$sql = 'update libros set
titulo = :titulo ,
autor = :autor ,
idioma = :idioma ,
descripcion = :descripcion ,
numero_paginas = :numero_paginas ,
anio_edicion = :anio_edicion ,
foto = :foto_nombre,
disponible_para = :disponible_para ,
precio = :precio ,
cantidad_libros = :cantidad_libros,
estatus_libro = :estatus_libro,
id_categoria = :id_categoria,
id_editorial = :id_editorial    
where id_libro = :id ';
$sentencia = $conexion->prepare($sql);
$sentencia->bindValue(':titulo', $_POST['titulo'], PDO::PARAM_STR);
$sentencia->bindValue(':autor', $_POST['autor'], PDO::PARAM_STR);
$sentencia->bindValue(':idioma', $_POST['idioma'], PDO::PARAM_STR);
$sentencia->bindValue(':descripcion', $_POST['descripcion'], PDO::PARAM_STR);
$sentencia->bindValue(':numero_paginas', $_POST['numero_paginas'], PDO::PARAM_INT);
$sentencia->bindValue(':anio_edicion', $_POST['anio_edicion'], PDO::PARAM_INT);
$sentencia->bindValue(':foto_nombre', $fotoNombre, PDO::PARAM_STR);
$sentencia->bindValue(':cantidad_libros', $_POST['cantidad_libros'], PDO::PARAM_INT);
$sentencia->bindValue(':precio', $_POST['precio'], PDO::PARAM_STR);
$sentencia->bindValue(':disponible_para', $_POST['disponible'], PDO::PARAM_STR);
$sentencia->bindValue(':cantidad_libros', $_POST['cantidad_libros'], PDO::PARAM_STR);
$sentencia->bindValue(':estatus_libro', $_POST['estatus'], PDO::PARAM_STR);
$sentencia->bindValue(':id_categoria', $_POST['categoria_libro'], PDO::PARAM_STR);
$sentencia->bindValue(':id_editorial', $_POST['editorial_libro'], PDO::PARAM_STR);
$sentencia->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
$sentencia->execute();
