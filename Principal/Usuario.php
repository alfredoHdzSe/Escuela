<?php
/**
 * Created by PhpStorm.
 * User: ruth
 * Date: 17/09/14
 * Time: 07:34 PM
 */
//require ('DB.php');
######################################################
#####                                            #####
#####Asi se hace una consulta oreinatdo a objetos#####
#####                                            #####
######################################################

/*$sqldos="SELECT * FROM in_documentos_garantia";
$querydos=$conecta->query($sqldos); 

echo "<table>";


while($row=$querydos->fetch_assoc()) {
   echo "<tr>";
   foreach($row as $key => $value) {
      echo "<td>$value</td>"; 
   }
   echo "</tr>";

}
echo "</table>";*/

class Usuario {

    private $Id;
    private $Nombre;
    private $apellidoP;
    private $apellidoM;
    private $telefono;
    private $Calle;
    private $NumeroExterior;
    private $NumeroInterior;
    private $Colonia;
    private $Municipio;
    private $Estado;
    private $CP;
    private $Correo;
    private $Usuario;
    private $Contrasena;
    private $Nivel;
    private $Estatus;



public function CreateUser($nombreA,$app,$apm,$telefono,$calle,$exterior,$interior,$colonia,$municipio,$estado,$cp,$email,$user,$user,$tipo)
{
    $sql="INSERT INTO usuarios(Nombre,ApellidoP,ApellidoM,Telefono,Calle,NumExterior,NumInterior,Colonia,Municipio,Estado,Cp,Correo,Usuario,Contrasena,Nivel,Estatus)
		VALUE('$nombreA','$app','$apm',$telefono,'$calle',$exterior,$interior,'$colonia','$municipio','$estado',$cp,'$email','$user','$user',$tipo,'Activo')";
	$query=mysql_query($sql);
	//OPCIONAL SI QUIERES QUE TE MUESTRE MENSAJE 
	if($query){
		$cadena='Insertado';
	}
	else{
		$cadena='No Insertado';
	}
	return $cadena;
}

public function ReadUserG()
{
   $cadena="";
   
   $sql="SELECT * FROM usuarios ";
   $query=mysql_query($sql);
   $cuenta=mysql_num_rows($query);
   
   $cadena .="<table border='2' class='table table-striped'><tr><th>ID</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Nivel</th><th>Opciones</th></tr>";
   
    for($y=0;$y<$cuenta;$y++){
       $this->Id = mysql_result($query,$y,'id');
	   $this->Nombre = mysql_result($query,$y,'Nombre');
	   $this->ApellidoP = mysql_result($query,$y,'ApellidoP');
	   $this->ApellidoM = mysql_result($query,$y,'ApellidoM');
	   $this->Telefono = mysql_result($query,$y,'Telefono');
	   $this->Calle = mysql_result($query,$y,'Calle');
	   $this->NumeroExterior = mysql_result($query,$y,'NumExterior');
	   $this->NumeroInterior = mysql_result($query,$y,'NumInterior');
	   $this->Colonia = mysql_result($query,$y,'Colonia');
	   $this->Municipio = mysql_result($query,$y,'Municipio');
	   $this->Estado = mysql_result($query,$y,'Estado');
	   $this->CP = mysql_result($query,$y,'Cp');
	   $this->Correo = mysql_result($query,$y,'Correo');
	   $this->Usuario = mysql_result($query,$y,'Usuario');
	   $this->Contrasena = mysql_result($query,$y,'Contrasena');
	   $this->Nivel = mysql_result($query,$y,'Nivel');
	   $this->Estatus = mysql_result($query,$y,'Estatus');
	   	
		$cadena .="<tr><td>".$this->Id ."</td><td>".$this->Nombre ."</td><td>".$this->ApellidoP ."</td><td>".$this->ApellidoM ."</td><td>".$this->Nivel ."</td> <td><form name='eliminar".$y."' action='TestUsuario.php' method='post'><input type='hidden' name='idE' value=".$this->Id ."><input type='submit' name='submit' value='Eliminar' class='btn btn-sm btn-danger'></form> <form name='modificar".$y."' action='TestUsuario.php' method='post'><input type='hidden' name='idM' value=".$this->Id ."><input type='submit' name='submit' value='Modificar' class='btn btn-sm btn-default'></form></td></tr>";
    }

	$cadena .="</table>";
	
	return $cadena;
}

public function ReadUserE($id)
{
    $cadena="";
   
   $sql="SELECT * FROM usuarios where Nombre like '%$id%'";
   $query=mysql_query($sql);
   $cuenta=mysql_num_rows($query);
   
   $cadena .="<table border='2' class='table table-striped'><tr><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Nivel</th><th>Opciones</th></tr>";
   
    for($y=0;$y<$cuenta;$y++){
       $this->Id = mysql_result($query,$y,'id');
	   $this->Nombre = mysql_result($query,$y,'Nombre');
	   $this->ApellidoP = mysql_result($query,$y,'ApellidoP');
	   $this->ApellidoM = mysql_result($query,$y,'ApellidoM');
	   $this->Telefono = mysql_result($query,$y,'Telefono');
	   $this->Calle = mysql_result($query,$y,'Calle');
	   $this->NumeroExterior = mysql_result($query,$y,'NumExterior');
	   $this->NumeroInterior = mysql_result($query,$y,'NumInterior');
	   $this->Colonia = mysql_result($query,$y,'Colonia');
	   $this->Municipio = mysql_result($query,$y,'Municipio');
	   $this->Estado = mysql_result($query,$y,'Estado');
	   $this->CP = mysql_result($query,$y,'Cp');
	   $this->Correo = mysql_result($query,$y,'Correo');
	   $this->Usuario = mysql_result($query,$y,'Usuario');
	   $this->Contrasena = mysql_result($query,$y,'Contrasena');
	   $this->Nivel = mysql_result($query,$y,'Nivel');
	   $this->Estatus = mysql_result($query,$y,'Estatus');
	   	
		$cadena .="<tr><td>".$this->Nombre ."</td><td>".$this->ApellidoP ."</td><td>".$this->ApellidoM ."</td><td>".$this->Nivel ."</td><td><form name='eliminar".$y."' action='TestUsuario.php' method='post'> <input type='hidden' name='idE' value=".$this->Id ."><input type='submit' name='submit' value='Eliminar' class='btn btn-sm btn-danger'></form><form name='modificar".$y."' action='TestUsuario.php' method='post'> <input type='hidden' name='idM' value=".$this->Id ."><input type='submit' name='submit' value='Modificar' class='btn btn-sm btn-default'></form></td></tr>";
    }

	$cadena .="</table>";
	
	return $cadena;
}

public function UpdateUser($nombre,$app,$apm,$telefono,$calle,$exterior,$interior,$colonia,$municipio,$estado,$cp,$email,$user,$contra,$estatus,$id)
{
    $sql="Update usuarios set Nombre='$nombre', ApellidoP='$app', ApellidoM='$apm', Telefono=$telefono, Calle='$calle', NumExterior=$exterior, NumInterior=$interior, Colonia='$colonia', Municipio='$municipio', Estado='$estado', Cp=$cp, Correo='$email', Usuario='$user', Contrasena='$contra', Estatus='$estatus' WHERE id=$id";
   $query=mysql_query($sql);
   //OPCIONAL SI QUIERES QUE TE MUESTRE MENSAJE 
   if($query)
   {
	 echo $mensaje ="Modificado";
   }
   else{
	echo $mensaje ="NO Modificado";
   }
   
   
}

public function UpdateUserDatos($id)
{
   $cadena =" ";
   
  $sql="SELECT * FROM usuarios WHERE id=$id";
   $query=mysql_query($sql);
   $cuenta=mysql_num_rows($query);
   
   if($cuenta > 0)
   {
		$cadena .="<table class='table table-striped' width='height:3%'><tr>
					<th colspan='6' align='center' class='panel-title'> <span class='label label-default'>Datos Personales</span></th>
					</tr>";
		
		for($y=0;$y<$cuenta;$y++){
			
		   $this->Id = mysql_result($query,$y,'id');
		   $this->Nombre = mysql_result($query,$y,'Nombre');
		   $this->ApellidoP = mysql_result($query,$y,'ApellidoP');
		   $this->ApellidoM = mysql_result($query,$y,'ApellidoM');
		   $this->Telefono = mysql_result($query,$y,'Telefono');
		   $Calle = mysql_result($query,$y,'Calle');
		   $this->NumeroExterior = mysql_result($query,$y,'NumExterior');
		   $this->NumeroInterior = mysql_result($query,$y,'NumInterior');
		   $this->Colonia = mysql_result($query,$y,'Colonia');
		   $this->Municipio = mysql_result($query,$y,'Municipio');
		   $this->Estado = mysql_result($query,$y,'Estado');
		   $this->CP = mysql_result($query,$y,'Cp');
		   $this->Correo = mysql_result($query,$y,'Correo');
		   $this->Usuario = mysql_result($query,$y,'Usuario');
		   $this->Contrasena = mysql_result($query,$y,'Contrasena');
		   $this->Nivel = mysql_result($query,$y,'Nivel');
		   $this->Estatus = mysql_result($query,$y,'Estatus');
		   
		$cadena .="<tr><input type='hidden' name='id' value=".$this->Id .">
						<td>&nbsp;&nbsp;Nombre(s): </td><td><input type='text' name='nombreA' value='$this->Nombre'></td>
						<td>&nbsp;&nbsp;Apellido Paterno: </td><td><input type='text' name='appA' value='$this->ApellidoP'></td>
						<td>&nbsp;&nbsp;Apellido Materno: </td><td><input type='text' name='apmA' value='$this->ApellidoM'></td>
					</tr>";
        $cadena .="<tr>
						<td>&nbsp;&nbsp;Telefono: </td><td><input type='number' name='telefono' value='$this->Telefono'></td>
						<td>&nbsp;&nbsp;Calle: </td> <td><input type='text' name='calle' value='$Calle'></td>
						<td>&nbsp;&nbsp;Numero Exterior: </td> <td><input type='number' name='exterior' value='$this->NumeroExterior'></td>
					<tr>";
		$cadena .="<tr>
						<td>&nbsp;&nbsp;Numero Interior: </td> <td><input type='number' name='interior' value='$this->NumeroInterior'></td>
						<td>&nbsp;&nbsp;Colonia: </td> <td><input type='text' name='colonia' value='$this->Colonia'></td>
						<td>&nbsp;&nbsp;Municipio: </td> <td><input type='text' name='municipio' value='$this->Municipio'></td>
					</tr>";
		$cadena .="<tr>
						<td>&nbsp;&nbsp;Estado: </td> <td><input type='text' name='estado' value='$this->Estado'></td>
						<td>&nbsp;&nbsp;Codigo Postal: </td> <td><input type='number' name='cp' value='$this->CP'></td>
						<td>&nbsp;&nbsp;Correo: </td> <td><input type='email' name='email' value='$this->Correo'></td>
					</tr>";
		$cadena .=" <tr>
						<td>&nbsp;&nbsp;Usuario: </td> <td><input type='text' name='user' value='$this->Usuario'></td>
						<td>&nbsp;&nbsp;Contraseña: </td> <td><input type='text' name='contra' value='$this->Contrasena'></td>";
						/*<td>&nbsp;&nbsp;Nivel: </td>
						<td>
							<select name='tipo' value=".$this->Nivel .">
							<option value='1'>Administrador</option>
							<option value='2'>Maestro</option>
							<option value='3'>Alumno</option>
							</select>*/
		$cadena .=" <td>&nbsp;&nbsp;Estado: </td> <td><input type='text' name='estatus' value='$this->Estatus'></td> </td>
					</tr>";
					
                    
		}
					
		$cadena .="<tr><td colspan='6' align='center'><input type='submit' name='regresa' value='Regresar' class='btn btn-sm btn-default'>&nbsp;&nbsp;&nbsp;<input type='submit' name='submit' value='Modifica' class='btn btn-sm btn-default'></td></tr>";
		
		$cadena .="</table>";
   }
   else{
		
   }
   
   return $cadena;
}

public function DeleteUser($id)
{
   $sql="DELETE FROM usuarios WHERE id=$id";
   $query=mysql_query($sql);
   //OPCIONAL SI QUIERES QUE TE MUESTRE MENSAJE 
   if($query)
   {
	echo $cadena ="Eliminado";
   }
   else{
	echo $cadena ="NO Eliminado";
   }
   
   
}

}

?>