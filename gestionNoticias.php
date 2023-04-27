<html>
    <link rel="stylesheet" href="css/compartido.css">
    <link rel="stylesheet" href="css/registro.css">
    <link rel="stylesheet" href="css/giracompleta.css">
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
      <table id="tablanoticias">
        <tr>
          <th>Fecha</th>
          <th>Nombre</th>
          <th>Borrar</th>
          <th>Modificar</th>
        </tr>
      <?php
        include_once 'bbdd.php';
        $noticias = obtenerNoticias();
        $tamArray = sizeof($noticias);
        for($i = 0; $i < $tamArray; $i++)
        {
          echo "<tr>";
          echo "<td>".$noticias[$i]['fecha_pub']."</td>";
            echo "<td>".$noticias[$i]['titulo']."</td>";
            echo "<td><a href='bajaNoticia.php?id_noticia=".$noticias[$i]['id_noticia']."'>Borrar</a></td>";
            echo "<td><a href='editarNoticia.php?id_noticia=".$noticias[$i]['id_noticia']."'>Modificar</a></td>";
          echo "</tr>";
        }
       ?>
     </table>
                </div>
                </div>
            </div>
            <div id="pie">
                <a href="https://www.facebook.com/TallyHall" target="_blank"><img src="images/facebook-icon.png"  alt="Enlace facebook"></a>
                <a href="https://twitter.com/tallyhall" target="_blank"><img src="images/twitter-icon.png"  alt="Enlace twitter"></a>
            </div>
        </body>
</html>