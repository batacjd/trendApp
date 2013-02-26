<?php $this->load->view('header')?>

<div data-role="page" >
 
    <div data-role="header">
    	<a href="index.html" data-role="button" data-theme="b" data-icon="arrow-l" data-rel="back" data-iconpos="notext" >Delete</a>
        <h1>trendApp - Sign up</h1>
    </div><!-- /header -->
	
	
    <div data-role="content">
    	<form method="post" action="<?php echo site_url('signup/register') ?>">
		    <table width="100%">
		    <col width="25%">
		  	<col width="75&">
		    <tr><p>Account Details:</p></tr>
		    <tr>
		    	<td>Username:</td>
				<td><input type="text" name="username" value="<?php echo set_value('username'); ?>" /></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo form_error('username'); ?></td>
			</tr>
			<tr>
		    	<td>Password:</td>
				<td><input type="password" name="password" value="<?php echo set_value('password'); ?>" /></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo form_error('password'); ?></td>
			</tr>
			<tr>
		    	<td>Confirm Password:</td>
				<td><input type="password" name="c_password" value="<?php echo set_value('c_password'); ?>" /></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo form_error('c_password'); ?></td>
			</tr>
			<tr>
		    	<td>Email:</td>
				<td><input type="text" name="email" value="<?php echo set_value('email'); ?>" /></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo form_error('email'); ?></td>
			</tr>
			</table>
			<hr />
			<table width="100%">
		    <col width="25%">
		  	<col width="75&">
		  	<tr><p>Personal Information</p></tr>
		  	<tr>
		    	<td>Given name:</td>
				<td><input type="text" name="givenname" value="<?php echo set_value('givenname'); ?>" /></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo form_error('givenname'); ?></td>
			</tr>
			<tr>
		    	<td>Last name:</td>
				<td><input type="text" name="lastname" value="<?php echo set_value('lastname'); ?>" /></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo form_error('lastname'); ?></td>
			</tr>
			<tr>
				<td>Birthdate:</td>
				<td>
					<div data-role="fieldcontain">
					    <fieldset data-role="controlgroup" data-type="horizontal" >
					        <select name="select-choice-month" data-theme="a">
					            <option value="1">January</option>
					            <!-- etc. -->
					        </select>
					        <select name="select-choice-day" data-theme="a">
					            <option value="1">1</option>
					            <!-- etc. -->
					        </select>
					        <select name="select-choice-year" data-theme="a">
					            <option value="2011">2011</option>
					            <!-- etc. -->
					        </select>
					        
					    </fieldset>
					</div>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><?php //echo form_error('select-choice-month'); ?></td>
			</tr>
		    </table>
		    
		    <input type="submit" value="Submit" data-theme="c">
    	</form>
    </div><!-- end content -->
    


</div><!-- end page -->

<?php $this->load->view('footer')?>