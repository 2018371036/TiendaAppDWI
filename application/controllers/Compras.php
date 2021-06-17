<?php
class Compras extends CI_Controller{
	public function index(){
		echo "controlador de compras";
	}

	public function funcion_nueva() {
		echo "esta funcion es nueva";
	}
    
    public function vista_compras(){
        $this->load->view("compras/vista_compras");
    }
    
    public function vista_compras2(){
        $this->load->view("compras/vista_compras");
    } 
    
    public function borrar_datos(){
        echo "borrado";
    }
}
