<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('LoginModel');
		$data['datos_pagina']['seccion'] = "login";
	}

	public function index() {
		$data['datos_pagina']['titulo_pagina'] = "Iniciar sesión";
		$this->load->view('login/login_view');
	}

	public function recuperar() {
		$this->load->view('login/recuperar_view');
	}

	public function validar() {
		$usuario = $this->input->post('usuario');
		$contrasenia = $this->input->post('contrasenia');
		$obj = $this->LoginModel->validar($usuario, $contrasenia);
		if($obj->resultado){
			$this->session->set_userdata("sesion_iniciada", TRUE);
			$this->session->set_userdata("usuario", $obj->usuario);
			redirect(base_url().'inicio/cotizador_ejemplo', 'refresh');
		}
		else{
			$this->session->set_flashdata('login_incorrecto', true);
			//$this->load->view('login/login_view');
			$this->session->set_userdata("sesion_iniciada", FALSE);
			redirect(base_url().'login', 'refresh');
		}
	}

	public function cerrar_sesion(){
		$this->session->sess_destroy();
		redirect(base_url().'login', 'refresh');
	}

}
