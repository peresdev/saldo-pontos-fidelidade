<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saldo_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get($numero_documento) {
        $this->db->select("c.nome, concat('R$ ', format(saldo_disponivel_dinheiro,2,'de_DE')) as saldo_disponivel_dinheiro, pontos");
        $this->db->from('saldo s');
        $this->db->join('cliente c', 'c.cliente_id = s.cliente_id', 'inner');
        $this->db->where('c.numero_documento', $numero_documento);
        $query = $this->db->get();
        return $query->row_array();
    }

}
