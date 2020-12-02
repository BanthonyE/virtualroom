<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerArrendador extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('model_arrendador');
		$this->load->model('model_inmueble');
		$this->load->model('model_departamento');
		$this->load->model('model_usuario');

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

	public function index()
	{
		$dato_usuario = $this->dato_usuario;
		$datos['usuario']= $this->model_usuario->select_persona_usuario($dato_usuario['codigo_usuario']);
		$this->llamarpagina('pagina_principal', $datos);
	}

	public function llamarpagina($nombre_pagina, $datos)
	{
		$dato_usuario = $this->dato_usuario;

		$this->load->view('layout/menu', $dato_usuario);
		$this->load->view('layout/header', $dato_usuario);
		$this->load->view('arrendador/' . $nombre_pagina, $datos);
		$this->load->view('layout/footer');
	}

	public function view_registrar_inmueble()
	{


		$dato_tabla = 'T_DEPARTAMENTO';
		$dato_select['*'] = '*';
		$dato_general['dato_tabla'] = $dato_tabla;
		$dato_general['dato_select'] = $dato_select;

		$datos['departamento'] = $this->model_departamento->view_departamento($dato_general);

		$this->llamarpagina('pagina_registrar_inmueble', $datos);
	}

	public function view_modificar_inmueble()
	{

		$id = $_GET['id'];

		$dato_tabla = 'T_DEPARTAMENTO';
		$dato_select['*'] = '*';
		$dato_general['dato_tabla'] = $dato_tabla;
		$dato_general['dato_select'] = $dato_select;

		$datos['info'] = $this->model_inmueble->view_inmueble_distrio_provincia($id);
		$datos['departamento'] = $this->model_departamento->view_departamento($dato_general);
		$this->llamarpagina('pagina_registrar_inmueble', $datos);
	}

	public function add_inmueble()
	{

		$dato_tabla = 'T_INMUEBLE';

		$dato_insert['NOMB_INMUEBLE'] = $_POST["txtnomb_inmueble"];
		$dato_insert['PISO'] = $_POST["txtnumpisos"];
		$dato_insert['DIRECCION'] = $_POST["txtdireccion"];
		$dato_insert['NRO_DIRECCION'] = $_POST["txtnumdirec"];
		$dato_insert['NRO_HABITACIONES'] = $_POST["txtnumhab"];
		$dato_insert['NRO_BAÑOS'] = $_POST["txtnumbañ"];
		$dato_insert['METROS_CUADRADOS'] = $_POST["txtmetros"];
		$dato_insert['PRECIO_MES'] = $_POST["txtprecio"];
		$dato_insert['DESCRIP_INMUEBLE'] = $_POST["txtdescripcion"];
		$dato_insert['SERVICIOS_INMUEBLE'] = $_POST["txtservicios"];
		$dato_insert['ID_ARRENDADOR'] = $_POST["id_usuario"];
		$dato_insert['ID_DISTRITO'] = $_POST["cboDistrito"];

		$dato_general['dato_tabla'] = $dato_tabla;
		$dato_general['dato_insert'] = $dato_insert;

		if ($_POST["id_inmb"]!='') {

			$dato_where['ID_INMUEBLE'] = $_POST["id_inmb"];
			$dato_general['dato_where'] = $dato_where;
			$respuesta = $this->model_inmueble->edit_inmueble($dato_general);
		} else {
			$respuesta = $this->model_inmueble->add_inmueble($dato_general);
		}


		$this->view_registrar_inmueble();
	}
	public function view_lista_inmueble()
	{
		$dato_usuario = $this->dato_usuario;
		$dato_id_usuario = $dato_usuario['codigo_usuario'];

		$datos['inmueble'] = $this->model_inmueble->view_inmueble_distrio_arrendador($dato_id_usuario);
		$this->llamarpagina('pagina_lista_inmueble', $datos);
	}

	public function delete_inmueble()
	{
		$id = $_GET['id'];
		$dato_tabla = 'T_INMUEBLE';

		$dato_delete['ID_INMUEBLE'] = $id;

		$dato_general['dato_tabla'] = $dato_tabla;
		$dato_general['dato_delete'] = $dato_delete;

		$respuesta = $this->model_inmueble->delete_inmueble($dato_general);
		$this->view_lista_inmueble();
	}
}
