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
		<br/>
		<br/>
		<ul data-role="listview" data-theme="a">
			<li data-role="divider" data-theme="b"><h4>Check these recommendations:</h4></li>
			<li><?php print_r($res);?></li>	
		</ul>
			
	</div>
	

</div>

<?php $this->load->view('footer')?>