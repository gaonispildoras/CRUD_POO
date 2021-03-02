
$(function(){ 
    //Ocultar info
    $(".oculto").hide();

    
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
        var cargar_update = "calls_js/update.php?nom="+datos[0]+"&ape="+datos[1]+"&edad="+datos[2]+"&corr="+datos[3]+"&dire="+datos[4]+"&oculto="+datos[5]+" ";
        var cargar_update_2 = cargar_update.replace(/ /g, "_");

        var cargar_tabla = "calls_js/select.php";

        $("#hola1").load(cargar_update_2);
        //$(".prueba500").hide();
        $("body").load(cargar_tabla);
    });

});
