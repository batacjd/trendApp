<?php $this->load->view('header')?>

<div data-role="page">

	<div data-role="header">
		<?php $this->load->view('navbar.php')?>
    </div><!-- /header -->

	<div data-role="content">
		<div id="map_home"></div>
		<div class="ui-bar ui-bar-b">
			<table>
			<tr>
				<td><img src="/trendApp/Images/default_avatar.png" alt="icon"></td>
				<td style="padding-left: 10px">
					Hi <?php echo $givenname.' '.$lastname?>!
				</td>
			</tr>
			</table>
		</div>
		<br/>
		<p>Recommended for you</p>
		<br/>
		<ul data-role="listview" data-theme="a">
			<li data-icon="food" class="ui-btn-icon-left"><a href="#" style="padding-left: 80px"><h3>Location 1</h3><p>Address here</p></a></li>
			<li data-icon="food" class="ui-btn-icon-left"><a href="#" style="padding-left: 80px"><h3>Location 2</h3><p>Address here</p></a></li>
			<li data-icon="food" class="ui-btn-icon-left"><a href="#" style="padding-left: 80px"><h3>Location 3</h3><p>Address here</p></a></li>
		</ul>
	</div>
	

</div>

<?php $this->load->view('footer')?>