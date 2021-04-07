<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('url');
		$this->load->helper('dah_helper');
		$this->load->library(array('session','form_validation'));	
		$this->load->model('m_dah');
	
		// if($this->session->userdata('status') != "login"){
		// 	redirect(base_url().'xlog');
		// }
	}	

	public function index(){
		$this->load->database();			
		
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_index');
		$this->load->view('admin/v_footer');
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}


	function settings(){
		$this->load->database();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_settings');
		$this->load->view('admin/v_footer');
	}

	function settings_act(){
		$this->load->database();		
		$blog_name = $this->input->post('blog_name');
		$blog_description = $this->input->post('blog_description');	
		$blog_welcome = $this->input->post('blog_welcome');		

		$this->m_dah->update_data(array('option_name' => 'blog_name'),array('option_value' => $blog_name),'dah_options');
		$this->m_dah->update_data(array('option_name' => 'blog_description'),array('option_value' => $blog_description),'dah_options');
		$this->m_dah->update_data(array('option_name' => 'blog_welcome'),array('option_value' => $blog_welcome),'dah_options');

		$rand = rand();
		$config['upload_path'] = './dah_image/system/';
		$config['allowed_types'] = 'gif|jpg|png';				
		$config['file_name'] = $rand.'_'.$_FILES['blog_logo']['name'];				
		$this->load->library('upload', $config);

		if($_FILES['blog_logo']['name'] != ""){			
			if(!$this->upload->do_upload('blog_logo')){			
				$error = array('error' => $this->upload->display_errors());			
				$this->load->view('admin/v_header');
				$this->load->view('admin/v_settings',$error);
				$this->load->view('admin/v_footer');
			}else{
				$data = array('upload_data' => $this->upload->data());			
				$file_name = $data['upload_data']['file_name'];
				@chmod("./dah_image/system/" . $this->m_dah->get_option('blog_logo'), 0777);
				@unlink('./dah_image/system/' . $this->m_dah->get_option('blog_logo'));
				$this->m_dah->update_data(array('option_name' => 'blog_logo'),array('option_value' => $file_name),'dah_options');			
				redirect('admin/settings/?alert=setting-update');			
			}
		}else{			
			redirect('admin/settings/?alert=setting-update');			
		}		
	}

	// page
	function page(){		
		$this->load->database();		
		$data['page'] = $this->m_dah->get_data('dah_pages')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_page',$data);
		$this->load->view('admin/v_footer');	
	}

	function page_add(){		
		$this->load->database();					
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_page_add');
		$this->load->view('admin/v_footer');	
	}

	function page_add_act(){		
		$this->load->database();		
		$page_tittle = $this->input->post('page_tittle');
		$page_content = $this->input->post('page_content');
		$page_status = $this->input->post('save');
		$this->form_validation->set_rules('page_tittle','Page Tittle','required');
		if($this->form_validation->run() != true){
			$this->load->view('admin/v_header');
			$this->load->view('admin/v_page_add');
			$this->load->view('admin/v_footer');
		}else{			
			$url = create_slug($page_tittle);	

			// $w = array(
			// 	'page_tittle' => $page_tittle
			// 	);
			// $cek_sama = $this->m_dah->edit_data($w,'dah_pages')->num_rows();
			// if($cek_sama > 0){
			// 	$c = $cek_sama + 1;
			// 	$u = $url.$c;
			// }else{
			// 	$u = $url;
			// }

			$data = array(
				'page_tittle' => $page_tittle,
				'page_url' => $url,
				'page_content' => $page_content,
				'page_status' => $page_status
				);
			$this->m_dah->insert_data($data,'dah_pages');
			$id_terakhir = $this->db->insert_id();			

			// add cover image 
			if($_FILES['page_cover']['name'] == ""){				
				redirect(base_url().'admin/page/?alert=page-saved');
			}else{
				$config['upload_path'] = './dah_image/page/';
				$config['allowed_types'] = 'gif|jpg|png';				
				$this->load->library('upload', $config);
				$this->upload->do_upload('page_cover');
				$data = array('upload_data' => $this->upload->data());			
				$file_name = $data['upload_data']['file_name'];
				$this->m_dah->update_data(array('page_id' => $id_terakhir),array('page_cover' => $file_name),'dah_pages');			
				redirect(base_url().'admin/page/?alert=page-saved');	
			}
			// end add cover image			
		}			
	}

	function page_delete($id){
		$this->load->database();
		if($id == ""){
			redirect('admin/page');
		}else{
			$where = array(
				'page_id' => $id
				);

			$data = $this->m_dah->edit_data($where,'dah_pages')->row();
			@chmod("./dah_image/page/" . $data->page_cover, 0777);
			@unlink('./dah_image/page/' . $data->page_cover);

			$this->m_dah->delete_data($where,'dah_pages');
			redirect('admin/page/?alert=page-delete');
		}
	}

	function page_edit($id){
		$this->load->database();	
		if($id == ""){
			redirect('admin/pages');
		}else{			
			$where = array(
				'page_id' => $id
				);	
			$data['page'] = $this->m_dah->edit_data($where,'dah_pages')->result();			
			$this->load->view('admin/v_header');
			$this->load->view('admin/v_page_edit',$data);
			$this->load->view('admin/v_footer');
		}
	}

	function page_update(){		
		$this->load->database();		
		$page_id = $this->input->post('id');
		$page_tittle = $this->input->post('page_tittle');
		$page_content = $this->input->post('page_content');
		$page_status = $this->input->post('save');
		$where = array(
				'page_id' => $page_id
				);	
		$this->form_validation->set_rules('page_tittle','Page Tittle','required');
		if($this->form_validation->run() != true){			
			$data['page'] = $this->m_dah->edit_data($where,'dah_pages')->result();			
			$this->load->view('admin/v_header');
			$this->load->view('admin/v_page_edit',$data);
			$this->load->view('admin/v_footer');
		}else{			
			$url = create_slug($page_tittle);					
			$data = array(
				'page_tittle' => $page_tittle,
				'page_url' => $url,
				'page_content' => $page_content,
				'page_status' => $page_status
				);
			$this->m_dah->update_data($where,$data,'dah_pages');			
			// add cover image 
			if($_FILES['page_cover']['name'] == ""){				
				redirect(base_url().'admin/page/?alert=page-saved');
			}else{
				$config['upload_path'] = './dah_image/page/';
				$config['allowed_types'] = 'gif|jpg|png';				
				$this->load->library('upload', $config);
				$this->upload->do_upload('page_cover');
				$data = array('upload_data' => $this->upload->data());			
				$file_name = $data['upload_data']['file_name'];
				$this->m_dah->update_data(array('page_id' => $page_id),array('page_cover' => $file_name),'dah_pages');			
				redirect(base_url().'admin/page/?alert=page-saved');	
			}
			// end add cover image			
		}			
	}

	
	

	
	
	// end menu

	// user
	function users(){
		$this->load->database();
		$data['users'] = $this->m_dah->get_data('dah_users')->result();
		$this->load->view('admin/v_header');		
		$this->load->view('admin/v_users',$data);		
		$this->load->view('admin/v_footer');		
	}

	function user_add(){
		$this->load->database();		
		$this->load->view('admin/v_header');		
		$this->load->view('admin/v_users_add');		
		$this->load->view('admin/v_footer');		
	}

	function user_add_act(){
		$this->load->database();		
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
		if($this->form_validation->run() == false){
			$this->load->view('admin/v_header');		
			$this->load->view('admin/v_users_add');		
			$this->load->view('admin/v_footer');
		}else{			
			$data = array(
				'user_name' => $this->input->post('name'),
				'user_email' => $this->input->post('email'),
				'user_login' => $this->input->post('username'),
				'user_pass' => md5($this->input->post('password')),
				'user_level' => $this->input->post('level'),
				'user_status' => $this->input->post('status')
				);
			$this->m_dah->insert_data($data,'dah_users');			
			redirect('admin/users/?alert=user-add');	
		}		
	}

	function cek_username_ajax(){
		$this->load->database();
		$val = $this->input->post('val');		
		echo $this->m_dah->edit_data(array('user_login' => $val),'user')->num_rows();
	}

	function cek_email_ajax(){
		$this->load->database();
		$val = $this->input->post('valemail');		
		echo $this->m_dah->edit_data(array('user_email' => $val),'user')->num_rows();
	}

	function user_edit($id){
		$this->load->database();	
		if($id == ""){
			redirect(base_url());
		}else{			
			$where = array(
				'user_id' => $id
				);				
			$data['user'] = $this->m_dah->edit_data($where,'user')->result();			
			$this->load->view('admin/v_header');
			$this->load->view('admin/v_users_edit',$data);
			$this->load->view('admin/v_footer');
		}
	}

	function user_update(){
		$this->load->database();		
		$id = $this->input->post('id');
		$this->form_validation->set_rules('user_login','Username','required');
		if($this->form_validation->run() == false){
			$where = array(
				'user_id' => $id
				);				
			$data['user'] = $this->m_dah->edit_data($where,'user')->result();			
			$this->load->view('admin/v_header');
			$this->load->view('admin/v_users_edit',$data);
			$this->load->view('admin/v_footer');
		}else{			
			$password = $this->input->post('password');
			$where = array(
				'user_id' => $id
				);
			if($password != ""){
				$data = array(
					'user_login' => $this->input->post('user_login'),
					'user_email' => $this->input->post('email'),
					'user_pass' => md5($password)
					);				
			}else{
				$data = array(
					'user_login' => $this->input->post('user_login'),
					'user_email' => $this->input->post('email')
				
					);		
			}			
			$this->m_dah->update_data($where,$data,'user');			
			redirect('admin/user_edit/'.$id.'/?alert=user-update');	
		}				
	}

	// end user

	
	function update_option(){
		$this->load->database();
		$option = $this->input->post('option');
		$value = $this->input->post('value');
		$where = array(
			'option_name' => $option
			);
		$data = array(
			'option_value' => $value
			);
		$this->m_dah->update_data($where,$data,'dah_options');
	}

	
