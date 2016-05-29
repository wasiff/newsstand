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
					 
			
			    <div class="header">
			       <h3>My News Articles</h3>
			    </div>
				<div class="panel panel-default">
				   <div class="panel-body">
				      <table class="table table-striped table-hover ">
				         <thead>
				            <tr>
				               <th>ID</th>
				               <th>Title</th>
							   <th>Image</th>
				               <th>News Text</th>
				               <th>Date</th>
							   <th>Published</th>
							   <th>&nbsp;</th>
				            </tr>
				         </thead>
				         <tbody>
				            <?php
							if(!empty($articles)){
								foreach($articles as $row){
						            echo '<tr>';
						            echo '<td><a href="'.base_url().'article/view/'.$row['id'].'">'.$row['id'].'</a></td>';
						            echo '<td><a href="'.base_url().'article/view/'.$row['id'].'">'.$row['title'].'</a></td>';
						            echo '<td><a href="'.base_url().'article/view/'.$row['id'].'"><img src="'.base_url().'uploads/'.$row['image'].'" width="40"></a></td>';
						            echo '<td><a href="'.base_url().'article/view/'.$row['id'].'">'.substr(strip_tags($row['newstext']),0,50).'...</a></td>';
									echo '<td>'.date('d/m/Y H:i:s', strtotime($row['datetime'])).'</td>';
									echo '<td>'. ($row['publish'] ? 'Yes' : 'No') .'</td>';
									echo '<td><a href="'.base_url().'article/delete/'.$row['id'].'" data-id="'.$row['id'].'" class="btn btn-danger btn-circle delete" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete News Article" type="button"><i class="fa fa-times"></i></a>';
										
									if($row['publish']){
										echo '<a href="'.base_url().'article/unpublish/'.$row['id'].'" class="btn btn-warning btn-circle unpublish" data-toggle="tooltip" data-placement="top" title="" data-original-title="Unpublish Article" type="button"><i class="fa fa-link"></i></a></td>';
									}else{
										echo '<a href="'.base_url().'article/publish/'.$row['id'].'" class="btn btn-warning btn-circle publish" data-toggle="tooltip" data-placement="top" title="" data-original-title="Publish Article" type="button"><i class="fa fa-link"></i></a></td>';
									}
									
						            echo '</tr>';
								}
							}else{
					            echo '<tr>';
					            echo '<td colspan="7">No Data</td>';
					            echo '</tr>';
							}
							?>
				            
				         </tbody>
				      </table>
				   </div>
				</div>
			 </div>
		 	</div>
         </div>
      </div>
	  
	  <?php $this->load->view('includes/footer') ?>
      <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	  <script>tinymce.init({ selector:'textarea', min_height: 400 });</script>
	  <script>
	  $(document).ready(function(){
	  	$('table [data-toggle="tooltip"]').tooltip();
		
		$(".delete").click(function(){
			if(!confirm('Are you sure you want to delete this news article?')){
				return false;
			}
		});
		
		$(".unpublish").click(function(){
			if(!confirm('Are you sure you want to unpublish?')){
				return false;
			}
		});
		
		$(".publish").click(function(){
			if(!confirm('Are you sure you want to publish?')){
				return false;
			}
		});
		
		
		
	  });
	  </script>
   </body>
</html>
