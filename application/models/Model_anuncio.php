<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_anuncio extends CI_Model
{


    public function add_anuncio_inmueble($dato)
    {
        $this->db->insert($dato['dato_tabla'], $dato['dato_insert']);
        return $this->db->insert_id();
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
        $this->db->from('T_ANUNCIO anu');
        $this->db->join('T_INMUEBLE inm', 'inm.ID_INMUEBLE = anu.ID_INMUEBLE');
        $this->db->join('T_DISTRITO dis', 'dis.ID_DISTRITO = inm.ID_DISTRITO');
        $this->db->Where('anu.ID_ANUNCIO', $dato);
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
        $sql = $this->db->select('*,inm.DIRECCION as `direccion_inmueble`');
        $sql = $this->db->from('T_ANUNCIO anun');
        $sql = $this->db->join('T_VALORACION val', 'val.ID_ANUNCIO = anun.ID_ANUNCIO');
        $sql = $this->db->join('T_INMUEBLE inm', 'inm.ID_INMUEBLE = anun.ID_INMUEBLE');
        $sql = $this->db->join('T_USUARIO_REGISTRADO usu', 'usu.ID_USUARIO = inm.ID_ARRENDADOR');
        $sql = $this->db->join('T_PERSONA per', 'per.ID_PERSONA = usu.ID_PERSONA');
        $sql = $this->db->join('T_FOTO_INMUEBLE foto', 'foto.ID_FOTO = anun.PORTADA_ANUNCIO');
        $sql = $this->db->join('T_DISTRITO dis', 'dis.ID_DISTRITO = inm.ID_DISTRITO');
        $sql = $this->db->where($dato['dato_where']);
        $sql = $this->db->get();
        return $sql->result();
    }
    public function get_detalle_anuncio($dato)
    {
        $sql = $this->db->select('*,inm.DIRECCION as `direccion_inmueble`');
        $sql = $this->db->from('T_ANUNCIO anun');
        $sql = $this->db->join('T_INMUEBLE inm', 'inm.ID_INMUEBLE = anun.ID_INMUEBLE');
        $sql = $this->db->join('T_USUARIO_REGISTRADO usureg', 'usureg.ID_USUARIO = inm.ID_ARRENDADOR');
        $sql = $this->db->join('T_PERSONA per', 'per.ID_PERSONA = usureg.ID_PERSONA');
        $sql = $this->db->join('T_FOTO_INMUEBLE foto', 'foto.ID_FOTO = anun.PORTADA_ANUNCIO');
        $sql = $this->db->join('T_DISTRITO dis', 'dis.ID_DISTRITO = inm.ID_DISTRITO');
        $sql = $this->db->where('anun.ID_ANUNCIO', $dato);
        $sql = $this->db->get();
        return $sql->result();
    }
    public function get_valoracion($dato)
    {
        $sql = $this->db->select('*');
        $sql = $this->db->from('T_VALORACION');
        $sql = $this->db->where('ID_ANUNCIO', $dato);
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
    public function add_valoracion($dato)
    {
        $this->db->insert($dato['dato_tabla'], $dato['dato_insert']);
    }
    public function update_valoracion($dato)
    {
        $this->db->set($dato['dato_update'], $dato['dato_update'] . '+1', FALSE);
        $this->db->where($dato['dato_where']);
        $this->db->update('T_VALORACION');
    }
}
