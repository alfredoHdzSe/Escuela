<?php
require('DB.php');
class Materia {
    private $id;
    private $nombre;
    private $avatar;
    private $orden;
    private $estatus;
	
	
    public function createMateria (){
        
    }
	
	//agregar mAteria
	public function AgregaMateria($id_materia,$id_maestro){
        $sql="INSERT INTO maestromateria(id_maestro,id_materia) VALUES($id_maestro,$id_materia)";
		$query=mysql_query($sql);
    }
	
	//ELIMINAR mAteria
	public function DeleteMateria ($id_maestro,$id_materia){
        
		$sql="DELETE FROM maestromateria WHERE id_maestro=$id_maestro AND id_materia=$id_materia";
		$query=mysql_query($sql);
    }
	
	
    public function readMateriaG(){
        echo "<br>Busqueda Materia";
    }
    public function readMateriaS(){
        echo "<br> Busqueda Especifica";

    }
	
	
    public function SeleccionaMaestro(){
        $cadena="";
		
		$cadena .="<div class=table-responsive>";
        $cadena .="<form action='TestMateria.php' method='POST' name='maestro' id='maestro' target='_self'>
				<table class=\"table table-striped\">
				<tr><td>Maestro:</td>
				
				<td><select name='idmae'>";
        
        $sql="SELECT * FROM usuarios where Estatus='activo' and Nivel=2";
        $query=mysql_query($sql);
		$cuenta= mysql_num_rows($query);
        //OPCION
		//while($field = mysql_fetch_array($result02)){
		for($y=0;$y<$cuenta;$y++){
            $id_maestro = mysql_result($query,$y,'id');
			$nombre = mysql_result($query,$y,'Nombre');
			$apellidoP = mysql_result($query,$y,'ApellidoP');
			$apellidoM = mysql_result($query,$y,'ApellidoM');
            
            $cadena .="<option value='$id_maestro'> ".$id_maestro.")".$nombre." ".$apellidoP."  ".$apellidoM." </option>";

        }
        $cadena .="</select></td></tr>";
		
        $cadena .= "<tr><td colspan=2 align=center>
        <input type='submit' name='guardar' value='Seleccionar'></td></tr>";
        $cadena .= "</table></form></div>";
	
	return $cadena;
    }

    public function datosMaestro($id_maestro) {
	
		
        $cadena="";

        $sql= "SELECT * FROM usuarios where id= $id_maestro";
        $query =mysql_query($sql);
        $cuenta = mysql_num_rows($query);

        $cadena .="<div class='panel panel-default'>
            <div class='panel-heading'>
              <h3 class='panel-title'>Datos</h3>
            </div>
            <div class='panel-body'>
			<table border='3' class='table table-striped'><tr><th> Nombre </th><th> Apellido Paterno </th><th> Apellido Materno  </th></tr>";
        if($cuenta){

                for($y=0;$y<$cuenta;$y++){
                    $nombre=mysql_result($query,$y,'Nombre');
                    $APP=mysql_result($query,$y,'ApellidoP');
                    $APM=mysql_result($query,$y,'Apellidom');
                    $cadena .="<tr><td>$nombre</td><td>$APP</td><td>$APM</td></tr>";
                }

        }
        $cadena .="</tr></table></div>
          </div>";

        return $cadena;

    }
	
	 public function materiasAsignadas($id_maestro) {
		
        $cadena="";

        $sql= "SELECT * FROM maestromateria where id_maestro= $id_maestro";
        $query =mysql_query($sql);
        $cuenta = mysql_num_rows($query);

        $cadena .="<br><table class='table table-striped'><tr><th>Materias Asignadas </th><th>&nbsp;&nbsp;Acciones </th></tr>";
        if($cuenta){
				
                for($y=0;$y<$cuenta;$y++){
					
                    $idm = mysql_result($query,$y,'id_materia');

                    $sqldos="SELECT * FROM materias WHERE estatus='activo' AND id_materia= $idm ";
					$querydos = mysql_query($sqldos);
					$cuentados = mysql_num_rows($querydos);
					 for($x=0;$x<$cuentados;$x++){
						
						$nombre=mysql_result($querydos,$x,'nombremateria');
						$id_materia=mysql_result($querydos,$x,'id_materia');
						$cadena .="<tr><td><i>$nombre</i></td><td>&nbsp;&nbsp;<i>
						<form action='TestMateria.php' method='POST'  name='eliminar".$x."' >
						<input type='hidden' name='idmate' value='".$id_materia."' >
						<input type='hidden' name='idmaes' value='".$id_maestro."' >
						<input type='submit' name='delete' value='Eliminar'>
						</form></i></td></tr>";
					 }
                    
                }

        }
        $cadena .="</table>";
		
        return $cadena;

	}
	
	function asignarMateriaMaestro($id_maestro){
		
		$cadena="";

        $sql= "SELECT * FROM materias  WHERE estatus='activo' ORDER BY 1 ASC";
        $query =mysql_query($sql);
        $cuenta = mysql_num_rows($query);

        $cadena .="<br><form action='TestMateria.php' method='POST'  name='agrega' >
						<table class='table table-striped'><tr><th>Materias </th><th>&nbsp;&nbsp;Acciones </th></tr>
					<tr><td><i>Selecciona Materia</i></td><td>&nbsp;&nbsp;<i><select name='mateagregada' id='mateagregada'>";
        if($cuenta){

                for($y=0;$y<$cuenta;$y++){
					
                    $idm=mysql_result($query,$y,'id_materia');
					$nombre=mysql_result($query,$y,'nombremateria');

                    $sqldos="SELECT * FROM maestromateria WHERE id_maestro=$id_maestro AND id_materia=$idm";
					$querydos=mysql_query($sqldos);
					$existe=mysql_num_rows($querydos);
					 
					if($existe>0)
					{
					}
					else{
						//$cadena .="<tr><td><i>$nombre</i></td><td>&nbsp;&nbsp;<i>AGREGAR</i></td></tr>";
						$cadena .="<option value='".$idm."'>$nombre</option>";
					}
						
						
					 
                    
                }
		$cadena .="</select><input type='hidden' name='maestroagregada' value='".$id_maestro."' >
					&nbsp;&nbsp;<input type='submit' name='agregar' value='AGREGAR'></form></i></td></tr>";

        }
        $cadena .="</tr></table>";

        return $cadena;
	}

}
?>