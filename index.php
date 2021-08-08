<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>Document</title>
</head>

<body>
    <?php
    require_once('./framgents-html/navegacion_usuario.php');

    ?>
    <div class="landscape d-flex flex-direction-row  justify-content-center">
        <div class="left-side-landpage ">

            <!-- <svg class="title-circle" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="#D2E4FA" d="M39.4,-32.2C54.5,-12.5,72.5,4.1,72.5,21.5C72.5,39,54.4,57.3,35,62.8C15.6,68.4,-5.3,61.3,-23.3,51.4C-41.3,41.6,-56.5,29,-65,9.7C-73.5,-9.6,-75.4,-35.6,-63.4,-54.6C-51.5,-73.7,-25.7,-85.8,-6.8,-80.3C12.2,-74.9,24.3,-52,39.4,-32.2Z" transform="translate(100 100)" />
            </svg> -->
            <div class="title">

                <h2>¡Encuentra asombrosos libros y llevatelos a casa!</h2>
                <h5>Llevate un libro o intercambia los que ya no uses.</h5>
                <p class="title-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris commodo auctor erat, ac sodales urna tincidunt eu. Vivamus tempus, metus sit amet maximus consectetur, eros est fermentum libero, sed pellentesque quam metus vel justo. Donec nunc nisl, tincidunt et turpis scelerisque, porta accumsan felis. Nam ut mauris tempor nisl vulputate pretium. Vestibulum nibh lorem, vehicula et felis eget, dapibus molestie elit. Curabitur rutrum gravida risus,.</p>
                <a href="#search-bar-header" class="title-btn">Busca un libro</a>
            </div>



        </div>
        <div class="right-side-landpage">
            <img class="image-index" src="images_system\inicio_imagen.png" alt="Mujer volando sobre un libro">
        </div>
    </div>
    <div class="search-bar-header" id="search-bar-header">
        <form action="#search" method="POST">
            <div>
                <div class="row height d-flex justify-content-center align-items-center">

                    <div class="search" id="search">
                        <i class="bi bi-search"></i>
                        <input type="text" name="buscador" id="buscador" class="form-control" placeholder="Busca por titulo" required>
                        <button class="btn btn-primary" value="enviar" name="enviar">Search</button>
                    </div>

                </div>
            </div>
            <div class="advanced-settings d-flex justify-content-end m-1 ">
                <a class="" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"> <i class="bi bi-gear"></i>Configuración avanzada</a>
            </div>


            <div class="collapse w-75 " id="collapseExample" style="margin: 0 auto;">
                <h5>Buscar por:</h5>
                <div class="card card-body d-flex flex-row bd-highlight justify-content-center mt-2 mb-2 p-1 align-items-center">
                    <div class="mr-3 ">
                        <input checked type="radio" id="titulo" name="buscar_por" value="titulo">
                        <label for="ititulo">titulo</label>
                    </div>
                    <div class="mr-3 ">
                        <input type="radio" id="idioma" name="buscar_por" value="idioma">
                        <label for="idioma">Idioma</label>
                    </div>
                    <div class="mr-3">
                        <input type="radio" id="editorial" name="buscar_por" value="editorial">
                        <label for="editorial">Editorial</label>
                    </div>
                    <div class="mr-3">
                        <input type="radio" id="autor" name="buscar_por" value="autor">
                        <label for="autor">Autor</label>
                    </div>
                </div>
            </div>

        </form>
    </div>

    <div id="content-card" class="container-fluid content-card " style="display: flex; flex-wrap: wrap; justify-content: center; align-items: flex-start;  height:100%;">


        <?php
        $directionFile;
        $titleBtn;
        $launchModal;
        $modalInfo;
        if (!isset($_POST['enviar'])) {
            require_once './conexion.php';
            $sql = "SELECT * FROM libros ";
            $sentencia = $conexion->prepare($sql);
            $sentencia->execute();

            foreach ($sentencia->fetchAll(PDO::FETCH_ASSOC) as $libros) {
                $modalInfo = ", data-bs-title ='{$libros['titulo']}', data-bs-book-autor ='{$libros['autor']}' , data-bs-book-lenguaje ='{$libros['idioma']}' , 
                    data-bs-book-description ='{$libros['descripcion']}' , data-bs-book-numero_paginas='{$libros['numero_paginas']}' , data-bs-book-year-edition ='{$libros['anio_edicion']}' ,
                    data-bs-book-img ='{$libros['foto']}' , data-bs-book-disponibility ='{$libros['disponible_para']}' , data-bs-book-price ='{$libros['precio']}' , 
                    data-bs-book-cant ='{$libros['cantidad_libros']}' , data-bs-book-status ='{$libros['estatus_libro']}'";
                if (empty($segment->get('id_usuario')) || !is_numeric($segment->get('id_usuario')) || 'Administrador' != $segment->get('privilegio')) {
                    $titleBtn = 'Más informacion';
                    $launchModal = ' data-bs-toggle="modal" data-bs-target="#exampleModal" ';

                    $directionFile = '';
                } else {
                    $launchModal = '';
                    $titleBtn = 'Llevarme este libro';
                    $directionFile = ($libros['disponible_para'] == 'Préstamo') ? 'prestamo_realizar.php' : 'intercambio_realizar.php';
                }

                echo <<<fin
                <div class="card" >
                <img class="card-img-top"  src="images/{$libros['foto']}" alt="" s">
                <div class="card-info" id="card-info" >
                    <h5>{$libros['titulo']}</h5>
                    <p class= 'fw-lighter'>Autor: <span  class="fw-normal" >  {$libros['autor']}</span></p>
                    <p class= 'fw-lighter'>Idioma: <span  class="fw-normal" >  {$libros['idioma']}</span></p>
                    <p class= 'fw-lighter'>Precio: $<span  class="fw-normal" >{$libros['precio']}</span></p>
                    <p class= 'fw-lighter'>Disponible para:<span class="fw-bold" style = "color:#07ab49;"> {$libros['disponible_para']}</span> </p>
                   
                   
                        <a href="$directionFile" $launchModal  $modalInfo   class="btn btn-get-book " > <i style=" color: white;" class="bi bi-plus"></i>
                        $titleBtn</a>
               
                </div>
              
            </div>
        fin;
            }
        } else if (isset($_POST['enviar'])) {
            require_once './conexion.php';
            if ($_POST['buscar_por'] != 'editorial') {

                $buscador = $_POST['buscador'];
                //swtich(post) case para titutlo, autor, idioma, editorial 
                switch ($_POST['buscar_por']) {
                    case 'titulo':
                        $buscar_por = 'titulo';
                        break;
                    case 'autor':
                        $buscar_por = 'autor';
                        break;
                    case 'idioma':
                        $buscar_por = 'idioma';
                        break;
                }
                $sql = "SELECT * FROM libros WHERE $buscar_por LIKE '%$buscador%' order by titulo asc";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $sentencia = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                $busquedaVacia = sizeOf($sentencia);
                if ($busquedaVacia > 0) {
                    foreach ($sentencia  as $row => $libros) {
                        $modalInfo = ", data-bs-title ='{$libros['titulo']}', data-bs-book-autor ='{$libros['autor']}' , data-bs-book-lenguaje ='{$libros['idioma']}' , 
                        data-bs-book-description ='{$libros['descripcion']}' , data-bs-book-numero_paginas='{$libros['numero_paginas']}' , data-bs-book-year-edition ='{$libros['anio_edicion']}' ,
                        data-bs-book-img ='{$libros['foto']}' , data-bs-book-disponibility ='{$libros['disponible_para']}' , data-bs-book-price ='{$libros['precio']}' , 
                        data-bs-book-cant ='{$libros['cantidad_libros']}' , data-bs-book-status ='{$libros['estatus_libro']}'";
                    if (empty($segment->get('id_usuario')) || !is_numeric($segment->get('id_usuario')) || 'Administrador' != $segment->get('privilegio')) {
                        $titleBtn = 'Más informacion';
                        $launchModal = ' data-bs-toggle="modal" data-bs-target="#exampleModal" ';
                        $directionFile = '';
                    } else {
                        $launchModal = '';
                        $titleBtn = 'Llevarme este libro';
                        $directionFile = ($libros['disponible_para'] == 'Préstamo') ? 'prestamo_realizar.php' : 'intercambio_realizar.php';
                    }
    
                    echo <<<fin
                    <div class="card" >
                    <img class="card-img-top"  src="images/{$libros['foto']}" alt="" s">
                    <div class="card-info" id="card-info" >
                        <h5>{$libros['titulo']}</h5>
                        <p class= 'fw-lighter'>Autor: <span  class="fw-normal" >  {$libros['autor']}</span></p>
                        <p class= 'fw-lighter'>Idioma: <span  class="fw-normal" >  {$libros['idioma']}</span></p>
                        <p class= 'fw-lighter'>Precio: $<span  class="fw-normal" >{$libros['precio']}</span></p>
                        <p class= 'fw-lighter'>Disponible para:<span class="fw-bold" style = "color:#07ab49;"> {$libros['disponible_para']}</span> </p>
                       
                       
                            <a href="$directionFile" $launchModal  $modalInfo   class="btn btn-get-book " > <i style=" color: white;" class="bi bi-plus"></i>
                            $titleBtn</a>
                   
                    </div>
                  
                </div>
            fin;
                    }
                } else {

                    echo '    <div class="m-5">
                    <h2>Lo sentimos, no encontramos el libro que buscas. Intenta con otra búsqueda.😟</h1>
                    
                </div>
            ';
                }
            } else {

                $buscador = $_POST['buscador'];
                $buscar_por =  $_POST['buscar_por'];
                $sql = "select * from libros, editoriales where editoriales.nombre_editorial like '%$buscador%'
                    and libros.id_editorial = editoriales.id_editorial order by libros.titulo asc;";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $sentencia = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                $busquedaVacia = sizeOf($sentencia);

                if ($busquedaVacia > 0) {
                    foreach ($sentencia  as $row => $libros) {
                        $modalInfo = ", data-bs-title ='{$libros['titulo']}', data-bs-book-autor ='{$libros['autor']}' , data-bs-book-lenguaje ='{$libros['idioma']}' , 
                        data-bs-book-description ='{$libros['descripcion']}' , data-bs-book-numero_paginas='{$libros['numero_paginas']}' , data-bs-book-year-edition ='{$libros['anio_edicion']}' ,
                        data-bs-book-img ='{$libros['foto']}' , data-bs-book-disponibility ='{$libros['disponible_para']}' , data-bs-book-price ='{$libros['precio']}' , 
                        data-bs-book-cant ='{$libros['cantidad_libros']}' , data-bs-book-status ='{$libros['estatus_libro']}'";
                    if (empty($segment->get('id_usuario')) || !is_numeric($segment->get('id_usuario')) || 'Administrador' != $segment->get('privilegio')) {
                        $titleBtn = 'Más informacion';
                        $launchModal = ' data-bs-toggle="modal" data-bs-target="#exampleModal" ';
    
                        $directionFile = '';
                    } else {
                        $launchModal = '';
                        $titleBtn = 'Llevarme este libro';
                        $directionFile = ($libros['disponible_para'] == 'Préstamo') ? 'prestamo_realizar.php' : 'intercambio_realizar.php';
                    }
    
                    echo <<<fin
                    <div class="card" >
                    <img class="card-img-top"  src="images/{$libros['foto']}" alt="" s">
                    <div class="card-info" id="card-info" >
                        <h5>{$libros['titulo']}</h5>
                        <p class= 'fw-lighter'>Autor: <span  class="fw-normal" >  {$libros['autor']}</span></p>
                        <p class= 'fw-lighter'>Idioma: <span  class="fw-normal" >  {$libros['idioma']}</span></p>
                        <p class= 'fw-lighter'>Precio: $<span  class="fw-normal" >{$libros['precio']}</span></p>
                        <p class= 'fw-lighter'>Disponible para:<span class="fw-bold" style = "color:#07ab49;"> {$libros['disponible_para']}</span> </p>
                       
                       
                            <a href="$directionFile" $launchModal  $modalInfo   class="btn btn-get-book " > <i style=" color: white;" class="bi bi-plus"></i>
                            $titleBtn</a>
                   
                    </div>
                  
                </div>
            fin;
                    }
                } else {
                    echo '    <div class="m-5">
                    <h2>Lo sentimos, no encontramos el libro que buscas. Intenta con otra búsqueda.😟</h1>
                    
                </div>
            ';
                }
            }
        }
        ?>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">

            <div class="card card-info">
                <div style=" display: flex;
  justify-content: space-evenly; align-items:center">
                    <div class="  " style="width: auto; ">
                        <img class="card-img-top" id="img-modal" alt="" s">
                    </div>
                    <div class=" right-modal-side mt-3" style="width: 50%;">
                        <h4 id="title-modal"></h4>
                        <p class='fw-lighter'> <span  class="fw-bold" id="avaliable-modal"  > </span></p>
                        <p class='fw-lighter'>Autor: <span class="fw-normal" id="autor-modal"> </span></p>
                        <p class='fw-lighter'>Idioma: <span class="fw-normal" id="lenguaje-modal"> </span></p>
                        <p class='fw-lighter'>Descripcion: <span class="fw-normal" id="descripcion-modal"> </span></p>
                        <p class='fw-lighter'>Numero de páginas: <span class="fw-normal" id="numero-paginas-modal"> </span></p>
                        <p class='fw-lighter'>Año de edición: <span class="fw-normal" id="edition-year-modal"> </span></p>
                        <p class='fw-lighter'>Disponible para: <span class="fw-bold" style="color:#07ab49;" id="disponibility-modal"> </span></p>
                        <p class='fw-lighter'>Precio: <span class="fw-bold" style="color:#07ab49;" id="price-modal"> </span></p>
                        <p class='fw-lighter'>Cantidad disponible: <span class="fw-normal" id="status-modal"> </span></p>
                        

                    </div>

                </div>

            </div>
        </div>
    </div>
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/index.js"></script>
        <script src="js/bootstrap.min.js"></script>
</body>

</html>