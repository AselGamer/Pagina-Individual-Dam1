<html>
    <link rel="stylesheet" href="css/compartido.css">
    <link rel="stylesheet" href="css/noticia.css">
    <head>
        <title>Tally Unofficial Website</title>
    </head>
        <body>
            <?php 
            include_once 'bbdd.php';
            if (!isset($_GET['iframe'])) {
                echo '<div id="encabezado">';
                
                    include_once 'menu.php';
                    
                
                echo '<img src="images/logo.png" alt="Logo pagina" id="logoPagina"/>';
            echo '</div>';
            }
            ?>
            
            <div id="cuerpo">
                <div id="noticia">
                <?php
                $noticia = obtenerNoticiaAutorEn($_GET['id_noticia']);
                echo '<h1>'.$noticia['titulo'].'</h1>';
                echo '<p id="autor">'.$noticia['autor'].'</p>';
                echo '<img src="images/'.$noticia['imagen'].'" alt="'.$noticia['imagen'].'" id="imagen">';
                echo '<p>"'.$noticia['articulo'].'"</p>';
                echo '<p id="fecha">'.$noticia['fecha_pub'].'</p>';
                ?>
            </div>
            </div>
            <?php 
            if (!isset($_GET['iframe'])) {
                echo '<div id="pie">
                <a href="https://www.facebook.com/TallyHall" target="_blank"><img src="images/facebook-icon.png"  alt="Enlace facebook"></a>
                <a href="https://twitter.com/tallyhall" target="_blank"><img src="images/twitter-icon.png"  alt="Enlace twitter"></a>
            </div>';
            }
            ?>
            
        </body>
</html>