<?php $this->load->view('header')?>

<?php $this->load->view('navbar.php')?>

<div class="row content">
	<div class="span6">
	
	    <?php echo '<h3>'.$name.' (Event)</h3><p class="lead"'.$address.'</p>'?>
	    <hr />
		
		<div class="alert">
			All fields are required. Make sure they are correct before submitting.
		</div>
		
	    <form method="post" action="add_event" class="form-horizontal">
	    	<div class="control-group">
	    		<label class="control-label" for="eventName">Enter a promo name</label>
	    		<div class="controls">
	    			<input type="text" name="eventName" id="eventName" class="input-xlarge">
	    			<?php echo $this->session->flashdata('validation_errors') ?>
	    		</div>
	    	</div>
	    	
	    	<div class="control-group">
	    		<label class="control-label" for="description">Add description and mechanics:</label>
	    		<div class="controls">
	    			<textarea rows="5" name="description" id="description" class="input-xlarge"></textarea>
	    		</div>
	    	</div>
	    	
	    	<div class="control-group">
	    		<label class="control-label">Start date:</label>
	    		<div class="controls">
	    			<div class="btn-group">
							<select name="start-month" class="span2 form-inline">
						    	<option value="1">January</option>
						            <!-- etc. -->
						    </select>
						    <select name="start-day" class="span1 form-inline">
						        <option value="1">1</option>
						            <!-- etc. -->
						    </select>
						    <select name="start-year" class="span1 form-inline">
						        <option value="2013">2013</option>
						            <!-- etc. -->
						    </select>    
					</div>
				</div>
			</div>
			
			<div class="control-group">
	    		<label class="control-label">End date:</label>
	    		<div class="controls">
	    			<div class="btn-group">
							<select name="end-month" class="span2 form-inline">
						    	<option value="1">January</option>
						            <!-- etc. -->
						    </select>
						    <select name="end-day" class="span1 form-inline">
						        <option value="1">1</option>
						            <!-- etc. -->
						    </select>
						    <select name="end-year" class="span1 form-inline">
						        <option value="2013">2013</option>
						            <!-- etc. -->
						    </select>    
					</div>
				</div>
			</div>

				<input type="text" value="<?php echo $name?>" name="unitname" id="mUnitname">
				<input type="text" value="<?php echo $address?>" name="address" id="mAddress">
				<input type="text" value="<?php echo $unitid?>" name="unitid" id="mUnitid">
				<div class="controls"><input type="submit" value="Add this event" class="btn btn-danger"></div>
			</form>
			
	</div>
	<br>
	<div class="span6">
		<div class="progress progress-striped active">
	  		<div class="bar bar-success" style="width: 10%;"></div>
		</div>
		<div class="alert">
			<h4>Step 1</h4>
			Fill in the form with necessary details
		</div>
		<div class="alert alert-info">
			<h4>Step 2</h4>
			Upload a picture, poster, or publicity material
		</div>
	</div>
</div>
    


<?php $this->load->view('footer')?>