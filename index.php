<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/nav-bar.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script defer src="bootstrap/js/bootstrap.min.js"></script>
    <script defer src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <title>Document</title>
</head>

<body>
    <?php
    require_once('./framgents-html/navegacion_usuario.html');

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


            <div class="
            .
             w-75 " id="collapseExample" style="margin: 0 auto;">
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

    <div class="container-fluid content-card " style="display: flex; flex-wrap: wrap; justify-content: center; align-items: flex-start;  height:100%;">


        <?php
        if (!isset($_POST['enviar'])) {
            require_once './conexion.php';
            $sql = "SELECT * FROM libros ";
            $sentencia = $conexion->prepare($sql);
            $sentencia->execute();

            foreach ($sentencia->fetchAll(PDO::FETCH_ASSOC) as $libros) {

                echo <<<fin
            <div class="card p-1 mr-4 mt-3 card-alignment">
        <img src="images/{$libros['foto']}" class="card-img-top" style=" width: 160px; height: 220px;">
        <div class="card-body m-1 ">
            <h6 class="card-title m-0">{$libros['titulo']}</h6>
            <p class="card-text p-0 m-0">{$libros['autor']}</p>
            <p class=" p-0" style=" color: #07ab49; font-weight: bold;">{$libros['disponible_para']}</p>
            <div class="btn-group mt-2">
                <a href="#" class="btn mr-1" style=" background-color: #054082; color: white;"> <i style=" color: white;" class="bi bi-plus"></i>
                    Llevarlo</a>
                <a href="#" class="btn" style=" color: #054082; border-color: #04254b;"> <i  style=" color: #054082; "class=" bi bi-cart"></i>
                    Añadir</a>
            </div>
        
        </div>
        </div>
        fin;
            }
        } else if (isset($_POST['enviar'])) {
            require_once './conexion.php';
            if ($_POST['buscar_por'] != 'editorial') {
              
                $buscador = $_POST['buscador'];
                //swtich(post) case para titutlo, autor, idioma, editorial 
                 switch( $_POST['buscar_por']){
                     case 'titulo':   $buscar_por = 'titulo'; break;
                     case 'autor':   $buscar_por = 'autor';  break;
                     case 'idioma':  $buscar_por = 'idioma'; break;

                 }                 
                $sql = "SELECT * FROM libros WHERE $buscar_por LIKE '%$buscador%' order by titulo asc";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $sentencia = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                $busquedaVacia = sizeOf($sentencia);
                if ($busquedaVacia > 0) {
                    foreach ($sentencia  as $row => $libros) {


                        echo <<<fin
                <div class="card p-1 mr-4 mt-3 card-alignment">
            <img src="images/{$libros['foto']}" class="card-img-top" style=" width: 160px; height: 220px;">
            <div class="card-body m-1 ">
                <h6 class="card-title m-0">{$libros['titulo']}</h6>
                <p class="card-text p-0 m-0">{$libros['autor']}</p>
                <p class=" p-0" style=" color: #054082; font-weight: bold;">{$libros['disponible_para']}</p>
                <div class="btn-group mt-2">
                    <a href="#" class="btn mr-1" style=" background-color: #054082; color: white;"> <i style=" color: white;" class="bi bi-plus"></i>
                        Llevarlo</a>
                    <a href="#" class="btn" style=" color: #054082; border-color: #04254b;"> <i  style=" color: #054082; "class=" bi bi-cart"></i>
                        Añadir</a>
                </div>
            
            </div>
            </div>
            fin;;
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

                        echo <<<fin
                        <div class="card  p-1 mr-4 mt-3 card-alignment">
                    <img src="images/{$libros['foto']}" class="card-img-top" style=" width: 160px; height: 220px;">
                    <div class="card-body m-1 ">
                        <h6 class="card-title m-0">{$libros['titulo']}</h6>
                        <p class="card-text p-0 m-0">{$libros['autor']}</p>
                        <p class="mt-2 p-0" style=" color: #054082; font-weight: bold;">{$libros['disponible_para']}</p>
                        <div class="btn-group">
                            <a href="#" class="btn mr-1" style=" background-color: #054082; color: white;"> <i class="bi bi-plus"></i>
                                Llevarlo</a>
                            <a href="#" class="btn" style=" color: #054082; border-color: #04254b;"> <i class=" bi bi-cart"></i>
                                Añadir</a>
                        </div>
        
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



</body>

</html>