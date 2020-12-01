<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_inmueble extends CI_Model
{


    public function view_inmueble($dato)
    {
        $sql = $this->db->select($dato['dato_select']);
        $sql = $this->db->from($dato['dato_tabla']);
        $sql = $this->db->where($dato['dato_where']);
        $sql = $this->db->get();

        return $sql->result();
    }
    public function buscar_inmueble($dato)
    {
        $sql = $this->db->select($dato['dato_select']);
        $sql = $this->db->from($dato['dato_tabla']);
        $sql = $this->db->where($dato['dato_where']);
        $sql = $this->db->get();

        return $sql->result();
    }

    public function add_inmueble($dato)
    {
        $sql = $this->db->insert($dato['dato_tabla'], $dato['dato_insert']);
    }
    public function edit_inmueble($dato)
    {

        $this->db->where($dato['dato_where']);
        $this->db->update($dato['dato_tabla'], $dato['dato_insert']);
    }



    public function view_inmueble_distrio_arrendador($dato)
    {

        $this->db->select('*');
        $this->db->from('T_INMUEBLE');
        $this->db->join('T_USUARIO_REGISTRADO', 'T_USUARIO_REGISTRADO.ID_USUARIO = T_INMUEBLE.ID_ARRENDADOR');
        $this->db->join('T_DISTRITO', 'T_DISTRITO.ID_DISTRITO = T_INMUEBLE.ID_DISTRITO');
        $this->db->Where('ID_ARRENDADOR', $dato);
        $sql = $this->db->get();
        return $sql->result();
    }

    public function view_inmueble_distrio_provincia($dato)
    {

        $this->db->select('*');
        $this->db->from('T_INMUEBLE');
        $this->db->join('T_DISTRITO', 'T_DISTRITO.ID_DISTRITO = T_INMUEBLE.ID_DISTRITO');
        $this->db->join('T_PROVINCIA', 'T_PROVINCIA.ID_PROVINCIA = T_DISTRITO.ID_PROVINCIA');
        $this->db->Where('ID_INMUEBLE', $dato);
        $sql = $this->db->get();
        return $sql->result();
    }

    public function delete_inmueble($dato)
    {
        $this->db->delete($dato['dato_tabla'], $dato['dato_delete']);
    }
}
