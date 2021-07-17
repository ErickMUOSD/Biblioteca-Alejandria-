<!DOCTYPE html>
<html lang="es-Mx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script defer src="bootstrap/js/bootstrap.min.js"></script>
    <title>Editoriales</title>
</head>
<body>
    <!-- Barra de navegacion -->
    <nav class="navbar navbar-expand-lg pl-4 nav-group  flex-sm-row">

        <a class="navbar-brand fw-bold fs-1 text-light">Biblioteca Alejandría</a>
    
        <div class="collapse navbar-collapse justify-content-lg-center" id="navbarNav" style="  color: white;">
            <ul class="navbar-nav fl">
                <li class="nav-item ml-4 mr-4">
                    <a class="nav-link active text-light" aria-current="page" href="#">Libros</a>
                </li>
                <li class="nav-item  ml-4 mr-4">
                    <a class="nav-link active text-light" aria-current="page" href="#">Categorias</a>
                </li>
                <li class="nav-item ml-4 mr-4 ">
                    <a class="nav-link active text-light" aria-current="page" href="editoriales.php">Editoriales</a>
                </li>
                <li class="nav-item ml-4 mr-4 ">
                    <a class="nav-link active text-light" aria-current="page" href="#">Prestamos</a>
                </li>
                <li class="nav-item   ml-4 mr-4">
                    <a class="nav-link active text-light" aria-current="page" href="#">Consultas</a>
                </li>
    
            </ul>
        </div>
    
    </nav>
    <!-- Tabla de editoriales -->
    <div class='container mt-3'>
        <div class='row'>
            <div class='col-3'></div>
            <div class='col-6'>
                    <div class='card'>
                        <div class='card-header'>
                        <i class="bi bi-book-half"></i>Editoriales
                        </div>
                        <div class='card-body'>
                            <a class="float-end btn btn-primary btn-sm" href="editoriales_crear.php" title="Crear editorial">
                             <i class="bi-plus-circle-fill"></i> Crear
                            </a>
                            <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width=80%;">Editoriales</th>
                                    <th style="width=80%;">Estatus</th>
                                    <th style="width=20%;">&nbsp;</th>
                                    <th style="width=20%;">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once './conexion.php';
                                $sql = 'select id_editorial, nombre_editorial, estatus_editorial from editoriales order by nombre_editorial asc';
                                $sentencia = $conexion->prepare($sql);
                                $sentencia ->execute(); 
                                foreach($sentencia->fetchAll(PDO::FETCH_ASSOC) as $editorial){
                                    $editorial['nombre_editorial'] = htmlentities($editorial['nombre_editorial']);
                                    echo <<<fin
                                <tr>
                                    <td>{$editorial['nombre_editorial']}</td>
                                    <td>{$editorial['estatus_editorial']}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="editoriales_editar.php?id_editorial={$editorial['id_editorial']}" title="Clic para editar categoria">
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