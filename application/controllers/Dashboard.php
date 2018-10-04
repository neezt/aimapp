<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

	public function index()
	{
		if($this->session->userdata('perfil') == FALSE)
		 {
		 	redirect(base_url().'inicio/login');
		 }
		 $data['titulo'] = $this->session->userdata('name');
		 $data['menu']=0;
		 $admin['publishers']=$this->members_model->get_members_count(null);
		 $this->load->view('commons/header');
		 $this->load->view('commons/menu',$data);
		 $this->load->view('index_admin',$admin);
		 $this->load->view('commons/footer');
	}


	public function logout_ci()
	{
		$this->session->sess_destroy();
		redirect(base_url().'inicio/login');
	}

}
