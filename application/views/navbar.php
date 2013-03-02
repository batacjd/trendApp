<a href="<?php //redirect(current_url())?>" data-role="button" data-theme="b" data-icon="refresh" data-iconpos="notext" >Refresh</a>
<h1>trendApp - Home</h1>
<a href="#popupBasic" data-role="button" data-rel="popup" data-theme="b" data-icon="gear" data-iconpos="notext" >Account</a>

<div data-role="popup" id="popupBasic">
	<ul data-role="listview" data-theme="a">
		<li data-role="divider" data-theme="b">Account</li>
		<li data-icon="false"><a href="<?php echo site_url('logout')?>">Logout</a></li>
	
	</ul>
</div>

<div data-role="navbar">
	<ul>
		<li><a href="<?php echo site_url("home")?>" data-theme="d" data-icon="homesmallw" data-mini="true">&nbsp;</a></li>
		<li><a href="<?php echo site_url("favorites")?>" data-theme="d" data-icon="starlargew" data-mini="true">&nbsp;</a></li>
		<li><a href="<?php echo site_url("search")?>" data-theme="d" data-icon="magnilargew" data-mini="true">&nbsp;</a></li>
		<li><a href="#" data-theme="d" data-icon="chartlargew">&nbsp;</a></li>
	</ul>
</div><!-- /navbar -->