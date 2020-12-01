<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_distrito extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function view_distrito($dato)
    {

        $sql = $this->db->select($dato['dato_select']);
        $sql = $this->db->from($dato['dato_tabla']);
        $sql = $this->db->where($dato['dato_where']);
        $sql = $this->db->get();
        return $sql->result();
    }
}
