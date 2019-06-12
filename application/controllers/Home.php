<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Consulta de saldo de pontos de fidelidade';
		$data['view'] = 'home';

		$this->load->view('_templates/default', $data);
	}

}
