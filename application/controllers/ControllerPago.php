<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerPago extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('model_contrato');
        $this->load->model('model_pago');
        $this->load->model('model_inmueble');

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
            redirect('ControllerUsuario');
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

	public function cargar_vista_documentos(){
        $id_arrendatario = $_POST['id_arrendatario'];
        $id_inmueble = $_POST['id_inmueble'];

        $dato_where['ID_VISITANTE']=$id_arrendatario;
        $dato_general['dato_where']=$dato_where;

        $this->load->model('model_arrendatario');
        $dato['arrendatario']= $this->model_arrendatario->obtener_arrendatario_inmueble($dato_general);

        $dato_tabla2='T_CONTRATO';
        $dato_select2['*']='*';
        $dato_where2['ID_ARRENDATARIO']=$id_arrendatario;
        $dato_where2['ID_INMUEBLE']=$id_inmueble;

        $dato_general2['dato_select']=$dato_select2;
        $dato_general2['dato_where']=$dato_where2;
        $dato_general2['dato_tabla']=$dato_tabla2;

        $dato['contrato']= $this->model_contrato->buscar_contrato($dato_general2);


        $dato_tabla3='T_PAGO';

        $dato_general3['dato_select']=$dato_select2;
        $dato_general3['dato_where']=$dato_where2;
        $dato_general3['dato_tabla']=$dato_tabla3;

        $this->load->model('model_pago');
        $dato['pagos']= $this->model_pago->buscar_pagos($dato_general3);
        
        $this->load->view('arrendador/paginas_ajax/vista_detalle_documento',$dato);
    }

	public function registrar_pagos(){
        $dato_usuario = $this->dato_usuario;
        $dato_id_usuario = $dato_usuario['codigo_usuario'];

        $id_inmueble = $_POST['id_inmueble'];
        $id_arrendatario = $_POST['id_arrendatario'];
        $txtdescripcion = $_POST['txtdescripcion'];
        $txtmonto = $_POST['txtmonto'];
        $txtfecha = $_POST['txtfecha'];

        $imgpago['name'] = $_FILES['imgpago']['name'];
        $imgpago['type'] = $_FILES['imgpago']['type'];
        $imgpago['tmp_name'] = $_FILES['imgpago']['tmp_name'];
        $imgpago['error'] = $_FILES['imgpago']['error'];
        $imgpago['size'] = $_FILES['imgpago']['size'];

        $uploadPath = 'uploads/pagos/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('imgpago');

        $dato_tabla2='T_PAGO';
        $dato_insert['NOMB_PAGO']=$imgpago['name'];
        $dato_insert['DESCRIP_PAGO']=$txtdescripcion;
        $dato_insert['MONTO_PAGO']=$txtmonto;
        $dato_insert['FECHA_PAGO']=$txtfecha;
        $dato_insert['ID_ARRENDATARIO']=$id_arrendatario;
        $dato_insert['ID_INMUEBLE']=$id_inmueble;

        $dato_general2['dato_insert']=$dato_insert;
        $dato_general2['dato_tabla']=$dato_tabla2;



        $this->model_pago->add_pago($dato_general2);

        $this->cargar_vista_documentos();
    }

    public function eliminar_pago(){
        
        $id_inmueble = $_POST['id_inmueble'];
        $id_arrendatario = $_POST['id_arrendatario'];

        $id_pago = $_POST['id_pago'];

        $dato_tabla='T_PAGO';
        $dato_delete['ID_PAGO']=$id_pago;

        $dato_general['dato_tabla']=$dato_tabla;
        $dato_general['dato_delete']=$dato_delete;

        $respuesta= $this->model_pago->delete_pago($dato_general);

        $this->cargar_vista_documentos();
    }

    public function edit(){

    }

    public function view(){

    }

}