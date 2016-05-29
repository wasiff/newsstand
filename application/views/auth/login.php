<!DOCTYPE html>
<html lang="en">
	
	<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>Newsstand - Login</title>
   <?php $this->load->view('includes/head') ?>
	</head>
	
   <body>
	   <?php $this->load->view('includes/nav'); ?>
      <div id="wrapper">
         <div class="container">
			 <div class="row">
				 <div class="flat-form col-lg-6">
					
					<?php
					if(isset($pwchanged) && $pwchanged){
					?>
				 <div class="alert alert-dismissable alert-success">
				    <button data-dismiss="alert" class="close" type="button">×</button>
				    <i class="fa fa-check icon-sign"></i>
				    Password successfully changed.
				 </div>
					<?php
					}
					?>
					 
					<?php
					if(validation_errors()){?>
					<div class="alert alert-dismissable alert-primary">
					   <?php echo validation_errors() ?>
					</div>
					<?php }
					?>
					 
			    <div class="header">
			       <h3>Login</h3>
			    </div>
			    <div class="content">
			       <form role="form" method="post" action="">
			          <div class="form-group">
			             <label>Email address</label> <input type="email" name="email_address" value="<?= set_value('email_address') ?>" class="form-control" placeholder="Enter email">
			          </div>
			          <div class="form-group"> 
			             <label>Password</label> <input type="password" name="password" class="form-control" placeholder="Password">
			          </div>
			          <div class="checkbox">
			             <label> <input type="checkbox"> Remember me </label> 
			          </div>
			          <button type="submit" class="btn btn-primary">Submit</button>
			          <button class="btn btn-default">Cancel</button>
			       </form>
			    </div>
			 </div>
		 	</div>
         </div>
      </div>
	  
	  <?php $this->load->view('includes/footer') ?>
      
   </body>
</html>
