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
    <title>Crear Editorial</title>
</head>
<body>
    <!-- Barra de navegacion -->
<nav class="navbar navbar-expand-lg pl-4 nav-group ">
    <a class="navbar-brand fw-bold fs-1 text-light">Biblioteca de Alejandria</a>
    <div class="collapse navbar-collapse" id="navbarNav" style="  color: white;">
        <ul class="navbar-nav">
            <li class="nav-item pl-3 pr-3 ">
                <a class="nav-link active text-light" aria-current="page" href="#">Libros</a>
            </li>
            <li class="nav-item pl-3 pr-3 ">
                <a class="nav-link active text-light" aria-current="page" href="#">Categorias</a>
            </li>
            <li class="nav-item pl-3 pr-3 ">
                <a class="nav-link active text-light" aria-current="page" href="editoriales.html">Editoriales</a>
            </li>
            <li class="nav-item  pl-3 pr-3">
                <a class="nav-link active text-light" aria-current="page" href="#">Prestamos</a>
            </li>
            <li class="nav-item  pl-3 pr-3">
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
                    <i class="bi bi-book-half"></i>Crear Editoriales
                    </div>
                    <div class="card-body">
                        <form action='editoriales_creado.html' method='POST' enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nombre_editorial" class="form-label">Editorial</label>
                                <input type="text" name='nombre_editorial' required class="form-control" id="nombre_editorial" aria-describedby="nombre_editorialHelp">
                                <div id="nombre_editorialHelp" class="form-text">Nombre De La Editorial</div>
                            </div>
                            <div class="mb-3">
                                <label for="estatus1" class="form-label">Estatus</label>
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="estatus" id="estatus1" value='Habilitado'>
                                        <label class="form-check-label" for="estatus1">
                                            Habilitado
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="estatus" id="estatus2" value='Deshabilitado'>
                                        <label class="form-check-label" for="estatus2">
                                            Deshabilitado
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Crear</button>
                            <a href="editoriales.html" class="btn btn-secondary btn-sm">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
<script src="js/jquery-3.6.0.min.js"></script> 
</body>
</html>