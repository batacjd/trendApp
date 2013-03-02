<?php $this->load->view('header')?>

<div data-role="page">

	<div data-role="header">
		<?php $this->load->view('navbar.php')?>
		<?php $this->load->view('search_list_results_navbar.php')?>
    </div><!-- /header -->
    
	<div data-role="content">
    <br/>
    <ul data-role="listview" data-theme="a">
    <?php 
    
    	if(isset($res->response->venues)){
			if(count($res->response->venues) > 0){
		 		foreach ($res->response->venues as $v) {

					$address = '';
					if(array_key_exists('address', $v->location)){
						$address = $v->location->address;
					}else{
						$address = '<br />';
					}
					$icon = '';
					if ($v->icon == '' || $v->icon == 'default'){
						$icon = '10';
					}else {
						$icon = $v->icon;
					}
					echo '<li data-icon="'.$icon.'" class="ui-btn-icon-left"><a href="'.site_url('search/selected?name='.$v->name.'&lat='.$v->location->lat.'&lng='.$v->location->lng.'&distance='.$v->location->distance.'&address='.$address.'&icon='.$icon.'&id='.$v->id).'" style="padding-left: 80px"><h3>'.$v->name.'</h3><p>'.$address.'</p></a></li>';
				}
		  }else{
		    	echo 'No entries matched your query :(';
		  }
    	}else{
    		echo 'No entries matched your query :(';
    	}
    	
	?>
    </ul>
	</div>

</div>

<?php $this->load->view('footer')?>