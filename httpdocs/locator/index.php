<?php

   header( 'Location: http://chicityclerk.com/city-stickers-parking/storelocator/' ) ;

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
<link rel="stylesheet" type="text/cdd" href="/locator/locator-styles.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/media/js/bootstrap.js"></script>
<script type="text/javascript" src="/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="/media/js/jquery.dataTables.columnFilter.js"></script>
<script type="text/javascript" src="/media/js/jquery.dataTables.bootstrap.js"></script>
<script type="text/javascript" src="assets/js/jquery.placeholder.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {	
	$('input').placeholder();
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
									<li class="current-menu-parent">
										<a href="/city-stickers-parking/">Purchase Options</a>
										<ul class="sub-menu nav">
											<li class="current-menu-item">
												<a href="/locator/">Store Locator</a>
											</li>
											<li>
												<a href="/city-stickers-parking/ward-sales/">Ward Sales</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="/city-stickers-parking/about-city-vehicle-stickers/">About City Vehicle Stickers</a>
									</li>
									<li>
										<a href="/city-stickers-parking/about-residential-parking/">About Residential Parking</a>
									</li>
									<li>
										<a href="/city-stickers-parking/year-round-sales-2014/">Year-Round Sales 2014</a>
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
										<div id="locator-container">
											<p><strong>Buying a Vehicle Sticker? Make sure you <a href="/city-stickers-parking/about-city-vehicle-stickers/whats-a-vin/">bring the required documentation</a>.</strong></p>

											<p><strong>Need Daily Permits? Check <a href="/city-stickers-parking/about-residential-parking/">eligibility requirements first</a>!</strong></p>

											<p>	Follow the steps below to find out where you can purchase City Vehicle Stickers and Daily Parking Permits.</p>
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
																<td  class="b-right" rowspan="2"><p class="os-strong">Click for your results</p></td>
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