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
    <title>Usuarios</title>
</head>
<body style="background-color: #F2F7FF;">
<?php
    require_once('./framgents-html/navegacion_admin.html');

    ?>
<div class='container-fluid m-3'>
    <div class="card card-info">
        <div class="row">
            <div class="col">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Nombre</label>
                        <input type="text" name='titulo' class="form-control form-control-sm<?php echo isset($errors) && $errors->has('titulo') ? 'is-invalid' : 'is-valid' ?>" id="titulo"
                            aria-describedby="titulolHelp" value="<?php echo $_POST['titulo'] ?? '' ?>">
                        <div id="tituloHelp" class="invalid-feedback"><?php echo isset($errors) && $errors->first('titulo') ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" name='autor' class="form-control form-control-sm<?php echo isset($errors) && $errors->has('autor') ? 'is-invalid' : 'is-valid' ?>" id="autor"
                            aria-describedby="autorHelp" value="<?php echo $_POST['autor'] ?? '' ?>">
                        <div id="autorHelp" class="invalid-feedback"><?php echo isset($errors) && $errors->first('autor') ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="editorial" class="form-label">Editorial</label>
                        <input type="text" name='editoral' class="form-control form-control-sm<?php echo isset($errors) && $errors->has('editoral') ? 'is-invalid' : 'is-valid' ?>" id="editorial"
                            aria-describedby="editoriallHelp" value="<?php echo $_POST['editorial'] ?? '' ?>">
                        <div id="editorialHelp" class="invalid-feedback"><?php echo isset($errors) && $errors->first('editorial') ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="text" name='precio' class="form-control form-control-sm<?php echo isset($errors) && $errors->has('precio') ? 'is-invalid' : 'is-valid' ?>" id="precio"
                            aria-describedby="preciolHelp" value="<?php echo $_POST['precio'] ?? '' ?>">
                        <div id="precioHelp" class="invalid-feedback"><?php echo isset($errors) && $errors->first('precio') ?></div>
                    </div>
                    <a class="btn btn-primary btn-sm" href="" title="Clic para regresar">
                        <i class="bi-pencil-square"></i> Cancelar
                    </a>
                    <a class="btn btn-primary btn-sm" href="" title="Clic para confirmar">
                        <i class="bi-pencil-square"></i> Confirmar
                    </a>
            </div>
            
            <div class="col-8 mt-6"> 
                <div class='container-fluid '>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name='nombre' class="form-control form-control-sm<?php echo isset($errors) && $errors->has('nombre') ? 'is-invalid' : 'is-valid' ?>" id="nombre"
                        aria-describedby="nombrelHelp" value="<?php echo $_POST['nombre'] ?? '' ?>">
                    <div id="nombreHelp" class="invalid-feedback"><?php echo isset($errors) && $errors->first('nombre') ?></div>
               </div>  
               <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" name='correo' class="form-control form-control-sm<?php echo isset($errors) && $errors->has('correo') ? 'is-invalid' : 'is-valid' ?>" id="correo"
                        aria-describedby="correolHelp" value="<?php echo $_POST['correo'] ?? '' ?>">
                    <div id="correoHelp" class="invalid-feedback"><?php echo isset($errors) && $errors->first('correo') ?></div>
                </div>  
                <div class="mb-3">
                    <label for="numero_celular" class="form-label">Numero Celular</label>
                        <input type="text" name='numero_celular' class="form-control form-control-sm<?php echo isset($errors) && $errors->has('numero_celular') ? 'is-invalid' : 'is-valid' ?>" id="numero_celular"
                            aria-describedby="numero_celularHelp" value="<?php echo $_POST['numero_celular'] ?? '' ?>">
                        <div id="numero_celularHelp" class="invalid-feedback"><?php echo isset($errors) && $errors->first('numero_celular') ?></div>
                </div>
                <div class="col-8 mt-6"> 
                <div class="mb-3">
                    <label for="salida" class="form-label">Salida</label>
                    <input type="date" name='salida' class="form-control form-control-sm<?php echo isset($errors) && $errors->has('salida') ? 'is-invalid' : 'is-valid' ?>" id="salida"
                        aria-describedby="salidaHelp" value="<?php echo $_POST['salida'] ?? '' ?>">
                    <div id="salidaHelp" class="invalid-feedback"><?php echo isset($errors) && $errors->first('salida') ?></div>
               </div>  
               <div class="mb-3">
                    <label for="vencimiento" class="form-label">Vencimiento</label>
                    <input type="date" name='vencimiento' class="form-control form-control-sm<?php echo isset($errors) && $errors->has('vencimiento') ? 'is-invalid' : 'is-valid' ?>" id="correo"
                        aria-describedby="correolHelp" value="<?php echo $_POST['correo'] ?? '' ?>">
                    <div id="correoHelp" class="invalid-feedback"><?php echo isset($errors) && $errors->first('correo') ?></div>
                </div>  
                <div class="mb-3">
                    <label for="cantidad_libro" class="form-label">Cantidad</label>
                        <input type="text" name='cantidad_libro' class="form-control form-control-sm<?php echo isset($errors) && $errors->has('cantidad_libro') ? 'is-invalid' : 'is-valid' ?>" id="cantidad_libro"
                            aria-describedby="cantidad_libroHelp" value="<?php echo $_POST['cantidad_libro'] ?? '' ?>">
                        <div id="cantidad_libroHelp" class="invalid-feedback"><?php echo isset($errors) && $errors->first('cantidad_libro') ?></div>
                </div> 
                </div>  
                </div>     
            </div>    
            </div>
        </div>

    </div>
</div>
</body>
<script src="js/jquery-3.6.0.min.js"></script>
</html>