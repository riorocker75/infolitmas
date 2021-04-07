<?php 
class M_dah extends CI_Model{
	// general
	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	function edit_data_order($where,$table,$column,$order){
		$this->db->order_by($column, $order);
		return $this->db->get_where($table,$where);
	}


	
	function get_data($table){
		return $this->db->get($table);
	}

	function get_data_desc($id,$table){
		$this->db->order_by($id, 'asc');
		return $this->db->get($table);
	}

	function insert_data($data,$table){
		$this->db->insert($table,$data);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}	

	function get_data_order($order,$column,$table){
		$this->db->order_by($column, $order); 
		return $this->db->get($table);
	}

	function get_group($table,$group){
		return $this->db->query("select * from $table group by $group");
	}
	function get_option($option_name){		
		$query = $this->db->query("select option_value from dah_options where option_name='$option_name'")->row();
		return $query->option_value;
	}

	function get_penduduk_user($id_penduduk){
		return $this->db->query("select * from user,penduduk where user.penduduk_id=penduduk.id and user.penduduk_id='$id_penduduk'");
	
	}

	function jenis_kelamin($kelamin){
		switch($kelamin){
			case"pria":
				echo "Laki-laki";
			break;
			case"wanita":
				echo "Perempuan";
			break;
			default:
				echo"tidak ada kelamin banci";
			break;

		}
	}
	// format kelamin
	// koding untuk mengganti bulan default ke bahasa indonesia
	function format_tanggal($tanggal){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}

	function format_hari($hari){

		switch($hari){
			case 'Sun':
				$hari_ini = "Minggu";
			break;
	 
			case 'Mon':			
				$hari_ini = "Senin";
			break;
	 
			case 'Tue':
				$hari_ini = "Selasa";
			break;
	 
			case 'Wed':
				$hari_ini = "Rabu";
			break;
	 
			case 'Thu':
				$hari_ini = "Kamis";
			break;
	 
			case 'Fri':
				$hari_ini = "Jumat";
			break;
	 
			case 'Sat':
				$hari_ini = "Sabtu";
			break;
			
			default:
				$hari_ini = "Tidak di ketahui";		
			break;
		}
		return  $hari_ini ;
	}	

		// Koding untuk preview page persyaratan
	function preview_file($nama_file){ /*ini menggunakanan paramerter $nama_file*/
		$url_sh=substr($nama_file,0,-4);
		$url_klik= base_url().'upload/syarat/'.$nama_file;
		$url_pdf=base_url().'admin/viewfile_pdf/'.$url_sh;
		
		$link_image="window.open('".$url_klik."','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;";
		$link_pdf="window.open('".$url_pdf."','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;";

		$file_path = pathinfo(base_url().'upload/syarat/'.$nama_file);
		switch(strtolower($file_path['extension'])){
			case"jpg":case"png":case"jpeg":
				echo '
				<a href="" onclick="'.$link_image.'">';
				echo "<img src='$url_klik' style='width:62px; height:62px'><br/>";
				echo "Preview File:&nbsp;".$nama_file."</br>";
				echo "</a>";
			break;
			case"pdf":
				echo '
				<a href="" onclick="'.$link_pdf.'">';
				
				echo "<i class='fas fa-file-pdf' style='font-size:62px;color:#D81F28'></i><br/>";
				echo "Preview File:&nbsp;".$nama_file."</br>";
				echo "</a>";
			break;	
			default:
			echo "File tidak ditemukan";
			break;	

		}
	}

	// end preview file

	function last_record($table){
		return $this->db->query("select *from $table ORDER BY id DESC LIMIT 1;");
	}

	function last_record_surat($table,$status){
		return $this->db->query("select *from $table where status_surat='$status' ORDER BY nomor_surat DESC LIMIT 1");
	}








	

// start cek notif 

	function cek_notif_user($id,$status){
		return $this->db->query("select * from surat_mohon where penduduk_id='$id' and notif='$status' order by id desc");
	}





function filter_laporan($mulai,$akhir){
	return $this->db->query("
	select * from surat_mohon
	where date(tgl_surat) between '$mulai' and '$akhir'
	and status_surat='diterima'
		");
}

function filter_laporan_lain($mulai,$akhir){
	return $this->db->query("
	select * from jenis_mohon
	where date(tgl_disahkan) between '$mulai' and '$akhir'
	and status='diterima'
		");
}






}
?>