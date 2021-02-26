//FUNCION EDITAR
$(function(){ 

    $(".editar").on('click', function(){
        
        var prueba = $(this).parents("tr").find("td");
        var prueba1 = [];
        prueba.each(function( index ) {
            prueba1.push($( this ).text());
            
            
        });
        $("#nombre").val(prueba1[0]);      
        $("#apellidos").val(prueba1[1]);    
        $("#edad").val(prueba1[2]);
        $("#correo").val(prueba1[3]);
        $("#direccion").val(prueba1[4]);
        

        esto es una prueba.
    });

});
