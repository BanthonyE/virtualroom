<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pago extends CI_Model{


	public function add_pago($dato){
        $sql = $this->db->insert($dato['dato_tabla'], $dato['dato_insert']);
    }

    public function edit(){

    }

    public function buscar_pagos($dato){
        $sql = $this->db->select('*');
        $sql = $this->db->from($dato['dato_tabla']);
        $sql = $this->db->where($dato['dato_where']);
        $resultado = $sql->get();

        return $resultado->result();
    }    

    public function delete_pago($dato){
        $sql = $this->db->delete($dato['dato_tabla'], $dato['dato_delete']);
    }

}