<html>
    <link rel="stylesheet" href="css/compartido.css">
    <link rel="stylesheet" href="css/index.css">
    <head>
        <title>Tally Unofficial Website</title>
    </head>
        <body>
            <div id="encabezado">
                <?php
                include_once 'bbdd.php';
                include_once 'menu.php';
                ?>
                <div id="logoPagina"><img src="images/logo.png" alt="Logo pagina"/></img></div>
            </div>
            <div id="cuerpo">
               <div class="inicio">
                <div id="noticias">
                <h1>Noticias</h1>
                <?php
                $noticias = obtenerNoticiasAutor();
                $tam = sizeof($noticias);
                for ($i = 0; $i < $tam; $i++) {
                    echo '<h2><a href="noticia.php?id_noticia='.$noticias[$i]['id_noticia'].'">"'.$noticias[$i]['titulo'].'"</a></h2>';
                    echo '<div id="noticiaImagen"><img src="images/'.$noticias[$i]['imagen'].'" alt="'.$noticias[$i]['imagen'].'"/></div>';
                    echo '<p>"'.$noticias[$i]['resumen'].'"</p>';
                }
                    ?>
                    </div>
                    <div id="gira">
                        <h1>Gira</h1>
                        <p> 5/12/11 @ 6:35pm: Tally Hall has announced their full schedule for the summer 2011 tour entitled The Good & Evil Tour.  They added that this is the ONLY TOUR that they’ll be doing in support of GOOD & EVIL.</p>
                        <a href="giracompleta.html">Know more...</a>
                    </div>
                    <div id="noticias">
                        <h1>Musica</h1>
                        <audio controls>
                            <source src="musica/Tally Hall - Banana Man (480p_30fps_H264-128kbit_AAC).mp3" type="audio/mp3"/>
                        </audio>
                    </div>
               </div>
            </div>
            <div id="pie">
                <a href="https://www.facebook.com/TallyHall" target="_blank"><img src="images/facebook-icon.png"  alt="Enlace facebook"></a>
                <a href="https://twitter.com/tallyhall" target="_blank"><img src="images/twitter-icon.png"  alt="Enlace twitter"></a>
            </div>
        </body>
</html>