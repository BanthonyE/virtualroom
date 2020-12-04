<?php defined('BASEPATH') or exit('No direct script access allowed');
class ControllerFotos extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('model_fotos');

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

    function add_fotos(){
        $data = array();
        $id_departamento = $_POST['id_inmueble'];
        if (!empty($_FILES['userFiles']['name'])) {
            $filesCount = count($_FILES['userFiles']['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                $uploadPath = 'uploads/files/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('userFile')) {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['NOMB_FOTO'] = $fileData['file_name'];
                    $uploadData[$i]['CREADO_FOTO'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['MODIFICADO_FOTO'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['ESTADO_FOTO'] = 1;
                    $uploadData[$i]['ID_INMUEBLE'] = $id_departamento;
                }
            }
            if (!empty($uploadData)) {
                $this->model_fotos->insert($uploadData);
                $this->vista_registrar_fotos();
            }
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

    public function vista_registrar_fotos()
    {
        $dato_usuario = $this->dato_usuario;

        $dato_tabla = 'T_INMUEBLE';
        $dato_select['*'] = '*';
        $dato_where['ID_ARRENDADOR'] = $dato_usuario['codigo_usuario'];

        $dato_general['dato_select'] = $dato_select;
        $dato_general['dato_tabla'] = $dato_tabla;
        $dato_general['dato_where'] = $dato_where;

        $this->load->model('model_inmueble');
        $datos['departamentos'] = $this->model_inmueble->view_inmueble($dato_general);

        $this->llamarpagina('registrar_fotos', $datos);
    }

    public function cargar_info_inmueble()
    {

        $id_inmueble = $_POST['inmueble'];

        $this->load->model('model_inmueble');
        $datos['inmueble'] = $this->model_inmueble->buscar_inmueble_distrito($id_inmueble);

        $dato_tabla2 = 'T_FOTO_INMUEBLE';
        $dato_select2['*'] = '*';
        $dato_where2['ID_INMUEBLE'] = $id_inmueble;

        $dato_general2['dato_select'] = $dato_select2;
        $dato_general2['dato_where'] = $dato_where2;
        $dato_general2['dato_tabla'] = $dato_tabla2;

        $this->load->model('model_inmueble');
        $datos['fotos'] = $this->model_fotos->buscar_fotos($dato_general2);


        $this->load->view('arrendador/paginas_ajax/vista_descripcion_inmueble', $datos);
    }


    public function update_fotos()
    {

        $estado_foto = $_POST['estado'];
        $id_foto = $_POST['foto'];

        $dato_tabla = 'T_FOTO_INMUEBLE';

        if ($estado_foto == 1) {
            $dato_update['ESTADO_FOTO'] = 0;
        } else {
            $dato_update['ESTADO_FOTO'] = 1;
        }

        $dato_where['ID_FOTO'] = $id_foto;

        $dato_general['dato_update'] = $dato_update;
        $dato_general['dato_where'] = $dato_where;
        $dato_general['dato_tabla'] = $dato_tabla;

        $this->model_fotos->update_fotos($dato_general);

        $this->cargar_info_inmueble();
    }

    public function vista_listar_fotos()
    {

        $this->cargar_info_inmueble();

        $this->llamarpagina('listar_fotos', $datos);
    }

    public function delete_fotos()
    {

        $id_foto = $_POST['foto'];

        $this->model_fotos->delete_fotos($id_foto);

        $this->cargar_info_inmueble();
    }

    public function Cargar_vista_anuncio(){

        $id_inmueble = $_POST['id_inmueble'];
        $id_anuncio = $_POST['id_anuncio'];

        $dato_tabla='T_FOTO_INMUEBLE';
        $dato_select['*']='*';
        $dato_where['ID_INMUEBLE']=$id_inmueble;

        $dato_general['dato_select']=$dato_select;
        $dato_general['dato_where']=$dato_where;
        $dato_general['dato_tabla']=$dato_tabla;

        $dato['fotos'] = $this->model_fotos->buscar_fotos($dato_general);

        $this->load->model('model_anuncio');
        $dato['anuncio']= $this->model_anuncio->view_anuncio_inmueble($id_anuncio);

        $this->load->view('arrendador/paginas_ajax/vista_detalle_anuncio',$dato);
    }

    public function update_imagen(){

        $id_anuncio = $_POST['id_anuncio'];
        $id_inmueble = $_POST['id_inmueble'];
        $estado_imagen = $_POST['estado_imagen'];
        $id_imagen = $_POST['id_imagen'];

        $dato_tabla = 'T_FOTO_INMUEBLE';

        if ($estado_imagen == 1) {
            $dato_update['ESTADO_FOTO'] = 0;
        } else {
            $dato_update['ESTADO_FOTO'] = 1;
        }

        $dato_where['ID_FOTO'] = $id_imagen;

        $dato_general['dato_update'] = $dato_update;
        $dato_general['dato_where'] = $dato_where;
        $dato_general['dato_tabla'] = $dato_tabla;

        $this->model_fotos->update_fotos($dato_general);

        $this->Cargar_vista_anuncio();        
    }
    public function update_imagen_virtual(){

        $id_anuncio = $_POST['id_anuncio'];
        $id_inmueble = $_POST['id_inmueble'];
        $estado_imagen = $_POST['estado_imagen'];
        $id_imagen = $_POST['id_imagen'];

        /* 
        var_dump($dato_general2);die(); */
    
        $this->model_fotos->update_virtual($id_inmueble);

        $dato_tabla = 'T_FOTO_INMUEBLE';
        if ($estado_imagen == 1) {
            $dato_update['ESTADO_FOTO'] = 0;
        }else{
            $dato_update['ESTADO_FOTO'] = 1;
        }

        $dato_where['ID_FOTO'] = $id_imagen;

        $dato_general['dato_update'] = $dato_update;
        $dato_general['dato_where'] = $dato_where;
        $dato_general['dato_tabla'] = $dato_tabla;


        $this->model_fotos->update_fotos($dato_general);

        $this->Cargar_vista_anuncio();        
    }

    public function eliminar_recorrido(){

        $id_foto = $_POST['id_recorrido'];
        $this->model_fotos->delete_fotos($id_foto);

        $this->Cargar_vista_anuncio();        
    }


    function registrar_imagenes(){
        $id_anuncio = $_POST['id_anuncio'];
        $id_inmueble = $_POST['id_inmueble'];
        
        $tipo_imagen = $_POST['cbotipo_imagen'];
        $txturl = $_POST['txturl'];

        $data = array();

        if ($tipo_imagen==1) {
            
            if (!empty($_FILES['userFiles']['name'])) {
                $filesCount = count($_FILES['userFiles']['name']);
                for ($i = 0; $i < $filesCount; $i++) {
                    $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                    $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                    $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                    $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                    $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];
    
                    $uploadPath = 'uploads/files/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('userFile')) {
                        $fileData = $this->upload->data();
                        $uploadData[$i]['NOMB_FOTO'] = $fileData['file_name'];
                        $uploadData[$i]['CREADO_FOTO'] = date("Y-m-d H:i:s");
                        $uploadData[$i]['MODIFICADO_FOTO'] = date("Y-m-d H:i:s");
                        $uploadData[$i]['ESTADO_FOTO'] = 1;
                        $uploadData[$i]['ID_INMUEBLE'] = $id_inmueble;
                    }
                }
                if (!empty($uploadData)) {
                    $this->model_fotos->insert($uploadData);
                }
            }

        }elseif ($tipo_imagen==2) {
            $dato_tabla='T_FOTO_INMUEBLE';

            $dato_insert['TIPO_FOTO'] = 2;
            $dato_insert['NOMB_FOTO'] = $txturl;
            $dato_insert['CREADO_FOTO'] = date("Y-m-d H:i:s");
            $dato_insert['MODIFICADO_FOTO'] = date("Y-m-d H:i:s");
            $dato_insert['ESTADO_FOTO'] = 0;
            $dato_insert['ID_INMUEBLE'] = $id_inmueble;

            $dato_general['dato_tabla']=$dato_tabla;
            $dato_general['dato_insert']=$dato_insert;

            $respuesta= $this->model_fotos->replace_imagen($dato_general);
        }
        $this->Cargar_vista_anuncio();  
    }

    public function view_galeria_imagenes()
    {
        $dato_usuario = $this->dato_usuario;
        $dato_id_usuario = $dato_usuario['codigo_usuario'];

        $dato_tabla = 'T_INMUEBLE';
        $dato_select['*'] = '*';
        $dato_where['ID_ARRENDADOR'] = $dato_id_usuario;

        $dato_general['dato_select'] = $dato_select;
        $dato_general['dato_where'] = $dato_where;
        $dato_general['dato_tabla'] = $dato_tabla;

        $this->load->model('model_inmueble');
        $dato['inmueble'] = $this->model_inmueble->buscar_inmueble($dato_general);

        $dato_tabla2 = 'T_ANUNCIO';
        $dato_select2['*'] = '*';
        $dato_where2['ID_ARRENDADOR'] = $dato_id_usuario;

        $dato_general2['dato_select'] = $dato_select2;
        $dato_general2['dato_where'] = $dato_where2;
        $dato_general2['dato_tabla'] = $dato_tabla2;

        $this->load->model('model_anuncio');
        $dato['anuncio'] = $this->model_anuncio->view_anuncio($dato_general2);

        $this->llamarpagina('pagina_galeria_imagenes', $dato);
    }
}
