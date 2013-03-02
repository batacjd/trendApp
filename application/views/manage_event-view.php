<?php $this->load->view('header')?>

<div data-role="page">

	<div data-role="header">
		<?php $this->load->view('navbar.php')?>
    </div><!-- /header -->
    
    <div data-role="content">
    <div>
    	<form method="post" action="add_event" data-ajax="false">
    	<br /><i>Enter a event name</i><?php echo form_error('eventName') ?>
    	<br /><input type="text" name="eventName" data-mini="true">
    	<br /><i>Add event details:</i>
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
			<input type="text" value="<?php echo $unitid?>" name="unitid" id="mUnitid">
			<input type="submit" value="Submit">
		</form>
    </div>
    
    </div>
    
</div>

<?php $this->load->view('footer')?>