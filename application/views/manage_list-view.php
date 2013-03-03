<?php $this->load->view('header')?>

<div data-role="page">

	<div data-role="header">
		<?php $this->load->view('navbar.php')?>
		
    </div><!-- /header -->
    
	<div data-role="content">
    <ul data-role="listview" data-theme="a">
    <li data-role="divider" data-theme="b"><h4>Your promos/events listings:</h4></li>
    <?php 
    
    	if(count($res) > 0){
			foreach($res as $r){
				//echo '<li><a href="'.site_url('promo_event/selected?pname='.$r['promoeventname'].'&loc='.$r['unitname'].'&unitid='.$r['unitid'].'&start='.$r['startdate'].'&end='.$r['enddate'].'&des='.$r['mechanics'].'&add='.$r['address']).'"><h3>'.$r['promoeventname'].'</h3><p>'.$r['unitname'].'</p></a></li>';
				echo '<div class="ui-bar ui-bar-b">';
				echo '<h3>'.$r['promoeventname'].'</h3>';
				echo '<a href="delete/'.$r['promoeventid'].'" data-mini="true" data-inline="true" data-theme="c" class="smallBtn">Delete</a>';
				echo '<p>'.$r['mechanics'].'</p>';
				echo '</div>';
			}
    	}else{
    		echo 'No listings here :(';
    	}
    	
	?>
    </ul>
	</div>

</div>

<?php $this->load->view('footer')?>