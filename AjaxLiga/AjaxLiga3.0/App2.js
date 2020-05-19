$(function(){
  //console.log("Listo Ajax...");
  $('#miForma').submit(function (e){
  	var nom= $('#nombre').val();
  	var des= $('#descripcion').val();
    if(confirm("Estas seguro de querer agregar \n"+
               "Nombre     = "+nom+"\n"+
		       "Descripcion= "+des
              )){
      $.get('', 'nombre='+nom+'&descripcion='+des, function(resp) {
		alert(resp);
        $('#nombre').val('');
        $('#descripcion').val('');
      });
      
      }
	e.preventDefault();
  });
  
  $('#formaModificar').submit(function (e){
	  var datos = $(this).serialize(); // Empaqueta los datos de la forma para poder enviarlos a Ajax
      if(confirm("¿Estas seguro de querer modificar?")) {
          $.post('', datos, function(resp) {
            $('#algocual').load('selector.php?cual='+$('#algocual').val());
			alert(resp);
            $('#algonombre').val('');
            $('#algodescripcion').val('');
          });
        }
        e.preventDefault();
    });
 
}); // Termina la funcion principal
	