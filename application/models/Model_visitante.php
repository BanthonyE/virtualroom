<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_visitante extends CI_Model{


	public function add_visitante($dato){
        $this->db->insert($dato['dato_tabla'], $dato['dato_insert']);
        return $this->db->insert_id();
    }
	public function add_anuncio_visitante($dato){
        $this->db->insert($dato['dato_tabla'], $dato['dato_insert']);
    }

    public function edit_estado_visitante($dato){
        $this->db->where($dato['dato_where']);
        $this->db->update($dato['dato_tabla'], $dato['dato_update']);   
    }

    public function repetir_visitante($dato){
        $sql = $this->db->select($dato['dato_select']);
        $sql = $this->db->from($dato['dato_tabla']);
        $sql = $this->db->where($dato['dato_where']);
        return $this->db->get();
    }

    public function view_visitante_anuncio_arrendador($dato)
    {

        $this->db->select('*');
        $this->db->from('T_ANUNCIO_VISITANTE anuvist');
        $this->db->join('T_VISITANTE vist', 'vist.ID_VISITANTE = anuvist.ID_VISITANTE');
        $this->db->join('T_ANUNCIO anu', 'anu.ID_ANUNCIO = anuvist.ID_ANUNCIO');
        $this->db->join('T_INMUEBLE in', 'in.ID_INMUEBLE = anu.ID_INMUEBLE');
        $this->db->Where('anu.ID_ARRENDADOR', $dato);
        $sql = $this->db->get();
        return $sql->result();
    }

    public function delete_visitante_anuncio($dato)
    {
        $sql = $this->db->delete($dato['dato_tabla'], $dato['dato_delete']);
    }

}