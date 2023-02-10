<html>
    <link rel="stylesheet" href="css/compartido.css">
    <link rel="stylesheet" href="css/registro.css">
    <head>
        <title>Tally Unofficial Website</title>
    </head>
        <body>
            <div id="encabezado">
                <?php
                    include 'menu.php';
                ?>
                <img src="images/logo.png" alt="Logo pagina" id="logoPagina"/>
            </div>
            <div id="cuerpo">
                <div id="formulario">
                    <form action="iniciarSesion.php" method="post">
                        <label for="user" class="etiqueta">Nombre de usuario:</label>
                        <input type="text" id="nombreusuario" name="user" class="entradaTexto"/>
                        <label for="password" class="etiqueta">Contraseña</label>
                        <input type="password" id="contraseña" name="password" class="entradaTexto"/>
                        <div id="botonRegistro"><input type="submit" value="Inciar Sesion" id="registrarse" class="entradaTexto"/></div>
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