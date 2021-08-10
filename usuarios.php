<!DOCTYPE html>
<html lang="es-Mx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/editoriales.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script defer src="js/bootstrap.min.js"></script>
    <title>Usuarios</title>
</head>
<body style="background-color: #F2F7FF;">
<?php
    require_once('./framgents-html/navegacion_admin.html');

    ?>

    <!-- Tabla de editoriales -->
    <div class='container-fluid m-5'>
        <div class='row'>
            <div class='col-3'></div>
            <div class='col-11'>
                    <div class='card'>
                        <div class='card-header fs-3'>
                        <i class= " bi bi-people-fill"></i>Usuarios
                        </div>
                        <div class='card-body'>
                            <a class="float-end btn btn-lg " href="usuarios_crear.php" title="Crear usuario">
                             <i class="bi bi-person-plus-fill"></i> Crear
                            </a>
                            <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre(s)</th>
                                    <th >Primer Apellido</th>
                                    <th >Segundo Apellido</th>
                                    <th >Correo</th>
                                    <th >Telefono</th>
                                    <th >Estatus</th>
                                    <th >Privilegio</th>
                                    <th >&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once './conexion.php';
                                $sql = 'select id_usuario, nombre, primer_apellido, segundo_apellido,
                                        correo, contrasena, numero_celular, estatus_usuario, privilegio 
                                        from usuarios order by nombre asc';
                                $sentencia = $conexion->prepare($sql);
                                $sentencia ->execute(); 
                                foreach($sentencia->fetchAll(PDO::FETCH_ASSOC) as $usuario){
                                    $usuario['nombre'] = htmlentities($usuario['nombre']);
                                    echo <<<fin
                                <tr>
                                    <td>{$usuario['nombre']}</td>
                                    <td>{$usuario['primer_apellido']}</td>
                                    <td>{$usuario['segundo_apellido']}</td>
                                    <td>{$usuario['correo']}</td>
                                    <td>{$usuario['numero_celular']}</td>
                                    <td>{$usuario['estatus_usuario']}</td>
                                    <td>{$usuario['privilegio']}</td>
                                    <td>
                                        <a class="btn float-end enviar btn-sm" href="usuarios_editar.php?id_usuario={$usuario['id_usuario']}" title="Clic para editar usuario">
                                            <i class="bi-pencil-square"></i> Editar
                                        </a>
                                    </td>
                                </tr>
fin;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="js/jquery-3.6.0.min.js"></script>
</body>
</html>