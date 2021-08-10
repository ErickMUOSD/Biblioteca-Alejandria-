<!DOCTYPE html>
<html lang="es-Mx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/editoriales.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


    <title>Categorías</title>
</head>

<body style="background-color: #F2F7FF;">



    <?php
    require_once('./framgents-html/navegacion_admin.html');
    ?>



    <!-- Tabla -->
    <div class="container mt-3">
        <div class='card'>
            <div class='card-header fs-3'>
                <i class=" bi bi-people-fill"></i>Categorías
            </div>
            <div class='card-body'>
                <a href="categoria_crear.php" class="float-end btn btn-lg ">
                    <i class="bi-plus-circle-fill"></i> Crear
                </a>

                <table class="table ">
                    <thead>
                        <tr>

                            <th>Nombre de la Categoría</th>
                            <th>Estatus de la Categoría</th>
                            <th></th>

                        </tr>
                    </thead>

                    <?php
                    require_once './conexion.php';
                    $sql = 'select id_categoria, nombre_categoria, estatus_categoria from categorias order by nombre_categoria asc';
                    $sentencia = $conexion->prepare($sql);
                    $sentencia->execute();
                    foreach ($sentencia->fetchAll(PDO::FETCH_ASSOC) as $categorias) {
                        $categorias['nombre_categoria'] = htmlentities($categorias['nombre_categoria']);
                        echo <<<fin
                                <tr >
                                    <td>{$categorias['nombre_categoria']}</td>
                                    <td>{$categorias['estatus_categoria']}</td>
                                    <td>
                                        <a class="btn  enviar float-end btn-sm" href="categoria_editar.php?id_categoria={$categorias['id_categoria']}" title="Clic para editar categoria">
                                            <i class="bi-pencil-square"></i> Editar
                                        </a>
                                    </td>
                                </tr> 
                                fin;
                    }
                    ?>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>