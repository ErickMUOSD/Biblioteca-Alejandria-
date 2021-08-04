<!DOCTYPE html>
<html lang="es-Mx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuarios</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class='contaier'>
        <div class='row'>
            <div class='col-3'></div>
            <div class='col-6'>
                <div class="card">
                    <div class="card-header">
                        Crear usuarios
                    </div>
                    <div class="card-body">
                        <form action='usuarios_guarda.php' method='POST'>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" name='nombre' required class="form-control" id="nombre"
                                    aria-describedby="nombreHelp">
                                <div id="nombreHelp" class="form-text">Ingresa unicamente tu nombre(s).
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="primer_apellido" class="form-label">Primer Apellido</label>
                                <input type="text" name='primer_apellido' required class="form-control"
                                    id="primer_apellido" aria-describedby="primer_apellidoHelp">
                                <div id="primer_apellidoHelp" class="form-text">Ingresa tu primer pellido.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                                <input type="text" name='segundo_apellido' required class="form-control"
                                    id="segundo_apellido" aria-describedby="segundo_apellidoHelp">
                                <div id="segundo_apellidoHelp" class="form-text">Ingresa tu segundo_apellido.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo Electronico</label>
                                <input type="email" name='correo' required class="form-control"
                                    id="correo" aria-describedby="correoHelp">
                                <div id="correoHelp" class="form-text">Ingresa tu correo electronico.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="contrasena" class="form-label">Contraseña</label>
                                <input type="password" name='contrasena' required class="form-control"
                                    id="contrasena" aria-describedby="contrasenaHelp">
                                <div id="contrasenaHelp" class="form-text">Ingresa tu Contraseña.
                                </div>
                            <div class="mb-3">
                                <label for="confirmar_contrasena" class="form-label">Confrimar Contraseña</label>
                                <input type="password" name='confirmar_contrasena' required class="form-control"
                                    id="confirmar_contrasena" aria-describedby="confirmar_contrasenaHelp">
                                <div id="confirmar_contrasenaHelp" class="form-text">Confrimar tu Contraseña.
                                </div>
                            </div>   
                            <div class="mb-3">
                                <label for="numero_celular" class="form-label">Numero</label>
                                <input type="num" name='numero_celular' required class="form-control"
                                    id="numero_celular" aria-describedby="numero_celularHelp">
                                <div id="numero_celularHelp" class="form-text">Ingresa tu numero de celular.
                                </div>
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
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/bootstrap.min.js"></script>

</html>