<?php $this->load->view('header')?>

<?php $this->load->view('navbar.php')?>

<div class="row content">
	<div class="span6 fixed" >
		<h3>Welcome, <?php echo $givenname.' '.$lastname?>!</h3>
		<p class="lead">Found you!</p>
		<div id="map_home"></div>
		<br>
		<div class="alert alert-info">
			<p>If the location doesn't seem to be so right, please try refreshing the page.</p>
		</div>
	</div>
	<br>
	<div class="span6 offset6">
		<ul class="nav nav-tabs nav-stacked nav_results">
			<li><h4>Check out these places:</h4></li>
			<div id='content'>
				<?php 
				if(count($res) > 0){
					foreach($res as $r){
						echo '	<li>
									<i class="icon-'.$r['categoryid'].' pull-left"></i>
									<a href="'.site_url('search/selected?name='.$r['unitname'].'&lat='.$r['lat'].'&lng='.$r['lng'].'&distance=1000&address='.$r['address'].'&icon='.$r['categoryid'].'&id='.$r['venueid']).'"><p>'.$r['unitname'].'</p><p>'.$r['address'].' || Rating: '.$r['rating'].'</p></a>
								</li>';
						
					}
			    }else{
			    	echo '<li><a href="'.site_url("search").'">Sorry we can\'t recommend anything yet.<br>Start rating now :)</a></li>';
			    }
				?>
			</div>
		</ul>
		<div id='page_navigation'></div>
	</div>
</div>

<!-- the input fields that will hold the variables we will use -->
    <input type='hidden' id='current_page' />
    <input type='hidden' id='show_per_page' />
<style>
#page_navigation a{
    padding:3px;
    border:1px solid gray;
    margin:2px;
    color:black;
    text-decoration:none
}
.active_page{
    background:darkblue;
    color:white !important;
}
</style>
<script type="text/javascript"> 
$(document).ready(function(){
    
    //how much items per page to show
    var show_per_page = 5; 
    //getting the amount of elements inside content div
    var number_of_items = $('#content').children().size();
    //calculate the number of pages we are going to have
    var number_of_pages = Math.ceil(number_of_items/show_per_page);
    
    //set the value of our hidden input fields
    $('#current_page').val(0);
    $('#show_per_page').val(show_per_page);
    
    //now when we got all we need for the navigation let's make it '
    
    /* 
    what are we going to have in the navigation?
        - link to previous page
        - links to specific pages
        - link to next page
    */
    var navigation_html = '<a class="previous_link" href="javascript:previous();">Prev</a>';
    var current_link = 0;
    while(number_of_pages > current_link){
        navigation_html += '<a class="page_link" href="javascript:go_to_page(' + current_link +')" longdesc="' + current_link +'">'+ (current_link + 1) +'</a>';
        current_link++;
    }
    navigation_html += '<a class="next_link" href="javascript:next();">Next</a>';
    
    $('#page_navigation').html(navigation_html);
    
    //add active_page class to the first page link
    $('#page_navigation .page_link:first').addClass('active_page');
    
    //hide all the elements inside content div
    $('#content').children().css('display', 'none');
    
    //and show the first n (show_per_page) elements
    $('#content').children().slice(0, show_per_page).css('display', 'block');
    
});
 
function previous(){
    
    new_page = parseInt($('#current_page').val()) - 1;
    //if there is an item before the current active link run the function
    if($('.active_page').prev('.page_link').length==true){
        go_to_page(new_page);
    }
    
}
 
function next(){
    new_page = parseInt($('#current_page').val()) + 1;
    //if there is an item after the current active link run the function
    if($('.active_page').next('.page_link').length==true){
        go_to_page(new_page);
    }
    
}
function go_to_page(page_num){
    //get the number of items shown per page
    var show_per_page = parseInt($('#show_per_page').val());
    
    //get the element number where to start the slice from
    start_from = page_num * show_per_page;
    
    //get the element number where to end the slice
    end_on = start_from + show_per_page;
    
    //hide all children elements of content div, get specific items and show them
    $('#content').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');
    
    /*get the page link that has longdesc attribute of the current page and add active_page class to it
    and remove that class from previously active page link*/
    $('.page_link[longdesc=' + page_num +']').addClass('active_page').siblings('.active_page').removeClass('active_page');
    
    //update the current page input field
    $('#current_page').val(page_num);
}
  
</script>

<?php $this->load->view('footer')?>