<?php
date_default_timezone_set('America/Sao_Paulo'); 
require APPPATH.'/libraries/REST_Controller.php';

class Api extends REST_Controller
{
  public $resposta = "";

  public function __construct() {
  	parent::__construct();
    $this->load->model('Log_model');
    $this->load->helper("guid");
  }

  public function respostaApi($mensagem, $status = REST_Controller::HTTP_OK) {
    $this->set_response([
        'status' => $status,
        'message' => $mensagem
    ], $status);
  }

  public function RetornaLog_get() {
    $this->set_response([
        $this->Log_model->get()
    ], REST_Controller::HTTP_OK);
  }

  public function InsereLog_post() {
    $data = array(
      'data_solicitacao' => date('Y-m-d H:i:s'),
      'retorno' => json_encode($_POST['retorno'], JSON_UNESCAPED_UNICODE),
      'nsu' => getGUID()
    );

    $this->Log_model->insert($data);
  }

  public function ConsultaFidelizacao_post() {
    $this->load->model('Integracao_model');

    $valida = true;

    if(!isset($_POST['chave'])) {
      $this->respostaApi("Informe a chave de integração.");
      $valida = false;
    } else if(!isset($_POST['codigo_loja'])) {
      $this->respostaApi("Informe o código da loja.");
      $valida = false;
    } else if(!isset($_POST['codigo_cartao'])) {
      $this->respostaApi("Informe o código cartão.");
      $valida = false;
    } else if (empty($_POST['numero_documento'])) {
      $this->respostaApi("Informe o número de documento.");
      $valida = false;
    }

    if($valida) {
      if(isset($_POST['chave']) && isset($_POST['codigo_loja']) && isset($_POST['codigo_cartao'])) {

        $credenciado = $this->Integracao_model->verificaCredenciais($_POST['chave'], $_POST['codigo_loja'], $_POST['codigo_cartao']);

        if(!$credenciado) {
          $this->respostaApi("Credenciais invalidas para o consumo da API.", REST_Controller::HTTP_UNAUTHORIZED);
          $valida = false;
        }

        $this->load->model('Saldo_model');

        $saldo = $this->Saldo_model->get($_POST['numero_documento']);

        if($valida == true) {
          if (is_null($saldo)) {
            $this->respostaApi("Nenhuma informação existente para esse número de documento.");
          } else if (is_array($saldo)) {
            $this->set_response([
                'status' => REST_Controller::HTTP_OK,
                'message' => $saldo
            ], REST_Controller::HTTP_OK);
          } else {
            $this->respostaApi(false, "Consulta inválida.");
          }
        }
      }
    }
  }
}