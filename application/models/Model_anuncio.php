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
        $sql = $this->db->join('T_VALORACION', 'T_VALORACION.ID_ANUNCIO = T_ANUNCIO.ID_ANUNCIO');
        $sql = $this->db->join('T_INMUEBLE', 'T_INMUEBLE.ID_INMUEBLE = T_ANUNCIO.ID_INMUEBLE');
        $sql = $this->db->join('T_USUARIO_REGISTRADO', 'T_USUARIO_REGISTRADO.ID_USUARIO = T_INMUEBLE.ID_ARRENDADOR');
        $sql = $this->db->join('T_PERSONA', 'T_PERSONA.ID_PERSONA = T_USUARIO_REGISTRADO.ID_PERSONA');
        $sql = $this->db->join('T_FOTO_INMUEBLE', 'T_FOTO_INMUEBLE.ID_FOTO = T_ANUNCIO.PORTADA_ANUNCIO');
        $sql = $this->db->join('T_DISTRITO', 'T_DISTRITO.ID_DISTRITO = T_INMUEBLE.ID_DISTRITO');
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
        $sql = $this->db->where('anun.ID_INMUEBLE', $dato);
        $sql = $this->db->get();
        return $sql->result();
/*      $this->db->select('*,in.DIRECCION as `direccion_inmueble`');
        $this->db->from('T_ANUNCIO_VISITANTE anuvist');
        $this->db->join('T_VISITANTE vist', 'vist.ID_VISITANTE = anuvist.ID_VISITANTE');
        $this->db->join('T_ANUNCIO anu', 'anu.ID_ANUNCIO = anuvist.ID_ANUNCIO');
        $this->db->join('T_INMUEBLE in', 'in.ID_INMUEBLE = anu.ID_INMUEBLE');
        $this->db->join('T_DISTRITO dist', 'dist.ID_DISTRITO = in.ID_DISTRITO');
        $this->db->join('T_PROVINCIA prov', 'prov.ID_PROVINCIA = prov.ID_PROVINCIA');
        $this->db->join('T_DEPARTAMENTO dep', 'dep.ID_DEPARTAMENTO = prov.ID_DEPARTAMENTO');
        $this->db->Where('anuvist.ID_visitante', $dato);
        $sql = $this->db->get();
        return $sql->result(); */
    }
    public function get_valoracion($dato)
    {
        $sql = $this->db->select('*');
        $sql = $this->db->from('T_VALORACION');
        $sql = $this->db->where('ID_ANUNCIO',$dato);
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
    public function update_valoracion($dato){
        $this->db->set($dato['dato_update'], $dato['dato_update'] . '+1', FALSE);
        $this->db->where($dato['dato_where']);
        $this->db->update('T_VALORACION');                
    }
}
