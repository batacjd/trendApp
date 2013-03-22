<?php $this->load->view('header')?>

<?php $this->load->view('navbar.php')?>

    
<div class="row content">
    <div class="span6">
	    <?php 
	    	echo '<h3>'.$pname.'</h3>';
	    	echo '<p class="lead">'.$mechanics.'</p>';
	    	echo '<p>Start Date: '.$start.'</p>';
	    	echo '<p>End Date: '.$end.'</p>';
	    	echo '<br > Location: ';
	    	echo '<a href="'.site_url('search/selected?name='.$unitname.'&lat='.$lat.'&lng='.$lng.'&distance='.$distance.'&address='.$address.'&icon='.$icon.'&id='.$id).'" class="btn btn-small btn-danger">'.$unitname.'</a>';
	   		//echo '<a href="'.site_url('search/selected?name='.$unitname.'&lat='.$lat.'&lng='.$lng.'&distance='.$distance.'&address='.$address.'&icon='.$icon.'&id='.$id).'">Home</a>';
	    ?>
	   	<br><br><br>
	   	<div class="alert alert-info">
		<?php 
	   		if($address != '<br%20/>') {
	   			echo '<b>'.$unitname.'</b> is at the <b>'.$address.'.</b><br /><br />';
	   		}
	   		echo '<i>Click the location button above to show where the promo/event is located.</i>';
		?>
		</div>
	</div>
	   <br />
    
</div>

<?php $this->load->view('footer')?>