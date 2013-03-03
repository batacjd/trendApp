<?php $this->load->view('header')?>

<div data-role="page">

	<div data-role="header">
		<?php $this->load->view('navbar.php')?>
    </div><!-- /header -->
    
    <div data-role="content">
    	<div class="ui-bar ui-bar-b">
	    <?php 
	    	echo '<h1>'.$pname.'</h1>';
	    	echo '<p>Description: '.$mechanics.'</p>';
	    	echo '<p>Start Date: '.$start.'</p>';
	    	echo '<p>End Date: '.$end.'</p>';
	    	echo '<br > Location: ';
	    	echo '<a href="'.site_url('search/selected?name='.$unitname.'&lat='.$lat.'&lng='.$lng.'&distance='.$distance.'&address='.$address.'&icon='.$icon.'&id='.$id).'" data-mini="true" data-inline="true" data-theme="c" class="smallBtn">'.$unitname.'</a>';
	   		//echo '<a href="'.site_url('search/selected?name='.$unitname.'&lat='.$lat.'&lng='.$lng.'&distance='.$distance.'&address='.$address.'&icon='.$icon.'&id='.$id).'">Home</a>';
	    	?>
	   		
	    	
	    
	   </div>
	   <br />
	   <div class="ui-bar ui-bar-b">
	   <?php 
	   		if($address != '<br%20/>') {
	   			echo '<b>'.$unitname.'</b> is at the <b>'.$address.'.</b><br /><br />';
	   		}
	   		echo 'Click the location button above to show where the promo/event is located.';
	   
	   ?>
	   
	   </div>
		
    </div>
    
</div>

<?php $this->load->view('footer')?>