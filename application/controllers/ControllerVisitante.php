<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerVisitante extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('model_visitante');
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
			redirect('Incio');
		}
	}

	public function index()
	{
		$datos = '';
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

	public function view_visitante()
	{
		$dato_usuario = $this->dato_usuario;
		$dato_id_usuario = $dato_usuario['codigo_usuario'];

		$datos['visitantes'] = $this->model_visitante->view_visitante_anuncio_arrendador($dato_id_usuario);

		$this->llamarpagina('pagina_lista_visitante', $datos);
	}

	public function edit_visitante()
	{
		$id = $_POST['codigo'];


		$dato_tabla = 'T_anuncio_visitante';
		$dato_update['ESTADO'] = 1;
		$dato_where['ID_VISITANTE'] = $id;


		$dato_general['dato_tabla'] = $dato_tabla;
		$dato_general['dato_update'] = $dato_update;
		$dato_general['dato_where'] = $dato_where;
		$respuesta = $this->model_visitante->edit_estado_visitante($dato_general);

		$this->view_visitante();
	}


	public function delete_visitante()
	{
		$id = $_GET['id'];

		$dato_tabla = 'T_ANUNCIO_VISITANTE';

		$dato_delete['ID_VISITANTE'] = $id;

		$dato_general['dato_tabla'] = $dato_tabla;
		$dato_general['dato_delete'] = $dato_delete;

		$respuesta = $this->model_visitante->delete_visitante_anuncio($dato_general);

		$this->view_visitante();
	}

	public function registro_interesados(){

		$id_inmueble = $_POST['id_inmueble'];
		$nombre_interesado = $_POST['nombre_interesado'];
		$telefono_interesado = $_POST['telefono_interesado'];
		$mensaje_interesado = $_POST['mensaje_interesado'];
		$correo_interesado = $_POST['correo_interesado'];


		$dato_tabla='T_VISITANTE';
		$dato_select['*']='*';
		$dato_where['CORREO_VISITANTE']=$correo_interesado;
		
		$dato_general['dato_select']=$dato_select;
		$dato_general['dato_where']=$dato_where;
		$dato_general['dato_tabla']=$dato_tabla;

		$correo = $this->model_visitante->repetir_visitante($dato_general);

        if ($correo->num_rows()==0) {
			$dato_where2['TELEF_VISITANTE']=$telefono_interesado;
			
			$dato_general2['dato_select']=$dato_select;
			$dato_general2['dato_where']=$dato_where2;
			$dato_general2['dato_tabla']=$dato_tabla;
	
			$telefono = $this->model_visitante->repetir_visitante($dato_general2);

			if ($telefono->num_rows()==0) {

				$dato_tabla2='T_VISITANTE';
				$dato_insert['NOMB_VISITANTE']=$nombre_interesado;
				$dato_insert['CORREO_VISITANTE']=$correo_interesado;
				$dato_insert['TELEF_VISITANTE']=$telefono_interesado;
				
				$dato_general3['dato_tabla']=$dato_tabla2;
				$dato_general3['dato_insert']=$dato_insert;

				$id_visitante = $this->model_visitante->add_visitante($dato_general3);

			}elseif($telefono->num_rows()==1){
				$telefono = $telefono->result();
				$id_visitante = $telefono[0]->ID_VISITANTE;

				$dato_update['NOMB_VISITANTE']=$nombre_interesado;
				$dato_update['CORREO_VISITANTE'] = $correo_interesado;

				$dato_general4['dato_update']=$dato_update;
				$dato_general4['dato_where']=$dato_where2;
				$dato_general4['dato_tabla']=$dato_tabla;

				$this->model_visitante->update_visitante($dato_general4);
			}

        }elseif($correo->num_rows()==1){
			$correo = $correo->result();
			$id_visitante = $correo[0]->ID_VISITANTE;

			$dato_update['NOMB_VISITANTE']=$nombre_interesado;
			$dato_update['TELEF_VISITANTE'] = $telefono_interesado;

			$dato_general5['dato_update']=$dato_update;
			$dato_general5['dato_where']=$dato_where;
			$dato_general5['dato_tabla']=$dato_tabla;

			$this->model_visitante->update_visitante($dato_general5);
        }

		$dato_tabla3='T_ANUNCIO_VISITANTE';
		$dato_insert2['ID_VISITANTE']= $id_visitante;
		$dato_insert2['ID_ANUNCIO']=$id_inmueble;
		$dato_insert2['DESCRIPCION']=$mensaje_interesado;

		$dato_general6['dato_tabla']=$dato_tabla3;
		$dato_general6['dato_insert']=$dato_insert2;

		$this->model_visitante->add_anuncio_visitante($dato_general6);
	}	
}
