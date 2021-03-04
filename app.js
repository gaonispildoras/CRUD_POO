
$(function(){ 
    //Ocultar info
    $(".oculto").hide();

    
    //PASAR DATOS AL MODAL

    $(".editar").on('click', function(){
        $(".cambios2").hide();
        $(".cambios").show();
        $(".modal-title").text("Editar Usuarios");
        
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
    
    $(".cambios").on("click", function(){
        var datos = [];
        $(".datos").each(function() {
            datos.push($(this).val());

            
        });
        var cargar_update = "calls_js/update.php?nom="+datos[0]+"&ape="+datos[1]+"&edad="+datos[2]+"&corr="+datos[3]+"&dire="+datos[4]+"&oculto="+datos[5]+" ";
        var cargar_update_2 = cargar_update.replace(/ /g, "_");

        var cargar_tabla = "calls_js/select.php";

        $("#hola1").load(cargar_update_2);

        $("body").load(cargar_tabla);
        
    });

    //ELIMINAR LOS DATOS
    
    $(".eliminar").on("click", function(){
        var datos = [];
        var prueba = $(this).parents("tr").find("td");
        prueba.each(function(){
            datos.push($(this).text());

        });
        
        eliminar = "calls_js/delete.php?eliminar="+datos[5]+" ";
        var cargar_tabla = "calls_js/select.php";
        $("body").load(eliminar);
        $("body").load(cargar_tabla);

    });


    // CARGAR MODAL PARA AÑADIR REGISTROS

    $(document).on("click",".añadir", function(){
        $(".cambios").hide();
        $(".cambios2").show();

        $("#exampleModal").find("input,textarea,select").val("");
        $("#exampleModal input[type='checkbox']").prop('checked', false).change();

        $(".modal-title").text("Agregar Usuarios");
        $(".modal").modal("show");
        
    });

    
    //AÑADIR REGISTROS

    $(".cambios2").on("click",function(){
        
        var datos = [];
        $(".datos").each(function(){
            datos.push($(this).val());

        });
        var insert = "calls_js/insert.php?nom="+datos[0]+"&ape="+datos[1]+"&edad="+datos[2]+"&corr="+datos[3]+"&dire="+datos[4]+"&oculto="+datos[5]+" ";
        var insert2 = insert.replace(/ /g, "_");

        var cargar_tabla = "calls_js/select.php";

        $("body").load(insert2);
        $("body").load(cargar_tabla);
        
    });

});
