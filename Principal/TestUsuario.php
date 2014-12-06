<?php
require('seguridad.php');
require("header.php");

require ('DB.php');
require('Usuario.php');
$usu = new Usuario();
if( @$_POST['submit'] == "Modificar"){
	
		$datos=$usu->UpdateUserDatos($_POST['idM']);
		echo"<div class='panel panel-success'>
			 <div class='panel-heading' >
				  <h3 class='panel-title'>Formulario Principal</h3>
				</div>
				<div class='panel-body' >
		<form name='alumnoModif' action='TestUsuario.php' method='post'>";
        echo($datos);
		echo"</form></div></div>";
	}
else{
	echo"<div> 
	<div class='panel panel-success'>
			 <div class='panel-heading' >
				  <h3 class='panel-title'>Formulario Principal</h3>
				</div>
				<div class='panel-body' >
            <form name='alumno' action='TestUsuario.php' method='post'>
                <table class='table table-striped' width='height:3%'>
					<tr>
						<th colspan='6' align='center' class='panel-title'> <span class='label label-default'>Datos Personales</span></th>
					</tr>
                    <tr>
						<td>&nbsp;&nbsp;Nombre(s): </td><td><input type='text' name='nombreA'></td>
						<td>&nbsp;&nbsp;Apellido Paterno: </td><td><input type='text' name='appA'></td>
						<td>&nbsp;&nbsp;Apellido Materno: </td><td><input type='text' name='apmA'></td>
					</tr>
                    <tr>
						<td>&nbsp;&nbsp;Telefono: </td><td><input type='number' name='telefono'></td>
						<td>&nbsp;&nbsp;Calle: </td> <td><input type='text' name='calle'></td>
						<td>&nbsp;&nbsp;Numero Exterior: </td> <td><input type='number' name='exterior'></td>
					<tr>
					<tr>
						<td>&nbsp;&nbsp;Numero Interior: </td> <td><input type='number' name='interior'></td>
						<td>&nbsp;&nbsp;Colonia: </td> <td><input type='text' name='colonia'></td>
						<td>&nbsp;&nbsp;Municipio: </td> <td><input type='text' name='municipio'></td>
					</tr>
						<td>&nbsp;&nbsp;Estado: </td> <td><input type='text' name='estado'></td>
						<td>&nbsp;&nbsp;Codigo Postal: </td> <td><input type='number' name='cp'></td>
						<td>&nbsp;&nbsp;Correo: </td> <td><input type='email' name='email'></td>
					</tr>
					<tr>
						<td>&nbsp;&nbsp;Usuario: </td> <td><input type='text' name='user'></td>
						<td>&nbsp;&nbsp;Contraseña: </td> <td><input type='password' name='contra'></td>
						<td>&nbsp;&nbsp;Nivel: </td>
						<td>
							<select name='tipo'>
							<option value='1'>Administrador</option>
							<option value='2'>Maestro</option>
							<option value='3'>Alumno</option>
							</select>
						</td>
					</tr>
					
                    <tr>
						<td colspan='6' align='center'><input type='submit' name='submit' value='Alta' class='btn btn-sm btn-default'></td>
					</tr>
					
					<tr>
						<th colspan='6' align='center' class='panel-title'><h4><span class='label label-default'>Buscar</span></h4> </th>
					</tr>
                    <tr> 
						<td colspan='3' align='center'>&nbsp;&nbsp;Teclea Nombre:</td>
						<td colspan='3' align='center'><input type='text' name='nombrebus'></td></tr>
					<tr>
						<td colspan='6' align='center'><input type='submit' name='submit' value='Buscar' class='btn btn-sm btn-default'></td>
					</tr>
					
                </table>

            </form>
			</div>

        </div></div>";
}	
//Pregunta si algun submit esta definido 	
if(isset($_POST['submit'])){
//si es correcto depende del caso 

    switch($_POST['submit']){
        case "Alta":
			
            $MENSAJE=$usu->CreateUser($_POST['nombreA'],$_POST['appA'],$_POST['apmA'],$_POST['telefono'],$_POST['calle'],$_POST['exterior'],$_POST['interior'],$_POST['colonia'],$_POST['municipio'],$_POST['estado'],$_POST['cp'],$_POST['email'],$_POST['user'],$_POST['contra'],$_POST['tipo']);
			
			ECHO($MENSAJE);
            break;
			
        case "Eliminar":
			
            $usu->DeleteUser($_POST['idE']);
            break;
			
		case "Modifica":
			
            $usu->UpdateUser($_POST['nombreA'],$_POST['appA'],$_POST['apmA'],$_POST['telefono'],$_POST['calle'],$_POST['exterior'],$_POST['interior'],$_POST['colonia'],$_POST['municipio'],$_POST['estado'],$_POST['cp'],$_POST['email'],$_POST['user'],$_POST['contra'],$_POST['estatus'],$_POST['id']);
            break;
        
        case "Buscar":
            if($_POST['nombrebus']==''){
                $tabla=$usu->ReadUserG();
            }else{
                $tabla=$usu->ReadUserE($_POST['nombrebus']);
				
            }
			echo"";
			echo($tabla);
			echo"</form>";
            break;
    }
}
else{
//Si no solo que no muestre nada 
    echo" ";
}



require("footer.php");
?>