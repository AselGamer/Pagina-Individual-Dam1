<?php
    include_once 'bbdd.php';
    $borrar = eliminarNoticia($_GET['id_noticia']);
    if($borrar) {
        header('location: index.php');
    } else {
        header('location: editarNoticia.php');
    }
?>