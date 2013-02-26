<?php $this->load->view('header')?>

<div data-role="page" >
 
    <div data-role="header">
    	<a href="index.html" data-role="button" data-theme="b" data-icon="arrow-l" data-rel="back" data-iconpos="notext" >Delete</a>
        <h1>trendApp - Sign up</h1>
    </div><!-- /header -->
    
    <div data-role="content">
    	<center>
    	<br/><br/>
    	<h1>Success!</h1>
    	<br/>
    	<p>Thank you for choosing trendApp. You are now one step closer to finding true happiness!</p>
    	</center>
    	<br/><br/>
    	<a href="<?php echo site_url('home') ?>" data-role="button" data-icon="arrow-r" data-iconpos="right" data-theme="b">Take me inside!</a>
    </div>
    
</div>
<?php $this->load->view('footer')?>