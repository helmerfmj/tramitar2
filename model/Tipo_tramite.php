<?php 
//Incluímos inicialmente la conexión a la base de datos
require_once "../config/Conexion.php";

Class Tipo_tramite
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT idtipo_tramite, tipo_tramitenombre, tipo_tramiteimportante, tipo_tramitetiempo, tipo_tramitecondicion FROM tipo_tramite ORDER BY tipo_tramitenombre DESC";
		return ejecutarConsulta($sql);		
	}

	//Implementamos un método para insertar registros
	public function insertar($nombre, $importante, $tiempo_total)
	{
		$validacion=$this->comprueba_duplicados($nombre,0);
		if($validacion==0){
			$sql="INSERT INTO tipo_tramite (tipo_tramitenombre, tipo_tramiteimportante, tipo_tramitetiempo, tipo_tramitecondicion)
			VALUES ('$nombre', '$importante', '$tiempo_total', '1')";
			return ejecutarConsulta($sql);
		}
		else{return 0;}
	}

	//Implementamos un método para editar registros
	public function editar($idtipo_tramite,$nombre, $importante, $tiempo_total)
	{
		$validacion=$this->comprueba_duplicados($nombre,$idtipo_tramite);
		if($validacion==0){
			$sql="UPDATE tipo_tramite SET tipo_tramitenombre='$nombre', tipo_tramiteimportante='$importante', tipo_tramitetiempo='$tiempo_total'  
			WHERE idtipo_tramite='$idtipo_tramite'";
			return ejecutarConsulta($sql);
		}
		else{return 0;}
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idtipo_tramite)
	{
		$sql="UPDATE tipo_tramite SET tipo_tramitecondicion='0' WHERE idtipo_tramite='$idtipo_tramite'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idtipo_tramite)
	{
		$sql="UPDATE tipo_tramite SET tipo_tramitecondicion='1' WHERE idtipo_tramite='$idtipo_tramite'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idtipo_tramite)
	{
		$sql="SELECT idtipo_tramite, tipo_tramitenombre, tipo_tramiteimportante, tipo_tramitetiempo, tipo_tramitecondicion FROM tipo_tramite WHERE idtipo_tramite='$idtipo_tramite'";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function select()
	{
		$sql="SELECT idtipo_tramite, tipo_tramitenombre FROM tipo_tramite 
		WHERE (tipo_tramitecondicion=1) ORDER BY tipo_tramitenombre ASC";
		return ejecutarConsulta($sql);		
	}

	//Implementar un método para listar los registros
	public function comprueba_duplicados($nombre,$id)
	{
		$resultado=0;
		$sql="SELECT COUNT(idtipo_tramite) AS idtipo_tramite FROM tipo_tramite WHERE (tipo_tramitenombre='$nombre') AND (idtipo_tramite<>$id)";
		$resultado = ejecutarConsultaSimpleFila($sql);
		return $resultado['idtipo_tramite'];		
	}

}

?>