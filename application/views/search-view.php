<?php $this->load->view('header')?>

<div data-role="page">

	<div data-role="header">
		<?php $this->load->view('navbar.php')?>
    </div><!-- /header -->
    
    <div data-role="content" >
    	
    	<ul data-role="listview" data-theme="a">
			<li data-role="divider" data-theme="b">Select category</li>
			<li><a href="search/lists/1">Food and Restaurant</a></li>
			<li><a href="search/lists/2">Clothing and Fashion</a></li>
			<li><a href="search/lists/3">Beauty and Spas</a></li>
			<li><a href="search/lists/4">Arts and Entertainment</a></li>
			<li><a href="search/lists/5">Hotels and Resorts</a></li>
			<li><a href="search/lists/6">Nightlife</a></li>
			<li><a href="search/lists/7">Sports Centers</a></li>
			<li><a href="search/lists/8">Schools</a></li>
			<li><a href="search/lists/9">Health and Medical</a></li>
			<li></li>
			<li data-role="divider" data-theme="b">or search</li>
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