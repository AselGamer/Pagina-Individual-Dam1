$(document).ready(function () {
    
    $('#selectTags').change(function () {
        var idTag = $(this).val();
        if (idTag != -1) 
        {
            $.ajax(
                {
                    data: {function: 'getFechaTag', tag: idTag},
                    url: 'http://192.168.0.84/Pagina-Individual-Dam1/servicios.php',
                    type:'post',
                    success: function (response) {
                        $('#selectFechas').show();
                        var arrayFechas = $.parseJSON(response);
                        var sizeArray = arrayFechas.length;
                        var htmlFinal = "";
                        htmlFinal += "<option value=-1>--Sin Seleccionar--</option>";
                        for (var i = 0; i < sizeArray; i++) 
                        {
                        var htmlJuego = "<option value='"+ arrayFechas[i].fecha_pub + "'>" + arrayFechas[i].fecha_pub + "</option>";
                        htmlFinal += htmlJuego;
                        }
                        $('#selectFechas').html(htmlFinal);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                }
            )
        } else 
        {
            $('#selectFechas').hide();
            $('#selectNoticias').hide();
        }
    });

    $('#selectFechas').change(function () {
        var fechaNot = $(this).val();
        if (fechaNot != -1) 
        {
            $.ajax(
                {
                    data: {function: 'getIdFecha', fecha: fechaNot},
                    url: 'http://192.168.0.84/Pagina-Individual-Dam1/servicios.php',
                    type:'post',
                    success: function (response) {
                        $('#selectNoticias').show();
                        var arrayNoticias = $.parseJSON(response);
                        var sizeArray = arrayNoticias.length;
                        var htmlFinal = "";
                        htmlFinal += "<option value=-1>--Sin Seleccionar--</option>";
                        for (var i = 0; i < sizeArray; i++) 
                        {
                        var htmlJuego = "<option value='"+ arrayNoticias[i].id + "'>" + arrayNoticias[i].titulo + "</option>";
                        htmlFinal += htmlJuego;
                        }
                        $('#selectNoticias').html(htmlFinal);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                }
            )
        } else 
        {
            $('#selectNoticias').hide();
        }
    });
    $('#selectNoticias').change(function () {
        var noticiaId = $(this).val();
        if (noticiaId != -1) {
            $('#frameNoticia').attr('src' ,'http://localhost/Pagina-Individual-Dam1/noticia.php?id_noticia=' + noticiaId + '&iframe');
            
        }
    });
});