/*
|---------------------------------
|	Bagian Daftar bantuan
|----------------------------------
*/

function daftar_bantuan(){
	$this->load->database();
	$this->load->view('admin/v_header');
	$this->load->view('admin/v_daftar_bantuan');
	$this->load->view('admin/v_footer');

}

function edit_bantuan(){
	$this->load->database();
	$this->load->view('admin/v_header');
	$this->load->view('admin/v_edit_bantuan');
	$this->load->view('admin/v_footer');
}




/*
|---------------------------------
|	Bagian Jadwal Kegiatan
|----------------------------------
*/

function jadwal_keg(){
	$this->load->database();
	$this->load->view('admin/v_header');
	$this->load->view('admin/v_jadwal_keg');
	$this->load->view('admin/v_footer');

}

function edit_keg(){
	$this->load->database();
	$this->load->view('admin/v_header');
	$this->load->view('admin/v_jadwal_keg_edit');
	$this->load->view('admin/v_footer');
}



/*
|---------------------------------
|	Penugasan Reviewer
|----------------------------------
*/




/*
|---------------------------------
|	Daftar Pengguna
|----------------------------------
*/



/*
|---------------------------------
|	Riwayat Penelitian
|----------------------------------
*/


/*
|---------------------------------
|	Bagian Riwayat Usulan
|----------------------------------
*/


/*
|---------------------------------
|	Bagian Daftar rekening
|----------------------------------
*/





 function viewfile(){
        $file='upload/syarat/pdfaja.pdf';
        // $filename='pdfaja.pdf';
        // $tofile= realpath("upload/syarat/".$fname);
        header('Content-Type: application/pdf');
        readfile($file);
	}
	
	function viewfile_pdf($id){
		$this->load->database();

        $file='upload/syarat/'.$id.'.pdf';
        // $filename='pdfaja.pdf';
        // $tofile= realpath("upload/syarat/".$fname);
        header('Content-Type: application/pdf');
        readfile($file);
	}
	
	
	

// send pesan twilio
 function sendSms(){
	$this->load->library('twilio');
$sms_sender = '18126694425';
$sms_reciever = '62895805299119';
$sms_message = "Pesan ini aja";
$from = '+'.$sms_sender; //trial account twilio number
$to = '+'.$sms_reciever; //sms recipient number
$response = $this->twilio->sms($from, $to,$sms_message);
 
if($response->IsError){
 
	echo 'Sms Has been Not sent';
	}
	else{
	 
	echo 'Sms Has been sent';
	}
}


// end braket file admin.php
    
}