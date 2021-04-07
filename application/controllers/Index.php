<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('url');
		$this->load->helper('dah_helper');
		$this->load->library(array('session','form_validation','cart'));	
		$this->load->model('m_dah');
		
	}	



public function index(){
		$this->load->database();			
			

		$data['blog']=$this->m_dah->get_data('blog')->result();
		$this->load->view('front/f_header');
		$this->load->view('front/f_index',$data);
		$this->load->view('front/f_footer');
	}

function info(){
		$this->load->database();			

		$data['blog']=$this->m_dah->get_data('blog')->result();
		$this->load->view('front/f_header');
		$this->load->view('front/info',$data);
		$this->load->view('front/f_footer');
}

function detail_blog($id){
		$this->load->database();			
		$where=array(
			'id' => $id
		);

		$data['blog']=$this->m_dah->edit_data($where,'blog')->result();
		$this->load->view('front/f_header');
		$this->load->view('front/blog_detail',$data);
		$this->load->view('front/f_footer');
}

function umum(){
		$this->load->database();			
			$data['blog']=$this->m_dah->get_data('blog')->result();		
		$this->load->view('front/f_header');
		$this->load->view('front/umum',$data);
		$this->load->view('front/f_footer');
}

function struktur(){
	$this->load->view('front/f_header');
		$this->load->view('front/struktur');
		$this->load->view('front/f_footer');
}

function layan(){
	$this->load->view('front/f_header');
		$this->load->view('front/layan');
		$this->load->view('front/f_footer');
}

function dev(){
	$this->load->view('front/f_header');
		$this->load->view('front/dev');
		$this->load->view('front/f_footer');
}

function tentang(){
		$this->load->database();			
			$data['blog']=$this->m_dah->get_data('blog')->result();		
		$this->load->view('front/f_header');
		$this->load->view('front/umum',$data);
		$this->load->view('front/f_footer');
}


}