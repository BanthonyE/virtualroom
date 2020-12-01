<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_arrendatario extends CI_Model
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

    public function view_uno_visitante_anuncio_arrendador($dato)
    {

        $this->db->select('*,in.DIRECCION as `direccion_inmueble`');
        $this->db->from('T_ANUNCIO_VISITANTE anuvist');
        $this->db->join('T_VISITANTE vist', 'vist.ID_VISITANTE = anuvist.ID_VISITANTE');
        $this->db->join('T_ANUNCIO anu', 'anu.ID_ANUNCIO = anuvist.ID_ANUNCIO');
        $this->db->join('T_INMUEBLE in', 'in.ID_INMUEBLE = anu.ID_INMUEBLE');
        $this->db->join('T_DISTRITO dist', 'dist.ID_DISTRITO = in.ID_DISTRITO');
        $this->db->join('T_PROVINCIA prov', 'prov.ID_PROVINCIA = prov.ID_PROVINCIA');
        $this->db->join('T_DEPARTAMENTO dep', 'dep.ID_DEPARTAMENTO = prov.ID_DEPARTAMENTO');
        $this->db->Where('anuvist.ID_visitante', $dato);
        $sql = $this->db->get();
        return $sql->result();
    }

    public function view_uno_arrendatario_arrendador($dato)
    {

        $this->db->select('*,in.DIRECCION as `direccion_inmueble`,per.DIRECCION as `direccion_persona`');
        $this->db->from('T_DEPA_VISITANTE depvist');
        $this->db->join('T_USUARIO_REGISTRADO usu', 'usu.ID_USUARIO = depvist.ID_VISITANTE');
        $this->db->join('T_PERSONA per', 'per.ID_PERSONA = usu.ID_PERSONA');
        $this->db->join('T_INMUEBLE in', 'in.ID_INMUEBLE = depvist.ID_DEPARTAMENTO');
        $this->db->join('T_DISTRITO dist', 'dist.ID_DISTRITO = in.ID_DISTRITO');
        $this->db->join('T_PROVINCIA prov', 'prov.ID_PROVINCIA = dist.ID_PROVINCIA');
        $this->db->join('T_DEPARTAMENTO dep', 'dep.ID_DEPARTAMENTO = prov.ID_DEPARTAMENTO');
        $this->db->Where('depvist.ID_VISITANTE', $dato);
        $sql = $this->db->get();
        return $sql->result();
    }

    public function add_arrendatario($dato)
    {

        $this->db->insert($dato['dato_tabla'], $dato['dato_insert']);
        return $this->db->insert_id();
    }

    public function buscar_arrendatario($dato)
    {


        $sql = $this->db->select($dato['dato_select1']);
        $sql = $this->db->from($dato['dato_tabla1']);
        $sql = $this->db->where($dato['dato_where1']);

        $sql = $this->db->get();
        return $sql->result();
    }

    public function view_arrendatario_persona_arrendador($dato)
    {
        $this->db->select('*');
        $this->db->from('T_DEPA_VISITANTE devi');
        $this->db->join('T_USUARIO_REGISTRADO usu', 'usu.ID_USUARIO = devi.ID_VISITANTE');
        $this->db->join('T_PERSONA per', 'per.ID_PERSONA = usu.ID_PERSONA');
        $this->db->Where('devi.ID_ARRENDADOR', $dato);
        $sql = $this->db->get();
        return $sql->result();
    }


    public function edit_estado_arrendatario_deshab($dato)
    {
        $sql = $this->db->where($dato['dato_where']);
        $sql = $this->db->update($dato['dato_tabla'], $dato['dato_update']);
    }


    public function edit_estado_arrendatario_hab($dato)
    {
        $sql = $this->db->where($dato['dato_where']);
        $sql = $this->db->update($dato['dato_tabla'], $dato['dato_update']);
    }


    public function delete_arrendatario($dato)
    {

        $this->db->delete($dato['dato_tabla'], $dato['dato_delete']);
    }

    public function consulta_documento($dato)
    {

        $sql = $this->db->select($dato['dato_select']);
        $sql = $this->db->from($dato['dato_tabla']);
        $sql = $this->db->get();
        return $sql->result();
    }

    public function edit_arrendatario($dato)
    {
        $sql = $this->db->where($dato['dato_where']);
        $sql = $this->db->update($dato['dato_tabla'], $dato['dato_update']);
    }
    public function obtener_arrendatario($dato)
    {
        $sql = $this->db->select($dato['dato_select']);
        $sql = $this->db->from($dato['dato_tabla']);
        $sql = $this->db->join('T_USUARIO_REGISTRADO', 'T_USUARIO_REGISTRADO.ID_USUARIO = T_DEPA_VISITANTE.ID_VISITANTE');
        $sql = $this->db->where($dato['dato_where']);
        return $this->db->get();
    }

    public function obtener_arrendatario_inmueble($dato)
    {
        $sql = $this->db->select('*');
        $sql = $this->db->from('T_DEPA_VISITANTE dep_visi');
        $sql = $this->db->join('T_INMUEBLE depa', 'depa.ID_INMUEBLE = dep_visi.ID_DEPARTAMENTO');
        $sql = $this->db->join('T_USUARIO_REGISTRADO usu', 'usu.ID_USUARIO = dep_visi.ID_VISITANTE');
        $sql = $this->db->join('T_PERSONA persona', 'persona.ID_PERSONA = usu.ID_PERSONA');
        $sql = $this->db->Where($dato['dato_where']);
        $sql = $this->db->get();
        return $sql->result();
    }
}
