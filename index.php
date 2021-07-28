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
    require_once('./framgents-html/navegation.html');

    ?>

    <div class="search-bar-header">

        <h1>¡Encuentra asombrosos libros y llevatelos a casa!</h1>
        <h5>¡Llevate un libro o intercambia los que ya no uses!</h5>
        <form action="" method="POST">
            <div>
                <div class="row height d-flex justify-content-center align-items-center">

                    <div class="search">
                        <i class="bi bi-search"></i>
                        <input type="text" name="buscador" id="buscador" class="form-control" placeholder="Busca un libro">
                        <button class="btn btn-primary" name="enviar">Search</button>
                    </div>

                </div>
            </div>
            <div class="advanced-settings d-flex justify-content-end m-1 ">

                <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"> <i class="bi bi-gear"></i>Configuración avanzada</a>
            </div>


            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    Some placeholder content for the collapse component. 
                </div>
            </div>

        </form>
    </div>
    <div class="container-fluid  " style="display: flex; flex-wrap: wrap; ">
        <?php
        require_once './conexion.php';

        if (isset($_POST['enviar'])) {

            $buscador = $_POST['buscador'];
            $sql = "SELECT * FROM libros WHERE titulo LIKE '%$buscador%' order by titulo asc";
            $sentencia = $conexion->prepare($sql);
            $sentencia->execute();
            foreach ($sentencia->fetchAll(PDO::FETCH_ASSOC) as $libros) {

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
        }
        ?>
    </div>

</body>

</html>