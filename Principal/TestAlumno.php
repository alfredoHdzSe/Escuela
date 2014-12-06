<?php
require('seguridad.php');
require ('DB.php');
require ('Alumno.php');

$alum= new Alumno();

$alumno = $alum -> ReadUserG();

echo($alumno);

?>