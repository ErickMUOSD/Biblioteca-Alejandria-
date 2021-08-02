<?php
require_once('vendor/autoload.php');
$session_factory = new Aura\Session\SessionFactory;
$session = $session_factory->newInstance($_COOKIE);
$segment = $session->getSegment('usuarios');
if (empty($segment->get('id_usuario')) || !is_numeric($segment->get('id_usuario')) || 'Administrador' != $segment->get('privilegio')) {
    header('Location: login.php');
    exit;
}
