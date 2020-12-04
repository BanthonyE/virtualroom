<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inicio extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_anuncio');
		$this->load->model('model_fotos');
		$this->load->model('model_visitante');
	}

	public function index()
	{

		$dato_tabla = 'T_ANUNCIO';
		$dato_select['*'] = '*';
		$dato_where['ESTADO_ANUNCIO'] = '1';

		$dato_general['dato_select'] = $dato_select;
		$dato_general['dato_tabla'] = $dato_tabla;
		$dato_general['dato_where'] = $dato_where;

		$dato['anuncio'] = $this->model_anuncio->get_list($dato_general);

		$this->load->view('layout/header_public');
		$this->load->view('pages_public/home', $dato);
		$this->load->view('layout/footer_public');
	}
	public function vista_login()
	{
		$this->session->sess_destroy();
		$this->load->view('login_admin');
	}

	public function vista_inicio()
	{
		$this->llamarpagina_visitante('home', '', 'sin banner', 'sin mensaje');
	}

	public function vista_nosotros()
	{
		$this->llamarpagina_visitante('about', '', 'Nosotros', 'sin mensaje');
	}

	public function vista_ayuda()
	{
		$this->llamarpagina_visitante('help', '', 'Ayuda', 'sin mensaje');
	}

	public function vista_contactenos()
	{
		$this->llamarpagina_visitante('contact', '', 'Contáctenos', 'sin mensaje');
	}

	public function vista_condiciones()
	{
		$this->llamarpagina_visitante('terminos-condiciones', '', 'Términos y condiciones', 'sin mensaje');
	}

	public function llamarpagina_visitante($nombre_pagina, $datos, $dato_banner, $mensaje_error)
	{

		$this->load->view('layout/header_public');

		if ($dato_banner != 'sin banner') {
			$banner['datos_banner'] = $dato_banner;
			$this->load->view('layout/banner_public', $banner);
		}
		$this->load->view('pages_public/' . $nombre_pagina, $datos);
		if ($mensaje_error != 'sin mensaje') {
			$mensaje_error['mensaje'] = $dato_banner;
			$this->load->view('layout/footer_public', $mensaje_error);
		} else {
			$this->load->view('layout/footer_public');
		}
	}

	public function listado_anuncios()
	{

		$dato_tabla = 'T_ANUNCIO';
		$dato_select['*'] = '*';
		$dato_where['ESTADO_ANUNCIO'] = '1';

		$dato_general['dato_select'] = $dato_select;
		$dato_general['dato_tabla'] = $dato_tabla;
		$dato_general['dato_where'] = $dato_where;

		$dato['anuncio'] = $this->model_anuncio->get_list($dato_general);
		$this->llamarpagina_visitante('anuncios', $dato, 'Anuncios', 'sin mensaje');
	}

	public function detalle_anuncio()
	{
		$id_anuncio = $_POST['btnDetalle'];

		$dato_tabla = 'T_ANUNCIO';
		$dato_select['*'] = '*';
		$dato_where['ID_ANUNCIO'] = $id_anuncio;

		$dato_general['dato_select'] = $dato_select;
		$dato_general['dato_where'] = $dato_where;
		$dato_general['dato_tabla'] = $dato_tabla;

		$dato['anuncio'] = $this->model_anuncio->get_detalle_anuncio($dato_general);

		$valoracion = $this->model_anuncio->get_valoracion($id_anuncio);
		
		$resultado_valoracion_dividendo = ($valoracion[0]->VALOR_UNO)*1 + ($valoracion[0]->VALOR_DOS)*2 + ($valoracion[0]->VALOR_TRES)*3 + ($valoracion[0]->VALOR_CUATRO)*4 + ($valoracion[0]->VALOR_CINCO)*5;
		$resultado_valoracion_divisor = $valoracion[0]->VALOR_UNO + $valoracion[0]->VALOR_DOS + $valoracion[0]->VALOR_TRES + $valoracion[0]->VALOR_CUATRO + $valoracion[0]->VALOR_CINCO;
		if($resultado_valoracion_divisor == 0){
			$resultado_valoracion = 0;
		}else{
			$resultado_valoracion = $resultado_valoracion_dividendo/$resultado_valoracion_divisor;
		}
		$dato['resultado_valoracion'] = (int)$resultado_valoracion;

		$dato_tabla2 = 'T_FOTO_INMUEBLE';
		$dato_select2['*'] = '*';
		$dato_where2['ID_INMUEBLE'] = $dato['anuncio'][0]->ID_INMUEBLE;

		$dato_general2['dato_select'] = $dato_select2;
		$dato_general2['dato_where'] = $dato_where2;
		$dato_general2['dato_tabla'] = $dato_tabla2;
		$dato['fotos'] = $this->model_fotos->buscar_fotos($dato_general2);


		$dato_tabla3 = 'T_ANUNCIO';
		$dato_select3['*'] = '*';
		$dato_where3['ESTADO_ANUNCIO'] = '1';

		$dato_general3['dato_select'] = $dato_select3;
		$dato_general3['dato_tabla'] = $dato_tabla3;
		$dato_general3['dato_where'] = $dato_where3;

		$dato['lista_anuncios'] = $this->model_anuncio->get_list($dato_general3);
		$this->load->model('model_distrito');
		$dato['distrito'] = $this->model_distrito->get_distrito();

		$this->llamarpagina_visitante('descripcion_anuncio', $dato, 'sin banner', 'sin mensaje');
	}


	public function registro_interesados()
	{

		$id_inmueble = $_POST['id_inmueble'];
		$nombre_interesado = $_POST['nombre_interesado'];
		$telefono_interesado = $_POST['telefono_interesado'];
		$mensaje_interesado = $_POST['mensaje_interesado'];
		$correo_interesado = $_POST['correo_interesado'];


		$dato_tabla = 'T_VISITANTE';
		$dato_select['*'] = '*';
		$dato_where['CORREO_VISITANTE'] = $correo_interesado;

		$dato_general['dato_select'] = $dato_select;
		$dato_general['dato_where'] = $dato_where;
		$dato_general['dato_tabla'] = $dato_tabla;

		$correo = $this->model_visitante->repetir_visitante($dato_general);

		if ($correo->num_rows() == 0) {
			$dato_where2['TELEF_VISITANTE'] = $telefono_interesado;

			$dato_general2['dato_select'] = $dato_select;
			$dato_general2['dato_where'] = $dato_where2;
			$dato_general2['dato_tabla'] = $dato_tabla;

			$telefono = $this->model_visitante->repetir_visitante($dato_general2);

			if ($telefono->num_rows() == 0) {

				$dato_tabla2 = 'T_VISITANTE';
				$dato_insert['NOMB_VISITANTE'] = $nombre_interesado;
				$dato_insert['CORREO_VISITANTE'] = $correo_interesado;
				$dato_insert['TELEF_VISITANTE'] = $telefono_interesado;

				$dato_general3['dato_tabla'] = $dato_tabla2;
				$dato_general3['dato_insert'] = $dato_insert;

				$id_visitante = $this->model_visitante->add_visitante($dato_general3);
			} elseif ($telefono->num_rows() == 1) {
				$telefono = $telefono->result();
				$id_visitante = $telefono[0]->ID_VISITANTE;

				$dato_update['NOMB_VISITANTE'] = $nombre_interesado;
				$dato_update['CORREO_VISITANTE'] = $correo_interesado;

				$dato_general4['dato_update'] = $dato_update;
				$dato_general4['dato_where'] = $dato_where2;
				$dato_general4['dato_tabla'] = $dato_tabla;

				$this->model_visitante->edit_estado_visitante($dato_general4);
			}
		} elseif ($correo->num_rows() == 1) {
			$correo = $correo->result();
			$id_visitante = $correo[0]->ID_VISITANTE;

			$dato_update['NOMB_VISITANTE'] = $nombre_interesado;
			$dato_update['TELEF_VISITANTE'] = $telefono_interesado;

			$dato_general5['dato_update'] = $dato_update;
			$dato_general5['dato_where'] = $dato_where;
			$dato_general5['dato_tabla'] = $dato_tabla;

			$this->model_visitante->edit_estado_visitante($dato_general5);
		}

		$dato_tabla3 = 'T_ANUNCIO_VISITANTE';
		$dato_insert2['ID_VISITANTE'] = $id_visitante;
		$dato_insert2['ID_ANUNCIO'] = $id_inmueble;
		$dato_insert2['DESCRIPCION'] = $mensaje_interesado;

		$dato_general6['dato_tabla'] = $dato_tabla3;
		$dato_general6['dato_insert'] = $dato_insert2;

		$this->model_visitante->add_anuncio_visitante($dato_general6);
	}


	public function enviar_email()
	{

		$txtnombre = $_POST['txtnombre'];
		$txtemail = $_POST['txtemail'];
		$txtcontacto = $_POST['txtcontacto'];
		$txtmensaje = $_POST['txtmensaje'];

		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.googlemail.com',
			'smtp_user' => 'virtual.room10@gmail.com', //Su Correo de Gmail Aqui
			'smtp_pass' => 'Virtualroom.123', // Su Password de Gmail aqui
			'smtp_port' => '465',
			'smtp_crypto' => 'ssl',
			'mailtype' => 'html',
			'wordwrap' => TRUE,
			'charset' => 'utf-8'
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from($txtemail);
		$this->email->subject('Consulta Inmuebles');
		$this->email->message('Nombre:' . $txtnombre . ' Celular de Contacto: ' . $txtcontacto . ' Mensaje: ' . $txtmensaje);
		$this->email->to('virtual.room10@gmail.com');
		if ($this->email->send(FALSE)) {

			$banner['datos_banner'] = "Contáctenos";
			$mensaje_error['mensaje'] = "Mesnaje enviado Correctamente";
		} else {

			$banner['datos_banner'] = "Contáctenos";
			$mensaje_error['mensaje'] = "El mensaje no se pudo enviar correctamente, Inténtelo más tarde.";
		}

		$this->load->view('layout/header_public');
		$this->load->view('layout/banner_public', $banner);
		$this->load->view('pages_public/contact');
		$this->load->view('layout/footer_public', $mensaje_error);
	}
    public function valorar_anuncio(){
        $puntuacion = $_POST['puntuacion'];
        $id_anuncio = $_POST['id_anuncio'];

        $dato_tabla='T_VALORACION';

        if($puntuacion == 1){
            $dato_update = 'VALOR_UNO';
		}elseif($puntuacion == 2){
            $dato_update ='VALOR_DOS';
        }elseif($puntuacion == 3){
            $dato_update ='VALOR_TRES';
        }elseif($puntuacion == 4){
            $dato_update ='VALOR_CUATRO';
        }elseif($puntuacion == 5){
            $dato_update ='VALOR_CINCO';
        }
        $dato_where['ID_ANUNCIO']=$id_anuncio;
        
        $dato_general['dato_tabla']=$dato_tabla;
        $dato_general['dato_update']=$dato_update;
		$dato_general['dato_where']=$dato_where;
		
        $respuesta= $this->model_anuncio->update_valoracion($dato_general);        
    }
}
