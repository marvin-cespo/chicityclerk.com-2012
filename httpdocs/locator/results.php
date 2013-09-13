<?php

   header( 'Location: http://chicityclerk.com/city-stickers-parking/storelocator/' ) ;

?>


<?php
if(isset($_POST["address"])) {
	
	# Retrieve variables from form

	$product_pass				= 	$_POST["daily-res"];
	$product_sticker			= 	$_POST["sticker"];
	$product_sticker_spec		= 	$_POST["sticker-spec"];
	$product_sticker_transfer 	=	$_POST["sticker-transfer"];
	
	# Concatenate address from form input
	
	if (!empty($_POST["address"])) {
	
		$address_input 	= 	$_POST["address"] . " " . $_POST["city"] . " " . $_POST["state"];
	
	} else {
	
		$address_input	=	$_POST["zip"];
	}
	
	# Prepare input for Google Maps processing
	
	$radius 				= 	$_POST["radius"];
	$address_url 			= 	urlencode($address_input);
	$address_string_begin 	= 	"http://maps.googleapis.com/maps/api/geocode/json?address=";
	$address_string_end 	= 	"&sensor=false";
	$address_string 		= 	$address_string_begin . "$address_url" . $address_string_end;
	$address_get 			= 	file_get_contents($address_string);
	$address_data			= 	json_decode($address_get);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<title>Store Locator | Office of the City Clerk, City of Chicago</title>
<meta name="viewport" content="width=1080" />
<link rel="SHORTCUT ICON" href="/wp-content/themes/occwp/images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Arvo:400,700|Open+Sans:400,800" />
<link rel="stylesheet" type="text/css" href="/media/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/wp-content/themes/occwp/style.css" />
<link rel="stylesheet" type="text/css" href="/media/css/jquery.dataTables.css" />
<link rel="stylesheet" type="text/cdd" href="/locator/locator-styles.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/media/js/bootstrap.js"></script>
<script type="text/javascript" src="/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="/media/js/jquery.dataTables.columnFilter.js"></script>
<script type="text/javascript" src="/media/js/jquery.dataTables.bootstrap.js"></script>
<script type="text/javascript" src="/media/js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="/wp-content/themes/occwp/js/jquery.occTabs.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.tip-link').hover(function() {
		$(this).tooltip('show');
	}, function() {
		$(this).tooltip('hide');	
	});	
	$('input').placeholder();
	$('#datatable').dataTable({
		"aaSorting": [[0, "desc"]],
		"aLengthMenu": [[ 10, 25, 50, 100, -1 ], [ 10, 25, 50, 100, "All" ]],
		"iDisplayLength": 25,
		"oLanguage": { "sSearch": "Search all columns:" },
		"sPaginationType": "bootstrap"
	}).columnFilter({
		"aoColumns": [ { type: "text" }, { type: "text" }, null, null ]
	});
});
</script>
<script type="text/javascript">
function validateProduct() {
	if ( $('#select-daily-res').is(':checked') || $('#select-sticker').is(':checked') || $('#select-sticker-spec').is(':checked') || $('#select-sticker-transfer').is(':checked') ) {
		return true;
	} else {
		alert('Please select a product.');
		return false;
	}
}
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-4427438-1']);
  _gaq.push(['_setDomainName', 'chicityclerk.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body class="page page-id-611 page-template-city-stickers-parking-php">
<div id="wrapper">
	<div class="navbar navbar-inverse navbar-static-top">
		<div class="navbar-inner">
			<div class="container">
				<div class="span12">
					<div class="menu-global-navigation-container">
						<ul class="nav">
							<li class="menu-item menu-item-home menu-item-42">
								<a href="/">Home</a>
							</li>
							<li class="menu-item current-page-ancestor menu-item-20">
								<a href="/city-stickers-parking/">City Stickers &amp; Parking</a>
							</li>
							<li class="menu-item menu-item-19">
								<a href="/legislation-records/">Legislation &amp; Records</a>
							</li>
							<li class="menu-item menu-item-18">
								<a href="/dog-registration/">Dog Registration</a>
							</li>
							<li class="menu-item menu-item-31">
								<a href="/programs-services/">Programs &amp; Services</a>
							</li>
							<li class="menu-item menu-item-30">
								<a href="/news/">News</a>
							</li>
							<li class="menu-item menu-item-29">
								<a href="/office-info/">Office Info</a>
							</li>
							<li class="menu-item menu-item-facebook">
								<a href="http://facebook.com/chicityclerk" target="_blank">F</a>
							</li>
							<li class="menu-item menu-item-twitter">
								<a href="http://twitter.com/ChiCityClerk" target="_blank">T</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="span12">
			<header>
				<div id="branding">
					<img src="/wp-content/themes/occwp/images/header.png" />
				</div>
			</header>
			<div class="container">
				<div class="row">
					<div id="left-column" class="span3">
						<div class="interior-navigation">
							<div class="menu-city-stickers-parking-container">
								<ul id="menu-city-stickers-parking" class="menu">
									<li>
										<a href="/city-stickers-parking/">Purchase Options</a>
									</li>
									<li class="current-menu-item">
										<a href="/locator/">Store Locator</a>
									</li>
									<li>
										<a href="/city-stickers-parking/about-city-vehicle-stickers/">About City Vehicle Stickers</a>
									</li>
									<li>
										<a href="/city-stickers-parking/about-residential-parking/">About Residential Parking</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div id="right-column" class="span9">
						<div class="interior-content">
							<article id="content">
								<div id="post-611">
									<h2 class="entry-title">Store Locator</h2>
									<div class="entry-content">
										<div id="view-toggles">
											<a class="btn btn-primary" id="toggle-form" href="javascript:;">Start Over</a>
											<a class="btn btn-primary" id="toggle-all" href="javascript:;">View All Locations</a> 
											<a class="btn btn-primary" id="toggle-results" href="javascript:;" style="display: none;">Show Results</a>
										</div>
										<script type="text/javascript">
											$(document).ready(function() {
												$('#toggle-form').click(function() {
													$(this).parent().hide();
													$('#locator-container').fadeIn();
													$('#viewall-container').fadeOut();
													$('#results-container').fadeOut();
												});
												$('#toggle-all').click(function() {
													$(this).hide();
													$('#toggle-results').show();
													$('#viewall-container').fadeIn();
													$('#results-container').fadeOut();
													$('#locator-container').fadeOut();
												});
												$('#toggle-results').click(function() {
													$(this).hide();
													$('#toggle-all').show();
													$('#results-container').fadeIn();
													$('#viewall-container').fadeOut();
													$('#locator-container').fadeOut();
												});
											});
										</script>
										<div id="viewall-container" style="display: none;">
											<ul class="occ-tabs">
												<!-- <li><a class="occ-tab-link" id="occ-tab-toggle-map">Map View</a></li> -->
												<li><a class="occ-tab-link current" id="occ-tab-toggle-list">List View</a></li>
											</ul>
											<div id="occ-tab-content">
												<!-- <div class="occ-tab-int"  id="occ-tab-content-map">
													<p><iframe src="http://batchgeo.com/map/5d2bd8029fac8ae5106777dff07773c9" frameborder="0" width="100%" height="550" style="border:1px solid #aaa;border-radius:10px;"></iframe></p><p><small>View <a href="http://batchgeo.com/map/5d2bd8029fac8ae5106777dff07773c9">full screen map</a></small></p>
												</div> -->
												<div class="occ-tab-int current" id="occ-tab-content-list">
													<table id="datatable" class="table table-condensed table-striped table-bordered">
														<thead>
															<tr>
																<td>Store Name</td>
																<td>Address</td>
																<td class="phone">Phone</td>
																<td>Additional Fee</td>
															</tr>
														</thead>
														<tfoot>
															<tr>
																<th>Filter by Name</th>
																<th>Filter by Address</th>
																<th>&nbsp;</th>
																<th>&nbsp;</th>
															</tr>
														</tfoot>
														<tbody>
															<?php
																require("phpsqlsearch_dbinfo.php");
												
																$connection = mysql_connect ('clerkpress.chicityclerk.com:3306', $username, $password);
												
																if (!$connection) {
												
																	die("Not connected : " . mysql_error());
												
																}
												
																$db_selected = mysql_select_db($database, $connection);
												
																	if (!$db_selected) {
												
																		die ("Can\'t use db : " . mysql_error());
												
																	}
									

																$table_query = sprintf("SELECT name, address, extraFee, phone FROM stickerSalesLoc");
																$table_result = mysql_query($table_query);
																while( $loc = mysql_fetch_object($table_result)) :
															
															?>
															<tr>
																<td><?php echo $loc->name; ?></td>
																<td><?php echo $loc->address; ?></td>
																<td class="phone"><?php echo $loc->phone; ?></td>
																<td><?php echo $loc->extraFee; ?></td>
															</tr>
															<?php
																endwhile;
															?>
														</tbody>
													</table>
													<div style="clear:both;"></div>
												</div>
											</div>
										</div>
										<div id="results-container">
											<?php							
												# Decode JSON file containing geocode of address or zip
												
												foreach ($address_data->results as $address) {
													$center_lat = $address->geometry->location->lat;
													$center_lng = $address->geometry->location->lng;
												}
																			
												# Connect to database
												
												require("phpsqlsearch_dbinfo.php");
												
												$connection = mysql_connect ('clerkpress.chicityclerk.com:3306', $username, $password);
												
												if (!$connection) {
												
												  die("Not connected : " . mysql_error());
												
												}
												
												$db_selected = mysql_select_db($database, $connection);
												
												if (!$db_selected) {
												
												  die ("Can\'t use db : " . mysql_error());
												
												}
												
												# All possible queries based on products selected
												
												if ($product_sticker == 'yes' && $product_pass == 'yes' && $product_sticker_transfer == 'yes' && empty($product_sticker_spec)) {
													$query = sprintf("SELECT address, name, lat, lng, 24hr, extraFee, phone, alderman, sticker, pass, transfer, special, hasHours, printHours, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM stickerSalesLoc WHERE sticker = 1 AND pass = 1 AND transfer = 1 HAVING distance < '%s' ORDER BY distance LIMIT 0 , 10",
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($center_lng),
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($radius));
													
												} elseif ($product_sticker == 'yes' && $product_pass == 'yes' && empty($product_sticker_transfer) && empty($product_sticker_spec)) {
													$query = sprintf("SELECT address, name, lat, lng, 24hr, extraFee, phone, alderman, sticker, pass, transfer, special, hasHours, printHours, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM stickerSalesLoc WHERE sticker = 1 AND pass = 1 HAVING distance < '%s' ORDER BY distance LIMIT 0 , 10",
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($center_lng),
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($radius));
													
												} elseif ($product_sticker == 'yes' && empty($product_pass) && empty($product_sticker_transfer) && empty($product_sticker_spec)) {
													$query = sprintf("SELECT address, name, lat, lng, 24hr, extraFee, phone, alderman, sticker, pass, transfer, special, hasHours, printHours, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM stickerSalesLoc WHERE sticker = 1 HAVING distance < '%s' ORDER BY distance LIMIT 0 , 10",
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($center_lng),
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($radius));
												
												} elseif ($product_sticker == 'yes' && empty($product_pass) && $product_sticker_transfer == 'yes' && empty($product_sticker_spec)) {
													$query = sprintf("SELECT address, name, lat, lng, 24hr, extraFee, phone, alderman, sticker, pass, transfer, special, hasHours, printHours, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM stickerSalesLoc WHERE sticker = 1 AND transfer = 1 HAVING distance < '%s' ORDER BY distance LIMIT 0 , 10",
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($center_lng),
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($radius));
													
												} elseif (empty($product_sticker) && $product_pass == 'yes' && $product_sticker_transfer == 'yes' && empty($product_sticker_spec)) {
													$query = sprintf("SELECT address, name, lat, lng, 24hr, extraFee, phone, alderman, sticker, pass, transfer, special, hasHours, printHours, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM stickerSalesLoc WHERE pass = 1 AND transfer = 1 HAVING distance < '%s' ORDER BY distance LIMIT 0 , 10",
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($center_lng),
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($radius));
													
												} elseif (empty($product_sticker) && empty($product_pass) && $product_sticker_transfer == 'yes' && empty($product_sticker_spec)) {
													$query = sprintf("SELECT address, name, lat, lng, 24hr, extraFee, phone, alderman, sticker, pass, transfer, special, hasHours, printHours, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM stickerSalesLoc WHERE transfer = 1 HAVING distance < '%s' ORDER BY distance LIMIT 0 , 10",
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($center_lng),
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($radius));
													
												} elseif (empty($product_sticker) && $product_pass == 'yes' && empty($product_sticker_transfer) && empty($product_sticker_spec)) {
													$query = sprintf("SELECT address, name, lat, lng, 24hr, extraFee, phone, alderman, sticker, pass, transfer, special, hasHours, printHours, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM stickerSalesLoc WHERE pass = 1 HAVING distance < '%s' ORDER BY distance LIMIT 0 , 10",
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($center_lng),
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($radius));
														
												} elseif ($product_sticker == 'yes' && $product_pass == 'yes' && $product_sticker_transfer == 'yes' && $product_sticker_spec == 'yes') {
													$query = sprintf("SELECT address, name, lat, lng, 24hr, extraFee, phone, alderman, sticker, pass, transfer, special, hasHours, printHours, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM stickerSalesLoc WHERE pass = 1 HAVING distance < '%s' ORDER BY distance LIMIT 0 , 10",
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($center_lng),
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($radius));
														
												} elseif ($product_sticker == 'yes' && $product_pass == 'yes' && empty($product_sticker_transfer) && $product_sticker_spec == 'yes') {
													$query = sprintf("SELECT address, name, lat, lng, 24hr, extraFee, phone, alderman, sticker, pass, transfer, special, hasHours, printHours, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM stickerSalesLoc WHERE pass = 1 HAVING distance < '%s' ORDER BY distance LIMIT 0 , 10",
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($center_lng),
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($radius));
														
												} elseif ($product_sticker == 'yes' && empty($product_pass) && empty($product_sticker_transfer) && $product_sticker_spec == 'yes') {
													$query = sprintf("SELECT address, name, lat, lng, 24hr, extraFee, phone, alderman, sticker, pass, transfer, special, hasHours, printHours, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM stickerSalesLoc WHERE special = 1 HAVING distance < '%s' ORDER BY distance LIMIT 0 , 10",
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($center_lng),
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($radius));
														
												} elseif ($product_sticker == 'yes' && empty($product_pass) && $product_sticker_transfer == 'yes' && $product_sticker_spec == 'yes') {
													$query = sprintf("SELECT address, name, lat, lng, 24hr, extraFee, phone, alderman, sticker, pass, transfer, special, hasHours, printHours, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM stickerSalesLoc WHERE transfer = 1 HAVING distance < '%s' ORDER BY distance LIMIT 0 , 10",
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($center_lng),
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($radius));
														
												} elseif (empty($product_sticker) && $product_pass == 'yes' && $product_sticker_transfer == 'yes' && $product_sticker_spec == 'yes') {
													$query = sprintf("SELECT address, name, lat, lng, 24hr, extraFee, phone, alderman, sticker, pass, transfer, special, hasHours, printHours, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM stickerSalesLoc WHERE pass = 1 HAVING distance < '%s' ORDER BY distance LIMIT 0 , 10",
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($center_lng),
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($radius));
														
												} elseif (empty($product_sticker) && empty($product_pass) && $product_sticker_transfer == 'yes' && $product_sticker_spec == 'yes') {
													$query = sprintf("SELECT address, name, lat, lng, 24hr, extraFee, phone, alderman, sticker, pass, transfer, special, hasHours, printHours, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM stickerSalesLoc WHERE transfer = 1 HAVING distance < '%s' ORDER BY distance LIMIT 0 , 10",
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($center_lng),
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($radius));
														
												} elseif (empty($product_sticker) && $product_pass == 'yes' && empty($product_sticker_transfer) && $product_sticker_spec == 'yes') {
													$query = sprintf("SELECT address, name, lat, lng, 24hr, extraFee, phone, alderman, sticker, pass, transfer, special, hasHours, printHours, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM stickerSalesLoc WHERE pass = 1 HAVING distance < '%s' ORDER BY distance LIMIT 0 , 10",
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($center_lng),
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($radius));
														
												} elseif (empty($product_sticker) && empty($product_pass) && empty($product_sticker_transfer) && $product_sticker_spec == 'yes') {
													$query = sprintf("SELECT address, name, lat, lng, 24hr, extraFee, phone, alderman, sticker, pass, transfer, special, hasHours, printHours, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM stickerSalesLoc WHERE special = 1 HAVING distance < '%s' ORDER BY distance LIMIT 0 , 10",
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($center_lng),
														mysql_real_escape_string($center_lat),
														mysql_real_escape_string($radius));
														
												}
												
												$result = mysql_query($query);
												
												if (!$result) {
												  die("Invalid query: " . mysql_error());
												 }
												?>
											<div id="results-wrap">
												<div class="results-header">
													<h3>Authorized sales locations within <?php echo $radius; ?> mile(s) of <span class="bluetext"><?php echo $address_input; ?></span></h3>
													<p>(Please note that only the 10 closest locations are shown.)</p>
												</div>
												<?php 						
													
													if (mysql_num_rows($result) < 1) {
														echo "<p>We could not find any locations. Please verify that you have entered a valid address or try widening your search radius.</p>";
													} else { ?>
												<div id="table-label">
													<table>
														<tbody>
															<tr>
																<td style="width:375px;"><p class="os-strong">LOCATION INFORMATION</p></td>
																<td><p class="os-strong">PRODUCTS AVAILABLE AT THIS LOCATION</p></td>
															</tr>
														</tbody>
													</table>
												</div>
												<?php
												
												# Prepare query results for table
												
												while ($row = mysql_fetch_assoc($result)) {
													$distance 		= 	substr($row['distance'], 0, 4);
													$addressRow 	= 	$row['address'];
													$nameRow		= 	$row['name'];
													$twentyFour		= 	$row['24hr'];
													$extraFee		= 	$row['extraFee'];
													$phone			= 	$row['phone'];
													$alderman		= 	$row['alderman'];
													$sticker		= 	$row['sticker'];
													$pass			= 	$row['pass'];
													$transfer		= 	$row['transfer'];
													$special		= 	$row['special'];
													$hasHours		= 	$row['hasHours'];
													$printHours		= 	$row['printHours'];
													$direction		= 	'http://maps.google.com/maps?saddr=' . $address_url . '&addr=' . $addressRow;
													
												?>
												<table id="results-table">
													<tr>
														<td>
															<div class="result-box">
																<ul class="result">
																	<li><strong><?php echo $nameRow; ?></strong></li>
																	<li><?php echo $addressRow; ?></li>
																	<li><?php echo $phone; ?></li>
																		<?php
																			if ($hasHours == 1) { ?>
																	<li><?php echo $printHours; ?></li>
																		<?php } ?>
																	<li><?php echo $distance; ?> miles</li>
																		<?php
																			if ($twentyFour == 1) { ?>
																	<li>Open 24 hours</li>
																		<?php }															
																			if ($extraFee == '$5.50') { ?>
																	<li>A $5.50 service fee applies to purchases at this location.</li>
																		<?php } ?>
																	<!-- <li><a target='_blank' href="<?php echo $direction; ?>">Get Directions</a></li> -->
																</ul>
															</div>
														</td>
															<?php
																if ($sticker == 1) { ?>
														<td style="width:100px;">
															<a class="tip-link" href="javascript:;" title="City Vehicle Stickers Available Here">
																<img src="images/sticker-small.jpg" alt="City Vehicle Stickers Available Here" />
															</a>
														</td>
														<?php } else { ?>
														<td style="width:100px;">&nbsp;</td>
														<?php }
															if ($special == 1) { ?>
														<td style="width:100px;">
															<a class="tip-link" href="javascript:;" title="City Vehicle Stickers for Large Trucks and Motorbikes Available Here">
																<img src="images/sticker-small-truck.jpg" alt="City Vehicle Stickers for Large Trucks and Motorbikes Available Here">
															</a>
														</td>
														<?php } else { ?>
														<td style="width:100px;">&nbsp;</td>
														<?php }
															if ($transfer == 1) { ?>
														<td style="width:100px;">
															<a class="tip-link" href="javascript:;" title="Transfer and Replacement Stickers Available Here">
																<img src="images/sticker-small-transfer.jpg" alt="Transfer and Replacement Stickers Available Here">
															</a>
														</td>
														<?php } else { ?>
														<td style="width:100px;">&nbsp;</td>
														<?php }
															if ($pass == 1) { ?>
														<td style="width:100px;">
															<a class="tip-link" href="javascript:;" title="Guest Permits Available Here">
																<img src="images/pass-small.jpg" alt="Guest Permits Available Here">
															</a>
														</td>
														<?php } else { ?>
														<td style="width:100px;">&nbsp;</td>
														<?php } ?>
													</tr>
												</table>
												<?php } } } ?>
											</div>

										</div>
										<div id="locator-container" style="display: none;">
											<p>Follow the steps below to find out where you can purchase City Vehicle Stickers and Daily Parking Permits.</p>
											<div id="search-form">
												<form action="results.php" method="post" onsubmit="return validateProduct();">
													<table id="locator-step1">
														<tbody>
															<tr>
																<td  class="b-right"><p class="os-strong">Enter your address OR zip code</p></td>
																<td>&nbsp;</td>
																<td>
																	<table id="address-input">
																		<tbody>
																			<tr>
																				<td colspan="2"><input class="span3" type="text" name="address" placeholder="Address" <?php if (!empty($_POST['address'])) { ?>value="<?php echo $_POST['address'];?>" <?php } ?> /></td>
																			</tr>
																			<tr>
																				<td><input class="span2" type="text" name="city" <?php if (!empty($_POST['city'])) { ?>value="<?php echo $_POST['city'];?>" <?php } else { ?>value="Chicago" <?php } ?> /></td>
																				<td><input class="span1" type="text" name="state" <?php if (!empty($_POST['state'])) { ?>value="<?php echo $_POST['state'];?>" <?php } else { ?>value="IL" <?php } ?> /></td>
																			</tr>
																		</tbody>
																	</table>
																</td>
																<td><strong>OR</strong></td>
																<td><input class="span2" type="text" name="zip" placeholder="Zip" <?php if (!empty($_POST['zip'])) { ?>value="<?php echo $_POST['zip'];?>" <?php } ?> /></td>
															</tr>
														</tbody>
													</table>
													<hr class="custom-rule" />
													<table id="locator-step2">
														<tbody>
															<tr>
																<td  class="b-right"><p class="os-strong">Select product(s)</p></td>
																<td>&nbsp;</td>
																<td>
																	<table id="product-input">
																		<tbody>
																			<tr class="top">
																				<td class="top" colspan="3"><strong>Please note:</strong> If you check more than one box, only locations that sell all items you've selected will be displayed.</td>
																			</tr>
																			<tr>
																				<td><input type="checkbox" name="daily-res" id="select-daily-res" value="yes" <?php echo empty($_POST['daily-res']) ? '' : ' checked="checked" ';?> /></td>
																				<td><label for="select-daily-res"><strong>Daily Residential Parking Permits</strong></label></td>
																				<td><label for="select-daily-res"><img src="images/pass-small.jpg" width="50" /></label></td>
																			</tr>
																			<tr>
																				<td><input type="checkbox" name="sticker" id="select-sticker" value="yes" <?php echo empty($_POST['sticker']) ? '' : ' checked="checked" ';?>/></td>
																				<td><label for="select-sticker"><strong>City Vehicle Sticker</strong></label><br /><span class="small-text">(For Passenger, Large Passenger, and Truck under 16,000 lbs)</span></td>
																				<td><label for="select-sticker"><img src="images/sticker-small.jpg" width="50" /></label></td>
																			</tr>
																			<tr>
																				<td><input type="checkbox" name="sticker-spec" id="select-sticker-spec" value="yes" <?php echo empty($_POST['sticker-spec']) ? '' : ' checked="checked" ';?> /></td>
																				<td><label for="select-sticker-spec"><strong>City Vehicle Sticker</strong><br /><span class="small-text">(For Motorbike or Truck over 16,000 lbs)</span></label></td>
																				<td><label for="select-sticker-spec"><img src="images/sticker-small-truck.jpg" width="50" /></label></td>
																			</tr>
																			<tr class="btm">
																				<td><input type="checkbox" name="sticker-transfer" id="select-sticker-transfer" value="yes" <?php echo empty($_POST['sticker-transfer']) ? '' : ' checked="checked" ';?> /></td>
																				<td><label for="select-sticker-transfer"><strong>Replacement or Transfer City Vehicle Sticker</strong></label>
																				<td><label for="select-sticker-transfer"><img src="images/sticker-small-transfer.jpg" width="50" /></label></td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
														</tbody>
													</table>
													<hr class="custom-rule" />
													<table id="locator-step3">
														<tbody>
															<tr>
																<td  class="b-right"><p class="os-strong">Select search radius</p></td>
																<td>&nbsp;</td>
																<td class="top"><strong>Search Radius:</strong><br />
																	<select name="radius">
																		<option value="5" <?php if(isset($_POST['radius']) && $_POST['radius'] == 5 ) echo ' selected="selected"';?>>5 miles</option>
																		<option value="10" <?php if(isset($_POST['radius']) && $_POST['radius'] == 10 ) echo ' selected="selected"';?>>10 miles</option>
																		<option value="25" <?php if(isset($_POST['radius']) && $_POST['radius'] == 25 ) echo ' selected="selected"';?>>25 miles</option>
																		<option value="50" <?php if(isset($_POST['radius']) && $_POST['radius'] == 50 ) echo ' selected="selected"';?>>50 miles</option>
																		<option value="100" <?php if(isset($_POST['radius']) && $_POST['radius'] == 100 ) echo ' selected="selected"';?>>100 miles</option>
																	</select>
																</td>
															</tr>
														</tbody>
													</table>
													<hr class="custom-rule" />
													<table id="locator-step4">
														<tbody>
															<tr>
																<td class="b-right" rowspan="2"><p class="os-strong">Click for your results</p></td>
																<td>&nbsp;</td>
																<td class="top"><input type="submit" class="btn btn-large btn-primary" value="Find Nearby Locations" /></td>
															</tr>
															<tr>
																<td colspan="3">&nbsp;</td>
															</tr>
														</tbody>
													</table>
													<hr class="custom-rule" />
												</form>
											</div>
										</div>
									</div>
								</div>
							</article>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="footer">
	<p>© 2013 Office of the City Clerk, City of Chicago. All Rights Reserved.</p>
</div>
</body>
</html>