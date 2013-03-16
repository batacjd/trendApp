<?php $this->load->view('header')?>

<div data-role="page">

	<div data-role="header">
		<?php $this->load->view('navbar.php')?>
    </div><!-- /header -->
    
    <div data-role="content">
		<ul data-role="listview" data-theme="a">
		<li data-role="divider" data-theme="b"><h4>Your top-rated places:</h4></li>
		<?php 
    	
    	if(count($res) > 0){
			foreach($res as $r){
				echo '<li data-icon="'.$r['categoryid'].'" class="ui-btn-icon-left"><a href="'.site_url('search/selected?name='.$r['unitname'].'&lat='.$r['lat'].'&lng='.$r['lng'].'&distance=1000&address='.$r['address'].'&icon='.$r['categoryid'].'&id='.$r['venueid']).'" style="padding-left: 80px"><h3>'.$r['unitname'].'</h3><p>'.$r['address'].' || Rating: '.$r['rating'].'</p></a></li>';
			}
    	}else{
    		echo '<li data-icon="false"><a href="'.site_url("search").'">You haven\'t rated anything yet.<br>Start rating now :)</a></li>';
    	}
    	
	?>
		</ul>
    </div>
    
</div>

<?php $this->load->view('footer')?>