<?php $this->load->view('header')?>

<?php $this->load->view('navbar.php')?>

<div class="row content">
	<div class="span6 fixed" >
		<h3>Welcome, <?php echo $givenname.' '.$lastname?>!</h3>
		<p class="lead">Found you!</p>
		<div id="map_home"></div>
		<br>
		<div class="alert alert-info">
			<p>If the location doesn't seem to be so right, please try refreshing the page.</p>
		</div>
	</div>
	<br>
	<div class="span6 offset6">
		<ul class="nav nav-tabs nav-stacked nav_results">
			<li><h4>Check out these places:</h4></li>
				<?php 
				if(count($res) > 0){
					foreach($res as $r){
						echo '	<li>
									<i class="icon-'.$r['categoryid'].' pull-left"></i>
									<a href="'.site_url('search/selected?name='.$r['unitname'].'&lat='.$r['lat'].'&lng='.$r['lng'].'&distance=1000&address='.$r['address'].'&icon='.$r['categoryid'].'&id='.$r['venueid']).'"><p>'.$r['unitname'].'</p><p>'.$r['address'].' || Rating: '.$r['rating'].'</p></a>
								</li>';
						
					}
			    }else{
			    	echo '<li><a href="'.site_url("search").'">Sorry we can\'t recommend anything yet.<br>Start rating now :)</a></li>';
			    }
				?>
		</ul>
	</div>
</div>

<?php $this->load->view('footer')?>