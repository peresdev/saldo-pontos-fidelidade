<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Integracao_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get($chave, $codigo_loja, $codigo_cartao) {
        $this->db->select('chave, codigo_loja, codigo_cartao');
        $this->db->from('integracao');
        $this->db->where('chave', $chave);
        $this->db->where('codigo_loja', $codigo_loja);
        $this->db->where('codigo_cartao', $codigo_cartao);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function verificaCredenciais($chave, $codigo_loja, $codigo_cartao) {
        $this->db->select('count(1) as total');
        $this->db->from('integracao');
        $this->db->where('chave', $chave);
        $this->db->where('codigo_loja', $codigo_loja);
        $this->db->where('codigo_cartao', $codigo_cartao);
        $query = $this->db->get();
        $retorno = $query->row_array();

        if($retorno['total'] == 0) {
            return false;
        }

        return true;
    }

}
