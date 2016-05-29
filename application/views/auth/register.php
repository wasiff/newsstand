<!DOCTYPE html>
<html lang="en">
	
	<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>Newsstand - Register</title>
   <?php $this->load->view('includes/head') ?>
	</head>
	
   <body>
	   <?php $this->load->view('includes/nav'); ?>
      <div id="wrapper">
         <div class="container">
			 <div class="row">
				 <div class="flat-form col-lg-6">
					 
				<?php
				if(validation_errors()){?>
				<div class="alert alert-dismissable alert-primary">
				   <?php echo validation_errors() ?>
				</div>
				<?php }
				?>
			    <div class="header">
			       <h3>Register</h3>
			    </div>
			    <div class="content">
			       <form role="form" method="post" action="">
 			          <div class="form-group">
 			             <label>First Name</label> 
						 <input type="text" name="firstname" class="form-control" value="<?= set_value('firstname') ?>" placeholder="Enter first name">
 			          </div>
			          <div class="form-group">
			             <label>Last Name</label>
						 <input type="text" name="lastname" class="form-control" value="<?= set_value('lastname') ?>" placeholder="Enter last name">
			          </div>
			          <div class="form-group">
			             <label>Email</label>
						 <input type="email" name="email_address" class="form-control" value="<?= set_value('email_address') ?>" placeholder="Enter email">
			          </div>
			          <button type="submit" class="btn btn-primary">Submit</button>
			       </form>
			    </div>
			 </div>
		 	</div>
         </div>
      </div>
	  
	  <?php $this->load->view('includes/footer') ?>
      
   </body>
</html>
