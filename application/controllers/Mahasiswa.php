<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('url');
		$this->load->helper('dah_helper');
		$this->load->library(array('session','form_validation'));	
		$this->load->model('m_dah');
	
		// if($this->session->userdata('status') != "login_mahasiswa"){
		// 	redirect(base_url().'log_mahasiswa');
		// }

	}	

    
    function index(){
        $this->load->database();
        $this->load->view('mahasiswa/v_header');
        $this->load->view('mahasiswa/v_index');
        $this->load->view('mahasiswa/v_footer');
      
    }
    

/*
|---------------------------------
|	Bagian Daftar usulan
|----------------------------------
*/

// Sripsi



// Tesis


/*
|---------------------------------
|	Riwayat usulan
|----------------------------------
*/




/*
|---------------------------------
|	Panduan
|----------------------------------
*/





	}	

	
