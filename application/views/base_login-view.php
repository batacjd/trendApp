<?php $this->load->view('header')?>

<div data-role="page">
 
    <div data-role="header">
        <h1>trendApp</h1>
    </div><!-- /header -->
	
    <div data-role="content">
    <div class="ctrDiv">
    <form method="post" action="<?php echo site_url('base_login/do_login') ?>" data-ajax="false"> <!--  -->
    <?php //echo form_open('base_login/do_login'); ?>
        <p align="center">Welcome to <b>trendApp</b>!</p>
        
        <label for="basic">Username:</label>
		<input type="text" data-mini="true" name="username" value="<?php echo set_value('username'); ?>"/>
		<label for="basic">Password:</label>
		<input type="password" data-mini="true" name="password" value="<?php echo set_value('password'); ?>"/>
		<center>
		<?php echo form_error('username'); ?>
		<?php echo form_error('password'); ?>
		</center>
		<br />
		<!-- <div data-role="controlgroup" data-type="horizontal"> -->
			<input type="submit" value="Login" data-theme="b"  data-mini="true">
			<a href="<?php echo site_url('signup')?>" data-role="button" data-theme="c"  data-mini="true">New user? Sign up now!</a>
		<!-- </div> -->
		
		<br/>
		<br/>
	</form><!-- end form -->
		<center><a href="#">Learn more about trendApp</a>
		<br /><br /><br />
		<img src="/trendApp/images/poweredByFoursquare_gray.png" class="imgzr">
		</center>
	</div>
    </div><!-- /content -->
    <!--
    <div data-role="footer">
        <h4>(c) CS 199 trendApp. All rights reserved</h4>
    </div> /footer -->
 
    
</div><!-- /page -->

<?php $this->load->view('footer')?>