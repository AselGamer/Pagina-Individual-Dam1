<?php
    session_start();

    include 'bbdd.php';
    
    $user = $_POST['user'];

    $password = $_POST['password'];

    $id_usuario = login($user, $password);

    if($id_usuario)
    {
        $_SESSION['user'] = $user;
        $_SESSION['id_usuario'] = $id_usuario;
        
        header('Location: index.php');
    } else {
        session_destroy();
        header('Location: index.php');
    }
?>