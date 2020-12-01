<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerAdministrador extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('model_administrador');

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
            redirect('ControllerLogin');
        }
    }

    public function index()
    {
        $dato_usuario = $this->dato_usuario;
        $datos['usuario'] = $this->model_usuario->select_persona_usuario($dato_usuario['codigo_usuario']);
        $this->llamarpagina('pagina_principal', $datos);
    }

    public function llamarpagina($nombre_pagina, $datos)
    {
        $dato_usuario = $this->dato_usuario;
        $this->load->view('layout/menu', $dato_usuario);
        $this->load->view('layout/header', $dato_usuario);
        $this->load->view('administrador/' . $nombre_pagina, $datos);
        $this->load->view('layout/footer');
    }



    public function view_registrar_usuario()
    {

        $dato_tabla2 = 'TIPO_DOCUMENTO';
        $dato_select2['*'] = '*';
        $dato_general2['dato_tabla'] = $dato_tabla2;
        $dato_general2['dato_select'] = $dato_select2;

        $datos['tipo_documento'] = $this->model_administrador->view_tipo_documento($dato_general2);

        $this->llamarpagina('pagina_registrar_usuario', $datos);
    }


    public function add_registrar_usuario()
    {
        if ($_POST["txtidusuario"] != NULL) {
            $dato_tabla = 'T_PERSONA';

            $dato_update['NOMB_PERSONA'] = $_POST["txtnombre"];
            $dato_update['APE_PERSONA'] = $_POST["txtapellido"];
            $dato_update['NRO_DOCUMENTO'] = $_POST["txtdni"];
            $dato_update['ID_TIPODOCUMENTO'] = $_POST["cbotipo_documento"];
            $dato_update['NOMB_FOTO'] = 'avatar.jpg';
            $dato_update['SEXO'] = $_POST["cbosexo"];
            $dato_update['CELULAR'] = $_POST["txtcel"];
            $dato_update['DIRECCION'] = $_POST["txtdireccion"];
            $dato_update['EMAIL'] = $_POST["txtemail"];

            $dato_where['ID_PERSONA'] = $_POST["txtidpersona"];

            $dato_general['dato_tabla'] = $dato_tabla;
            $dato_general['dato_update'] = $dato_update;
            $dato_general['dato_where'] = $dato_where;

            $this->model_administrador->edit_grabar_usuario($dato_general);


            $dato_tabla2 = 'T_USUARIO_REGISTRADO';

            $dato_update2['NOMB_USUARIO'] = $_POST["txtusu"];
            $dato_update2['PASS_USUARIO'] = $_POST["txtpass"];
            $dato_update2['ESTADO_USUARIO'] = 'HABILITADO';
            $dato_update2['ID_PERSONA'] = $_POST["txtidpersona"];;
            $dato_update2['ID_TIPOUSUARIO'] = $_POST["cbotipo_usuario"];

            $dato_where2['ID_USUARIO'] = $_POST["txtidusuario"];

            $dato_general2['dato_update'] = $dato_update2;
            $dato_general2['dato_tabla'] = $dato_tabla2;
            $dato_general2['dato_where'] = $dato_where2;

            $respuesta2 = $this->model_administrador->edit_grabar_usuario($dato_general2);
        } else {

            $dato_tabla = 'T_PERSONA';

            $dato_insert['NOMB_PERSONA'] = $_POST["txtnombre"];
            $dato_insert['APE_PERSONA'] = $_POST["txtapellido"];
            $dato_insert['NRO_DOCUMENTO'] = $_POST["txtdni"];
            $dato_insert['ID_TIPODOCUMENTO'] = $_POST["cbotipo_documento"];
            $dato_insert['NOMB_FOTO'] = 'avatar.jpg';
            $dato_insert['SEXO'] = $_POST["cbosexo"];
            $dato_insert['CELULAR'] = $_POST["txtcel"];
            $dato_insert['DIRECCION'] = $_POST["txtdireccion"];
            $dato_insert['EMAIL'] = $_POST["txtemail"];


            $dato_general['dato_tabla'] = $dato_tabla;
            $dato_general['dato_insert'] = $dato_insert;

            $respuesta = $this->model_administrador->add_grabar_usuario($dato_general);


            $dato_tabla2 = 'T_USUARIO_REGISTRADO';

            $dato_insert2['NOMB_USUARIO'] = $_POST["txtusu"];
            $dato_insert2['PASS_USUARIO'] = $_POST["txtpass"];
            $dato_insert2['ESTADO_USUARIO'] = 'HABILITADO';
            $dato_insert2['ID_PERSONA'] = $respuesta;
            $dato_insert2['ID_TIPOUSUARIO'] = $_POST["cbotipo_usuario"];

            $dato_general2['dato_insert'] = $dato_insert2;
            $dato_general2['dato_tabla'] = $dato_tabla2;

            $respuesta2 = $this->model_administrador->add_grabar_usuario($dato_general2);
        }






        $this->view_lista_usuario();
    }


    public function view_lista_usuario()
    {

        $datos['usuarios'] = $this->model_administrador->view_lista_usuarios();

        $this->llamarpagina('pagina_lista_usuarios', $datos);
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

        $respuesta = $this->model_administrador->edit_estado_usuario_deshab($dato_general);
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

        $respuesta = $this->model_administrador->edit_estado_usuario_hab($dato_general);
    }

    public function view_edit_usuario()
    {

        $id = $_GET['id'];

        $dato_tabla = 'TIPO_DOCUMENTO';
        $dato_select['*'] = '*';
        $dato_general['dato_tabla'] = $dato_tabla;
        $dato_general['dato_select'] = $dato_select;

        $datos['tipo_documento'] = $this->model_administrador->view_tipo_documento($dato_general);

        $datos['usuario'] = $this->model_administrador->view_uno_usuario($id);

        $this->llamarpagina('pagina_registrar_usuario', $datos);
    }

    public function delete_usuario()
    {

        $id = $_GET['id'];

        $dato_tabla = 'T_USUARIO_REGISTRADO';

        $dato_select['ID_PERSONA'] = 'ID_PERSONA';

        $dato_where['ID_USUARIO'] = $id;

        $dato_general['dato_select'] = $dato_select;
        $dato_general['dato_where'] = $dato_where;
        $dato_general['dato_tabla'] = $dato_tabla;

        $resultado = $this->model_administrador->buscar_usuario($dato_general);
        $respuesta = $resultado[0]->ID_PERSONA;


        $dato_tabla1 = 'T_USUARIO_REGISTRADO';

        $dato_delete1['ID_USUARIO'] = $id;

        $dato_general1['dato_tabla'] = $dato_tabla1;
        $dato_general1['dato_delete'] = $dato_delete1;

        $this->model_administrador->delete_usuario($dato_general1);


        $dato_tabla2 = 'T_PERSONA';

        $dato_delete2['ID_PERSONA'] = $respuesta;

        $dato_general2['dato_tabla'] = $dato_tabla2;
        $dato_general2['dato_delete'] = $dato_delete2;

        $this->model_administrador->delete_usuario($dato_general2);

        $this->view_lista_usuario();
    }
}
