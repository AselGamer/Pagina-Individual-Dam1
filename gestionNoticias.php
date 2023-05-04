<html>
    <link rel="stylesheet" href="css/compartido.css">
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
              <div id="busqueda">
                <p>Titulo:</p>
                <input type="text" name="filtro" id="filtro">
                <button id="buscar">Buscar</button>
                <button id="limpiar">Limpiar Filtro</button>
              </div>
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
            echo "<td><a href='bajaNoticia.php?id_noticia=".$noticias[$i]['id_noticia']."' class = 'eliminar'><img src='images/delete.png' alt='Eliminar'></a></td>";
            echo "<td><a href='editarNoticia.php?id_noticia=".$noticias[$i]['id_noticia']."'><img src='images/edit.png' alt='Editar'></a></td>";
          echo "</tr>";
        }
       ?>
     </table>

     <div id="confirmacion">
        <h3>Estas seguro de que quieres eliminar?</h3>
        <div id="botones">
        <button id="si">Si</button>
        <button id="no">No</button>
      </div>
     </div>

      </div>

            <div id="pie">
                <a href="https://www.facebook.com/TallyHall" target="_blank"><img src="images/facebook-icon.png"  alt="Enlace facebook"></a>
                <a href="https://twitter.com/tallyhall" target="_blank"><img src="images/twitter-icon.png"  alt="Enlace twitter"></a> 
            </div>
            <script src="js/jquery-3.6.4.min.js"></script>
            <script src="js/gestion.js"></script>
        </body>
</html>