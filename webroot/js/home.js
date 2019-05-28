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

  $('.btn_opciones').on('click',function(e){
            $(this).parent().next().toggle();
            e.preventDefault();
  });
        $('#btn_opciones').on('click',function(e){
            $('.respuesta').toggle('slow');
            e.preventDefault();
        });


//LOGIN
    $("#login").on("submit", function(e)
    {  
      e.preventDefault();
      $.ajax({
        type: 'post',
        url: '/proyecto_final/home/login',
        data: $("#login").serialize(),
        dataType: 'json',

          beforeSend: function(){
            $("#Mensaje").html("Enviando datos...");
          },

          success: function(data){
            if(data)
            {
              $("#Mensaje").html("Login correcto, redirigiendo...");
              setTimeout(function()
              {
                location.href = "inventario/index";
              },1500);
            }
            else
            {
              $("#Mensaje").html("Usuari@ no existe en BD.");
            }
            
              
            },

          error: function(){
            $("#Mensaje").html("Error en el envío de datos al server");
          }
      });
    });



//DESPLEGABLES POPUP REGISTRAR VEHÍCULO

// llamar ajax prov = data, enviará al controlador 'inventarioController' y este lo enviará al modelo 'inventarioModel'
  $("#select_terr").change(function()
  {
    show_provincias();
  });


	$("#select_prov").change(function()
  {
		show_proyectos();
	});

  show_provincias();


}); //end document.ready

// Las funciones siempre tienen que estar fuera del document.ready
function show_provincias()
{
  var terr = $("#select_terr"); //JS recoge los datos de la #id del select de territorio.
     $.ajax({
        type:'POST',
        url:'inventario/desplegable_cont1', //irá a inventarioController método desplegable_cont1()
        data: terr,
        success:function(data)
        {
          var data2= JSON.parse(data);
          $('#select_prov').html(data2); //inyecta en el selector de proyecto las opciones de territorio.
          show_proyectos(); //se puede llamar a otra función para mostrar por defecto el primer item del siguiente desplegable. 
        }
    }); 
}

function show_proyectos()
{
  var prov = $("#select_prov"); //JS recoge los datos de la #id del select de provincia.
     $.ajax({
        type:'POST',
        url:'inventario/desplegable_cont2', //irá a inventarioController método desplegable_cont2()
        data: prov,
        success:function(data)
        {
          var data3= JSON.parse(data);
          $('#select_project').html(data3); //inyecta en el selector de proyecto las opciones de provincia.
        }
    }); 
}
  
