function valmatricula(e){
  e.preventDefault();
    var txtModel = document.getElementById('matricula').value;
    if(txtModel == null || txtModel.length < 7 || txtModel.length > 7  || !/^[a-zA-Z0-9]*$/.test(txtModel))
    {
      document.getElementById("matricula").style.border = "2px solid red";          
    }else{
      document.getElementById("matricula").style.border = "1px solid green";
    } 
}


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
                	var data2= JSON.parse(data);
                    $('#select_project').html(data2); //inyecta en el selector de proyecto las opciones de provincia.

                }
            }); 
	});
  
});