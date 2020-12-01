<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerUsuario extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_usuario');
    }

    public function validar_registro_usuario()
    {

        if (!$this->session->userdata('nombre_usuario')) {
            return 1;
        } else {
            $this->dato_usuario = array(
                'foto_usuario' => $this->session->userdata('foto_usuario'),
                'codigo_usuario' => $this->session->userdata('codigo_usuario'),
                'codigo_persona' => $this->session->userdata('codigo_persona'),
                'nombre_usuario' => $this->session->userdata('nombre_usuario'),
                'tipo_usuario' => $this->session->userdata('tipo_usuario'),
                'estado_usuario' => $this->session->userdata('estado_usuario')
            );

            if ($this->session->userdata('foto_usuario') == NULL) {
                $this->dato_usuario['foto_usuario'] = "avatar.jpg";
            }
            return 0;
        }
    }

    public function index()
    {
        $this->load->view('layout/header_public');
        $this->load->view('pages_public/home');
        $this->load->view('layout/footer_public');
    }
    public function llamarpagina($nombre_pagina, $datos)
    {
        $dato_usuario = $this->dato_usuario;

        $this->load->view('layout/menu', $dato_usuario);
        $this->load->view('layout/header', $dato_usuario);
        $this->load->view('arrendador/' . $nombre_pagina, $datos);
        $this->load->view('layout/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Inicio', 'refresh');
    }

    public function vista_login()
    {
        $this->session->sess_destroy();
        $this->load->view('login_admin');
    }

    public function verificacion_usuario()
    {

        $datos['usu'] = $_POST['usuario'];
        $datos['contra'] = $_POST['password'];
        $tipo_usuario_login = $_POST['tipo_usuario'];

        $respuesta_estado_usuario = $this->model_usuario->obtener_validacion($datos);

        if (isset($respuesta_estado_usuario)) {
            if ($tipo_usuario_login == 'admin' && $respuesta_estado_usuario->NOMBRE_TIPO == 'Arrendador') {
                $resp = $this->model_usuario->consultar_usuario($respuesta_estado_usuario->ID_USUARIO);

                if ($resp) {
                    redirect('ControllerArrendador', 'refresh');
                } else {
                    redirect('Inicio', 'refresh');
                }
            } elseif ($tipo_usuario_login == 'admin' && $respuesta_estado_usuario->NOMBRE_TIPO == 'Administrador') {
                $resp = $this->model_usuario->consultar_usuario($respuesta_estado_usuario->ID_USUARIO);

                if ($resp) {
                    redirect('ControllerArrendador', 'refresh');
                } else {
                    redirect('Inicio', 'refresh');
                }
            } elseif ($tipo_usuario_login == 'publico' && $respuesta_estado_usuario->NOMBRE_TIPO == 'Arrendatario') {
                $resp = $this->model_usuario->consultar_usuario($respuesta_estado_usuario->ID_USUARIO);

                if ($resp) {
                    redirect('ControllerArrendatario', 'refresh');
                } else {
                    redirect('Inicio', 'refresh');
                }
            } else {
                redirect('Inicio', 'refresh');
            }
        } else {
            redirect('Inicio', 'refresh');
        }
    }


    public function editar_perfil()
    {

        $validar = $this->validar_registro_usuario();
        if ($validar == 1) {
            $this->index();
        } else {
            $dato_usuario = $this->dato_usuario;


            $dato_where['ID_USUARIO'] = $dato_usuario['codigo_usuario'];

            if ($_POST['txtusu'] != NULL) {
                $nombre_usuario = $_POST['txtusu'];
                $dato_update['NOMB_USUARIO'] = $nombre_usuario;

                if ($_POST['txtpass'] != NULL) {
                    $password_usuario = $_POST['txtpass'];
                    $dato_update['PASS_USUARIO'] = $password_usuario;
                }

                $dato_tabla['dato_tabla'] = 'T_USUARIO_REGISTRADO';


                $dato_general['dato_tabla'] = $dato_tabla;
                $dato_general['dato_update'] = $dato_update;
                $dato_general['dato_where'] = $dato_where;

                $this->model_usuario->update_usuario($dato_general);
            }

            if ($_POST['txtnombre'] != NULL) {
                $data['NOMB_PERSONA'] = $_POST['txtnombre'];
            }
            if ($_POST['txtapellido'] != NULL) {
                $data['APE_PERSONA'] = $_POST['txtapellido'];
            }
            if ($_POST['txtdni'] != 0) {
                $data['NRO_DOCUMENTO'] = $_POST['txtdni'];
            }
            if ($_POST['cbosexo'] != NULL) {
                $data['SEXO'] = $_POST['cbosexo'];
            }
            if ($_POST['txtcel'] != 0) {
                $data['CELULAR'] = $_POST['txtcel'];
            }
            if ($_POST['txtdireccion'] != NULL) {
                $data['DIRECCION'] = $_POST['txtdireccion'];
            }
            if ($_POST['txtemail'] != NULL) {
                $data['EMAIL'] = $_POST['txtemail'];
            }
            if ($_POST['cbotipo_documento'] != 0) {
                $data['ID_TIPODOCUMENTO'] = $_POST['cbotipo_documento'];
            }

            $config = array(
                'upload_path' => 'uploads/fotos/',
                'allowed_types' => 'gif|jpeg|bmp|jpg|png',
                'max_size' => 0,
                'filename' => url_title($this->input->post('file')),
                'encrypt_name' => true
            );
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
                if ($this->dato_usuario['foto_usuario'] != "avatar.jpg") {
                    @unlink('uploads/fotos/' . $this->dato_usuario['foto_usuario']);
                }

                $data['NOMB_FOTO'] = $this->upload->file_name;

                $sess_array = array(
                    'foto_usuario' => $data['NOMB_FOTO'],
                    'codigo_usuario' => $this->dato_usuario['codigo_usuario'],
                    'codigo_persona' => $this->dato_usuario['codigo_persona'],
                    'nombre_usuario' => $this->dato_usuario['nombre_usuario'],
                    'tipo_usuario' => $this->dato_usuario['tipo_usuario'],
                    'estado_usuario' => $this->dato_usuario['estado_usuario']
                );

                $this->session->set_userdata('session_name', $sess_array);
                $this->dato_usuario['foto_usuario'] = $data['NOMB_FOTO'];
            } else {
                $data['NOMB_FOTO'] = $this->dato_usuario['foto_usuario'];
            }

            $dato_where2['ID_PERSONA'] = $dato_usuario['codigo_persona'];
            $dato_general2['dato_update'] = $data;
            $dato_general2['dato_where'] = $dato_where2;

            $this->model_usuario->update_persona($dato_general2);

            $dato_usuario = $this->dato_usuario;
            $datos['usuario'] = $this->model_usuario->select_persona_usuario($dato_usuario['codigo_usuario']);
            $this->llamarpagina('pagina_principal', $datos);
        }
    }
}
