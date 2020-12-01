<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_usuario extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    
    public function consultar_usuario($respuesta_estado_usuario){

        $this->db->select('*');
        $this->db->from('T_USUARIO_REGISTRADO');
        $this->db->join('T_PERSONA', 'T_PERSONA.ID_PERSONA = T_USUARIO_REGISTRADO.ID_PERSONA');
        $this->db->join('TIPO_USUARIO', 'TIPO_USUARIO.ID_TIPOUSUARIO = T_USUARIO_REGISTRADO.ID_TIPOUSUARIO');
        $this->db->where('ID_USUARIO = "'.$respuesta_estado_usuario.'"');
        $resultado = $this->db->get();

        if ($resultado->num_rows()==1) {
            $var=$resultado->row();
            
            $sess_array = array(
                'foto_usuario' => $var->NOMB_FOTO,
                'codigo_usuario' => $var->ID_USUARIO,
                'nombre_usuario' => $var->NOMB_USUARIO,
                'tipo_usuario' => $var->ID_TIPOUSUARIO,
                'estado_usuario' => $var->ESTADO_USUARIO,
                'codigo_persona' => $var->ID_PERSONA
            );            
            $this->session->set_userdata($sess_array);
            return 1;
        }else{
            return 0;
        }   
    }
    
    function obtener_validacion($datos){        
        $this->db->select('ID_USUARIO, ESTADO_USUARIO,NOMBRE_TIPO');
        $this->db->from('T_USUARIO_REGISTRADO');
        $this->db->join('TIPO_USUARIO', 'TIPO_USUARIO.ID_TIPOUSUARIO = T_USUARIO_REGISTRADO.ID_TIPOUSUARIO');
        $this->db->where('NOMB_USUARIO = "'.$datos['usu'].'"');
        $this->db->where('PASS_USUARIO = "'.$datos['contra'].'"');
        $resultado = $this->db->get();

        return $resultado->row();
    }
    
    function consultar_tipo_documento($dato_tipodo_cumento){        
        $this->db->select('ID_TIPODOCUMENTO');
        $this->db->from('TIPO_DOCUMENTO');
        $this->db->where('NOMB_TIPODOCUMENTO = "'.$dato_tipodo_cumento['NOMB_TIPODOCUMENTO'].'"');
        $resultado = $this->db->get();
        $var = $resultado->row();
        return $var->ID_TIPODOCUMENTO;
    }
    
    function consultar_id_persona($dato_persona){        
        $this->db->select('ID_PERSONA');
        $this->db->from('T_PERSONA');
        $this->db->where('NRO_DOCUMENTO = "'.$dato_persona.'"');
        $resultado = $this->db->get();
        $var = $resultado->row();
        return $var->ID_PERSONA;
    }

    function validación_documento($dato_persona){        
        $this->db->select('*');
        $this->db->from('T_PERSONA');
        $this->db->where('NRO_DOCUMENTO = "'.$dato_persona.'"');
        $resultado = $this->db->get();

        if ($resultado->num_rows()==1) {
            return 1;
        }else{
            return 0;
        }
    }

    function validación_usuario($dato_usuario){        
        $this->db->select('*');
        $this->db->from('T_USUARIO_REGISTRADO');
        $this->db->where('NOMB_USUARIO = "'.$dato_usuario.'"');
        $resultado = $this->db->get();
        if ($resultado->num_rows()==1) {
            return 1;
        }else{
            return 0;
        }  
    }

    function insertar_persona($dato_persona){        
        $this->db->insert('T_PERSONA', $dato_persona);
    }
   

    function insertar_usuario($dato_persona){        
        $this->db->insert('T_USUARIO_REGISTRADO', $dato_persona);
    }

    function select_persona_usuario($user_id) {
        $this->db->select('*');
        $this->db->from('T_USUARIO_REGISTRADO');
        $this->db->join('TIPO_USUARIO', 'TIPO_USUARIO.ID_TIPOUSUARIO = T_USUARIO_REGISTRADO.ID_TIPOUSUARIO');
        $this->db->join('T_PERSONA', 'T_PERSONA.ID_PERSONA = T_USUARIO_REGISTRADO.ID_PERSONA');
        $this->db->join('TIPO_DOCUMENTO', 'TIPO_DOCUMENTO.ID_TIPODOCUMENTO = T_PERSONA.ID_TIPODOCUMENTO');
        $this->db->where('ID_USUARIO =  "'.$user_id.'"');
        $resultado = $this->db->get();

        return $resultado->result();
    }
    
    function update_usuario($dato){
        $this->db->where($dato['dato_where']);
        $this->db->update($dato['dato_tabla'], $dato['dato_update']);
    }
    function update_persona($dato){
        $this->db->where($dato['dato_where']);
        $this->db->update('T_PERSONA', $dato['dato_update']);
    }

   
}
