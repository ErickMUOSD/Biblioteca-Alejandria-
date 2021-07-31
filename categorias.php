<!DOCTYPE html>
<html lang="es-Mx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script defer src="bootstrap/js/bootstrap.min.js"></script>
    <title>Categorías</title>
</head>
<body>
    <!-- Barra de navegacion -->
    <nav class="navbar navbar-expand-lg pl-4 nav-group flex-sm-row">
        <a class="navbar-brand fw-bold fs-1 text-light">Biblioteca Alejandría</a>
        <div class="collapse navbar-collapse justify-content-lg-center" id="navbarNav" style="  color: white;">
            <ul class="navbar-nav fl">
                <li class="nav-item ml-4 mr-4"></li>
                <a class="nav-link active text-light" aria-current="page" href="index.php">Libros</a>
                </li>
                <li class="nav-item  ml-4 mr-4">
                    <a class="nav-link active text-light" aria-current="page" href="categorias.php">Categorias</a>
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

    <!-- Tabla -->
   
    <table class="table table-hover table-bordered table-sm">
        <thead>
            <tr>
                <th style="width: 20%;"scope="col">Id Categoría</th>
                <th style="width: 40%;"scope="col">Nombre de la Categoría</th>
                <th style="width: 20%;"scope="col">Estatus de la Categoría</th> 
                <th style="width: 20%;">
                <a href="categoria_crear.php" class="btn btn-primary byn-sm">
                    <i class="bi-plus-circle-fill"></i> Crear
                </a>
                

                </th>
            </tr>
        </thead>
        
        <?php
                                require_once './conexion.php';
                                $sql = 'select id_categoria, nombre_categoria, estatus_categoria from categorias order by nombre_categoria asc';
                                $sentencia = $conexion->prepare($sql);
                                $sentencia ->execute(); 
                                foreach($sentencia->fetchAll(PDO::FETCH_ASSOC) as $categorias){
                                    $categorias['nombre_categoria'] = htmlentities($categorias['nombre_categoria']);
                                    echo <<<fin
                                <tr>
                                    <td>{$categorias['nombre_categoria']}</td>
                                    <td>{$categorias['estatus_categoria']}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="categoria_editar.php?id_categoria={$categorias['id_categoria']}" title="Clic para editar categoria">
                                            <i class="bi-pencil-square"></i> Editar
                                        </a>
                                    </td>
                                </tr>
fin;
                                }
                                ?>

      
</body>
</html>