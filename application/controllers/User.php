<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$this->load->library('ciqrcode');
		$this->load->helper(array('url','form'));
		$this->load->database('default');
    }

	public function index()
	{
		if($this->session->userdata('is_logued_in') == FALSE)
		 {
		 	redirect(base_url().'inicio/login');
		 }
		 $data['menu']=2;
		 $this->load->view('commons/header');
		 $this->load->view('commons/menu',$data);
		 $this->load->view('user/index_user');
		 $this->load->view('commons/footer');
	}

	public function list_users()
	{
		$columns = array( 
                            'id' =>'user.id', 
                            'name' =>'user.name',
                            'email' =>'user.email',
                            'permission_id'=> 'permissions.id',
                            'permission_name'=> 'permissions.name'
                        );

		$limit = $this->input->get('length');
        $start = $this->input->get('start');

        $order = 'user.id';
        $dir= 'asc';
        
        if($this->input->get('jtSorting') != null && $this->input->get('jtSorting') != "undefined"){

        	$col=explode(' ',$this->input->get('jtSorting'));
        	$order = $columns[$col[0]];
        	$dir = $col[1];
        }

		//$response = array("Records", "Result");

		$search='';
		if(!empty($this->input->post('search')['value']))
        {  
		  $search = $this->input->post('search')['value']; 
		}

		$resp = $this->user_model->get_users($search,$limit,$start,$order,$dir);

		$response["data"] = $resp;
		$response["draw"] = 1;
		$response['recordsTotal'] = $this->user_model->get_users_count($search);
		$response['recordsFiltered'] = $this->user_model->get_users_count($search);

		return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode( $response
            ));
	}

	public function edit(){
		$users['user']= $this->user_model->get_user_id($this->input->get('id'));

		 $this->load->view('commons/header');
		 $this->load->view('commons/menu');
		 $this->load->view('user/form_user',$users);
		 $this->load->view('commons/footer');
	}

	public function add(){
		
		 $this->load->view('commons/header');
		 $this->load->view('commons/menu');
		 $this->load->view('user/form_user');
		 $this->load->view('commons/footer');
	}

	public function print_card(){
		
		$user=$this->user_model->get_user_code($this->input->get('code'));

		$text = $user[0]->name;
		
		$nameH=130;
		$nameW=500;
		$my_img = imagecreate($nameW,$nameH);
		$bg = imagecolorallocatealpha($my_img,255,255,255,0);
		$black = imagecolorallocate($my_img, 50, 131, 123);
		imagettftext($my_img,25, 0, 10, 40, $black, __DIR__."/font/Helvetica_Neu_Bold.ttf", $text);
		
		$strcount = strlen($text);
		$name = $my_img;
		$txt_xPosition = $strcount>=15 && $strcount<=20 ? 170 : $strcount>=7 && $strcount<=14 ? 185 : 110; //10 pixels from the left
		$txt_yPosition = 580; //10 pixels from the top

		$params['data'] = base_url().'user/iam?code='.$this->input->get('code');
		$params['level'] = 'H';
		$params['size'] = 3;
		$params['savename'] = "./kenny_muhlemann.png";
		$qr1 =$this->ciqrcode->generate($params);			
		list($srcWidthQR, $srcHeightQR) = getimagesize($qr1);
		$qr_xPosition = 280; //10 pixels from the left
		$qr_yPosition = 700; //10 pixels from the top
		//set the source image (foreground)
		$sourceImage = base_url()."assets/img/voluntaries/".$user[0]->picture;

		//set the destination image (background)
		$destImage = base_url()."assets/img/department/".$user[0]->pic_dep;

		//get the size of the source image, needed for imagecopy()
		list($srcWidth, $srcHeight) = getimagesize($sourceImage);
		$nuevo_ancho = 269;
		$nuevo_alto = 216;

		// Cargar
		$thumb = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
		$cir_xPosition = 190; //10 pixels from the left
		$cir_yPosition = 350; //10 pixels from the top

		$sourceCir = base_url()."assets/img/department/circleFondo.png";
		$circle = imagecreatefrompng($sourceCir);
		

		

		$src = imagecreatefrompng($sourceImage);
		$qr = imagecreatefrompng($params['savename']);
		// Cambiar el tamaño
		imagecopyresized($thumb, $src, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $srcWidth, $srcHeight);

		//create a new image from the destination image
		$dest = imagecreatefrompng($destImage);

		//set the x and y positions of the source image on top of the destination image
		$src_xPosition = 190; //10 pixels from the left
		$src_yPosition = 350; //10 pixels from the top

		//set the x and y positions of the source image to be copied to the destination image
		$src_cropXposition = 0; //do not crop on the side
		$src_cropYposition = 0; //do not crop at the top

		//merge the source and destination images

		imagecopy($dest,$thumb,$src_xPosition,$src_yPosition,$src_cropXposition,$src_cropYposition,$nuevo_ancho,$nuevo_alto);
		imagecopy($dest,$circle,$cir_xPosition,$cir_yPosition,$src_cropXposition,$src_cropYposition,$nuevo_ancho,$nuevo_alto);
		imagecopy($dest,$name,$txt_xPosition,$txt_yPosition,$src_cropXposition,$src_cropYposition,$nameW,$nameH);
		imagecopy($dest,$qr,$qr_xPosition,$qr_yPosition,$src_cropXposition,$src_cropYposition,$srcWidthQR,$srcHeightQR);
		
		header('Content-Type: image/png');
		imagepng($dest);
		//destroy the source image
		imagedestroy($thumb);

		//destroy the destination image
		imagedestroy($dest);
	}
}
