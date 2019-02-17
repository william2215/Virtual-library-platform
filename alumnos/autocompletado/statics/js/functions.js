$(document).ready(function()
{
	/**
    *@desc- retrasa el evento keyup
    *@param fn - function
    *@param ms - milisegundos que queremos retrasar
    */
    $.fn.delayPasteKeyUp = function(fn, ms)
    {
        var timer = 0;
        $(this).on("keyup paste", function()
        {
            clearTimeout(timer);
            timer = setTimeout(fn, ms);
        });
    };
 
    $("input[name=autocomplete]").delayPasteKeyUp(function()
    {
        $.ajax({
        	type: "POST",
            url: "app/instancias/autocomplete.php", //http://localhost/autocompletado/app/instancias/
            data: "autocomplete="+$("input[name=autocomplete]").val(),
            success: function(data)
            {
            	if(data)
            	{
            		var json = JSON.parse(data),
            			html = '<div class="list-group">';
            		if(json.res == 'full')
            		{
            			for(datos in json.data)
            			{
            				html+='<a href="index.php?id='+json.data[datos].Codigo+'" onclick="info('+json.data[datos].Codigo+',\''+json.data[datos].Nombre_articulo+'\')" class="list-group-item">';
            				html+='<h4 class="list-group-item-heading">Codigo:' + json.data[datos].Codigo;
            				html+=' Nombre: ' + json.data[datos].Nombre_articulo+'</h4>';
            				html+='</a>';
            			}
            		}
            		else
            		{
                        html = '<div class="list-group">';
            			html+='<a href="php/insertar.php?Nombre='+$("input[name=autocomplete]").val()+'">';
        				html+='<h4 class="list-group-item-heading">Por favor dele click para aumentar nuestro catalogo. Lamentablemente no se ha encontrado nada con: '+$("input[name=autocomplete]").val()+'</h4>';
        				html+='</a>';
                        html+='</div>';
            		}
            		html+='</div>';
            		$("#busqueda").html("").append(html);
            	}
            }
        });
    }, 500);

	$(document).on("click", "a", function()
	{
		$("a").removeClass("active");
		$(this).addClass("active");
	})
});

