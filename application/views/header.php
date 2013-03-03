<!DOCTYPE html>
<html>
    <head>
    <title>trendApp</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="/trendApp/scripts/jquery.mobile-1.2.0/jquery.mobile-1.2.0.min.css" />
    <link rel="stylesheet" href="/trendApp/scripts/jquery.mobile-1.2.0/themes/blue2.css" />
	<script src="/trendApp/scripts/jquery.mobile-1.2.0/jquery-1.8.2.min.js"></script>
	<link rel="stylesheet" href="/trendApp/scripts/css/icons.css" />
	<script src="/trendApp/scripts/jquery.mobile-1.2.0/jquery.mobile-1.2.0.min.js"></script>
	
	<script src="trendApp/scripts/jquery-1.4.2.min.js"></script> 
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>

	<script src="/trendApp/scripts/load_coordinates.js"></script>
	
	<style>
	
	.ui-header { font-size: 1em; weight: bold }
	.ui-bar { font-size: 1em; padding: 10px; }
	.ui-bar h1 { margin: 3px; padding: 0; font-size: 1.2em; display: inline-block; }
	.ui-bar h2, .ui-bar h3, .ui-bar h4, .ui-bar h5, .ui-bar h6 { margin: 0; padding: 0; font-size: 1.2em; display: inline-block; }
	.ui-bar p { font-size: 1em; margin: 3px; margin-top: 5px; margin-bottom: 5px }
	.ui-page {background: #e0e0e0}
	.ui-li { font-size: 1em; font-weight: normal;}
	.ui-li p { font-size: .8em; font-weight: normal;}
	.ui-listview h3 { font-size: 1em; font-weight: bold; }
	.ui-listview h4 { font-size: 1em; font-weight: bold; margin: 0px }
		
	.smallBtn { height: 18px; font-size: 10px; margin-top: -5px }
	.smallBtn .ui-btn-inner { margin-top: -7px }

	.ui-content { padding: 15px; font-size: .9em }
	.ui-content h2 { margin-bottom: 0px }
	
	.imgzr { width: 80%; height: auto; max-width: 400px}

	@media only screen and (min-width: 1024px){
            .ui-page {
                width: 1024px !important;
                margin: 0 auto !important;
                position: relative !important;
            }
        }
	
	#map_home { 
		background: #e0e0e0;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 5px 14px -9px rgba(0, 0, 0, 0.29);
        height: 100px;
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

	
      </style>
	
</head> 
<body data-theme="a"> 
