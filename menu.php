
<div id="menu">
<ul>
    <li><a href="index.php" class="active">Inicio</a></li>
    <li><a href="giracompleta.html">Gira</a>
        <ul id="dropdown">
            <li><a href="giracompleta.html">Gira Completa</a></li>
            <li><a href="galeria.html">Galería</a></li>
            <li><a href="compradeentradas.html">Compra de entradas</a></li>
        </ul>
    </li>
    <li><a href="miembros.html">Miembros</a></li>
    <li><a href="discografia.html">Discografía</a></li>
    <?php
    include_once 'bbdd.php';
    session_start();
    if (isset($_SESSION['user'])) 
    {
        echo '<li><a href="destroy.php">Hola '.$_SESSION['user'].'</a></li>';
        echo '<li><a href="crearNoticia.php">Crear Noticia</a></li>';
        echo '<li><a href="gestionNoticias.php">Gestion Noticias</a></li>';
    } else 
    {
        //echo '<li><a href="registro.html">Registro</a></li>';
        echo '<li><a href="login.php">Login</a></li>';
    }
    ?>
</ul>
</div>

