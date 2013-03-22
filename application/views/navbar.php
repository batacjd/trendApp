
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<div>
				<a class="brand" href="#">trendApp</a>
			</div>
			<div class="nav_right">
				<ul class="nav">
					<li><a href="<?php echo site_url('logout')?>">Logout</a></li>
				</ul>
			</div>
			<div class="nav_center">
				<ul class="nav">
					<li><a href="<?php echo site_url("home")?>"><i class="icon-home icon-white"></i> Home</a></li>
					<li><a href="<?php echo site_url("favorites")?>"><i class="icon-star icon-white"></i> Rated</a></li>
					<li><a href="<?php echo site_url("search")?>"><i class="icon-search icon-white"></i> Search</a></li>
					<?php 
					if($this->session->userdata('isSuperuser')){
						echo '<li><a href="'.site_url("manage/show_list").'" data-theme="d" data-icon="chartlargew"><i class="icon-th-list icon-white"></i> Manage</a></li>';
					}
					?>
				</ul>
			</div>
			
		</div>
	</div>
</div><!-- /navbar -->