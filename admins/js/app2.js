$(document).ready(function(){
    $.ajax({
        url: "php/data_clasificacion.php",
        method: "GET",
        success: function(data){
            console.log(data);
            var Clasificacion = [];
            var Marks = [];
            
            
            for( var i in data){
                Clasificacion.push("Genero " + data[i].Clasificacion);
                Marks.push(data[i].Marks);
            }
            
            var chardata = {
                labels: Clasificacion, 
                datasets :[
                    {
                        label : 'Prestamos',
                        backgroundColor: 'rgba(255, 113, 0, 0.75)',
                        borderColor: 'rgba(0, 203, 196, 0.75)',
                        hoverBackgroundColor: 'rgba(224, 0, 151, 1)',
                        hoverBorderColor : 'rgba(200, 200, 200, 1)',
                        data : Marks
                    }
                ] 
            };
            var ctx = $("#mycanvas2");
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