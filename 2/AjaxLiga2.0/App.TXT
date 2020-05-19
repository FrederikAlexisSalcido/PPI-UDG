
$(function() {
  //Código para borrar registros	
  $(document).on('click', '.borrar', function (e){
    var href = $(this).attr('href');
	if(confirm('Estas seguro de querer eliminar')){
      var tr = $(this).closest('tr');
	  // Closet que busca el selector mas cercano
	  $.get(href, function(resp) {
	  if (resp.indexOf('Borrado con exito!')>-1){
	    tr.remove();
		var numero = $('#numReg').text()-1;
		$('#numReg').text(numero);
		}
	  else {
	    alert('Error en la operación, inténtelo más tarde.');
		}
	  });
	  }
	  e.preventDefault();
    });
	//Código para insertar registros
	
	//Código para actualizar registros
  });
	