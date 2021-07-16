<?php
require('vendor/autoload.php'); 
use Rakit\Validation\Validator;
if ('GET' == $_SERVER['REQUEST_METHOD'] && isset($_GET['id_editorial']) && is_numeric($_GET['id_editorial'])){
    require_once './conexion.php'; 
    $sql = 'select id_editorial, nombre_editorial, estatus_editorial from editoriales where id_editorial = :id_editorial';
    $sentencia = $conexion->prepare($sql);
    $sentencia ->bindValue(':id_editorial', $_GET["id_editorial"],PDO::PARAM_INT);
    $sentencia ->execute(); 
    $editorial = $sentencia->fetch(PDO::FETCH_ASSOC);
    if (null == $editorial){
        require_once './error-no-encontrado.php';
        exit;
    }
    $_POST = array_merge($_POST, $editorial);
}
?>
<!DOCTYPE html>
<html lang="es-Mx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script defer src="bootstrap/js/bootstrap.min.js"></script>
    <title>Crear/Actualizar Editorial</title>
</head>
<body>
    <!-- Barra de navegacion -->
<nav class="navbar navbar-expand-lg pl-4 nav-group  flex-sm-row">
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
                    <a class="nav-link active text-light" aria-current="page" href="editoriales.php">Editoriales</a>
                </li>
                <li class="nav-item ml-4 mr-4 ">
                    <a class="nav-link active text-light" aria-current="page" href="#">Prestamos</a>
                </li>
                <li class="nav-item   ml-4 mr-4">
                    <a class="nav-link active text-light" aria-current="page" href="#">Consultas</a>
                </li>
            </ul>
        </div>
</nav>
    <!-- Menús para crear -->
    <div class='contaier mt-3'>
    <div class='row'>
        <div class='col-3'></div>
        <div class='col-6'>
            <div class="card">
                <div class="card-header">
                <i class="bi-ui-checks"></i>Crear Editorial
                </div>
                <div class="card-body">
                  <?php
                    if ('POST' == $_SERVER['REQUEST_METHOD']){
                        // validacion datos
                        $validator = new Validator;
                        $validation = $validator->make($_POST, [
                        'nombre_editorial' => 'required|min:4|max:50'
                         ]);
                        $validation->setMessages([
                        'required'=> ':attribute es requerido'
                        ,'min' => ':attribute longitud minima no se cumple'
                        ,'max' => ':attribute longitud maxima no se cumple'
                        ]);
                        // then validate
                        $validation->validate();
                        $errors = $validation->errors();
                    }
                    if ('GET' == $_SERVER['REQUEST_METHOD'] || $validation->fails()){
                    ?>
                    <form action="<?php echo $_SERVER['REQUEST_URI']?>" method='POST'>
                        <div class="mb-3">
                            <label for="nombre_editorial" class="form-label">Editorial</label>
                            <input type="text" name='nombre_editorial' class="form-control form-control-sm<?php echo isset($errors) && $errors->has('nombre_editorial') ? 'is-invalid' : 'is-valid' ?>" id="nombre_editorial"
                                aria-describedby="nombre_editorialHelp" value="<?php echo $_POST['nombre_editorial'] ?? '' ?>">
                            <div id="nombre_editorialHelp" class="invalid-feedback"><?php echo isset($errors) && $errors->first('nombre_editorial') ?></div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
                        <a href="editoriales.php" class="btn btn-secondary btn-sm">Cancelar</a>
                    </form>  
                    <?php
                    }else {
                        // es post y todo esta bien creamos
                        require_once './conexion.php';
                        if (isset($_GET['id_editorial']) && is_numeric($_GET['id_editorial'])){
                        //actualizamos
                        $sql = 'update editoriales set nombre_editorial = :nombre_editorial where id_editorial = :id_editorial';
                        $sentencia = $conexion->prepare($sql);
                        $sentencia ->bindValue(':nombre_editorial', $_POST["nombre_editorial"],PDO::PARAM_STR);
                        $sentencia ->bindValue(':id_editorial', $_GET["id_editorial"],PDO::PARAM_INT);
                        $sentencia ->execute();    
                        echo '<h6>Categoria Actualizada</h6>';
                        echo '<div><a href="editoriales.php" class="btn btn-secondary btn-sm">Editoriales</a></div>';
                        }else{
                            //creamos
                            $sql = 'insert into editoriales (nombre_editorial,estatus_editorial) values (:nombre_editorial, "Activo")';
                        $sentencia = $conexion->prepare($sql);
                        $sentencia ->bindValue(':nombre_editorial', $_POST["nombre_editorial"],PDO::PARAM_STR);
                        $sentencia ->execute();    
                        echo '<h6>Categoria Creada</h6>';
                        echo '<div><a href="editoriales.php" class="btn btn-secondary btn-sm">Editorial</a></div>';
                        }
                    }
                    ?>  
                </div>
            </div> 
        </div>
        <div class="col-3"></div>
    </div>
</div>    
<script src="js/jquery-3.6.0.min.js"></script> 
</body>
</html>