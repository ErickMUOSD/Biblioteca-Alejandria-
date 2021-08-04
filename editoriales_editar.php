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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script defer src="js/bootstrap.min.js"></script>
    <title>Crear/Actualizar Editorial</title>
</head>
<body>
<?php
    require_once('./framgents-html/navegacion_admin.html');

    ?>
    <!-- Menús para crear/actualizar -->
<div class='contaier mt-3'>
    <div class='row'>
        <div class='col-3'></div>
        <div class='col-6'>
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-book-half"></i>Crear Editorial
                </div>
                <div class="card-body">
                  <?php
                    if ('POST' == $_SERVER['REQUEST_METHOD']){
                        // Validar
                        $validator = new Validator;
                        $validation = $validator->make($_POST, [
                        'nombre_editorial' => 'required|min:4|max:50'
                         ]);
                        $validation->setMessages([
                        'required'=> ':attribute es requerido'
                        ,'min' => ':attribute longitud minima no se cumple'
                        ,'max' => ':attribute longitud maxima no se cumple'
                        ]);
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
                            //Actualizar
                            $sql = 'update editoriales set nombre_editorial = :nombre_editorial where id_editorial = :id_editorial';
                            $sentencia = $conexion->prepare($sql);
                            $sentencia ->bindValue(':nombre_editorial', $_POST["nombre_editorial"],PDO::PARAM_STR);
                            $sentencia ->bindValue(':id_editorial', $_GET["id_editorial"],PDO::PARAM_INT);
                            $sentencia ->execute();    
                            echo '<h6>Editorial Actualizada</h6>';
                            echo '<div><a href="editoriales.php" class="btn btn-secondary btn-sm">Editoriales</a></div>';
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