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
    <title>intercambios</title>
</head>
<body>
<?php
    require_once('./framgents-html/navegacion_admin.html');

    ?>

    <!-- Tabla de intercambios -->
    <div class='container mt-3'>
        <div class='row'>
            <div class='col-3'></div>
            <div class='col-13'>
                    <div class='card'>
                        <div class='card-header'>
                        <i class="bi bi-book-half"></i>intercambios
                        </div>
                        <div class='card-body'>
                            <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width=80%;">Id intercambio</th>
                                    <th style="width=80%;">Titulo</th>
                                    <th style="width=80%;">Nombre</th>
                                    <th style="width=80%;">Primer Apellido</th>
                                    <th style="width=80%;">Numero Celular</th>
                                    <th style="width=80%;">Precio</th>
                                    <th style="width=80%;">Fecha</th>
                                    <th style="width=20%;">&nbsp;</th>
                                    <th style="width=20%;">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once './conexion.php';
                                $sql = 'SELECT intercambios.id_intercambios,libros.titulo,usuarios.nombre,usuarios.primer_apellido,usuarios.numero_celular,
                                libros.precio,intercambios.fecha_hora_intercambio
                                FROM libros,intercambios,usuarios,prestamos,prestamos_detalle WHERE intercambios.id_usuario_entra=libros.id_libro 
                                AND libros.id_libro=prestamos_detalle.id_libro AND prestamos_detalle.id_prestamo=prestamos.id_prestamo 
                                AND prestamos.id_usuario=usuarios.id_usuario';
                                $sentencia = $conexion->prepare($sql);
                                $sentencia ->execute(); 
                                foreach($sentencia->fetchAll(PDO::FETCH_ASSOC) as $intercambio){
                                    $intercambio['id_intercambios'] = htmlentities($intercambio['id_intercambios']);
                                    echo <<<fin
                                <tr>
                                    <td>{$intercambio['id_intercambios']}</td>
                                    <td>{$intercambio['titulo']}</td>
                                    <td>{$intercambio['nombre']}</td>
                                    <td>{$intercambio['primer_apellido']}</td>
                                    <td>{$intercambio['numero_celular']}</td>
                                    <td>{$intercambio['precio']}</td>
                                    <td>{$intercambio['fecha_hora_intercambio']}</td>
                                                          
                                    
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