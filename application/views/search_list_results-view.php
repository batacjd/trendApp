<?php $this->load->view('header')?>

<?php $this->load->view('navbar.php')?>

<script>

function showDiv() {
	   document.getElementById('#page1').style.display = "block";
	}

</script>

<div class="row content">

	<div class="span6 fixed">
		<h3>Search results.</h3>
		<p class="lead">We have listed what we have found.</p>
		<p>The results are separated in tabs. The "Venues" tab has all the establishments near you. 
			The "Promos" and "Events" tab lists, well, the promos and events</p>
		<p>If you didn't find anything interesting, try using search.</p>
    </div>
    <br>
	<div class="span6 offset6">
	
		<div class="tabbable">
		
			<ul class="nav nav-tabs">
				<li class="active"><a href="#venue" data-toggle="tab">Venues</a></li>
				<li><a href="#promo" data-toggle="tab">Promos</a></li>
				<li><a href="#event" data-toggle="tab">Events</a></li>
			</ul>
			
			<div class="tab-content">
				<div class="tab-pane active" id="venue">
				<!-- 
				<div class="pagination">
				<ul>
			    	<li><a href="#page1">1</a></li>
			    	<li><a href="#page2">2</a></li>
			    	<li><a href="#page3">3</a></li>
			    	<li><a href="#page4">4</a></li>
			    	<li><a href="#page5">5</a></li>
				</ul>
				</div>
				 -->
				<ul class="nav nav-tabs nav-stacked nav_results">
				    <?php
				    
				    //$page = 0;
				    //$ctr = 0;
				    	if(isset($res->response->venues)){
							if(count($res->response->venues) > 0){
								
						 		foreach ($res->response->venues as $v) {
									/*
						 			if($ctr == 0){
						 				$page++;
						 				echo '<div id="page'.$page.'" >';
						 				echo '<ul class="nav nav-tabs nav-stacked nav_results">';
						 			}
						 			*/
									$address = '';
									if(array_key_exists('address', $v->location)){
										$address = $v->location->address;
									}else{
										$address = '<br />';
									}
									$icon = '';
									if ($v->icon == '' || $v->icon == 'default'){
										$icon = '10';
									}else {
										$icon = $v->icon;
									}
									echo '	<li>
												<i class="icon-'.$icon.' pull-left"></i>
												<a href="'.site_url('search/selected?name='.$v->name.'&lat='.$v->location->lat.'&lng='.$v->location->lng.'&distance='.$v->location->distance.'&address='.$address.'&icon='.$icon.'&id='.$v->id).'"><p>'.$v->name.'</p><p>'.$address.'</p></a>
											</li>';
									/*
									$ctr++;
									if($ctr == 6){
										echo '</ul></div>';
										$ctr = 0;
									}*/
								}
						  }else{
						  		echo '<div class="alert alert-warning">';
						   	 	echo '<li data-icon="false">Sorry. No entries matched your query.</li>';
						   	 	echo '</div>';
						  }
				    	}else{
						    echo '<div class="alert alert-warning">';
						    echo '<li data-icon="false">Sorry. No entries matched your query.</li>';
						    echo '</div>';
				    	}
				    	
					?>
				</ul>
				</div>
				
				<div class="tab-pane" id="promo">
					<ul class="nav nav-tabs nav-stacked nav_results">
					<?php 
				    
				    	if(count($promos) > 0){
							foreach($promos as $r){
								echo '<li>
										<a href="'.site_url('promo_event/selected?pid='.$r['promoeventid']).'"><p>'.$r['promoeventname'].'</p><p>'.$r['unitname'].'</p></a>
									</li>';
								
							}
				    	}else{
				    		echo '<div class="alert alert-warning">';
						    echo '<li data-icon="false">Sorry. No promos listed yet.</li>';
						    echo '</div>';
				    	}
				    	
					?>
				    </ul>
				</div>
				
				<div class="tab-pane" id="event">
					<ul class="nav nav-tabs nav-stacked nav_results">
					<?php 
				    
				    	if(count($events) > 0){
							foreach($events as $r){
								echo '<li>
										<a href="'.site_url('promo_event/selected?pid='.$r['promoeventid']).'"><p>'.$r['promoeventname'].'</p><p>'.$r['unitname'].'</p></a>
									</li>';
								
							}
				    	}else{
				    		echo '<div class="alert alert-warning">';
						    echo '<li data-icon="false">Sorry. No events listed yet.</li>';
						    echo '</div>';
				    	}
				    	
					?>
				    </ul>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('footer')?>