<?php
require_once './checar_sesion.php';

?>
<?php
require('vendor/autoload.php');

use Rakit\Validation\Validator;

if ('GET' == $_SERVER['REQUEST_METHOD'] && isset($_GET['id_editorial']) && is_numeric($_GET['id_editorial'])) {
    require_once './conexion.php';
    $sql = 'select id_categoria, nombre_categoria, estatus_categoria from categorias where id_categoria = :id_categoria';
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindValue(':id_categoria', $_GET["id_categoria"], PDO::PARAM_INT);
    $sentencia->execute();
    $categoria = $sentencia->fetch(PDO::FETCH_ASSOC);
    if (null == $categoria) {
        require_once './error-no-encontrado.php';
        exit;
    }
    $_POST = array_merge($_POST, $categoria);
}
?>
<!DOCTYPE html>
<html lang="es-Mx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/editoriales_crear.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>Crear Categoria</title>
</head>

<body>
    <?php
    require_once('./framgents-html/navegacion_admin.html');
    ?>
    <!-- Menús para crear/actualizar -->
    <div class='container mt-3'>
        <div class='row'>
            <div class='col-3'></div>
            <div class='col-6'>
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-book-half"></i>Crear Categoria
                    </div>
                    <div class="card-body">
                        <?php
                        if ('POST' == $_SERVER['REQUEST_METHOD']) {
                            // Validar
                            $validator = new Validator;
                            $validation = $validator->make($_POST, [
                                'nombre_categoria' => 'required|min:4|max:50'
                            ]);
                            $validation->setMessages([
                                'required' => ':attribute es requerido', 'min' => ':attribute longitud minima no se cumple', 'max' => ':attribute longitud maxima no se cumple'
                            ]);
                            $validation->validate();
                            $errors = $validation->errors();
                        }
                        if ('GET' == $_SERVER['REQUEST_METHOD'] || $validation->fails()) {
                        ?>
                            <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method='POST'>
                                <div class="mb-3">
                                    <label for="nombre_categoria" class="form-label">Categoria</label>
                                    <input type="text" name='nombre_categoria' class="form-control form-control-sm<?php echo isset($errors) && $errors->has('nombre_categoria') ? 'is-invalid' : 'is-valid' ?>" id="nombre_categoria" aria-describedby="nombre_categoriaHelp" value="<?php echo $_POST['nombre_categoria'] ?? '' ?>">
                                    <div id="nombre_categoriaHelp" class="invalid-feedback"><?php echo isset($errors) && $errors->first('nombre_categoria') ?></div>
                                </div>
                                <button type="submit" class="btn enviar btn-sm">Enviar</button>
                                <a href="categorias.php" class="btn cancelar btn-sm">Cancelar</a>
                            </form>
                        <?php
                        } else {
                            // es post y todo esta bien creamos
                            require_once './conexion.php';
                            //Crear 
                            $sql = 'insert into categorias (nombre_categoria,estatus_categoria) values (:nombre_categoria, "Activo")';
                            $sentencia = $conexion->prepare($sql);
                            $sentencia->bindValue(':nombre_categoria', $_POST["nombre_categoria"], PDO::PARAM_STR);
                            $sentencia->execute();
                            echo '<h6>Categoria Creada</h6>';
                            echo '<div><a href="categorias.php" class="btn enviar btn-sm">Categorias</a></div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>