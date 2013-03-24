<?php $this->load->view('header')?>

<?php $this->load->view('navbar.php')?>

<div class="row content">
    <div class="span6">
    	<?php echo '<h3>'.$data[0]['promoeventname'].'</h3>'?>
    	<?php echo '<p>'.$data[0]['mechanics'].'</p>'?>
    	<hr>
    	<div class="alert alert-success">
    		<h4>Success!</h4>
    		Your <?php if($data[0]['unittypeid'] == '2') { echo 'promo'; }else{ echo 'event'; }?> has been recorded.
    	</div>
    	<p>Click <a href="<?php echo site_url('promo_event/selected?pid='.$data[0]['promoeventid'])?>">here</a> to view your <?php if($data[0]['unittypeid'] == '2') { echo 'promo'; }else{ echo 'event'; }?>.
    </div>
    <br>
    <div class="span6">
		<div class="progress progress-striped active">
	  		<div class="bar bar-success" style="width: 100%;"></div>
		</div>
		<div class="alert alert-success">
			<h4>Step 1</h4>
			Fill in the form with necessary details
		</div>
		<div class="alert alert-success">
			<h4>Step 2</h4>
			Upload a picture, poster, or publicity material
		</div>
	</div>
</div>

<?php $this->load->view('footer')?>