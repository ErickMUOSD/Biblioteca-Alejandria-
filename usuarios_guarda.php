<!DOCTYPE html>
<html lang="es-Mx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuarios</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class='contaier'>
        <div class='row'>
            <div class='col-3'></div>
            <div class='col-6'>
                <div class="card">
                    <div class="card-header">
                       Valores Recibidos
                    </div>
                    <div class="card-body">
                        <pre>
                        <?php
require('vendor/autoload.php');

use Rakit\Validation\Validator;

$validator = new Validator;

// make it
$validation = $validator->make($_POST, [
    'nombre' => 'required|min:2|max:50'
    ,'primer_apellido' => 'required|min:2|max:50'
    ,'segundo_apellido' => 'required|min:2|max:50'
    ,'correo' => 'required|email'
    ,'contrasena' => 'required|min:2'
    ,'numero_celular' => 'required|min:10|max:15'
    ,'estatus_usuario' => 'required|in:Activo,Inactivo'
    ,'privilegio' => 'required|in:Administrador,Usuario'
]);

// then validate
$validation->validate();

if ($validation->fails()) {
    // handling errors
    $errors = $validation->errors();
    echo "<pre>";
    print_r($errors->firstOfAll());
    echo "</pre>";
} else {
    // validation passes
    require_once './conexion.php';
    $sql = <<<fin
    insert into usuarios (nombre, primer_apellido, segundo_apellido, correo, contrasena, numero_celular, estatus_usuario, privilegio)
    values(:nombre, :primer_apellido, :segundo_apellido, :correo, :contrasena, :numero_celular, :estatus_usuario, :privilegio)
    fin;
    $opciones = [
        'cost' => 12,
    ];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT, $opciones);
    $sentencia = $conexion->prepare($sql);
    $sentencia ->bindValue(':nombre', $_POST["nombre"],PDO::PARAM_STR);
    $sentencia ->bindValue(':primer_apellido', $_POST["primer_apellido"],PDO::PARAM_STR);
    $sentencia ->bindValue(':segundo_apellido', $_POST["segundo_apellido"],PDO::PARAM_STR);
    $sentencia ->bindValue(':correo', $_POST["correo"],PDO::PARAM_STR);
    $sentencia ->bindValue(':contrasena', $contrasena,PDO::PARAM_STR);
    $sentencia ->bindValue(':numero_celular', $_POST["numero_celular"],PDO::PARAM_STR);
    $sentencia ->bindValue(':estatus_usuario', $_POST["estatus_usuario"],PDO::PARAM_STR);
    $sentencia ->bindValue(':privilegio', $_POST["privilegio"],PDO::PARAM_STR);
    $sentencia ->execute();    
    echo '<h2>Usuario Creado</h2>';
}
?>
                        </pre>                               
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/bootstrap.min.js"></script>
</html>