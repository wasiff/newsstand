<!DOCTYPE html>
<html lang="en">
	
	<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>Newsstand - New Password</title>
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
			       <h3>Create new passowrd</h3>
			    </div>
			    <div class="content">
			       <form role="form" method="post" action="">
 			          <div class="form-group">
 			             <label>Password</label> 
						 <input type="password" name="password" class="form-control" placeholder="Enter password">
 			          </div>
			          <div class="form-group">
			             <label>Confirm Password</label>
						 <input type="password" name="password_confirm" class="form-control" placeholder="Enter confirm password">
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
