$(document).ready(function(){
    $.ajax({
        url: "php/data_libros.php",
        method: "GET",
        success: function(data){
            console.log(data);
            var Nombre = [];
            var Pedidos = [];
            
            
            for( var i in data){
                Nombre.push(data[i].Nombre_articulo);
                Pedidos.push(data[i].Pedidos);
            }
            
            var chardata = {
                labels: Nombre, 
                datasets :[
                    {
                        label : 'Prestamos',
                        backgroundColor: 'rgba(255, 113, 0, 0.75)',
                        borderColor: 'rgba(0, 203, 196, 0.75)',
                        hoverBackgroundColor: 'rgba(224, 0, 151, 1)',
                        hoverBorderColor : 'rgba(200, 200, 200, 1)',
                        data : Pedidos
                    }
                ] 
            };
            var ctx = $("#mycanvas3");
            var barGraph = new Chart (ctx, {
                type: 'horizontalBar',
                data: chardata
            });
        },
        error: function(data){
            console.log(data);
        }
    });
});