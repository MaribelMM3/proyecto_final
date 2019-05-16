$(document).ready(function(){


	$(".nav-button").click(function() {
    $(this).parent().parent().toggleClass("closed");
  });

	$('.searchButton').on('click',function(){
	  alert('You clicked search button');
	});

	$("#btn_registro").click(function(){
    $("#div_form").css("display", "block");
  });

	$("#btn_cancel").click(function(){
    $("#div_form").css("display", "none");
  });


// llamar ajax prov = data, enviará al controlador 'inventarioController' y este lo enviará al modelo 'inventarioModel'
	$("#select_prov").change(function(){
		var prov = $("#select_prov"); //JS recoge los datos de la #id del select.
		 $.ajax({
                type:'POST',
                url:'inventario/desplegable_cont', //irá a inventarioController método desplegable_cont()
                data: prov,
                success:function(data){
                    $('#select_project').html(data); //inyecta en el selector de proyecto las opciones de provincia.

                }
            }); 
	});
  
});