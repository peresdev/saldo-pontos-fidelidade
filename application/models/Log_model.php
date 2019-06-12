<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get() {
        $this->db->order_by('data_solicitacao', 'desc');
        $query = $this->db->get('log');
        return $query->result_array();
    }

    public function insert($data) {
        $this->db->insert('log', $data);
    }

}
