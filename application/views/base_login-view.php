<?php $this->load->view('header')?>

<style>
body {
        background-image: url('/trendApp/Images/bg.png');
      }

	.form-signin {
		padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
	}
	.form-signin .form-signin-heading,
	.form-signin input[type="text"],
	.form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
	}
	.imgzr {
		width: 80%;
		height: auto;
		max-width: 400px;
	}
	
	#welcome_msg { padding: 19px 39px 39px; }
	#welcome_msg p, h1 { color: #ffffff }
	

</style>

<div class="row">
	<br>
	<div class="span8" id="welcome_msg">
		<h1>trendApp</h1>
		<p class="lead">Check out the latest trends and find them around you. This is the only tool to see what's in.</p>
		<center><img src="/trendApp/images/poweredByFoursquare_white.png" class="imgzr" /></center>
	</div>
	
    <div class="span4">
    <form class="form-signin" method="post" action="<?php echo site_url('base_login/do_login') ?>" data-ajax="false"> <!--  -->
    <?php //echo form_open('base_login/do_login'); ?>
        <h3>Sign in</h3>
		<input type="text" name="username" value="<?php echo set_value('username'); ?>" class="input-block-level" placeholder="Username"/>
		<input type="password" name="password" value="<?php echo set_value('password'); ?>" class="input-block-level" placeholder="Password"/>
		<?php echo form_error('username'); ?>
		<?php echo form_error('password'); ?>
		<br />
		<center>
		<input type="submit" value="Login" class="btn btn-block btn-primary">
		<br>
		<a href="<?php echo site_url('signup')?>" class="btn btn-block btn-danger">New user? Sign up now!</a>
		</center>
		<!-- </div> -->
		
		<br/>
		<br/>
	</form><!-- end form -->	
    </div>
 
</div>

<?php $this->load->view('footer')?>