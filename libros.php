<?php
//require_once './checar_sesion.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/books.css">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script defer src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"> </script>


    <title>Libros</title>

</head>

<body>

    <?php
   // require_once('./framgents-html/navegacion_admin.html');

    ?>

    <div class="container-fluid ">

        <div class="card mt-2">
            <div class="card-body">
                <div class="section-upload-btn">
                    <h1>Libros</h1>

                    <?php
                    require_once('./framgents-html/vertical-form.html');
                    ?>
                    <button class="btn" onclick="addBook()"><i class="bi bi-plus-square mr-2 "></i>
                        Agregar</button>

                </div>


                <table class="table mt-4  ">
                    <thead>
                        <tr>
                            <th class="align-middle" scope="col">Foto</th>
                            <th class="align-middle" scope="col">Titulo</th>
                            <th class="align-middle" scope="col">Autor</th>
                            <th class="align-middle" scope="col">Idioma</th>
                            <th class="align-middle" scope="col">Descripcion</th>
                            <th class="align-middle" scope="col">N. páginas</th>
                            <th class="align-middle" scope="col">Año de edicion</th>
                            <th class="align-middle" scope="col">Disponible para</th>
                            <th class="align-middle" scope="col">Precio</th>
                            <th class="align-middle" scope="col">Cantidad</th>


                        </tr>
                    </thead>
                    <tbody id="tbody">
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script src="js/libros_datos.js"></script>
</body>

</html>