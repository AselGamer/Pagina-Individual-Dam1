<html>
    <link rel="stylesheet" href="css/compartido.css">
    <link rel="stylesheet" href="css/registro.css">
    <head>
        <title>Tally Unofficial Website</title>
    </head>
        <body>
            <div id="encabezado">
                <?php
                    include_once 'bbdd.php';
                    include_once 'menu.php';
                    if(!isset($_SESSION['user'])) {
                        header('Location: index.php');
                    }
                ?>
                <img src="images/logo.png" alt="Logo pagina" id="logoPagina"/>
            </div>
            <div id="cuerpo">
                <div id="formulario">
                    <form action="modNoticia.php" method="post" enctype="multipart/form-data">
                        <?php
                        $noticia = obtenerNoticiaEn($_GET['id_noticia']);
                        echo '<label for="titulo" class="etiqueta">Titulo de la noticia:</label>';
                        echo '<input type="text" name="titulo" class="entradaTexto" value="'.$noticia['titulo'].'"/>';
                        echo '<label for="articulo" class="etiqueta">Contenido del noticia:</label>';
                        echo '<textarea name="articulo" class="entradaTexto" rows="2" cols="20">'.$noticia['articulo'].'</textarea>';
                        echo '<label for="imagen" class="etiqueta">Imagen:</label>';
                        echo '<input type="file" name="imagen" class="entradaTexto"/>';
                        echo '<label for="fecha_pub" class="etiqueta">Fecha Publicacion:</label>';
                        echo '<input type="date" name="fecha_pub" class="entradaTexto" value="'.$noticia['fecha_pub'].'"/>';
                        echo '<label for="resumen" class="etiqueta">Resumen:</label>';
                        echo '<input type="text" name="resumen" class="entradaTexto" value="'.$noticia['resumen'].'"/>';
                        echo '<input type="hidden" name="id_usuario" value="'.$_SESSION['id_usuario'].'"/>';
                        echo '<input type="hidden" name="id_noticia" value="'.$noticia['id_noticia'].'"/>';
                        ?>
                        <div id="botonRegistro"><input type="submit" value="Editar Noticia" id="registrarse" class="entradaTexto"/></div>
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