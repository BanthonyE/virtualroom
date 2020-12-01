<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_administrador extends CI_Model
{




    public function view_tipo_documento($dato)
    {
        $sql = $this->db->select($dato['dato_select']);
        $sql = $this->db->from($dato['dato_tabla']);
        $sql = $this->db->get();

        return $sql->result();
    }

    public function add_grabar_usuario($dato)
    {
        $this->db->insert($dato['dato_tabla'], $dato['dato_insert']);
        return $this->db->insert_id();
    }

    public function view_lista_usuarios()
    {
        $this->db->select('*');
        $this->db->from('T_USUARIO_REGISTRADO usu');
        $this->db->join('T_PERSONA per', 'per.ID_PERSONA = usu.ID_PERSONA');
        $this->db->Where('ID_TIPOUSUARIO !=', '3');
        $sql = $this->db->get();
        return $sql->result();
    }


    public function edit_estado_usuario_deshab($dato)
    {
        $sql = $this->db->where($dato['dato_where']);
        $sql = $this->db->update($dato['dato_tabla'], $dato['dato_update']);
    }

    public function edit_estado_usuario_hab($dato)
    {
        $sql = $this->db->where($dato['dato_where']);
        $sql = $this->db->update($dato['dato_tabla'], $dato['dato_update']);
    }

    public function view_uno_usuario($dato)
    {
        $this->db->select('*');
        $this->db->from('T_USUARIO_REGISTRADO usu');
        $this->db->join('T_PERSONA per', 'per.ID_PERSONA = usu.ID_PERSONA');
        $this->db->Where('usu.ID_USUARIO', $dato);
        $sql = $this->db->get();
        return $sql->result();
    }

    public function edit_grabar_usuario($dato)
    {
        $sql = $this->db->where($dato['dato_where']);
        $sql = $this->db->update($dato['dato_tabla'], $dato['dato_update']);
    }

    public function delete_usuario($dato)
    {

        $this->db->delete($dato['dato_tabla'], $dato['dato_delete']);
    }

    public function buscar_usuario($dato)
    {


        $sql = $this->db->select($dato['dato_select']);
        $sql = $this->db->from($dato['dato_tabla']);
        $sql = $this->db->where($dato['dato_where']);

        $sql = $this->db->get();
        return $sql->result();
    }
}
