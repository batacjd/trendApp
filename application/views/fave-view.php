<?php $this->load->view('header')?>

<?php $this->load->view('navbar.php')?>

<div class="row content">
	<div class="span6 fixed" >
		<h3>Rated</h3>
		<p class="lead">All your ratings in one place.</p>
		<p>We have listed here the places that you have rated. Of course, the best ones come in the list first.</p>
	</div>
	<br>
	<div class="span6 offset6">
		<ul class="nav nav-tabs nav-stacked nav_results">
			<li><h4>Rated places:</h4></li>
				<?php 
			    	if(count($res) > 0){
						foreach($res as $r){
							echo '<li>
									<i class="icon-'.$r['categoryid'].' pull-left"></i>
									<a href="'.site_url('search/selected?name='.$r['unitname'].'&lat='.$r['lat'].'&lng='.$r['lng'].'&distance=1000&address='.$r['address'].'&icon='.$r['categoryid'].'&id='.$r['venueid']).'"><p>'.$r['unitname'].'</p><p>'.$r['address'].' || Rating: '.$r['rating'].'</p></a>
								</li>';
						}
			    	}else{
			    		echo '<li data-icon="false"><a href="'.site_url("search").'">You haven\'t rated anything yet.<br>Start rating now :)</a></li>';
			    	}
				?>
		</ul>
	</div>
</div>

<?php $this->load->view('footer')?>
