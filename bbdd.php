<?php
function connectBBDD()
  {
    $mysqli = new mysqli("localhost", "almi", "Almi123", "noticias");
    if($mysqli->connect_errno)
    {
      echo "Fallo en la conexión: ".$mysqli->connect_errno;
    }
    return $mysqli;
  }

  //esto esta fusilado de juegalmi si deja de funcionar es culpa de ander
  function login($user, $password)
  {
    $mysqli = connectBBDD();
    $sql = "SELECT id_usuario FROM usuario WHERE nombre_usuario = ? AND password = ?";
    $sentencia = $mysqli->prepare($sql);
    if(!$sentencia)
    {
      echo "Fallo al preparar la sentencia: ".$mysqli->errno;
    }

    $asignar = $sentencia->bind_param("ss", $user, $password);
    if(!$asignar)
    {
      echo "Fallo al asignar parámetros: ".$mysqli->errno;
    }

    $ejecucion = $sentencia->execute();
    if(!$ejecucion)
    {
      echo "Fallo en la ejecucion: ".$mysqli->errno;
    }

    $id_usuario = 0;

    $vincular = $sentencia->bind_result($id_usuario);
    if(!$vincular)
    {
      echo "Fallo al vincular parametros: ".$mysqli->errno;
    }


    if($sentencia->fetch())
    {

    }

    $mysqli->close();

    return $id_usuario;
  }
  function crearNoticia($titulo, $articulo, $imagen, $fecha_pub, $resumen, $id_usuario) 
  {
    $mysqli = connectBBDD();
    $sql = "INSERT INTO noticia (titulo, articulo, imagen, fecha_pub, resumen, id_usuario) VALUES (?, ?, ?, ?, ?, ?); ";
    $sentencia = $mysqli->prepare($sql);
    if(!$sentencia)
    {
      echo "Fallo al preparar la sentencia: ".$mysqli->errno;
    }
    $asignar = $sentencia->bind_param("sssssi", $titulo, $articulo, $imagen, $fecha_pub, $resumen, $id_usuario);
    if(!$asignar)
    {
      echo "Fallo al asignar parámetros: ".$mysqli->errno;
    }
    $ejecucion = $sentencia->execute();
    if(!$ejecucion)
    {
      echo "Fallo en la ejecucion: ".$mysqli->errno;
    }
    $mysqli->close();

    return $ejecucion;
  }
  function obtenerNoticias() 
  {
    $mysqli = connectBBDD();
    $sql = "SELECT * FROM noticia";
    $sentencia = $mysqli->prepare($sql);
    if(!$sentencia)
    {
      echo "Fallo en la preparacion de la sentencia: ".$mysqli->errno;
    }

    $ejecucion = $sentencia->execute();
    if(!$ejecucion)
    {
      echo "Fallo en la ejecución de la sentencia: ".$mysqli->errno;
    }

    $id = -1;
    $titulo = "";
    $articulo = "";
    $imagen = "";
    $fecha_pub = "";
    $resumen = "";
    $id_usuario = -1;
    $vincular = $sentencia->bind_result($id, $titulo, $articulo, $imagen, $fecha_pub, $resumen, $id_usuario);
    if(!$vincular)
    {
      echo "Fallo al vincular los resultados: ".$mysqli->errno;
    }

    $noticias = array();

    while($sentencia->fetch())
    {
      $noticia = array(
        'id_noticia'=> $id,
        'titulo' => $titulo,
        'articulo' => $articulo,
        'imagen' => $imagen,
        'fecha_pub' => $fecha_pub,
        'resumen' => $resumen,
        'id_usuario' => $id_usuario
      );
      $noticias[] = $noticia;
    }

    $mysqli->close();
    return $noticias;
  }
  function eliminarNoticia($id_noticia) 
  {
    $mysqli = connectBBDD();
    $sql = "DELETE FROM noticia WHERE id_noticia = ?";
    $sentencia = $mysqli->prepare($sql);
    if(!$sentencia)
    {
      echo "Fallo al preparar la sentencia: ".$mysqli->errno;
    }

    $asignar = $sentencia->bind_param("i", $id_noticia);
    if(!$asignar)
    {
      echo "Fallo al asignar parámetros: ".$mysqli->errno;
    }

    $ejecucion = $sentencia->execute();
    if(!$ejecucion)
    {
      echo "Fallo en la ejecucion: ".$mysqli->errno;
    }

    $mysqli->close();

    return $ejecucion;
  }
  function obtenerNoticiaEn($id_noticia) 
  {
    $mysqli = connectBBDD();
    $sql = "SELECT * FROM noticia WHERE id_noticia = ?";
    $sentencia = $mysqli->prepare($sql);
    if(!$sentencia)
    {
      echo "Fallo en la preparacion de la sentencia: ".$mysqli->errno;
    }
    $asignar = $sentencia->bind_param("s", $id_noticia);
    if(!$asignar)
    {
      echo "Fallo al asignar parámetros: ".$mysqli->errno;
    }
    $ejecucion = $sentencia->execute();
    if(!$ejecucion)
    {
      echo "Fallo en la ejecución de la sentencia: ".$mysqli->errno;
    }

    $id = -1;
    $titulo = "";
    $articulo = "";
    $imagen = "";
    $fecha_pub = "";
    $resumen = "";
    $id_usuario = -1;
    $vincular = $sentencia->bind_result($id, $titulo, $articulo, $imagen, $fecha_pub, $resumen, $id_usuario);
    if(!$vincular)
    {
      echo "Fallo al vincular los resultados: ".$mysqli->errno;
    }

    $noticias = array();

    if($sentencia->fetch())
    {
      $noticia = array(
        'id_noticia'=> $id,
        'titulo' => $titulo,
        'articulo' => $articulo,
        'imagen' => $imagen,
        'fecha_pub' => $fecha_pub,
        'resumen' => $resumen,
        'id_usuario' => $id_usuario
      );
    }

    $mysqli->close();
    return $noticia;
  }
  function modificarNoticia($titulo, $articulo, $imagen, $fecha_pub, $resumen, $id_usuario, $id_noticia) 
  {
    $mysqli = connectBBDD();
    $sql = "UPDATE noticia SET titulo = ?, articulo = ?, imagen = ?, fecha_pub = ?, resumen = ?, id_usuario = ? WHERE id_noticia = ?; ";
    $sentencia = $mysqli->prepare($sql);
    if(!$sentencia)
    {
      echo "Fallo al preparar la sentencia: ".$mysqli->errno;
    }
    $asignar = $sentencia->bind_param("sssssii", $titulo, $articulo, $imagen, $fecha_pub, $resumen, $id_usuario, $id_noticia);
    if(!$asignar)
    {
      echo "Fallo al asignar parámetros: ".$mysqli->errno;
    }
    $ejecucion = $sentencia->execute();
    if(!$ejecucion)
    {
      echo "Fallo en la ejecucion: ".$mysqli->errno;
    }
    $mysqli->close();

    return $ejecucion;
  }
  function obtenerNoticiasAutor() 
  {
    $mysqli = connectBBDD();
    $sql = "SELECT noticia.id_noticia, noticia.titulo, noticia.articulo, noticia.imagen, noticia.fecha_pub, noticia.resumen, usuario.nombre_usuario FROM noticia INNER JOIN usuario ON noticia.id_usuario = usuario.id_usuario
    LIMIT 5;";
    $sentencia = $mysqli->prepare($sql);
    if(!$sentencia)
    {
      echo "Fallo en la preparacion de la sentencia: ".$mysqli->errno;
    }

    $ejecucion = $sentencia->execute();
    if(!$ejecucion)
    {
      echo "Fallo en la ejecución de la sentencia: ".$mysqli->errno;
    }

    $id = -1;
    $titulo = "";
    $articulo = "";
    $imagen = "";
    $fecha_pub = "";
    $resumen = "";
    $autor = "";
    $vincular = $sentencia->bind_result($id, $titulo, $articulo, $imagen, $fecha_pub, $resumen, $autor);
    if(!$vincular)
    {
      echo "Fallo al vincular los resultados: ".$mysqli->errno;
    }

    $noticias = array();

    while($sentencia->fetch())
    {
      $noticia = array(
        'id_noticia'=> $id,
        'titulo' => $titulo,
        'articulo' => $articulo,
        'imagen' => $imagen,
        'fecha_pub' => $fecha_pub,
        'resumen' => $resumen,
        'autor' => $autor
      );
      $noticias[] = $noticia;
    }

    $mysqli->close();
    return $noticias;
  }

  function modificarNoticiaNoImg($titulo, $articulo, $fecha_pub, $resumen, $id_usuario, $id_noticia) 
  {
    $mysqli = connectBBDD();
    $sql = "UPDATE noticia SET titulo = ?, articulo = ?, fecha_pub = ?, resumen = ?, id_usuario = ? WHERE id_noticia = ?; ";
    $sentencia = $mysqli->prepare($sql);
    if(!$sentencia)
    {
      echo "Fallo al preparar la sentencia: ".$mysqli->errno;
    }
    $asignar = $sentencia->bind_param("ssssii", $titulo, $articulo, $fecha_pub, $resumen, $id_usuario, $id_noticia);
    if(!$asignar)
    {
      echo "Fallo al asignar parámetros: ".$mysqli->errno;
    }
    $ejecucion = $sentencia->execute();
    if(!$ejecucion)
    {
      echo "Fallo en la ejecucion: ".$mysqli->errno;
    }
    $mysqli->close();

    return $ejecucion;
  }
  function obtenerNoticiaAutorEn($id_noticia) 
  {
    $mysqli = connectBBDD();
    $sql = "SELECT noticia.titulo, noticia.articulo, noticia.imagen, noticia.fecha_pub, noticia.resumen, usuario.nombre_usuario FROM noticia INNER JOIN usuario ON noticia.id_usuario = usuario.id_usuario WHERE noticia.id_noticia = ?;";
    $sentencia = $mysqli->prepare($sql);
    if(!$sentencia)
    {
      echo "Fallo en la preparacion de la sentencia: ".$mysqli->errno;
    }
    $asignar = $sentencia->bind_param("s", $id_noticia);
    if(!$asignar)
    {
      echo "Fallo al asignar parámetros: ".$mysqli->errno;
    }
    $ejecucion = $sentencia->execute();
    if(!$ejecucion)
    {
      echo "Fallo en la ejecución de la sentencia: ".$mysqli->errno;
    }

    $titulo = "";
    $articulo = "";
    $imagen = "";
    $fecha_pub = "";
    $resumen = "";
    $autor = "";
    $vincular = $sentencia->bind_result($titulo, $articulo, $imagen, $fecha_pub, $resumen, $autor);
    if(!$vincular)
    {
      echo "Fallo al vincular los resultados: ".$mysqli->errno;
    }

    $noticias = array();

    if($sentencia->fetch())
    {
      $noticia = array(
        'titulo' => $titulo,
        'articulo' => $articulo,
        'imagen' => $imagen,
        'fecha_pub' => $fecha_pub,
        'resumen' => $resumen,
        'autor' => $autor
      );
    }

    $mysqli->close();
    return $noticia;
  }
?>