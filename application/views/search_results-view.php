<?php $this->load->view('header')?>

<div data-role="page">

	<div data-role="header">
		<?php $this->load->view('navbar.php')?>
    </div><!-- /header -->
    
	<div data-role="content">
    <br/>
    <ul data-role="listview" data-theme="a">
    <?php 
		foreach ($res->response->venues as $v) {
			//echo $v->name."<br />";
			
			$address = '';
			if(array_key_exists('address', $v->location)){
				$address = $v->location->address;
			}else{
				$address = '<br />';
			}
			
			echo '<li data-icon="food" class="ui-btn-icon-left"><a href="#" style="padding-left: 80px"><h3>'.$v->name.'</h3><p>'.$address.'</p></a></li>';
			
		}
		
	?>
    </ul>
	</div>

</div>

<?php $this->load->view('footer')?>