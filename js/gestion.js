$(document).ready(function () 
{
    let enlace = "";
    $(".eliminar").click(function (event) {
        event.preventDefault();
        enlace = $(this).attr('href');
        console.log(enlace);
        $("#confirmacion").show();
    });

    $("#si").click(function () {
        window.location.replace(enlace);
    });
    $("#no").click(function () {
        $("#confirmacion").hide();
        enlace = "";
    });

    $("#buscar").click(function () {
        let filtro = $("#filtro").val();
        $("#tablanoticias tr").each(function (index) 
        {
            
            if(index != 0) 
            {
                
                $(this).children("td").each(function (index) 
                {
                    
                    let header = $("#tablanoticias tr th").eq(index);

                    

                    if(header.text().toLowerCase() == "nombre") 
                    {
                        
                        var contenido = $(this).text();
                        
                        

                        if(!contenido.toLowerCase().includes(filtro.toLowerCase())) 
                        {
                            $(this).closest("tr").hide();
                        }
                    }
                });
            }
        });
    });

    $("#limpiar").click(function () {
        $("#filtro").val("");
        $("#tablanoticias tr").show();
    });
});