<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="css/compartido.css">
    <link rel="stylesheet" href="css/registro.css">
    <head>
        <title>Tally Unofficial Website</title>
    </head>
        <body>
            <div id="encabezado">
            <?php
            include_once 'menu.php';
            ?>
            <div id="logoPagina"><img src="images/logo.png" alt="Logo pagina"/></img></div>
            </div>
            <div id="cuerpo">
                <div id="formulario">
                    <form action="registroUsu.php" method="post" id="fromRegistro">
                        <label for="nombreusuario" class="etiqueta">Nombre de usuario:</label>
                        <input type="text" id="nombreusuario" name="nombreusuario" class="entradaTexto"/>
                        <label for="password" class="etiqueta">Password:</label>
                        <input type="password" id="password" name="password" class="entradaTexto"/>
                        <label for="repassword" class="etiqueta">Repeat Password:</label>
                        <input type="password" id="repassword" name="repassword" class="entradaTexto"/>
                        <div id="botonRegistro"><input type="submit" value="Registrarse" id="registrarse" class="entradaTexto"/></div>
                    </form>
                </div>
                </div>
            </div>
            <div id="pie">
                <a href="https://www.facebook.com/TallyHall" target="_blank"><img src="images/facebook-icon.png"  alt="Enlace facebook"></a>
                <a href="https://twitter.com/tallyhall" target="_blank"><img src="images/twitter-icon.png"  alt="Enlace twitter"></a>
            </div>
            <script src="js/jquery-3.6.4.min.js"></script>
            <script src="js/registro.js"></script>
        </body>
</html>