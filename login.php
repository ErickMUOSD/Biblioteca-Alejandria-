<?php
require_once('vendor/autoload.php');
// print_r($_REQUEST);
if ('POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['correo']) && isset($_POST['contrasena'])) {

    require_once './conexion.php';
    $sql = 'select id_usuario, nombre, correo, contrasena, privilegio, estatus_usuario from usuarios where correo = :correo and estatus_usuario = \'Activo\'';
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindValue(':correo', $_POST['correo'], PDO::PARAM_STR);
    $sentencia->execute();
    $usuario = $sentencia->fetch(PDO::FETCH_ASSOC);

    if (null == $usuario) {
        header('Location: login.php?error=true');
        exit;
    }

    //password_verify($_POST['contrasena'], $usuario['contrasena']
    //$_POST['contrasena'] == $usuario['contrasena']
    if (password_verify($_POST['contrasena'], $usuario['contrasena'])) {
       
        $session_factory = new Aura\Session\SessionFactory;
        $session = $session_factory->newInstance($_COOKIE);
        $segment = $session->getSegment('usuarios');
        $segment->set('id_usuario', $usuario['id_usuario']);
        $segment->set('nombre', $usuario['nombre']);
        $segment->set('correo', $usuario['correo']);
        $segment->set('privilegio', $usuario['privilegio']);
        $segment->set('estatus_usuario', $usuario['estatus_usuario']);
        if ($usuario['privilegio'] == 'Administrador') {
            header('Location: panel_administrador.php');
        } else if ($usuario['privilegio'] == 'Usuario') {
            header('Location: index.php');
        }
    } else {

        header('Location: login.php?error=true');
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <script defer src="js/bootstrap.min.js"></script>
    <script  defer src="js/jquery-3.6.0.min.js"> </script>
</head>

<body>
    <div class="container-fluid ">

        <div class="card mt-2">
            <div class="card-body  d-flex flex-row ">
                <div class="left-side ">
                    <img class="" src="images_system/libreria3.png" alt="mujer leyendo">

                    <h3>Descubre un nuevo mundo dentro de libros</h3>
                    <a href="https://storyset.com/people">People illustrations by Storyset</a>

                </div>
                <div class="horizontal-line"></div>
                <div class=" right-side ">
                    <form action="login.php" method="post">


                        <h1>Comencemos...</h1>
                        <h6>No te has registrado... <a href="">Click aquí</a></h6>

                        <?php

                        if ('GET' == $_SERVER['REQUEST_METHOD'] && isset($_GET['error']) && $_GET['error'] = 'true') {
                            echo  ' <div class="d-flex flex-direction-row " style="background-color: #ff0000;  ">
                            <i class="bi bi-x-lg" style="color: white; padding:  10px ; background-color: #ce0000;"></i>
                            <h5 style="color: white; padding: 10px; margin: 0"> Opss...Parece que no hemos encontrado tus datos. Intenta de nuevo.</h5>
                        </div>';
                        }

                        ?>
                        <div class="mt-3  mb-3">
                            <label for="formGroupExampleInput" class="form-label ">Correo electronico</label>
                            <input type="text" class="form-control mt-1" name="correo" id="correo" placeholder="MyCorreo@gmail.com" required>
                        </div>
                        <div class=" mt-5  mb-3">
                            <label for="formGroupExampleInput2" class="form-label ">Contraseña</label>
                            <input type="password" class=" form-control mt-1" name="contrasena" id="contrasena" placeholder="Contraseña" required>
                        </div>
                        <div class="mt-5 btn-submit ">
                            <!-- <input type="submit" name="" class="submit-btn btn" value="Entrar"> -->
                            <button type="submit" class="btn submit-btn">Entrar</button>
                        </div>




                    </form>

                </div>




            </div>
        </div>
    </div>


</body>

</html>
</body>

</html>