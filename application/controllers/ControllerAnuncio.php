<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerAnuncio extends CI_Controller
{

    function  __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('model_fotos');
        $this->load->model('model_inmueble');
        $this->load->model('model_anuncio');

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

    public function view_cargar_inmueble()
    {
        $dato_usuario = $this->dato_usuario;
        $dato_id_usuario = $dato_usuario['codigo_usuario'];

        $dato_tabla = 'T_INMUEBLE';
        $dato_select['*'] = '*';

        $dato_where['ID_ARRENDADOR'] = $dato_id_usuario;

        $dato_general['dato_select'] = $dato_select;
        $dato_general['dato_where'] = $dato_where;
        $dato_general['dato_tabla'] = $dato_tabla;

        $datos['inmueble'] = $this->model_inmueble->buscar_inmueble($dato_general);
/*         $datos['inmueble_anuncio'] = $this->model_inmueble->buscar_inmueble_anuncio($dato_id_usuario);

        var_dump($datos['inmueble_anuncio']);die(); */

        $this->llamarpagina('pagina_registrar_anuncio', $datos);
    }

    public function view_modificar_anuncio()
    {
        $id = $_GET['id'];
        $datos['info'] = $this->model_anuncio->view_anuncio_inmueble($id);
        $this->llamarpagina('pagina_registrar_anuncio', $datos);
    }

    public function view_lista_anuncio()
    {
        $dato_usuario = $this->dato_usuario;
        $dato_id_usuario = $dato_usuario['codigo_usuario'];

        $datos['publicacion'] = $this->model_anuncio->view_anuncio_inmueble_arrendador($dato_id_usuario);
        $this->llamarpagina('pagina_lista_anuncio', $datos);
    }

    public function add_inmueble()
    {

        $dato_tabla = 'T_ANUNCIO';

        $dato_insert['ID_ARRENDADOR'] = $_POST["txtusuario"];
        $dato_insert['TITULO_ANUNCIO'] = $_POST["txttitulo"];
        $dato_insert['DESCRIP_ANUNCIO'] = $_POST["txtdescripcion"];
        $dato_insert['FECHA_ANUNCIO'] = $_POST["txtfecha"];
        $dato_insert['ESTADO_ANUNCIO'] = $_POST["txtestado"];
        $dato_insert['ID_INMUEBLE'] = $_POST["cboinmueble"];

        $dato_general['dato_tabla'] = $dato_tabla;
        $dato_general['dato_insert'] = $dato_insert;

        if ($_POST["txtidanuncio"] != '') {

            $dato_where['ID_ANUNCIO'] = $_POST["txtidanuncio"];
            $dato_general['dato_where'] = $dato_where;
            $respuesta = $this->model_anuncio->edit_anuncio($dato_general);
        } else {
            $respuesta = $this->model_anuncio->add_anuncio_inmueble($dato_general);
            
            $dato_tabla2 = 'T_VALORACION';
            $dato_insert2['ID_ANUNCIO'] = $respuesta;
            
            $dato_general['dato_tabla'] = $dato_tabla2;
            $dato_general['dato_insert'] = $dato_insert2;

            $respuesta = $this->model_anuncio->add_valoracion($dato_general);
        }
        $this->view_cargar_inmueble();
    }

    public function delete_anuncio()
    {
        $id = $_GET['id'];

        $dato_tabla = 'T_ANUNCIO';

        $dato_delete['ID_ANUNCIO'] = $id;

        $dato_general['dato_tabla'] = $dato_tabla;
        $dato_general['dato_delete'] = $dato_delete;

        $respuesta = $this->model_anuncio->delete_anuncio($dato_general);
        $this->view_lista_anuncio();
    }

    public function galeria_publicacion()
    {
        $dato_usuario = $this->dato_usuario;
        $dato_id_usuario = $dato_usuario['codigo_usuario'];

        $dato_tabla = 'T_INMUEBLE';
        $dato_select['*'] = '*';
        $dato_where['ID_ARRENDADOR'] = $dato_id_usuario;

        $dato_general['dato_select'] = $dato_select;
        $dato_general['dato_where'] = $dato_where;
        $dato_general['dato_tabla'] = $dato_tabla;

        $dato['inmueble'] = $this->model_inmueble->buscar_inmueble($dato_general);


        $dato_tabla2 = 'T_ANUNCIO';
        $dato_select2['*'] = '*';
        $dato_where2['ID_ARRENDADOR'] = $dato_id_usuario;

        $dato_general2['dato_select'] = $dato_select2;
        $dato_general2['dato_where'] = $dato_where2;
        $dato_general2['dato_tabla'] = $dato_tabla2;

        $dato['anuncio'] = $this->model_anuncio->view_anuncio($dato_general2);

        $this->llamarpagina('pagina_galeria_anuncios', $dato);
    }


    public function cargar_anuncio()
    {

        $anuncio = $_POST['anuncio'];

        $dato_tabla = 'T_ANUNCIO';
        $dato_select['*'] = '*';
        $dato_where['ID_INMUEBLE'] = $anuncio;

        $dato_general['dato_select'] = $dato_select;
        $dato_general['dato_where'] = $dato_where;
        $dato_general['dato_tabla'] = $dato_tabla;

        $datos = $this->model_anuncio->obtener_anuncio($dato_general);

        if ($datos->num_rows() == 0) {
            $values = '<option>No hay anuncios</option>';
        } elseif ($datos->num_rows() == 1) {
            $values = '<option>Seleccione una opción</option>';
        }
        $datos = $datos->result();

        foreach ($datos as $a) {
            $values .= '<option value=' . $a->ID_ANUNCIO . '>' . $a->TITULO_ANUNCIO . '</option>';
        }

        echo $values;
    }

    public function Cargar_vista_anuncio(){

        $id_inmueble=$_POST['id_inmueble'];
        $id_anuncio=$_POST['id_anuncio'];

        $dato_tabla='T_FOTO_INMUEBLE';
        $dato_select['*']='*';
        $dato_where['ID_INMUEBLE']=$id_inmueble;

        $dato_general['dato_select']=$dato_select;
        $dato_general['dato_where']=$dato_where;
        $dato_general['dato_tabla']=$dato_tabla;

        $dato['fotos'] = $this->model_fotos->buscar_fotos($dato_general);

        $dato['anuncio']= $this->model_anuncio->view_anuncio_inmueble($id_anuncio);

        $this->load->view('arrendador/paginas_ajax/vista_detalle_anuncio',$dato);
    }
    public function foto_portada(){
        $id_foto = $_POST['id_foto'];
        $id_anuncio=$_POST['id_anuncio'];
        $id_anuncio=$_POST['id_anuncio'];

        $dato_tabla='T_ANUNCIO';
        $dato_update['PORTADA_ANUNCIO']=$id_foto;
        $dato_where['ID_ANUNCIO']=$id_anuncio;
        
        $dato_general['dato_tabla']=$dato_tabla;
        $dato_general['dato_insert']=$dato_update;
        $dato_general['dato_where']=$dato_where;
        
        $this->model_anuncio->edit_anuncio($dato_general);

        $this->Cargar_vista_anuncio();

    }
    public function view_listado_anuncios()
    {
        $this->load->view('listado_anuncios', '');
    }
}
