<!--script src="jquery.min.js"></script-->
<?php
require ('Materia.php');

$materia = new Materia();

$id_maestro=$_REQUEST['idmae'];

$datos=$materia->datosMaestro($id_maestro);
echo($datos);

$datosmateria=$materia->materiasAsignadas($id_maestro);
echo($datosmateria);

$datosAsignar=$materia->asignarMateriaMaestro($id_maestro);
echo($datosAsignar);
require ('footer.php');


?>