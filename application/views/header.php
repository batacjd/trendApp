<!DOCTYPE html>
<html>
<head>

<title>trendApp</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="/trendApp2/scripts/jquery-1.9.1.min.js"></script>
<script src="/trendApp2/scripts/bootstrap/js/bootstrap.js"></script>
<link href="/trendApp2/scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="/trendApp2/scripts/bootstrap/css/bootstrap-responsive.css" rel="stylesheet"  />


<script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
<script src="/trendApp2/scripts/load_coordinates.js"></script>
<link rel="stylesheet" href="/trendApp2/scripts/css/icons.css" />


 

<style>

	#map_home { 
		background: #e0e0e0;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 5px 14px -9px rgba(0, 0, 0, 0.29);
        height: 200px;
        width: 100%;
        display: block;
    }
	#select_result_map {
		background: #e0e0e0;
		border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 5px 14px -9px rgba(0, 0, 0, 0.29);
        height: 200px;
        width: 100%;
        display: block;
	}
	
	#lat {display: none}
	#lng {display: none}
	#mUnitid {display: none}
	#mUnitname {display: none}
	#mAddress {display: none}
	#mUnitid_e {display: none}
	#mUnitname_e {display: none}
	#mAddress_e {display: none}
	
	.nav_right { float: right; }
	.nav_center {
		float: none;
		display: inline-block;	
	}
	
	.navbar .nav,
	.navbar .nav > li {
		float:none;
		display:inline-block;
		*display:inline; /* ie7 fix */
		*zoom:1; /* hasLayout ie7 trigger */
		vertical-align: top;
	}
		
	.navbar-inner {
		text-align:center;
	}
	
	#brand_center { 
		position: absolute;
	    width: 100%;
	    left: 0;
	    text-align: center;
	    margin: auto;
    }
    
    .nav_results p {
    	margin: 0;
    }
	
	.fixed {
		position: fixed;
	}
	
	.content {
		padding: 40px;
		margin: 20px;
	    background-color: #fff;
	}
	
	@media (max-width: 767px) {
	    .fixed {
	        position:static;
	        width:auto;
	    }
	    .content {
			padding: 5px;
			margin: 0;
		    background-color: #fff;
		}
	}
     
</style>
	
</head> 
<body> 
