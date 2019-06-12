<?php
require APPPATH.'/libraries/REST_Controller.php';

class Api extends REST_Controller
{
  public function __construct() {
  	parent::__construct();
  }

  public function ConsultaFidelizacao_get($numero_documento = null)
  {
        $this->load->model('Saldo_model');

        $saldo = $this->Saldo_model->get($numero_documento);

        if(is_null($numero_documento)) {
            $this->set_response([
                'status' => FALSE,
                'message' => "Informe o número de documento"
            ], REST_Controller::HTTP_OK);
        } else if (is_null($saldo)) {
            $this->set_response([
                'status' => FALSE,
                'message' => "Nenhum saldo existente para esse número de documento"
            ], REST_Controller::HTTP_OK);
        } else if (is_array($saldo)) {
            $status = array("status" => TRUE);
            $this->set_response($saldo, REST_Controller::HTTP_OK);
        } else {
            $this->set_response([
                'status' => FALSE,
                'message' => "Consulta inválida"
            ], REST_Controller::HTTP_OK);
        }
  }

  public function index_post()
  {
    
  }
}