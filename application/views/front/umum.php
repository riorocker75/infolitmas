<br>
<br>
<br>
<br>
<br>
<div class="container">

	<div class="card" >
 <!--  <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title">Umum</h5>
   <?php echo $this->m_dah->get_option('umum'); ?>
                    <table border="0" cellpadding="6" cellspacing="4" style="margin-top:-30px">
                        <tbody>
                        <tr>
                            <td>Jumlah Penduduk       </td>
                            <td><?php echo $this->m_dah->get_data('penduduk')->num_rows();?> </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Laki Laki : 
                            <?php
                                $pria=array(
                                 'jenis_kelamin' => "pria"   
                                );
                              echo $this->m_dah->edit_data($pria,'penduduk')->num_rows();
                             ?></td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td>Perempuan :
                            <?php
                                $wanita=array(
                                 'jenis_kelamin' => "wanita"   
                                );
                              echo $this->m_dah->edit_data($wanita,'penduduk')->num_rows();
                             ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah KK</td>
                            <td><?php  echo $this->m_dah->kk_total('kepala')->num_rows()?></td>
                        </tr>
                        
                        </tbody>
                    </table>
  </div>
</div>
	
</div>