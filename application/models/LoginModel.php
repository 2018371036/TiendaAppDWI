<?php
class LoginModel extends CI_Model{

	public function validar($usuario, $contrasenia){
		$query = $this->db->query("SELECT usuario FROM usuarios WHERE usuario = '$usuario' AND contrasenia = MD5('$contrasenia')");
		if($query->num_rows() > 0) {
			$obj = $query->row();
			$obj->resultado = true;
		}
		else {
			$obj = Array();
			$obj->resultado = false;
		}
		return $obj;
	}
}


