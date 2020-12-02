<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerProvincia extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('model_provincia');
		$this->load->model('model_distrito');

		$this->dato_usuario = array(
			'foto_usuario' => $this->session->userdata('foto_usuario'),
			'codigo_usuario' => $this->session->userdata('codigo_usuario'),
			'nombre_usuario' => $this->session->userdata('nombre_usuario'),
			'tipo_usuario' => $this->session->userdata('tipo_usuario'),
			'estado_usuario' => $this->session->userdata('estado_usuario')
		);

		if ($this->session->userdata('foto_usuario') == NULL) {
			$this->dato_usuario['foto_usuario'] = "avatar.jpg";
		}
		if (!$this->session->userdata('nombre_usuario')) {
			redirect('Inicio');
		}
	}

	public function llamarpagina($nombre_pagina, $datos)
	{
		$dato_usuario = $this->dato_usuario;
		$this->load->view('layout/menu', $dato_usuario);
		$this->load->view('layout/header', $dato_usuario);
		$this->load->view('arrendador/' . $nombre_pagina, $datos);
		$this->load->view('layout/footer');
	}


	//METODOS DIA DOMINGO

	public function view_provincia()
	{

		$depat = $_POST['depat'];

		$dato_tabla = 'T_PROVINCIA';

		$dato_select['*'] = '*';

		$dato_where['ID_DEPARTAMENTO'] = $depat;

		$dato_general['dato_select'] = $dato_select;
		$dato_general['dato_where'] = $dato_where;
		$dato_general['dato_tabla'] = $dato_tabla;

		$datos = $this->model_provincia->view_provincia($dato_general);


		$values = '';

		foreach ($datos as $prov) {
			//$prov->ID_PROVINCIA "><?= $prov->NOMB_PROVINCIA 
			$values .= '<option value=' . $prov->ID_PROVINCIA . '>' . $prov->NOMB_PROVINCIA . '</option>';
		}

		echo $values;
	}

	public function view_distrito()
	{

		$depat = $_POST['depat'];

		$dato_tabla = 'T_DISTRITO';

		$dato_select['*'] = '*';

		$dato_where['ID_PROVINCIA'] = $depat;

		$dato_general['dato_select'] = $dato_select;
		$dato_general['dato_where'] = $dato_where;
		$dato_general['dato_tabla'] = $dato_tabla;

		$datos = $this->model_distrito->view_distrito($dato_general);
		$values = '';

		foreach ($datos as $prov) {
			//$prov->ID_PROVINCIA "><?= $prov->NOMB_PROVINCIA 
			$values .= '<option value=' . $prov->ID_DISTRITO . '>' . $prov->NOMB_DISTRITO . '</option>';
		}

		echo $values;
	}
}
