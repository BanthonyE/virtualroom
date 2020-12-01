<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_fotos extends CI_Model{

    public function getRows($id = ''){
        $this->db->select('id,file_name,created,status');
        $this->db->from('files');
        if($id){
            $this->db->where('id',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('created','desc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
    
    public function insert($data = array()){
        $insert = $this->db->insert_batch('T_FOTO_INMUEBLE',$data);
    }
    public function replace_imagen($dato){
        $this->db->replace($dato['dato_tabla'], $dato['dato_insert']);
    }

    public function buscar_fotos($dato){
        
        $sql = $this->db->select($dato['dato_select']);
        $sql = $this->db->from($dato['dato_tabla']);
        $sql = $this->db->where($dato['dato_where']);
        $resultado = $sql->get();

        return $resultado->result();
    }

    public function update_fotos($dato){
        $sql = $this->db->where($dato['dato_where']);
        $this->db->update($dato['dato_tabla'],$dato['dato_update']); 
    }
    public function update_virtual($dato){
        $this->db->set('ESTADO_FOTO', 0);
        $this->db->where('ID_INMUEBLE', $dato);
        $this->db->where('TIPO_FOTO', 2);
        $this->db->update('T_FOTO_INMUEBLE');
    }
    
    public function delete_fotos($dato){
        $this->db->where('ID_FOTO',$dato);
        $this->db->delete('T_FOTO_INMUEBLE');
    }
    
}