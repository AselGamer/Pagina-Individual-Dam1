<?php
include_once 'bbdd.php';

$exec = crearUsuario($_POST['nombreusuario'], $_POST['password']);

if ($exec) {
    header('Location: index.php');
} else 
{
    header('Location: registro.html');
}
?>