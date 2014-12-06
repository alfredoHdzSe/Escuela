<?php
require('seguridad.php');
require ('header.php');
require ('Materia.php');

$materia= new  Materia();

if(isset($_REQUEST['idmate']))
{
$id_materia=$_REQUEST['idmate'];
$id_maestro=$_REQUEST['idmaes'];

$materia->DeleteMateria($id_maestro,$id_materia);
$tabla=$materia->SeleccionaMaestro();
echo($tabla);
}
else{
	if(isset($_REQUEST['mateagregada']))
	{
		$id_materia=$_REQUEST['mateagregada'];
		$id_maestro=$_REQUEST['maestroagregada'];
		$materia->AgregaMateria($id_materia,$id_maestro);
		$tabla=$materia->SeleccionaMaestro();
		echo($tabla);
	}
	else{
		$tabla=$materia->SeleccionaMaestro();
		echo($tabla);
	}
}




// crear una division que se llame ajax, debe de ir antes o despues del formulario-->
echo"<div id='ajax'></div>";


//Crear el codigo de ejecucion de ajax-->
echo"<script type='text/javascript'>
$(function (e) {
	$('#maestro').submit(function (e) {
		e.preventDefault()
		$('#ajax').load('ajax.php?' + $('#maestro').serialize())
	})
})
</script>";


require ('footer.php');
?>