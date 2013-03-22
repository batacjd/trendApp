<?php $this->load->view('header')?>

<?php $this->load->view('navbar.php')?>
<style>
.well {
	padding-top: 0px;
	padding-bottom: 0px;
	padding-left: 10px;
	padding-right: 10px;
}

</style>
<div class="row content">
<div class="span6">
    <h3>Your promos/events listings:</h3>
    <?php 
    
    	if(count($res) > 0){
			foreach($res as $r){
				//echo '<li><a href="'.site_url('promo_event/selected?pname='.$r['promoeventname'].'&loc='.$r['unitname'].'&unitid='.$r['unitid'].'&start='.$r['startdate'].'&end='.$r['enddate'].'&des='.$r['mechanics'].'&add='.$r['address']).'"><h3>'.$r['promoeventname'].'</h3><p>'.$r['unitname'].'</p></a></li>';
				echo '<div class="well well-small">';
				echo '<h5>'.$r['promoeventname'];
				echo '<a class="btn btn-mini btn-danger pull-right" href="delete/'.$r['promoeventid'].'">Delete</a></h5>';
				echo '<p>'.$r['mechanics'].'</p>';
				echo '</div>';
			}
    	}else{
    		echo 'No listings here :(';
    	}
    	
	?>
</div>
</div>


<?php $this->load->view('footer')?>