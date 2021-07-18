<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/books.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script defer src="bootstrap/js/bootstrap.min.js"></script>

    <title>Libros</title>

</head>

<body>

    <!-- Barra de navegacion -->
    <!-- <nav class="navbar navbar-expand-lg pl-4 nav-group  flex-sm-row">

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
                    <a class="nav-link active text-light" aria-current="page" href="#">Editoriales</a>
                </li>
                <li class="nav-item ml-4 mr-4 ">
                    <a class="nav-link active text-light" aria-current="page" href="#">Prestamos</a>
                </li>
                <li class="nav-item   ml-4 mr-4">
                    <a class="nav-link active text-light" aria-current="page" href="#">Consultas</a>
                </li>

            </ul>
        </div>

    </nav> -->
    <?php

    require_once('/fsgraments-htm/navegation.html');
    ?>

    <div class="container-fluid ">

        <div class="card mt-2">
            <div class="card-body">
                <div class="section-upload-btn">
                    <h1>Libros</h1>
                    <div id="vertical-page">
                        <h3>Modify</h3>
                    </div>
                    <button class="btn" onclick="animationForm()"><i class="bi bi-plus-square mr-2 "></i>
                        Añadir</button>
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
                    <tbody>
                        <tr>
                            <td><img src="images/libro.jpg" alt=""></td>
                            <td class="align-middle">El extranjero</td>
                            <td class="align-middle">Albert Camus</td>
                            <td class="align-middle">Español</td>
                            <td class="align-middle">Albert Camus (1913-1960) no sólo fue uno de los escritores más
                                prestigiosos de la generación que llegó a la madurez entre las ruinas, la frustración y
                                la desesperanza de la Europa demolida por las dos Guerras Mundiales, sino que el paso
                                del tiempo agiganta cada vez más su figura excepcional y el valor de su obra.</td>
                            <td class="align-middle">149</td>
                            <td class="align-middle">2019</td>
                            <td class="align-middle">Prestamo</td>
                            <td class="align-middle">90.00</td>
                            <td class="align-middle">10</td>

                        </tr>
                        <tr>
                            <td><img src="images/libro.jpg" alt=""></td>
                            <td class="align-middle">El extranjero</td>
                            <td class="align-middle">Albert Camus</td>
                            <td class="align-middle">Español</td>
                            <td class="align-middle">Albert Camus (1913-1960) no sólo fue uno de los escritores más
                                prestigiosos de la generación que llegó a la madurez entre las ruinas, la frustración y
                                la desesperanza de la Europa demolida por las dos Guerras Mundiales, sino que el paso
                                del tiempo agiganta cada vez más su figura excepcional y el valor de su obra.</td>
                            <td class="align-middle">149</td>
                            <td class="align-middle">2019</td>
                            <td class="align-middle">Prestamo</td>
                            <td class="align-middle">90.00</td>
                            <td class="align-middle">10</td>

                        </tr>
                        <tr>
                            <td><img src="images/libro.jpg" alt=""></td>
                            <td class="align-middle">El extranjero</td>
                            <td class="align-middle">Albert Camus</td>
                            <td class="align-middle">Español</td>
                            <td class="align-middle">Albert Camus (1913-1960) no sólo fue uno de los escritores más
                                prestigiosos de la generación que llegó a la madurez entre las ruinas, la frustración y
                                la desesperanza de la Europa demolida por las dos Guerras Mundiales, sino que el paso
                                del tiempo agiganta cada vez más su figura excepcional y el valor de su obra.</td>
                            <td class="align-middle">149</td>
                            <td class="align-middle">2019</td>
                            <td class="align-middle">Prestamo</td>
                            <td class="align-middle">90.00</td>
                            <td class="align-middle">10</td>

                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="js/book_form_animation.js"></script>
</body>

</html>