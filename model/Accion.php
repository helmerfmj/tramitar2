<?php 
//Incluímos inicialmente la conexión a la base de datos
require_once "../config/Conexion.php";

Class Accion
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT idaccion, accionnombre, accioncondicion FROM accion ORDER BY accionnombre DESC";
		return ejecutarConsulta($sql);		
	}

	//Implementamos un método para insertar registros
	public function insertar($nombre)
	{
		$validacion=$this->comprueba_duplicados($nombre,0);
		if($validacion==0){
			$sql="INSERT INTO accion (accionnombre, accioncondicion)
			VALUES ('$nombre','1')";
			return ejecutarConsulta($sql);
		}
		else{return 0;}
	}

	//Implementamos un método para editar registros
	public function editar($idaccion,$nombre)
	{
		$validacion=$this->comprueba_duplicados($nombre,$idaccion);
		if($validacion==0){
			$sql="UPDATE accion SET accionnombre='$nombre' 
			WHERE idaccion='$idaccion'";
			return ejecutarConsulta($sql);
		}
		else{return 0;}
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idaccion)
	{
		$sql="UPDATE accion SET accioncondicion='0' WHERE idaccion='$idaccion'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idaccion)
	{
		$sql="UPDATE accion SET accioncondicion='1' WHERE idaccion='$idaccion'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idaccion)
	{
		$sql="SELECT idaccion, accionnombre, accioncondicion FROM accion WHERE idaccion='$idaccion'";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function select()
	{
		$sql="SELECT idaccion, accionnombre FROM accion 
		WHERE (accioncondicion=1) ORDER BY accionnombre ASC";
		return ejecutarConsulta($sql);		
	}

	//Implementar un método para listar los registros
	public function comprueba_duplicados($nombre,$id)
	{
		$resultado=0;
		$sql="SELECT COUNT(idaccion) AS idaccion FROM accion WHERE (accionnombre='$nombre') AND (idaccion<>$id)";
		$resultado = ejecutarConsultaSimpleFila($sql);
		return $resultado['idaccion'];		
	}

}

?>