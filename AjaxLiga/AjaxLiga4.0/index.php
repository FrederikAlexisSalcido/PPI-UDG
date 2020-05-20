 <?php 
// Cargamos LIGA3
require_once 'LIGA3/LIGA.php';

// Personalizo una conexión a la base de datos (servidor, usuario, contraseña, schema)
BD('localhost', 'root', '', 'AppTareas');
 
// Configuramos la entidad a usar
$tabla = 'Tareas';
$liga  = LIGA($tabla,'order by nombre');

//Si es una petición asíncrona sólo muestro la respuesta
if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {

  if (isset($_GET['nombre'])) {
	  $resp = $liga->insertar($_GET);
	     if ($resp == 1) {
	      echo 'Registro agregado exitosamente.';
	     } else {
	      echo 'Error al insertar.';
	     }
  }
  
  if (isset($_POST['cual'])) {
     $datos = array($_POST['cual']=>$_POST);
     $resp = $liga->modificar($datos);
     if ($resp == 1) {
      echo 'Registro modificado exitosamente.';
     } else {
      echo 'La información no se modificó, intente más tarde.';
     }
    }
exit(0);
}
	
// Imprimo las etiquetas HTML iniciales
// 3.3 AJAX con LIGA.js
HTML::cabeceras(array(
  'title'      =>'Ajax y Liga',
  'description'=>'Página de pruebas para AJAX y LIGA 3',
  'css'        =>'util/LIGA.css',
  'style'      =>'label { width:100px; }'
  ));
 echo '<p style="text-align:center"><font color="#6600CC">AppTareas</font></p>';
 echo "<HR>";
  
// Guardo el bufer para colocarlo en el layout
ob_start();

echo '<p style="text-align:center"><font color="#6600CC">AppTareas</font></p>';
echo "<HR>";

  // Tabla con instancias
  $cols = array('*','-id','acción'=>'<a class="borrar" href="?id=@[id]">Borrar</a>');
  $join = array('depende'=>$liga);
  $pie  = '<th colspan="@[numCols]">Total de instancias: <span id="numReg">@[numReg]</span> </th>';
  echo "\n";
  echo '<form id="lista-form">';
  echo "\n";
  HTML::tabla($liga, 'Instancias de '.$tabla, $cols, true, $join,$pie);
  echo "</form>\n";
  echo "<br>\n\n";
	 
  $cont = ob_get_clean();
 

// Estuctura el cuerpo de la página
HTML::cuerpo(array('cont'=>$cont));

$campos = array('*');
  
echo "<br>\n\n";
// Formulario para crear nuevas instancias
$props  = array('form'=>'id="miForma"',
                'input[nombre]'=>array('required'=>'required'),
                'input[descripcion]'=>array('required'=>'required')
			   ); // Termina el array
HTML::forma($liga,'Registro de '.$tabla,$campos,$props,TRUE,$_GET);
echo "<br>\n\n";

// Formulario para modificar instancias
$props  = array('form'=>array('method'=>'POST', 'id'=>'formaModificar'), 'prefid'=>'algo',
  'input[nombre]'=>array('required'=>'required'));
$cual   = !empty($_POST['cual']) ? $_POST['cual'] : '';
$select = HTML::selector($liga, 1, array('select'=>array('name'=>'cual', 'id'=>'algocual'),
					 'option'=>array('value'=>'@[0]'),
					 "option@si('$cual'=='@[0]')"=>array('selected'=>'selected'))
	   );
$campos = array('cual'=>$select, '*', '-fecha');
HTML::forma($liga, 'Modificar '.$tabla, $campos, $props, true);
  
$cont = ob_get_clean();

//Estuctura el cuerpo de la página
HTML::cuerpo(array('cont'=>$cont));

?>
<br>
<script
  src="https://code.jquery.com/jquery-3.5.0.min.js"
  integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
  crossorigin="anonymous"> 	
</script>  	
<script src="App2.js"></script>
<?php
// Cierre de etiquetas HTML
HTML::pie();
?>
