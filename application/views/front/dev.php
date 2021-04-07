<br>
<br>
<br>
<br>
<br>
<div class="container">

	<div class="card" >
 <!--  <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title">Tentang Pengembang</h5>
   <?php
                      $where=array(
                        'option_name' => 'foto_dev'
                      );
                      $cek_foto=$this->m_dah->edit_data($where, 'dah_options')->result();
                      foreach ($cek_foto as $f) {}
                      ?>
                      <?php if($f->option_value != ""){ ?>
                      <div class="foto-dev">
                        <img src="<?php echo base_url()?>upload/foto/<?php echo $f->option_value; ?>">
                      </div>
                      <?php }else{}?>
                     
                     <div class="d-flex justify-content-center">
                        <?php echo $this->m_dah->get_option('pengembang'); ?>
                       
                     </div>
  </div>
</div>
	
</div>