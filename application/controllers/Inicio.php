<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
		$this->load->model('user_model');
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->database('default');
    }

	public function login()
	{
		$this->load->view('login');
	}

	public function loginprocess()
	{

		$response = "error";	
		$resp = $this->user_model->get_login($this->input->post('email'));

		if($resp != null ) {
			if(password_verify($this->input->post('password'), $resp[0]->password) == true){
				$menu = $this->user_model->get_menuByUser($resp[0]->id);
				$data = array(
	                'is_logued_in' 	=> 		TRUE,
	                'id_usuario' 	=> 		$resp[0]->id,
	                'perfil'		=>		$resp[0]->admin,
	                'username' 		=> 		$resp[0]->name,
	                'department' 		=> 		$resp[0]->id_deparment,
	                'listMenu' 		=> 		$menu
            		);		
					$this->session->set_userdata($data);
				$response = "ok";
			}
		}

		return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array(
                    'response' => $response
            )));
	}

}
