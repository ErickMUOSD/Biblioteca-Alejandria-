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

        <div class="row justify-content-md-center m-4">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-body">
                        <h2 style="color:#0762c9">Datos del libro</h2>
                        <h5>Libro a recibir</h5>
                        <form class="row g-3 " id="form-new-book" action="#">
                            <div class="row g-3 ">


                                <div class="col-md-4">
                                    <label for="categoria_libro" class="form-label">Categorias</label>
                                    <select name="categoria_libro" id="categoria_libro" class="form-select" aria-label=".form-select-sm example" required>
                                        <?php
                                        $selectFirst = 1;
                                        require_once './conexion.php';
                                        $sql = 'select id_categoria,nombre_categoria  from categorias order by nombre_categoria asc  ';
                                        $sentencia = $conexion->prepare($sql);
                                        $sentencia->execute();
                                        foreach ($conexion->query($sql, PDO::FETCH_ASSOC) as $categorias) {
                                            $selected = ($selectFirst == 1 ? 'selected' : '');
                                            echo <<<fin
                             <option value="{$categorias['id_categoria']}" {$selected}>{$categorias['nombre_categoria']}</option>
                           fin;
                                            $selectFirst = 0;
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="editorial_libro" class="form-label">Editoriales</label>
                                    <select name="editorial_libro" id="editorial_libro" class="form-select" aria-label=".form-select-sm example " required>
                                        <?php
                                        $selectFirst = 1;
                                        require_once './conexion.php';
                                        $sql = 'select id_editorial,nombre_editorial  from editoriales order by nombre_editorial asc ';
                                        $sentencia = $conexion->prepare($sql);
                                        $sentencia->execute();
                                        foreach ($conexion->query($sql, PDO::FETCH_ASSOC) as $editorial) {
                                            $selected = ($selectFirst == 1 ? 'selected' : '');
                                            echo <<<fin
                             <option value="{$editorial['id_editorial']}" {$selected}>{$editorial['nombre_editorial']}</option>
                           fin;
                                            $selectFirst = 0;
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="titulo" class="form-label">Titulo</label>
                                <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Titulo del libro" required minlength="8" maxlength="40">
                            </div>
                            <div class="col-md-3">
                                <label for="autor" class="form-label">Autor</label>
                                <input type="text" name="autor" class="form-control" id="autor" placeholder="Autor del libro" required minlength="8" maxlength="30">
                            </div>
                            <div class="col-md-3">
                                <label for="idioma" class="form-label">Idioma</label>
                                <input type="text" class="form-control" name="idioma" id="idioma" placeholder="Lenguaje del libro" required minlength="4" maxlength="20">
                            </div>

                            <div class="col-md-3">
                                <label for="numero_paginas" class="form-label mr-4 ">N. páginas</label>
                                <input name="numero_paginas" id="numero_paginas" type="text" class="form-control" placeholder="número de paginas" aria-label="Username " required pattern="[0-9]+">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="anio_edicion" class="form-label mr-4 ">Año edi.</label>
                                <input name="anio_edicion" id="anio_edicion" type="text" class="form-control" placeholder="Año de edicion" aria-label="Username" required pattern="[0-9]+">
                            </div>
                            <div class="col-md-3">
                                <label for="can3tidad_libros" class="form-label mr-4 ">Cantidad libros.</label>
                                <input name="cantidad_libros" id="cantidad_libros" type="text" class="form-control" placeholder="Cantidad libros" aria-label="Username" required pattern="[0-9]+">
                            </div>
                           
                            <div class="col-md-3">
                                <label for="precio" class="form-label mr-4 ">Precio</label>
                                <input name="precio" id="precio" type="text" class="form-control" placeholder="Precio " aria-label="Username" required pattern='^\d+(?:\.\d{0,2})$'>
                            </div>



                            <div class="col-md-5 mb-3">
                                <label for=dDescripcion" class="form-label">Descripcion</label>
                                <textarea style="height: 38px;" required name="descripcion" class="form-control" placeholder="Redacta una pequeña descripcion aquí" id="descripcion" minlength="50" maxlength="300"></textarea>
                            </div>

                            <div class="col-md-5">
                                <label for="foto" class="form-label">Foto</label>

                                <input class="form-control " type="file" id="foto" name="foto" onchange="previewFile()" accept="image/*">
                            </div>
                            <div class="col-md-5">
                                <label for="disponibilidad" class="form-label mr-4 ">Disponible para</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="disponible" id="disponibilidad1" value="Préstamo" required>
                                    <label class="form-check-label" for="disponibilidad1">
                                        Préstamo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="disponible" id="disponibilidad2" value="Intercambio" required>
                                    <label class="form-check-label" for="disponibilidad2">
                                        Intercambio
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <label for="estatus" class="form-label mr-4 ">Estatus </label>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="estatus" id="estatus1" value="Activo" required>
                                    <label class="form-check-label" for="estatus1">
                                        Activo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="estatus" id="estatus2" value="Inactivo" required>
                                    <label class="form-check-label" for="estatus2">
                                        Inactivo
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-5 mt-4">
                                <button type="submit" class=" btn btn-secondary-form " id="btn-get-new-book"> <span class="material-icons">
                                        post_add
                                    </span>Calcular libros disponibles </button>
                            </div>

                        </form>




                    </div>

                </div>
            </div>
            <div class="col align-items-end">

                <div class="card">

                    <div class="card-body">

                        <h5>Libro a llevar </h5>
                        <P class='fw-lighter m-0 '>Los resultados son calculados en base a las condiciones del libro y sus datos.</P>
                        <div class="col-md-12 mt-2">
                            <select name="libros-disponible"  class="form-select" aria-label="Default select example" id="avaliable-books">
                                <option selected>Selecciona un libro disponible </option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>



                    </div>
                </div>
                <div class="card">

                    <div class="card-body">

                        <h5>Buscar usuario </h5>
                        <div id="alert" class="  mt-2 mb-2" style="  display: none; ">
                            <i id="alert-icon-back" class="" style="color: white; padding:  10px ;"></i>
                            <h5 id="alert-text" style="color: white; padding: 10px; margin: 0"> </h5>
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


                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <div class="row g-1 ">
                            <h2 style="color:#0762c9">Ticket</h2>
                            <h5>Información de la compra</h5>
                            <p class='fw-lighter'> Titulo del libro de entrada: <span class="fw-bold" id="current-date"></span></p>
                            <p class='fw-lighter'> Titulo del libro de salida: <span class="fw-bold" id="current-date"></span></p>
                            <p class='fw-lighter'> Fecha de salida: <span class="fw-bold" id="current-date"> 08/08/21</span></p>
                            <p class='fw-lighter'> Hora de salida: <span class="fw-bold" id="precio-x-dia"></span></p>




                            <button type="submit" id="btn-prestamo" class=" btn btn-primary-form "> <span class="material-icons">
                                    shopping_bag
                                </span>Realizar intercambio</button>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="js/jquery-3.6.0.min.js"> </script>
    <script src="js/intercambio.js"> </script>
</body>


</html>