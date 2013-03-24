<?php $this->load->view('header')?>

<?php $this->load->view('navbar.php')?>

<div class="row content">
    <div class="span6">
    
    	<?php echo '<h3>'.$pname.'</h3>'?>
    	<?php echo '<p>'.$mechanics.'</p>'?>
    	<hr />
    	<div class="alert alert-warning">
    		<h4>Upload a picture.</h4>
    		Only GIF, JPG, and PNG file formats with maximum of 100kb size and 1024x768 dimensions are allowed.
    	</div>
    	<?php echo form_open_multipart('upload/do_upload?promoeventid='.$promoeventid);?>
    	<input type="file" name="userfile"/>
		<input type="submit" value="Upload" class="btn btn-danger"/>
		</form>
		<br>
		<?php if(isset($error)) { echo '<div class="alert alert-error">'; print_r($error); echo '</div>'; }?>
		<br>
		<a class="btn" href="<?php echo site_url('upload/upload_skip?promoeventid='.$promoeventid) ?>">Upload picture later.</a>
    </div>
    <br>
    <div class="span6">
		<div class="progress progress-striped active">
	  		<div class="bar bar-success" style="width: 60%;"></div>
		</div>
		<div class="alert alert-success">
			<h4>Step 1</h4>
			Fill in the form with necessary details
		</div>
		<div class="alert">
			<h4>Step 2</h4>
			Upload a picture, poster, or publicity material
		</div>
		
	</div>
</div>

<?php $this->load->view('footer')?>