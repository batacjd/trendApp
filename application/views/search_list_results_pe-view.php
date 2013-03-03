<?php $this->load->view('header')?>

<div data-role="page">

	<div data-role="header">
		<?php $this->load->view('navbar.php')?>
		<div data-role="navbar">
		<ul>
			<li><a href="venues" data-theme="d" data-mini="true">Venues</a></li>
			<li><a href="promos" data-theme="d" data-mini="true">Promos</a></li>
			<li><a href="events" data-theme="d" data-mini="true">Events</a></li>
		</ul>
	</div><!-- /navbar -->
    </div><!-- /header -->
    
	<div data-role="content">
    <br/>
    <ul data-role="listview" data-theme="a">
    <?php 
    
    	if(count($res) > 0){
			foreach($res as $r){
				echo '<li><a href="'.site_url('promo_event/selected?pid='.$r['promoeventid']).'"><h3>'.$r['promoeventname'].'</h3><p>'.$r['unitname'].'</p></a></li>';
				
			}
    	}else{
    		echo 'No entries matched your query :(';
    	}
    	
	?>
    </ul>
	</div>

</div>

<?php $this->load->view('footer')?>