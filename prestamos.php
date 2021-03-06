<?php
require_once './checar_sesion.php';

?>
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
    <title>Editoriales</title>
</head>
<body style="background-color: #F2F7FF;">
<?php
    require_once('./framgents-html/navegacion_admin.html');

    ?>

    <!-- Tabla de editoriales -->
    <div class='container mt-3'>
        <div class='row'>
            <div class='col-3'></div>
            <div class='col-13'>
                    <div class='card shadow'>
                        <div class='card-header fs-3'>
                        <i class="bi bi-book-half"></i>Prestamos
                        </div>
                        <div class='card-body'>
                            <table class="table ">
                            <thead>
                                <tr>
                                    <th >Id prestamo</th>
                                    <th>Titulo</th>
                                    <th>Nombre</th>
                                    <th >Primer Apellido</th>
                                    <th >Numero Celular</th>
                                    <th >Cantidad de libros</th>
                                    <th ">Salida</th>
                                    <th >Vencimiento</th>
                                    <th >Estado</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once './conexion.php';
                                $sql = 'SELECT prestamos.id_prestamo,libros.titulo,usuarios.nombre,usuarios.primer_apellido, usuarios.numero_celular,
                                prestamos.cantidad_libro,prestamos.salida,prestamos.vencimiento,prestamos.estado FROM libros,prestamos,usuarios,prestamos_detalle,intercambios
                                WHERE libros.id_libro=prestamos_detalle.id_libro AND prestamos_detalle.id_prestamo=prestamos.id_prestamo AND
                                prestamos.id_usuario=usuarios.id_usuario AND intercambios.id_usuario_entra=libros.id_libro';
                                $sentencia = $conexion->prepare($sql);
                                $sentencia ->execute(); 
                                foreach($sentencia->fetchAll(PDO::FETCH_ASSOC) as $prestamo){
                                    $prestamo['id_prestamo'] = htmlentities($prestamo['id_prestamo']);
                                    echo <<<fin
                                <tr>
                                    <td>{$prestamo['id_prestamo']}</td>
                                    <td>{$prestamo['titulo']}</td>
                                    <td>{$prestamo['nombre']}</td>
                                    <td>{$prestamo['primer_apellido']}</td>
                                    <td>{$prestamo['numero_celular']}</td>
                                    <td>{$prestamo['cantidad_libro']}</td>
                                    <td>{$prestamo['salida']}</td>
                                    <td>{$prestamo['vencimiento']}</td>
                                    <td>{$prestamo['estado']}</td>
                              
                                 
                                    
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