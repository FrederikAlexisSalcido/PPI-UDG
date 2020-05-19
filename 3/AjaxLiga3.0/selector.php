
<?php 
// Cargamos LIGA3
require_once 'LIGA3/LIGA.php';

// Personalizo una conexión a la base de datos (servidor, usuario, contraseña, schema)
BD('localhost', 'root', '', 'AppTareas');
 
// Configuramos la entidad a usar
$tabla = 'Tareas';
$liga  = LIGA($tabla,'order by nombre');

$props  = array('form'=>array('method'=>'POST', 'id'=>'formaModificar'), 'prefid'=>'algo',
	  'input[nombre]'=>array('required'=>'required'));
 $cual   = !empty($_GET['cual']) ? $_GET['cual'] : '';
 $select = HTML::selector($liga, 1, array('select'=>array('name'=>'cual', 'id'=>'algocual'),
						 'option'=>array('value'=>'@[0]'),
						 "option@si('$cual'=='@[0]')"=>array('selected'=>'selected')), true, false);
// Enviamos la respuesta geenrada desde el servidor al cliente 						 
 echo $select;
 ?>