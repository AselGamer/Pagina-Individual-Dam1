<?php
include_once 'bbdd.php';

$ubicacionImgs = 'images/';

$ubicacionDeseada = 'images/' . basename($_FILES['imagen']['name']);

if(!empty($_FILES['imagen']['name'])) 
{
    move_uploaded_file($_FILES['imagen']['tmp_name'], $ubicacionDeseada);

    $actualizacion = modificarNoticia($_POST['titulo'], $_POST['articulo'], $_FILES['imagen']['name'], $_POST['fecha_pub'], $_POST['resumen'], $_POST['id_usuario'], $_POST['id_noticia']) ;
} else {
    $actualizacion = modificarNoticiaNoImg($_POST['titulo'], $_POST['articulo'], $_POST['fecha_pub'], $_POST['resumen'], $_POST['id_usuario'], $_POST['id_noticia']) ;
}

deleteTagNoticia($_POST['id_noticia']);
if (isset($_POST['tags']) && isset($actualizacion)) {
    foreach ($_POST['tags'] as $inTags)
    {
        taggearNoticia($_POST['id_noticia'], $inTags);
    }    
}

if($actualizacion) 
{
    header('Location: index.php');
} else {
    header('Location: modNoticia.php');
}

?>