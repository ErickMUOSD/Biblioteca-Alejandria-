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

<body style="background-color: #F2F7FF">
    <?php
    require_once('./framgents-html/navegacion_admin.html');

    ?>

    <!-- Tabla de editoriales -->
    <div class=' container  mt-3'>

        <div class='row'>
            <div class='col-3'></div>
            <div class='col-12'>
                <div class='card shadow'>
                    <div class='card-header fs-3'>
                        <i class=" fs-3 bi bi-book-half"></i> Editoriales
                    </div>
                    <div class='card-body'>
                        <a class="btn float-end btn-lg" href="editoriales_crear.php" title="Crear editorial">
                            <i class="bi-plus-circle-fill"></i> Crear
                        </a>
                        <table class="table  ">
                            <thead>
                                <tr>
                                    <th>Editoriales</th>
                                    <th>Estatus</th>
                                    <th>&nbsp;</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once './conexion.php';
                                $sql = 'select id_editorial, nombre_editorial, estatus_editorial from editoriales order by nombre_editorial asc';
                                $sentencia = $conexion->prepare($sql);
                                $sentencia->execute();
                                foreach ($sentencia->fetchAll(PDO::FETCH_ASSOC) as $editorial) {
                                    $editorial['nombre_editorial'] = htmlentities($editorial['nombre_editorial']);
                                    echo <<<fin
                                <tr>
                                    <td>{$editorial['nombre_editorial']}</td>
                                    <td>{$editorial['estatus_editorial']}</td>
                                    <td>
                                        <a class="btn float-end btn-sm" href="editoriales_editar.php?id_editorial={$editorial['id_editorial']}" title="Clic para editar categoria">
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