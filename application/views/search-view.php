<?php $this->load->view('header')?>

<?php $this->load->view('navbar.php')?>

<div class="row content">
	<div class="span6 fixed" >
		<h3>Search</h3>
		<p class="lead">Find what you're looking for.</p>
		<p>We have listed a few categories to make it easier for you to check the venues, promos, or events.</p>
		<p>The categories might not be enough. So if you are looking for something more specific, you can just search for them.</p>
	</div>
	<br>
    <div class="span6 offset6">
    	<ul class="nav nav-tabs nav-stacked nav_results">
			<li><h4>Select category</h4></li>
			<li><a href="search/lists/1">Food and Restaurant</a></li>
			<li><a href="search/lists/2">Clothing and Fashion</a></li>
			<li><a href="search/lists/3">Beauty and Spas</a></li>
			<li><a href="search/lists/4">Arts and Entertainment</a></li>
			<li><a href="search/lists/5">Hotels and Resorts</a></li>
			<li><a href="search/lists/6">Nightlife</a></li>
			<li><a href="search/lists/7">Sports Centers</a></li>
			<li><a href="search/lists/8">Schools</a></li>
			<li><a href="search/lists/9">Health and Medical</a></li>

		</ul>
		<h4>or search</h4>
		<form method="post" action="search/custom_search" class="form-search">
		<div class="input-append">
			<input type="text" name="search" class="input-large search-query"/>
			<input type="submit" value="Search" class="btn">
		</div>
		</form>
		<br/>
		<br/>
    
    </div>

</div>
    
    
<?php $this->load->view('footer')?>