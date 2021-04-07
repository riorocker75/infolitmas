<br>
<br>
<br>
<br>
<br>
<div class="container">

	<div class="card" >
 <!--  <img src="..." class="card-img-top" alt="..."> -->
 <?php foreach($blog as $bg){?>
  <div class="card-body">

    <h2 class="card-title"><?php echo $bg->judul?></h2>
    
    <br>
    <br>
    <div>
      <?php echo $bg->isi?>
    </div>
  </div>
<?php }?>
</div>
	
</div>