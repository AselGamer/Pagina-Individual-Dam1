<html>
    <link rel="stylesheet" href="css/manipNoticia.css">
    <link rel="stylesheet" href="css/compartido.css">
    <link rel="stylesheet" href="css/registro.css">
    <head>
        <title>Tally Unofficial Website</title>
    </head>
        <body>
            <div id="encabezado">
                <?php
                    include 'menu.php';
                    if(!isset($_SESSION['user'])) {
                        header('Location: index.php');
                    }
                ?>
                <img src="images/logo.png" alt="Logo pagina" id="logoPagina"/>
            </div>
            <div id="cuerpo">
                <div id="formulario">
                    <form action="altaNoticia.php" method="post" enctype="multipart/form-data">
                        <label for="titulo" class="etiqueta">Titulo de la noticia:</label>
                        <input type="text" name="titulo" class="entradaTexto"/>
                        <label for="articulo" class="etiqueta">Contenido del noticia:</label>
                        <textarea name="articulo" class="entradaTexto" rows="2" cols="20"></textarea>
                        <label for="imagen" class="etiqueta">Imagen:</label>
                        <input type="file" name="imagen" class="entradaTexto"/>
                        <label for="fecha_pub" class="etiqueta">Fecha Publicacion:</label>
                        <input type="date" name="fecha_pub" class="entradaTexto"/>
                        <label for="resumen" class="etiqueta">Resumen:</label>
                        <input type="text" name="resumen" class="entradaTexto"/>
                        <?php
                        echo '<input type="hidden" name="id_usuario" value="'.$_SESSION['id_usuario'].'"/>'
                        ?>
                        <label for="tags" class="etiqueta">Tags:</label>
                        <select name="tags[]" id ="tags" multiple>
                            <?php
                                include_once 'bbdd.php';
                                $tags = obtenerTags();
                                $tagLength = sizeof($tags);
                                for ($i=0; $i < $tagLength; $i++) { 
                                    echo '<option value='.$tags[$i]['id_tag'].'>'.$tags[$i]['nombre_tag'].'</option>';
                                }
                            ?>
                        </select>
                        <div id="botonRegistro"><input type="submit" value="Crear Noticia" id="registrarse" class="entradaTexto"/></div>
                    </form>
                </div>
                </div>
            </div>
            <div id="pie">
                <a href="https://www.facebook.com/TallyHall" target="_blank"><img src="images/facebook-icon.png"  alt="Enlace facebook"></a>
                <a href="https://twitter.com/tallyhall" target="_blank"><img src="images/twitter-icon.png"  alt="Enlace twitter"></a>
            </div>
        </body>
</html>