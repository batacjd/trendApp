<?php $this->load->view('header')?>

<div data-role="page">

	<div data-role="header">
		<?php $this->load->view('navbar.php')?>
    </div><!-- /header -->
    
    <div data-role="content">
    <?php echo '<h2>'.$name.' (Promo)</h2> '.$address?>
    <hr />
    <div>
    	<form method="post" action="add_promo" data-ajax="false">
    	<br /><i>Enter a promo name</i><?php echo form_error('promoName') ?>
    	<br /><input type="text" name="promoName" data-mini="true">
    	<br /><i>Add description and mechanics:</i>
    	<br /><input type="text" name="description" data-mini="true">
    	<br /><i>Start date:</i>
    	<div data-role="fieldcontain">
					    <fieldset data-role="controlgroup" data-type="horizontal" >
					        <select name="start-month" data-theme="a" data-mini="true">
					            <option value="1">January</option>
					            <!-- etc. -->
					        </select>
					        <select name="start-day" data-theme="a" data-mini="true">
					            <option value="1">1</option>
					            <!-- etc. -->
					        </select>
					        <select name="start-year" data-theme="a" data-mini="true">
					            <option value="2013">2013</option>
					            <!-- etc. -->
					        </select>
					        
					    </fieldset>
					</div>
    	<br /><i>End date:</i>
    	<div data-role="fieldcontain">
					    <fieldset data-role="controlgroup" data-type="horizontal" >
					        <select name="end-month" data-theme="a" data-mini="true">
					            <option value="1">January</option>
					            <!-- etc. -->
					        </select>
					        <select name="end-day" data-theme="a" data-mini="true">
					            <option value="1">1</option>
					            <option value="2">2</option>
					            <!-- etc. -->
					        </select>
					        <select name="end-year" data-theme="a" data-mini="true">
					            <option value="2013">2013</option>
					            <!-- etc. -->
					        </select>
					        
					    </fieldset>
					</div>
			<input type="text" value="<?php echo $name?>" name="unitname" id="mUnitname">
			<input type="text" value="<?php echo $address?>" name="address" id="mAddress">
			<input type="text" value="<?php echo $unitid?>" name="unitid" id="mUnitid">
			<input type="submit" value="Submit">
		</form>
    </div>
    
    </div>
    
</div>

<?php $this->load->view('footer')?>