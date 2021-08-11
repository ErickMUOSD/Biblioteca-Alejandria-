<?php
require_once('vendor/autoload.php');
$session_factory = new Aura\Session\SessionFactory;
$session = $session_factory->newInstance($_COOKIE);
$segment = $session->getSegment('usuarios');

?>

<!DOCTYPE html>
<html lang="es-Mx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script defer src="js/bootstrap.min.js"></script>
    <title>Mi perfil</title>
</head>
<body>
    
<?php
    require_once('./framgents-html/navegacion_admin.html');

    ?>

    <!-- Tabla de editoriales -->
    <div class='container mt-3'>
        <div class='row'>
            <div class='col-3'></div>
            <div class='col-13'>
                    <div class='card'>
                        <div class='card-header'>
                        <i class="bi bi-book-half"></i>Mi perfil
                        </div>
                        <div class='card-body'>
                            <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width=80%;">Id usuario</th>
                                    <th style="width=80%;">Nombre</th>
                                    <th style="width=80%;">Titulo</th>
                                    <th style="width=80%;">Salida</th>
                                    <th style="width=80%;">Vencimiento</th>
                                    <th style="width=80%;">Cantidad de libros</th>
                                   <th style="width=20%;">&nbsp;</th>
                                    <th style="width=20%;">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once './conexion.php';
                                $sql = 'SELECT usuarios.id_usuario,usuarios.nombre,libros.titulo,prestamos.salida,
                                prestamos.vencimiento,prestamos.cantidad_libro FROM usuarios, prestamos, libros, prestamos_detalle
                                WHERE libros.id_libro=prestamos_detalle.id_libro 
                                AND prestamos_detalle.id_prestamo=prestamos.id_prestamo 
                                AND prestamos.id_usuario=usuarios.id_usuario 
                                AND usuarios.id_usuario= : id_usuario;';
                                $segment->get('id_usuario')
                                $sentencia = $conexion->prepare($sql);
                                $sentencia->bindValue(':id_usuario', $_POST['id_usuario'], PDO::PARAM_STR);
                                $sentencia ->execute(); 
                                foreach($sentencia->fetchAll(PDO::FETCH_ASSOC) as $usuario){
                                    $usuario['id_usuario'] = htmlentities($usuario['id_usuario']);
                                    echo <<<fin
                                <tr>
                                    <td>{$usuario['id_usuario']}</td>
                                    <td>{$usuario['titulo']}</td>
                                    <td>{$usuario['nombre']}</td>
                                    <td>{$usuario['salida']}</td>
                                    <td>{$usuario['vencimiento']}</td>
                                    <td>{$usuario['cantidad_libro']}</td>
                              
                                 
                                    
                                    <td>
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