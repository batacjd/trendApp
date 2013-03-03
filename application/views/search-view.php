<?php $this->load->view('header')?>

<div data-role="page">

	<div data-role="header">
		<?php $this->load->view('navbar.php')?>
    </div><!-- /header -->
    
    <div data-role="content" >
    	
    	<ul data-role="listview" data-theme="a">
			<li data-role="divider" data-theme="b"><h4>Select category</h4></li>
			<li><a href="search/lists/1/venues">Food and Restaurant</a></li>
			<li><a href="search/lists/2/venues">Clothing and Fashion</a></li>
			<li><a href="search/lists/3/venues">Beauty and Spas</a></li>
			<li><a href="search/lists/4/venues">Arts and Entertainment</a></li>
			<li><a href="search/lists/5/venues">Hotels and Resorts</a></li>
			<li><a href="search/lists/6/venues">Nightlife</a></li>
			<li><a href="search/lists/7/venues">Sports Centers</a></li>
			<li><a href="search/lists/8/venues">Schools</a></li>
			<li><a href="search/lists/9/venues">Health and Medical</a></li>
			<li></li>
			<li data-role="divider" data-theme="b"><h4>or search</h4></li>
		</ul>
		<br/>
		<form method="post" action="search/custom_search" data-ajax="false">
		<table width="100%">
		<col width="90%">
		<col width="10%">
			<tr>
				<td><input type="text" name="search" /></td>
				<td><center><input type="submit" data-icon="search" data-iconpos="notext" data-theme="b"></center></td>
			</tr>
		</table>
		</form>
		<br/>
		<br/>
    
    </div>


</div>
    
    
<?php $this->load->view('footer')?>