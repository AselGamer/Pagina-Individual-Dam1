<?php
include_once 'bbdd.php';

$ubicacionImgs = 'images/';

$ubicacionDeseada = 'images/' . basename($_FILES['imagen']['name']);


if (!empty($_FILES['imagen']['name'])) {
    move_uploaded_file($_FILES['imagen']['tmp_name'], $ubicacionDeseada);
}

$noticiaCreada = crearNoticia($_POST['titulo'], $_POST['articulo'], $_FILES['imagen']['name'], $_POST['fecha_pub'], $_POST['resumen'], $_POST['id_usuario']);

if($noticiaCreada) {
    header('location: index.php');
} else {
    header('location: crearNoticia.php');
}

?>