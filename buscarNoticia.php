<html>
    <link rel="stylesheet" href="css/compartido.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/buscarNoticia.css">
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
                <select name="tags" id="selectTags">
                    <option value="-1">--Sin Seleccionar--</option>
                    <?php
                        $tags = obtenerTags();
                        $tagLength = sizeof($tags);
                        for ($i=0; $i < $tagLength; $i++) { 
                            echo '<option value='.$tags[$i]['id_tag'].' id = "'.$tags[$i]['nombre_tag'].''.$tags[$i]['id_tag'].'">'.$tags[$i]['nombre_tag'].'</option>';
                        }
                    ?>
                </select>
                <select name="tags" id="selectFechas">
                    
                </select>
                <select name="tags" id="selectNoticias">
                    
                </select>
                <iframe src="" frameborder="0" style = "background-color : black;" id="frameNoticia"></iframe>
            </div>
            <div id="pie">
                <a href="https://www.facebook.com/TallyHall" target="_blank"><img src="images/facebook-icon.png"  alt="Enlace facebook"></a>
                <a href="https://twitter.com/tallyhall" target="_blank"><img src="images/twitter-icon.png"  alt="Enlace twitter"></a>
            </div>
            <script src="js/jquery-3.6.4.min.js"></script>
            <script src="js/buscarNoticia.js"></script>
        </body>
</html>