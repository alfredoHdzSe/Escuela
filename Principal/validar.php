<?php

include ('incripta.php');


$usuario=mysql_real_escape_string(@$_POST['user']);
$psw=mysql_real_escape_string(@$_POST['password']);

if($usuario==" " or $psw==" ")
{
    $msg="Favor de llenar los campos";
    print "<meta http-equiv='refresh' content='0;url=index.php?msg=$msg'>";
    exit;
}

if($usuario == NULL or $psw == NULL)
{
    $msg="Favor de llenar los campos";
    print "<meta http-equiv='refresh' content='0;url=index.php?msg=$msg'>";
    exit;
}

include('DB.php');
$sql="Select * from usuarios where Usuario='$usuario' AND Contrasena='$psw'";

$consulta=mysql_query($sql) or die("Error de consulta".mysql_error());

$cuantos=mysql_num_rows($consulta);
if($cuantos==0)
{
    $msg="El Usuario o Paswword no son validos";
    print "<meta http-equiv='refresh' content='0;url=index.php?msg=$msg'>";
}
else
{	
	$idu=mysql_result($consulta,0,'id');
	$activo=mysql_result($consulta,0,'Estatus');
	
	//if($activo==1 ){
	if($activo=='Activo' ){
		
		$in =encode_this("jcjhmm=$idu");
		$basura="a32432#$#$#2a1d2asd1?";
		
		$ruta= $basura.$in;
		require('Accesos.php');
		$entrar = new Accesos();
		$entrar->GeneraAcceso($ruta);
		
		//print"<meta http-equiv='refresh' content='0;url=accesos.php?".$in."'>";
	}
	ELSE{
		$msg="El usuario no se encuentra activo favor de comunicarse con el administrador	";
		print "<meta http-equiv='refresh' content='0;url=index.php?msg=$msg'>";
		exit;
	}
    

    
    

}
?>