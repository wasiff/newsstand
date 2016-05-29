	   <nav class="navbar  navbar-inverse" role="navigation">
	      <div class="container-fluid">
	         <div class="navbar-header">
	            <a class="navbar-brand" href="<?= base_url() ?>">Newsstand</a>
	         </div>
	         <!-- Collect the nav links, forms, and other content for toggling -->
	         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
	            <ul class="nav navbar-nav">
	               <li class="active"><a href="<?= base_url().'feed' ?>" target="_blank"><i class="fa fa-rss"></i>RSS Feed</a></li>
	            </ul>
	            <ul class="nav navbar-nav navbar-right">
					
					<?php
					if(!$this->authl->loggedIn()){
						echo '<li><a href="'.base_url().'auth/login">Login</a></li>';
				   	    echo '<li><a href="'.base_url().'auth/register">Register</a></li>';
					}else{
						?>
						
		            <li class="dropdown">
		               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $this->authl->fname() ?><span class="caret"></span></a>
		               <ul class="dropdown-menu" role="menu">
		                  <li><a href="<?= base_url() ?>article/newarticle">New Article</a></li>
		                  <li><a href="<?= base_url() ?>article/listall">My Articles</a></li>
		                  <li class="divider"></li>
		                  <li><a href="<?= base_url() ?>auth/logout">Logout</a></li>
		               </ul>
		            </li>
					<?php
					}
					?>
	               

	            </ul>
	         </div>
	         <!-- /.navbar-collapse -->
	      </div>
	      <!-- /.container-fluid -->
	   </nav>