<?php
        require_once('./checar_sesion.php');

        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/panel_administracion.css">

    <title>Document</title>
</head>

<body>
    <div class="container-fluid">

        <?php
        require_once('./framgents-html/navegacion_vertical_panel.html');

        ?>

        <div class="page-content p-5">

            <!-- <h2 class="display-4 ">Bootstrap vertical nav</h2>
            <p class="lead  mb-0">Build a fixed sidebar using Bootstrap 4 vertical navigation and media objects.</p> -->


            <div class="cards">

                <div class="card card-info">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="icon">
                                    <span class="material-icons " style="background-color: blueviolet;">
                                        library_books
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Nuevos Libros</h6>
                                <h6 class="font-extrabold mb-0">Total: 10</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-info">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="icon">
                                    <span class="material-icons" style="background-color: red;">
                                        event_busy
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Prestamos a vencer</h6>
                                <h6 class="font-extrabold mb-0">Total: 20</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-info">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="icon">
                                    <span class="material-icons" style="background-color: blue;">
                                        autorenew
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Nuevos prestamos</h6>
                                <h6 class="font-extrabold mb-0">Total:5</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-info">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="icon">
                                    <span class="material-icons " style="background-color:yellow;">
                                        group_add
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Nuevos usuarios</h6>
                                <h6 class="font-extrabold mb-0">Total: 2 </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-info">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="icon">
                                    <span class="material-icons "  style="background-color:green;">
                                        paid
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Ganancias</h6>
                                <h6 class="font-extrabold mb-0">$100.00 </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <script src="js/jquery-3.6.0.min.js"> </script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>