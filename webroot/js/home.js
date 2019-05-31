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



//DESPLEGABLE POPUP REGISTRAR VEHÍCULO

// llamar ajax prov = data, enviará al controlador 'inventarioController' y este lo enviará al modelo 'inventarioModel'
//al poner los territorios, provincias y proyectos como clase en lugar de como id, podemos reutilizar el código para ambos popups

  $(".select_terr").change(function()
  {
    var terr = $(this);
    //con el this le decimos que cambie sobre el desplegable con el que estamos trabajando, 
    //si no daría error al detectar dos desplegables. 
    show_provincias(terr);
  });


	$(".select_prov").change(function()
  {
    var prov = $(this);
    //con el this le decimos que cambie sobre el desplegable con el que estamos trabajando, 
    //si no daría error al detectar dos desplegables. 
		show_proyectos(prov);
	});

  show_provincias($(".select_terr"));
  //al trabajar con dos desplegables, en lugar de dejarlo vacío, 
  //tenemos que especificar $(".select_terr") en el show para que muestre lo que estamos haciendo en ese desplegable. 



//DESPLEGABLE POPUP EDITAR VEHÍCULO/////////////
  $(".despvehic").click(function(){
    var id = $(this).attr("vehiculo_mat");
    $("#div_edit").css("display", "block");
    
    $.ajax({
        type: 'post',
        url: '/proyecto_final/inventario/get_by_id',
        data: "matricula="+id,
        dataType: 'json',

          success: function(data){
            if(data)
            {
              $("#div_edit #matricula").val(data[0]["matricula"]);
              $("#div_edit #tipo").val(data[0]["tipo"]);
              $('#div_edit #estado option[value="'+data[0]["estado"]+'"]').prop('selected', true);
              $('#div_edit #departamento option[value="'+data[0]["departamento"]+'"]').prop('selected', true);
              $('#div_edit #territorio option[value="'+data[0]["nom_terr"]+'"]').prop('selected', true);
              $('#div_edit #provincia option[value="'+data[0]["nom_prov"]+'"]').prop('selected', true);
              $('#div_edit #proyecto option[value="'+data[0]["nom_project"]+'"]').prop('selected', true);              
            }
            else
            {
              
            }
          },
          error: function(){            
          }
      });

  });
//END DESPLEGABLE POPUP EDITAR VEHÍCULO

////DESPLEGABLE POPUP ELIMINAR VEHÍCULO/////////////
$(".despvehic_del").click(function(){
    var id = $(this).attr("vehiculo_mat");
    $("#div_edit_del").css("display", "block");
    
    $.ajax({
        type: 'post',
        url: '/proyecto_final/inventario/DEL_by_id',
        data: "matricula="+id,
        dataType: 'json',

          success: function(data){

            if(data)
            {
              location.href ="/proyecto_final/inventario/";
            }
            //   $("#div_edit #matricula").val(data[0]["matricula"]);
            //   $("#div_edit #tipo").val(data[0]["tipo"]);
            //   $('#div_edit #estado option[value="'+data[0]["estado"]+'"]').prop('selected', true);
            //   $('#div_edit #departamento option[value="'+data[0]["departamento"]+'"]').prop('selected', true);
            //   $('#div_edit #territorio option[value="'+data[0]["nom_terr"]+'"]').prop('selected', true);
            //   $('#div_edit #provincia option[value="'+data[0]["nom_prov"]+'"]').prop('selected', true);
            //   $('#div_edit #proyecto option[value="'+data[0]["nom_project"]+'"]').prop('selected', true);              
            // }
            else
            {
              location.href ="/proyecto_final/inventario/";
            }
          },
          error: function(){            
          }
      });

  });


    $("#btn_cancel2").click(function(){
      $("#div_edit").css("display", "none");
  });

    $("#btn_cancel3").click(function(){
      $("#div_edit_del").css("display", "none");
  });


}); //end document.ready



//FUNCIONES

// Las funciones siempre tienen que estar fuera del document.ready
function show_provincias(terr)
{
  //var terr = $(".select_terr"); //JS recoge los datos de la #id del select de territorio.
     $.ajax({
        type:'POST',
        url:'inventario/desplegable_cont1', //irá a inventarioController método desplegable_cont1()
        data: terr,
        success:function(data)
        {
          var data2= JSON.parse(data);
          $('.select_prov').html(data2); //inyecta en el selector de proyecto las opciones de territorio.
          show_proyectos($('.select_prov')); //se puede llamar a otra función para mostrar por defecto el primer item del siguiente desplegable. 
        }
    }); 
}

function show_proyectos(prov)
{
  //var prov = $(".select_prov"); //JS recoge los datos de la #id del select de provincia.
     $.ajax({
        type:'POST',
        url:'inventario/desplegable_cont2', //irá a inventarioController método desplegable_cont2()
        data: prov,
        success:function(data)
        {
          var data3= JSON.parse(data);
          $('.select_project').html(data3); //inyecta en el selector de proyecto las opciones de provincia.
        }
    }); 
}
  
//BUSCADOR

// $(document).ready(function(){

//   $("#busca").on("keypress", function(e){
//     if(e.which == 13) 
//     {
//       $("inventario").html(""); 
//       get_text();
//     }
//   });
// }); 


// function get_text()
// {

//   var text = JSON.stringify($("#busca").val());

//   $.ajax({
//     type: "post",
//     dataType: "json",
//     url: "inventario/buscar",
//     data: "dato="+text,

//     success: function(data){

//      $dato = "";
//         foreach ($vehiculos as $value) 
//         {
//             $dato +='<tr>';
//                     $dato +='<td style="background: none;"><img id="icon_table" src="webroot/img/icon_turismo.png"></td>';
//                     $dato +='<td style="text-transform: uppercase;">'+data["matricula"]+'</td>';
//                     $dato +='<td>'+data["tipo"]+'</td>';
//                     $dato +='<td>'+data["estado"]+'</td>';
//                     $dato +='<td>'+data["departamento"]+'</td>';
//                     $dato +='<td>'+data["nom_terr"]+'</td>';
//                     $dato +='<td>'+data["nom_prov"]+'</td>';
//                     $dato +='<td>'+data["nom_project"]+'</td>';
//                     $dato +='<td style="width: 1%; background: none;">';
//                         $dato +='<span id="desplegable">';
//                          $dato +='<ul class="drop-down closed">';
//                             $dato +='<li><p class="nav-button" style="cursor: pointer;">OPCIONES ▼</p></li>              ';
//                             $dato +='<li><a class="despvehic" vehiculo_mat="'+data["matricula"]+'">Editar vehículo</a></li>';
//                             $dato +='<li><a href="">Archivar vehículo</a></li>';
//                             $dato +='<li><a href="">Eliminar vehículo</a></li>';
//                          $dato +='</ul>                   ';
//                         $dato +='</span>';
//                     $dato +='</td>';
//             $dato +='</tr>';
//         }
//         return $dato;

//     $("main").append(divContent);     


//     },
//     error: function(e){

//     }
//   }); 
// }

//END BUSCADOR





