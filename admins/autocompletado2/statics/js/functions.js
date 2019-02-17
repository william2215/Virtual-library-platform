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
            url: "http://localhost/autocompletado2/app/instancias/autocomplete.php",
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
            				html+='<a href="index.php?id='+json.data[datos].idPrestamo+'" onclick="info('+json.data[datos].idPrestamo+',\''+json.data[datos].Carnet+'\')" class="list-group-item">';
            				html+='<h4 class="list-group-item-heading">Numero de Prestamo:' + json.data[datos].idPrestamo;
            				html+=' Carnet: ' + json.data[datos].Carnet+'</h4>';
            				html+='</a>';
            			}
            		}
            		else
            		{
            			html+='<a href="#" class="list-group-item">';
        				html+='<h4 class="list-group-item-heading">No se ha encontrado nada con '+$("input[name=autocomplete]").val()+'</h4>';
        				html+='</a>';
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

