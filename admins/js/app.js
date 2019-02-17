$(document).ready(function(){
    $.ajax({
        url: "php/data.php",
        method: "GET",
        success: function(data){
            console.log(data);
            var Nivel = [];
            var Prestamos = [];
            
            
            for( var i in data){
                Nivel.push("Nivel " + data[i].Nivel);
                Prestamos.push(data[i].Prestamos);
            }
            
            var chardata = {
                labels: Nivel, 
                datasets :[
                    {
                        label : 'Nivel Prestamos',
                        backgroundColor: 'rgba(255, 113, 0, 0.75)',
                        borderColor: 'rgba(0, 203, 196, 0.75)',
                        hoverBackgroundColor: 'rgba(224, 0, 151, 1)',
                        hoverBorderColor : 'rgba(200, 200, 200, 1)',
                        data : Prestamos
                    }
                ] 
            };
            var ctx = $("#mycanvas");
            var barGraph = new Chart (ctx, {
                type: 'bar',
                data: chardata
            });
        },
        error: function(data){
            console.log(data);
        }
    });
});