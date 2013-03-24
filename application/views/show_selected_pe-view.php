<?php $this->load->view('header')?>

<?php $this->load->view('navbar.php')?>

    
<div class="row content">
    <div class="span6">
	    <?php 
	    	echo '<h3>'.$pname.'</h3>';
	    	echo '<table class="table table-striped">';
	    	echo '<tbody>';
	    	echo '<tr>';
	    	echo '<td>';
	    	echo '<p><i>Details: </i></p>';
	    	echo '</td>';
	    	echo '<td>';
	    	echo '<p><b>'.$mechanics.'</b></p>';
	    	echo '</td>';
	    	echo '</tr>';
	    	echo '<tr>';
	    	echo '<td>';
	    	echo '<p><i>Start Date: </i>';
	    	echo '</td>';
	    	echo '<td>';
	    	echo date_format(date_create($start),"F d, Y. g:i a.").'</p>';
	    	echo '</td>';
	    	echo '</tr>';
	    	echo '<tr>';
	    	echo '<td>';
	    	echo '<p><i>End Date: </i>';
	    	echo '</td>';
	    	echo '<td>';
	    	echo date_format(date_create($end),"F d, Y. g:i a.").'</p>';
	    	echo '</td>';
	    	echo '</tr>';
	    	echo '</tbody>';
	    	echo '</table>';
	    	echo '<br > Location: ';
	    	echo '<a href="'.site_url('search/selected?name='.$unitname.'&lat='.$lat.'&lng='.$lng.'&distance='.$distance.'&address='.$address.'&icon='.$icon.'&id='.$id).'" class="btn btn-small btn-danger">'.$unitname.'</a>';
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
	   <br />
    <div class="span6">
    	<?php 
    		if($picture != ''){
    			echo '<img src="/trendApp/Images/uploads/'.$picture.'"/>';
    		}else{
    			echo '<div class="well">';
    			echo '<p>No image</p>';
    			if($this->session->userdata('superuserid') == $superuserid){
    				echo form_open_multipart('upload/do_upload?promoeventid='.$promoeventid);
			    	echo '<input type="file" name="userfile"/>';
					echo '<input type="submit" value="Upload" class="btn btn-danger"/>';
					echo '</form>';
    			}
    			echo '</div>';
    		}
    	?>
    </div>
</div>

<?php $this->load->view('footer')?>