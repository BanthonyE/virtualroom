<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_departamento extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function view_departamento($dato)
    {
        $sql = $this->db->select($dato['dato_select']);
        $sql = $this->db->from($dato['dato_tabla']);
        $sql = $this->db->get();
        return $sql->result();
    }
}
