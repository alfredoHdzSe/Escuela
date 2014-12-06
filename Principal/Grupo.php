<?php

class  Grupo{
    private $idGroup;
    private $nameGroup;

    public function comboGroup(){
        $sql01="SELECT * FROM grupos order by namegroup asc";
        $result01=mysql_query($sql01)or die("Error Combo Grupo: ".mysql_error());
        echo"<br>Grupos: <select name=groupo>";
            while($field = mysql_fetch_array($result01)){
            $id_group = $field['idgroup'];
            $opcion= ($field['idgroup'].") ".$field['namegroup']);
            echo "<option value=$id_group>$opcion</option>";
        }
echo"</select>";
    }

    public function insertAlumnoGroup($idAlumno,$idGroup){
        $sql02="insert into grupo_alumno (idgroup,idalumno) values ($idAlumno,$idGroup)";
        $result=mysql_query($sql02)or die("Error al insertar".mysql_error());
    }

    public function deleteAlumnoGroup ($id_Alumno,$id_grupo){
        $sqldelete="delete from grupo_alumno where idgroup=$id_grupo and idalumno=$id_Alumno ";
        $result=mysql_query($sqldelete)or die ("Error al eliminar   ".mysql_error());
    }
}