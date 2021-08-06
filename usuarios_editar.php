<?php
require('vendor/autoload.php'); 
use Rakit\Validation\Validator;
if ('GET' == $_SERVER['REQUEST_METHOD'] && isset($_GET['id_usuario']) && is_numeric($_GET['id_usuario'])){
    require_once './conexion.php'; 
    $sql = 'select id_usuario, nombre, primer_apellido, segundo_apellido, correo, contrasena, numero_celular, estatus_usuario, privilegio 
    from usuarios where id_usuario = :id_usuario';
    $sentencia = $conexion->prepare($sql);
    $sentencia ->bindValue(':id_usuario', $_GET["id_usuario"],PDO::PARAM_INT);
    $sentencia ->execute(); 
    $usuario = $sentencia->fetch(PDO::FETCH_ASSOC);
    if (null == $usuario){
        require_once './error-no-encontrado.php';
        exit;
    }
    $_POST = array_merge($_POST, $usuario);
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
                    <i class="bi bi-book-half"></i>Editar Usuario
                </div>
                <div class="card-body">
                  <?php
                    if ('POST' == $_SERVER['REQUEST_METHOD']){
                        // Validar
                        $validator = new Validator;
                        $validation = $validator->make($_POST, [
                        'nombre' => 'required|min:4|max:50'
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
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name='nombre' class="form-control form-control-sm<?php echo isset($errors) && $errors->has('nombre') ? 'is-invalid' : 'is-valid' ?>" id="nombre"
                                aria-describedby="nombrelHelp" value="<?php echo $_POST['nombre'] ?? '' ?>">
                            <div id="nombreHelp" class="invalid-feedback"><?php echo isset($errors) && $errors->first('nombre') ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="primer_apellido" class="form-label">Primer apellido</label>
                            <input type="text" name='primer_apellido' class="form-control form-control-sm<?php echo isset($errors) && $errors->has('primer_apellido') ? 'is-invalid' : 'is-valid' ?>" id="primer_apellido"
                                aria-describedby="primer_apellidolHelp" value="<?php echo $_POST['primer_apellido'] ?? '' ?>">
                            <div id="primer_apellidolHelp" class="invalid-feedback"><?php echo isset($errors) && $errors->first('primer_apellido') ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="segundo_apellido" class="form-label">Segundo apellido</label>
                            <input type="text" name='segundo_apellido' class="form-control form-control-sm<?php echo isset($errors) && $errors->has('segundo_apellido') ? 'is-invalid' : 'is-valid' ?>" id="segundo_apellido"
                                aria-describedby="segundo_apellidolHelp" value="<?php echo $_POST['segundo_apellido'] ?? '' ?>">
                            <div id="segundo_apellidoHelp" class="invalid-feedback"><?php echo isset($errors) && $errors->first('segundo_apellido') ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" name='correo' class="form-control form-control-sm<?php echo isset($errors) && $errors->has('correo') ? 'is-invalid' : 'is-valid' ?>" id="correo"
                                aria-describedby="correolHelp" value="<?php echo $_POST['correo'] ?? '' ?>">
                            <div id="correoHelp" class="invalid-feedback"><?php echo isset($errors) && $errors->first('correo') ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="contrasena" class="form-label">Contraseña</label>
                            <input type="password" name='contrasena' class="form-control form-control-sm<?php echo isset($errors) && $errors->has('contrasena') ? 'is-invalid' : 'is-valid' ?>" id="contrasena"
                                aria-describedby="contrasenaHelp" value="<?php echo $_POST['contrasena'] ?? '' ?>">
                            <div id="contrasenaHelp" class="invalid-feedback"><?php echo isset($errors) && $errors->first('contrasena') ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="numero_celular" class="form-label">Numero Celular</label>
                            <input type="text" name='numero_celular' class="form-control form-control-sm<?php echo isset($errors) && $errors->has('numero_celular') ? 'is-invalid' : 'is-valid' ?>" id="numero_celular"
                                aria-describedby="numero_celularHelp" value="<?php echo $_POST['numero_celular'] ?? '' ?>">
                            <div id="numero_celularHelp" class="invalid-feedback"><?php echo isset($errors) && $errors->first('numero_celular') ?></div>
                        </div>
                        <div class="mb-3">
                                <label for="estatus1" class="form-label">Estatus</label>
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="estatus_usuario" id="estatus1" value='Activo'>
                                        <label class="form-check-label" for="estatus1">
                                            Activo
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="estatus_usuario" id="estatus2" value='Inactivo'>
                                        <label class="form-check-label" for="estatus2">
                                            Inactivo
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="privilegio1" class="form-label">Privilegio</label>
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="privilegio" id="privilegio1" value='Administrador'>
                                        <label class="form-check-label" for="privilegio1">
                                            Administrador
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="privilegio" id="privilegio2" value='Usuario'>
                                        <label class="form-check-label" for="privilegio2">
                                            Usuario
                                        </label>
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
                        <a href="editoriales.php" class="btn btn-secondary btn-sm">Cancelar</a>
                        </form>  
                        <?php
                    }else {
                        // es post y todo esta bien creamos
                        require_once './conexion.php';
                            //Actualizar
                            $sql = 'update usuarios set
                            nombre = :nombre ,
                            primer_apellido = :primer_apellido ,
                            segundo_apellido = :segundo_apellido ,
                            correo = :correo ,
                            contrasena = :contrasena ,
                            numero_celular = :numero_celular ,
                            estatus_usuario = :estatus_usuario,
                            privilegio = :privilegio    
                            where id_usuario = :id_usuario';
                            $sentencia = $conexion->prepare($sql);
                            $sentencia->bindValue(':nombre', $_POST['nombre'], PDO::PARAM_STR);
                            $sentencia->bindValue(':primer_apellido', $_POST['primer_apellido'], PDO::PARAM_STR);
                            $sentencia->bindValue(':segundo_apellido', $_POST['segundo_apellido'], PDO::PARAM_STR);
                            $sentencia->bindValue(':correo', $_POST['correo'], PDO::PARAM_STR);
                            $sentencia->bindValue(':contrasena', $_POST['contrasena'], PDO::PARAM_STR);
                            $sentencia->bindValue(':numero_celular', $_POST['numero_celular'], PDO::PARAM_STR);
                            $sentencia->bindValue(':estatus_usuario', $_POST['estatus_usuario'], PDO::PARAM_STR);
                            $sentencia->bindValue(':privilegio', $_POST['privilegio'], PDO::PARAM_INT);
                            $sentencia ->bindValue(':id_usuario', $_GET["id_usuario"],PDO::PARAM_INT);
                            $sentencia->execute(); 
                            echo '<h6>Usuario Actualizada</h6>';
                            echo '<div><a href="usuarios.php" class="btn btn-secondary btn-sm">Usuarios</a></div>';
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