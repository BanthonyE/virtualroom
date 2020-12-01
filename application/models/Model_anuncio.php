<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_anuncio extends CI_Model
{


    public function add_anuncio_inmueble($dato)
    {
        $sql = $this->db->insert($dato['dato_tabla'], $dato['dato_insert']);
    }

    public function edit_anuncio($dato)
    {
        $this->db->where($dato['dato_where']);
        $this->db->update($dato['dato_tabla'], $dato['dato_insert']);
    }

    public function view_anuncio_inmueble_arrendador($dato)
    {
        $this->db->select('*');
        $this->db->from('T_ANUNCIO anu');
        $this->db->join('T_INMUEBLE inm', 'inm.ID_INMUEBLE = anu.ID_INMUEBLE');
        $this->db->join('T_USUARIO_REGISTRADO usu', 'usu.ID_USUARIO = anu.ID_ARRENDADOR');
        $this->db->Where('anu.ID_ARRENDADOR', $dato);
        $sql = $this->db->get();
        return $sql->result();
    }

    public function view_anuncio_inmueble($dato)
    {
        $this->db->select('*');
        $this->db->from('T_ANUNCIO');
        $this->db->join('T_INMUEBLE', 'T_INMUEBLE.ID_INMUEBLE = T_ANUNCIO.ID_INMUEBLE');
        $this->db->Where('ID_ANUNCIO', $dato);
        $sql = $this->db->get();
        return $sql->result();
    }

    public function obtener_anuncio($dato)
    {
        $sql = $this->db->select($dato['dato_select']);
        $sql = $this->db->from($dato['dato_tabla']);
        $sql = $this->db->where($dato['dato_where']);
        return $this->db->get();
    }

    public function get_list($dato)
    {
        $sql = $this->db->select($dato['dato_select']);
        $sql = $this->db->from($dato['dato_tabla']);
        $sql = $this->db->join('T_INMUEBLE', 'T_INMUEBLE.ID_INMUEBLE = T_ANUNCIO.ID_INMUEBLE');
        $sql = $this->db->join('T_USUARIO_REGISTRADO', 'T_USUARIO_REGISTRADO.ID_USUARIO = T_INMUEBLE.ID_ARRENDADOR');
        $sql = $this->db->join('T_PERSONA', 'T_PERSONA.ID_PERSONA = T_USUARIO_REGISTRADO.ID_PERSONA');
        $sql = $this->db->join('T_FOTO_INMUEBLE', 'T_FOTO_INMUEBLE.ID_FOTO = T_ANUNCIO.PORTADA_ANUNCIO');
        $sql = $this->db->join('T_DISTRITO', 'T_DISTRITO.ID_DISTRITO = T_INMUEBLE.ID_DISTRITO');
        $sql = $this->db->where($dato['dato_where']);
        $sql = $this->db->get();
        return $sql->result();
    }

    public function delete_anuncio($dato)
    {
        $this->db->delete($dato['dato_tabla'], $dato['dato_delete']);
    }











    public function view_anuncio($dato)
    {
        $sql = $this->db->select($dato['dato_select']);
        $sql = $this->db->from($dato['dato_tabla']);
        $sql = $this->db->where($dato['dato_where']);
        $sql = $this->db->get();
        return $sql->result();
    }
}
