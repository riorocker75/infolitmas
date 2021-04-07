<br>
<br>
<br>
<br>
<br>
<div class="container">

	
 <!--  <img src="..." class="card-img-top" alt="..."> -->
  <div class="row">
  		<?php foreach($blog as $bg){?>
   <div class="col-lg-6 col-md-12">
   		<div class="card custom-card" >
		  <div class="card-body">
		  	<p style="font-size: 12px;">INFO &nbsp;<i class="fa fa-calendar" style="color: #8d8d8d"></i>
		  		<span style="color: #8d8d8d"><?php echo date("d M, Y")?></span>
		  	</p>
		    	<div class="judul-card">
		    		<a href="<?php echo base_url().'index/detail_blog/'.$bg->id; ?>"><?php echo substr($bg->judul, 0, 50); ?></a>
		    	</div>
		        
		        <div class="isi-card">
		        	<?php echo substr($bg->isi, 0, 132);?>
		        </div>

		  </div>
	 		<!-- end card body -->

		</div>
  </div>
<?php } ?>
  </div>
   <!-- end row -->

</div>
	
