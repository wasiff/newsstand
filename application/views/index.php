<!DOCTYPE html>
<html lang="en">
	
	<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>Newsstand</title>
   <?php $this->load->view('includes/head') ?>
	</head>
	
   <body>
	   <?php $this->load->view('includes/nav'); ?>
      <div id="wrapper">
         <div class="container">
			 <div class="row">
				 <?php
				 foreach($highlights as $row){
				 ?>
				 
  				 <div class="col-sm-4">
                    <div class="thumbnail" style="min-height:370px">
                       <img src="<?= base_url() ?>uploads/<?= $row['image'] ?>" alt="Image" width="350">
                       <div class="caption">
                          <h3><?= $row['title'] ?></h3>
                          <p><?= substr(strip_tags($row['newstext']),0,40) ?>...</p>
						  <p><strong><?= $row['first_name'].' '.$row['last_name'].' ('.$row['email'].')' ?></strong></p>
                          <a class="btn btn-warning" href="<?= base_url() ?>article/view/<?= $row['id'] ?>">Read More <i class="fa fa-arrow-right"></i></a>
                       </div>
                    </div>
                 </div>
				 
				 <?php
				 }
				 ?>
			 </div>
		 	</div>
         </div>
      </div>
	  
	  <?php $this->load->view('includes/footer') ?>
      
   </body>
</html>
