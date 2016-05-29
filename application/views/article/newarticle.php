<!DOCTYPE html>
<html lang="en">
	
	<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>Newsstand - New Article</title>
   <?php $this->load->view('includes/head') ?>
	</head>
	
   <body>
	   <?php $this->load->view('includes/nav'); ?>
      <div id="wrapper">
         <div class="container">
			 <div class="row">
				 <div class="flat-form col-lg-12">
					 
				<?php
				if(validation_errors()){?>
					
					<div class="alert alert-dismissable alert-primary">
					   <?php echo validation_errors() ?>
					</div>
					
				<?php }elseif(isset($error)){ ?>
					
					<div class="alert alert-dismissable alert-primary">
					   <?php echo $error ?>
					</div>
					
				<?php
				
				}
				?>
			    <div class="header">
			       <h3>New Article</h3>
			    </div>
			    <div class="content">
					<?php echo form_open_multipart('article/newarticle');?>
			    
 			          <div class="form-group">
 			             <label>Title</label> 
						 <input type="text" name="title" class="form-control" value="<?= set_value('title') ?>" placeholder="Enter title">
 			          </div>
			          <div class="form-group">
			             <label>Image</label>
						 <input type="file" name="userfile" size="20" class="form-control" >
			          </div>
			          <div class="form-group">
			             <label>Article</label>
						 <textarea name="article"><?= set_value('article') ?></textarea>
			          </div>
			          <div class="form-group">
			             <label>Publish Article</label>
						 <input type="checkbox" name="publish" value="1" checked>
			          </div>
			          <button type="submit" class="btn btn-primary">Submit</button>
			       </form>
			    </div>
			 </div>
		 	</div>
         </div>
      </div>
	  
	  <?php $this->load->view('includes/footer') ?>
      <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	  <script>tinymce.init({ selector:'textarea', min_height: 400 });</script>
   </body>
</html>
