<?php

require_once './conexion.php';
$sql = 'select * from usuarios where nombre = :nombre and correo = :correo and numero_celular= :numero_celular ';
$sentencia = $conexion->prepare($sql);
$sentencia->bindValue(':nombre', $_POST['nombre'], PDO::PARAM_STR);
$sentencia->bindValue(':correo', $_POST['correo'], PDO::PARAM_STR);
$sentencia->bindValue(':numero_celular', $_POST['numero_celular'], PDO::PARAM_STR);
$sentencia->execute();
$usuario = $sentencia->fetch(PDO::FETCH_ASSOC);

if (null != $usuario) {
    echo json_encode([
        'estatus' => true, 'data' => $usuario
    ]);

    exit();
} else {
    $error = array('id_usuario' => '0', );
    echo json_encode([
        'estatus' => true, 'data' =>$error
    ]);
    exit();
}
