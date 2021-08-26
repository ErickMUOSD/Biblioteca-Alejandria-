<?php
require_once './checar_sesion.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/prestamo.css">
    <script defer src="js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container-fluid ">

        <div class="row justify-content-md-center m-5">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-body">
                        <h2 style="color:#0762c9">Datos del usuario</h2>
                        <h5>Buscar usuario </h5>
                        <div id="alert" class="  mt-2 mb-2" style="  display: none; ">
                            <i id="alert-icon-back" class="" style="color: white; padding: 5px ;"></i>
                            <h5 id="alert-text" style="color: white; padding: 5px; margin: 0"> </h5>
                        </div>

                        <form id="form-user" class="row g-3" action="#">


                            <div class="col-md-4">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input placeholder="Nombre del usuario" type="text" name="nombre" id="nombre" class="form-control" required maxlength="30" minlength="5">
                            </div>

                            <div class="col-md-4">
                                <label for="correo" class="form-label">Correo</label>
                                <input placeholder="example@email.com" type="email" name="correo" class="form-control" id="correo" required minlength="5" maxlength="30">
                            </div>
                            <div class="col-md-4">
                                <label for="numero_celular" class="form-label">Número de celular</label>
                                <input placeholder="722801...." type="text" name="numero_celular" class="form-control" id="numero_celular" required minlength="10" maxlength="10">
                            </div>

                            <div class="col-12">
                                <button type="submit" class=" btn btn-secondary-form "><span class="material-icons">
                                        search
                                    </span>Buscar </button>
                            </div>
                        </form>
                        <hr>
                        <h5>Agregar dirección</h5>
                        <form class="row g-3 " id="form-direction">
                            <div class="row g-3 ">


                                <div class="col-md-4">
                                    <label for="estado" class="form-label">Estado</label>
                                    <select name="estado" id="estado" class="form-select" aria-label=".form-select-sm example" required>
                                        <option selected value="">Selecciona</option>
                                        <?php

                                        require_once './conexion.php';
                                        $sql = 'select id_estado, estado from estados order by estado asc';
                                        $selectFirst = 1;
                                        foreach ($conexion->query($sql, PDO::FETCH_ASSOC) as $row) {
                                            $selected = ($selectFirst == 1 ? 'selected' : '');
                                            echo <<<fin
                                <option value="{$row['id_estado']}" {$selected}>{$row['estado']}</option>
fin;
                                            $selectFirst = 0;
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="municipio" class="form-label">Municipio</label>
                                    <select name="municipio" id="municipio" class="form-select" aria-label=".form-select-sm example " required>
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="calle" class="form-label">Calle</label>
                                <input placeholder="Nombre de la calle" name="calle" type="text" class="form-control" id="calle" required>
                            </div>
                            <div class="col-md-3">
                                <label for="numero_exterior" class="form-label">Número exterior</label>
                                <input placeholder="Ej: 120" name="numero_exterior" type="text" class="form-control" id="numero_exterior" required>
                            </div>
                            <div class="col-md-3">
                                <label for="numero_interior" class="form-label">Número interior</label>
                                <input name="numero_interior" placeholder="Ej: 120 o S/N" type="text" class="form-control" id="numero_interior" required data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Top popover" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">
                            </div>

                            <div class="col-md-3">
                                <label for="codigo_postal" class="form-label">Código Postal</label>
                                <input placeholder="Ej: 52080" name="codigo_postal" type="text" class="form-control" id="codigo_postal" required>
                            </div>
                            <div class="col-md-4">
                                <label for="colonia" class="form-label">Colonia</label>
                                <input placeholder="Ej: Atarasquillo" name="colonia" type="text" class="form-control" id="colonia  required">
                            </div>
                            <div class="col-md-4">
                                <label for="ciudad" class="form-label">Ciudad</label>
                                <input placeholder="Ej: Toluca" name="ciudad" type="text" class="form-control" id="ciudad" requirede>
                            </div>
                            <!-- <div class="col-12">
                                <button type="submit" class=" btn btn-secondary-form "> <span class="material-icons">
                                        post_add
                                    </span>Agregar</button>
                            </div> -->

                            <div class="col-md-5">
                                <a  href="index.php" type="submit" style="    background-color: rgba(243, 98, 98, 0.1);
    border: 1px solid red;" id="btn-prestamo" class=" btn "> Cancelar</a>
                            </div>


                        </form>
                    </div>

                </div>
            </div>
            <div class="col align-items-end">

                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 me-4">
                                <?php
                                echo <<<fin
                                <img src='images/{$_GET['foto']}' >
                               fin;
                                ?>
                            </div>
                            <div class="col-md-6  h-auto">





                                <h5>Información del libro </h5>
                                <p class='fw-lighter'> Titulo: <span class="fw-normal" id="id-book"> <?php echo "{$_GET['id_libro']}"; ?></span></p>
                                <p class='fw-lighter'> Titulo: <span class="fw-normal" id="avaliable-modal"> <?php echo "{$_GET['titulo']}"; ?></span></p>
                                <p class='fw-lighter'> Autor: <span class="fw-normal" id="avaliable-modal"> <?php echo "{$_GET['autor']}"; ?></span></p>
                                <p class='fw-lighter'> Total a llevar: <span class="fw-normal" id="avaliable-modal">1 </span></p>
                                <p class='fw-lighter'>Precio: $<span class="fw-bold" style="color:#07ab49;" id="price-modal"> <?php echo "{$_GET['precio']}"; ?> </span></p>
                                <p class='fw-lighter'>Cantidad de libros: <span class="fw-bold" id="cant-modal"> <?php echo "{$_GET['cantidad_libro']}"; ?> </span></p>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row g-1 ">
                            <h2 style="color:#0762c9">Ticket</h2>
                            <h5>Información de la compra</h5>
                            <p class='fw-lighter'> Fecha de salida: <span class="fw-bold" id="current-date"> 08/08/21</span></p>
                            <p class='fw-lighter'> Fecha de regreso: <span class="fw-bold" id="date-one-month"> 08/09/21</span></p>
                            <p class='fw-lighter'> Precio del libro: <span class="fw-bold" id="precio"> <?php echo "{$_GET['precio']}"; ?> </span></p>
                            <p class='fw-lighter'> Precio x día: $<span class="fw-bold" id="precio-x-dia"></span></p>
                            <p class='fw-lighter'> Total: $<span class="fw-bold" id="total"></span></p>

                            <button type="submit" id="btn-prestamo" class=" btn btn-primary-form "> <span class="material-icons">
                                    shopping_bag
                                </span>Realizar prestamo</button>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="js/jquery-3.6.0.min.js"> </script>
    <script src="js/prestamo.js"> </script>
</body>


</html>