<?php 
//Incluímos inicialmente la conexión a la base de datos
require_once "../config/Conexion.php";

Class SubCategoria
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT s.idsubcategoria, s.subcategorianombre, s.subcategoriacondicion, c.categorianombre FROM subcategoria s, categoria c WHERE s.idcategoria=c.idcategoria ORDER BY subcategorianombre DESC";
		return ejecutarConsulta($sql);		
	}

	//Implementamos un método para insertar registros
	public function insertar($nombre,$categoria)
	{
		$validacion=$this->comprueba_duplicados($nombre,0);
		if($validacion==0){
			$sql="INSERT INTO subcategoria (subcategorianombre, idcategoria, subcategoriacondicion)
			VALUES ('$nombre','$categoria','1')";
			return ejecutarConsulta($sql);
		}
		else{return 0;}
	}

	//Implementamos un método para editar registros
	public function editar($idsubcategoria,$nombre,$categoria)
	{
		$validacion=$this->comprueba_duplicados($nombre,$idsubcategoria);
		if($validacion==0){
			$sql="UPDATE subcategoria SET subcategorianombre='$nombre', idcategoria='$categoria' 
			WHERE idsubcategoria='$idsubcategoria'";
			return ejecutarConsulta($sql);
		}
		else{return 0;}
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idsubcategoria)
	{
		$sql="UPDATE subcategoria SET subcategoriacondicion='0' WHERE idsubcategoria='$idsubcategoria'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idsubcategoria)
	{
		$sql="UPDATE subcategoria SET subcategoriacondicion='1' WHERE idsubcategoria='$idsubcategoria'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idsubcategoria)
	{
		$sql="SELECT idsubcategoria, subcategorianombre, idcategoria, subcategoriacondicion FROM subcategoria WHERE idsubcategoria='$idsubcategoria'";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function select()
	{
		$sql="SELECT idsubcategoria, subcategorianombre FROM subcategoria 
		WHERE (subcategoriacondicion=1) ORDER BY subcategorianombre ASC";
		return ejecutarConsulta($sql);		
	}

	//Implementar un método para listar los registros
	public function comprueba_duplicados($nombre,$id)
	{
		$resultado=0;
		$sql="SELECT COUNT(idsubcategoria) AS idsubcategoria FROM subcategoria WHERE (subcategorianombre='$nombre') AND (idsubcategoria<>$id)";
		$resultado = ejecutarConsultaSimpleFila($sql);
		return $resultado['idsubcategoria'];		
	}

}

?>