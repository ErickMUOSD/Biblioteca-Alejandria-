<nav class="navbar navbar-expand-lg  nav-group ">
    <div class="container-fluid d-flex justify-content-center">
        <a class="  navbar-brand   text-light" href="index.php">Biblioteca Alejandría</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="material-icons md-light">
                menu
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto  mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="#search"> <span class="material-icons">
                            menu_book
                        </span>Libros</a>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link" aria-current="page" href="somos.php">
                        <span class="material-icons">
                            person_add
                        </span>Acerca de nostros</a>
                </li>


            </ul>

            <?php
            require_once('vendor/autoload.php');
            $session_factory = new Aura\Session\SessionFactory;
            $session = $session_factory->newInstance($_COOKIE);
            $segment = $session->getSegment('usuarios');
            if (empty($segment->get('id_usuario'))) {
                echo '<ul class="navbar-nav ">
<li class="nav-item">
    <a class="nav-link " aria-current="page" href="login.php"> <span class="material-icons">
            login
        </span>Inicia sesion</a>
</li>

</ul>';
            } else if (empty($segment->get('id_usuario')) || !is_numeric($segment->get('id_usuario')) || 'Administrador' != $segment->get('privilegio')) {


                echo '<ul class="navbar-nav ">
                <li class="nav-item  ">
             <a class="nav-link " aria-current="page" href="mi_perfil.php"><span class="material-icons">
                     perm_identity
                 </span>Mi perfil</a>
         </li>

         <li class="nav-item">
        <a href="salir.php" class="nav-link font-italic">
            <span class="material-icons">
                logout
                </span>
            Salir
        </a>
    </li>
         </ul>';

               

            } else {

                         echo  '<ul class="navbar-nav ">


                    <li class="nav-item  ">
                        <a class="nav-link " aria-current="page" href="panel_Administrador.php">
                            <span class="material-icons">
                                person_add
                            </span>Panel administrador</a>
                    </li>
                </ul>';
                
            }


            ?>

        </div>

    </div>
</nav>