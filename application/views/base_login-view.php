<?php $this->load->view('header')?>

<div data-role="page">
 
    <div data-role="header">
        <h1>trendApp</h1>
    </div><!-- /header -->
	
    <div data-role="content">
    
    <form method="post" action="<?php echo site_url('base_login/do_login') ?>" data-ajax="false"> <!--  -->
    <?php //echo form_open('base_login/do_login'); ?>
        <p align="center">Welcome to <b>trendApp</b>!</p>
        <label for="basic">Username:</label>
		<input type="text" name="username" value="<?php echo set_value('username'); ?>"/>
		<label for="basic">Password:</label>
		<input type="password" name="password" value="<?php echo set_value('password'); ?>"/>
		<center>
		<?php echo form_error('username'); ?>
		<?php echo form_error('password'); ?>
		</center>
		
		<!-- <div data-role="controlgroup" data-type="horizontal"> -->
			<input type="submit" value="Login" data-theme="b">
			<a href="<?php echo site_url('signup')?>" data-role="button" data-theme="c">New user? Sign up now!</a>
		<!-- </div> -->
		
		<br/>
		<br/>
	</form><!-- end form -->
	<?php //echo form_close(); ?>
		<center><a href="#">Learn more about trendApp</a>
		</center>
		
	
    </div><!-- /content -->
    
    <div data-role="footer">
        <h4>(c) CS 199 trendApp. All rights reserved</h4>
    </div><!-- /footer -->
 
    
</div><!-- /page -->

<?php $this->load->view('footer')?>