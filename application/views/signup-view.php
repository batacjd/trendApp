<?php $this->load->view('header')?>
<style>

	.form-signup {
		padding: 19px 29px 29px;
        margin: 0px auto 20px;
        background-color: #fff;
        border: 1px solid #aaa;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
	}
	
	.mini_head {
		padding: 19px 29px 29px;
		color: #ffffff
	}

</style>

<div class="row">
	<br>
	<div class="span4">
	<div class="mini_head">
		<h1>Signup</h1>
		<p class="lead">Join now. Don't worry, it's free.</p>
	</div>
	</div>

    <div class="span8">
    	<form class="form-signup" method="post" action="<?php echo site_url('signup/register') ?>">
		    <table width="100%">
		    <col width="25%">
		  	<col width="75&">
		    <tr><p>Account Details:</p></tr>
		    <tr>
		    	<td>Username:</td>
				<td><input type="text" name="username" class="input-xlarge" value="<?php echo set_value('username'); ?>" /></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo form_error('username'); ?></td>
			</tr>
			<tr>
		    	<td>Password:</td>
				<td><input type="password" name="password" class="input-xlarge" value="<?php echo set_value('password'); ?>" /></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo form_error('password'); ?></td>
			</tr>
			<tr>
		    	<td>Confirm Password:</td>
				<td><input type="password" name="c_password" class="input-xlarge" value="<?php echo set_value('c_password'); ?>" /></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo form_error('c_password'); ?></td>
			</tr>
			<tr>
		    	<td>Email:</td>
				<td><input type="text" name="email" class="input-xlarge" value="<?php echo set_value('email'); ?>" /></td>
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
				<td><input type="text" name="givenname" class="input-xlarge" value="<?php echo set_value('givenname'); ?>" /></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo form_error('givenname'); ?></td>
			</tr>
			<tr>
		    	<td>Last name:</td>
				<td><input type="text" name="lastname" class="input-xlarge" value="<?php echo set_value('lastname'); ?>" /></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo form_error('lastname'); ?></td>
			</tr>
			<tr>
		    	<td></td>
		    	<td><input type="submit" class="btn btn-primary" value="Create my account" ></td>
		    </tr>
    	</form>
    </div>
    
</div>

<?php $this->load->view('footer')?>