<!DOCTYPE html>
<html lang="en">
	
	<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>Newsstand - <?= $article['title'] ?></title>
   <?php $this->load->view('includes/head') ?>
	</head>
	
   <body>
      <div id="wrapper">
         <div class="container">
			 <div class="row">
				 <div class="flat-form col-lg-3" style="min-height:600px">
					 <a class="thumbnail" href="#">
                     <img src="<?= base_url() ?>uploads/<?= $article['image'] ?>" alt="Image" width="400">
                     </a>
				</div>
				 <div class="flat-form col-lg-9" style="min-height:600px">
			    <div class="header">
			       <h3><?= $article['title'] ?> <button class="btn btn-labeled btn-warning" type="button">
   <span class="btn-label"><i class="fa fa-bookmark"></i></span>Download PDF</button></h3>
   					<p><?= date('d/m/Y H:i:s',strtotime($article['datetime'])); ?></p>
					<p><?= $article['first_name'].' '.$article['last_name'].' ('.$article['email'].')' ?></p>
			    </div>
			    <div class="content">
					<?= $article['newstext'] ?>
			    </div>
			 </div>
		 	</div>
         </div>
      </div>
	  
   </body>
</html>
