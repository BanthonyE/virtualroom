<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerArrendatario extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('model_arrendatario');
        $this->load->model('model_visitante');
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
		$this->llamarpagina('arrendador/pagina_principal', $datos);
	}

    public function llamarpagina($nombre_pagina, $datos)
    {
        $dato_usuario = $this->dato_usuario;
        $this->load->view('layout/menu', $dato_usuario);
        $this->load->view('layout/header', $dato_usuario);
        $this->load->view('' . $nombre_pagina, $datos);
        $this->load->view('layout/footer');
    }


    public function view_add_arrendatario()
    {
        $id = $_GET['id'];
        $dato_tabla = 'TIPO_DOCUMENTO';
        $dato_select['*'] = '*';
        $dato_general['dato_tabla'] = $dato_tabla;
        $dato_general['dato_select'] = $dato_select;

        $datos['info'] = $this->model_arrendatario->consulta_documento($dato_general);

        $datos['visitante'] = $this->model_arrendatario->view_uno_visitante_anuncio_arrendador($id);

        $this->llamarpagina('arrendador/pagina_registrar_visitante', $datos);
    }


    public function view_edit_arrendatario()
    {
        $id = $_GET['id'];

        $dato_tabla = 'TIPO_DOCUMENTO';
        $dato_select['*'] = '*';
        $dato_general['dato_tabla'] = $dato_tabla;
        $dato_general['dato_select'] = $dato_select;

        $datos['info'] = $this->model_arrendatario->consulta_documento($dato_general);

        $datos['arrendatario'] = $this->model_arrendatario->view_uno_arrendatario_arrendador($id);

        $this->llamarpagina('arrendador/pagina_registrar_visitante', $datos);
    }
    public function add_grabar_arrendatario()
    {

        $dato_usuario = $this->dato_usuario;
        $dato_id_usuario = $dato_usuario['codigo_usuario'];


        $dato['ID_VISITANTE'] = $_POST["txtidvisitante"]; //Nose si se uso :v
        $id_usuario = $_POST["txtidvisitante"];
        $edit = $_POST["txtedit"];

        $idpersona = $_POST["txtidpersona"];

        if ($edit == 0) {

            $dato_tabla = 'T_PERSONA';

            $dato_insert['NOMB_PERSONA'] = $_POST["txtnombre"];
            $dato_insert['APE_PERSONA'] = $_POST["txtapellido"];
            $dato_insert['NRO_DOCUMENTO'] = $_POST["txtdni"];
            $dato_insert['NOMB_FOTO'] = 'avatar.jpg';
            $dato_insert['SEXO'] = $_POST["cbosexo"];
            $dato_insert['CELULAR'] = $_POST["txtcel"];
            $dato_insert['DIRECCION'] = $_POST["txtdireccion"];
            $dato_insert['EMAIL'] = $_POST["txtemail"];
            $dato_insert['ID_TIPODOCUMENTO'] = $_POST["cbotipo_documento"];

            $dato_general['dato_tabla'] = $dato_tabla;
            $dato_general['dato_insert'] = $dato_insert;

            $respuesta = $this->model_arrendatario->add_arrendatario($dato_general);


            $dato_tabla2 = 'T_USUARIO_REGISTRADO';

            $dato_insert2['NOMB_USUARIO'] = $_POST["txtusu"];
            $dato_insert2['PASS_USUARIO'] = $_POST["txtpass"];
            $dato_insert2['ESTADO_USUARIO'] = 'HABILITADO';
            $dato_insert2['ID_PERSONA'] = $respuesta;
            $dato_insert2['ID_TIPOUSUARIO'] = '3';

            $dato_general2['dato_insert'] = $dato_insert2;
            $dato_general2['dato_tabla'] = $dato_tabla2;

            $respuesta2 = $this->model_arrendatario->add_arrendatario($dato_general2);





            $dato_tabla3 = 'T_DEPA_VISITANTE';

            $dato_insert3['ID_VISITANTE'] = $respuesta2;
            $dato_insert3['ID_DEPARTAMENTO'] = $_POST["txtidinmueble"];
            $dato_insert3['ID_ARRENDADOR'] = $dato_id_usuario;


            $dato_general3['dato_insert'] = $dato_insert3;
            $dato_general3['dato_tabla'] = $dato_tabla3;

            $respuesta3 = $this->model_arrendatario->add_arrendatario($dato_general3);
        } else {
            $dato_tabla = 'T_PERSONA';

            $dato_update['NOMB_PERSONA'] = $_POST["txtnombre"];
            $dato_update['APE_PERSONA'] = $_POST["txtapellido"];
            $dato_update['NRO_DOCUMENTO'] = $_POST["txtdni"];
            $dato_update['NOMB_FOTO'] = 'avatar.jpg';
            $dato_update['SEXO'] = $_POST["cbosexo"];
            $dato_update['CELULAR'] = $_POST["txtcel"];
            $dato_update['DIRECCION'] = $_POST["txtdireccion"];
            $dato_update['EMAIL'] = $_POST["txtemail"];
            $dato_update['ID_TIPODOCUMENTO'] = $_POST["cbotipo_documento"];

            $dato_where['ID_PERSONA'] = $idpersona;

            $dato_general['dato_tabla'] = $dato_tabla;
            $dato_general['dato_update'] = $dato_update;
            $dato_general['dato_where'] = $dato_where;

            $respuesta = $this->model_arrendatario->edit_arrendatario($dato_general);


            $dato_tabla2 = 'T_USUARIO_REGISTRADO';

            $dato_update2['NOMB_USUARIO'] = $_POST["txtusu"];
            $dato_update2['PASS_USUARIO'] = $_POST["txtpass"];
            $dato_update2['ESTADO_USUARIO'] = 'HABILITADO';
            $dato_update2['ID_PERSONA'] = $idpersona;
            $dato_update2['ID_TIPOUSUARIO'] = '3';

            $dato_where2['ID_USUARIO'] = $id_usuario;

            $dato_general2['dato_tabla'] = $dato_tabla2;
            $dato_general2['dato_update'] = $dato_update2;
            $dato_general2['dato_where'] = $dato_where2;

            $respuesta2 = $this->model_arrendatario->edit_arrendatario($dato_general2);
        }
        $this->view_arrendatario();
    }

    public function view_visitante()
    {
        $dato_usuario = $this->dato_usuario;
        $dato_id_usuario = $dato_usuario['codigo_usuario'];

        $datos['visitantes'] = $this->model_visitante->view_visitante_anuncio_arrendador($dato_id_usuario);

        $this->llamarpagina('arrendador/pagina_lista_visitante', $datos);
    }


    public function view_arrendatario()
    {
        $dato_usuario = $this->dato_usuario;
        $dato_id_usuario = $dato_usuario['codigo_usuario'];

        $datos['arrendatarios'] = $this->model_arrendatario->view_arrendatario_persona_arrendador($dato_id_usuario);
        $this->llamarpagina('arrendador/pagina_lista_arrendatarios', $datos);
    }
    public function edit_deshabilitar()
    {
        $dato = $_POST['codigo'];
        $dato_tabla = 'T_USUARIO_REGISTRADO';

        $dato_update['ESTADO_USUARIO'] = 'DESHABILITADO';

        $dato_where['ID_USUARIO'] = $dato;

        $dato_general['dato_tabla'] = $dato_tabla;
        $dato_general['dato_update'] = $dato_update;
        $dato_general['dato_where'] = $dato_where;

        $respuesta = $this->model_arrendatario->edit_estado_arrendatario_deshab($dato_general);
    }
    public function edit_habilitar()
    {
        $dato = $_POST['codigo'];
        $dato_tabla = 'T_USUARIO_REGISTRADO';

        $dato_update['ESTADO_USUARIO'] = 'HABILITADO';

        $dato_where['ID_USUARIO'] = $dato;

        $dato_general['dato_tabla'] = $dato_tabla;
        $dato_general['dato_update'] = $dato_update;
        $dato_general['dato_where'] = $dato_where;

        $respuesta = $this->model_arrendatario->edit_estado_arrendatario_hab($dato_general);
    }
    public function delete_arrendatario()
    {
        $dato = $_GET['id'];

        $dato_tabla = 'T_USUARIO_REGISTRADO';

        $dato_select['ID_PERSONA'] = 'ID_PERSONA';

        $dato_where['ID_USUARIO'] = $dato;

        $dato_general['dato_select1'] = $dato_select;
        $dato_general['dato_where1'] = $dato_where;
        $dato_general['dato_tabla1'] = $dato_tabla;

        $resultado = $this->model_arrendatario->buscar_arrendatario($dato_general);
        $respuesta = $resultado[0]->ID_PERSONA;

        $dato_tabla1 = 'T_USUARIO_REGISTRADO';

        $dato_delete1['ID_USUARIO'] = $dato;

        $dato_general1['dato_tabla'] = $dato_tabla1;
        $dato_general1['dato_delete'] = $dato_delete1;

        $this->model_arrendatario->delete_arrendatario($dato_general1);


        $dato_tabla3 = 'T_DEPA_VISITANTE';

        $dato_delete3['ID_VISITANTE'] = $dato;

        $dato_generaL3['dato_tabla'] = $dato_tabla3;
        $dato_generaL3['dato_delete'] = $dato_delete3;

        $this->model_arrendatario->delete_arrendatario($dato_generaL3);


        $dato_tabla2 = 'T_PERSONA';

        $dato_delete2['ID_PERSONA'] = $respuesta;

        $dato_general2['dato_tabla'] = $dato_tabla2;
        $dato_general2['dato_delete'] = $dato_delete2;

        $this->model_arrendatario->delete_arrendatario($dato_general2);

        $this->view_arrendatario();
    }

    public function cargar_arrendatario(){

        $id_inmueble = $_POST['id_inmueble'];
        
		$dato_tabla = 'T_DEPA_VISITANTE';
		$dato_select['*'] = '*';
		$dato_where['ID_DEPARTAMENTO'] = $id_inmueble;

		$dato_general['dato_select'] = $dato_select;
		$dato_general['dato_where'] = $dato_where;
		$dato_general['dato_tabla'] = $dato_tabla;

        $datos = $this->model_arrendatario->obtener_arrendatario($dato_general);     

        if ($datos->num_rows()==0) {
            $values = '<option>No hay arrendatarios</option>';
        }elseif($datos->num_rows()==1){
            $values = '<option>Seleccione una opción</option>';
        }
		$datos=$datos->result();

		foreach ($datos as $a) {
			$values .= '<option value=' . $a->ID_USUARIO . '>' . $a->NOMB_USUARIO . '</option>';
		}
		echo $values;
    }

    public function ver_contrato(){
        $dato_usuario = $this->dato_usuario;

        $id_arrendatario = $dato_usuario['codigo_usuario'];
        $id_inmueble = 4;

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

        $this->load->model('model_contrato');
        $dato['contrato']= $this->model_contrato->buscar_contrato($dato_general2);


        $dato_tabla3='T_PAGO';

        $dato_general3['dato_select']=$dato_select2;
        $dato_general3['dato_where']=$dato_where2;
        $dato_general3['dato_tabla']=$dato_tabla3;

        $this->load->model('model_pago');
        $dato['pagos']= $this->model_pago->buscar_pagos($dato_general3);


        $this->llamarpagina('arrendatario/pagina_contrato', $dato);
    }
}
