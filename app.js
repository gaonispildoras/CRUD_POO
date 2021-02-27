
$(function(){ 
    //Ocultar info
    //$(".oculto").hide();

    
    //PASAR DATOS AL MODAL

    $(".editar").on('click', function(){
        
        var prueba = $(this).parents("tr").find("td");
        var prueba1 = [];
        prueba.each(function() {
            prueba1.push($( this ).text());
                        
        });

        $("#nombre").val(prueba1[0]);      
        $("#apellidos").val(prueba1[1]);    
        $("#edad").val(prueba1[2]);
        $("#correo").val(prueba1[3]);
        $("#direccion").val(prueba1[4]);
        $("#id_us").val(prueba1[5]);

        
        

        
    });

    //EDITAR LOS DATOS
    
    
//
    $(".cambios").on("click", function(){
        var datos = [];
        $(".datos").each(function() {
            datos.push($(this).val());

            
        });
        var cargar = "calls_js/update.php?nom="+datos[0]+"&ape="+datos[1]+"&edad="+datos[2]+"&corr="+datos[3]+"&dire="+datos[4]+"&oculto="+datos[5]+" ";
        $("#hola1").load(cargar);
    });

});
