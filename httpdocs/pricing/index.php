<?php

include '../media/inc/clerkDataCon.inc';


$pricing_query = sprintf("SELECT * FROM makemodel");
$pricing_result = mysql_query($pricing_query);


?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<title>Pricing | Office of the City Clerk, City of Chicago</title>
<meta name="viewport" content="width=1080" />
<link rel="SHORTCUT ICON" href="/wp-content/themes/occwp/images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Arvo:400,700|Open+Sans:400,800" />
<link rel="stylesheet" type="text/css" href="/media/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/media/css/jquery.dataTables.css" />
<link rel="stylesheet" type="text/css" href="/wp-content/themes/occwp/style.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/media/js/bootstrap.js"></script>
<script type="text/javascript" src="/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="/media/js/jquery.dataTables.columnFilter.js"></script>
<script type="text/javascript" src="/media/js/jquery.dataTables.bootstrap.js"></script>
<script type="text/javascript" src="/media/js/jquery.placeholder.min.js"></script>
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
<script type="text/javascript">
$(document).ready(function() {
	oTable = $('#datatable').dataTable({
		"aaSorting": [[ 0, "asc"]],
		"aoColumns": [ { "bSearchable": false, "bVisible": false }, null, null, null, null, null, null, null, null ],
		"aLengthMenu": [[ 10, 25, 50, 100, -1 ], [ 10, 25, 50, 100, "All" ]],
		"bProcessing": true,
		"oLanguage": { "sSearch": "Search all columns:" },
		"sPaginationType": "bootstrap"
	}).columnFilter({
		"aoColumns": [ null, { type: "text" }, { type: "text" }, { type: "text" }, null, null, null, null, null ],
		"bUseColVis": true
	});
	$('tfoot input').addClass('input-mini');
	$('tfoot th.last input').removeClass('input-mini').addClass('input-large');
});
</script>
<style type="text/css">
#footer {
	margin: 15px auto;
	color: #FFF;
	text-align: center;
}

#datatable tr td.hide, #datatable tr th.hide {
	color: #ECF0F2;
	text-indent: -999999px;
}

</style>
</head>
<body class="page page-id-234 page-template-city-stickers-parking-php">
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
							<li class="menu-item menu-item-20 current-page-ancestor">
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
									<li class="current-menu-parent">
										<a href="/city-stickers-parking/about-city-vehicle-stickers/">About City Vehicle Stickers</a>
										<ul class="sub-menu nav">
											<li>
												<a href="/city-stickers-parking/city-stickers-parking/about-city-vehicle-stickers/whats-a-vin/">&raquo; What's a VIN?</a>
											</li>
											<li>
												<a href="/city-stickers-parking/city-stickers-parking/about-city-vehicle-stickers/renewal-form-errors/">&raquo; Renewal Form Errors</a>
											</li>
											<li>
												<a href="/city-stickers-parking/about-city-vehicle-stickers/no-renewal-form/">&raquo; No Renewal Form?</a>
											</li>
											<li class="current-menu-item">
												<a href="/pricing/">&raquo; Pricing</a>
											</li>
											<li>
												<a href="/city-stickers-parking/about-city-vehicle-stickers/special-programs/">&raquo; Special Programs</a>
											</li>
											<li>
												<a href="/city-stickers-parking/about-city-vehicle-stickers/transfers-replacements/">&raquo; Transfers &amp; Replacements</a>
											</li>
											<li>
												<a href="/city-stickers-parking/faqs-frequently-asked-questions/">&raquo; FAQ's</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="/city-stickers-parking/about-residential-parking/">About Residential Parking</a>
									</li>
									<li>
										<a href="/city-stickers-parking/city-stickers-parking/year-round-sales-2014/">Year-Round Sales 2014</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div id="right-column" class="span9">
						<div class="interior-content">
							<article id="content">
								<div id="post-234">
									<h2 class="entry-title">Pricing</h2>
									<div class="entry-content">
										<ul class="occ-tabs">
											<li><a class="occ-tab-link current" href="javascript:;">Pricing</a></li>
											<li><a class="occ-tab-link" href="/city-stickers-parking/about-city-vehicle-stickers/pricing/">Late Fee / Waivers</a></li>
										</ul>
										<div id="occ-tab-content">
											<div class="occ-tab-int current" id="occ-tab-content-table">
												
												<p>The price of a City Vehicle Sticker depends on the following factors:</p>
												<ul>
												<li> <strong> Vehicle Type </strong>(Passenger, Large Passenger, etc.)</li>
												<li> <strong> Purchaser Age </strong>(65 and older are eligible for discounted stickers.  <a href="/city-stickers-parking/about-city-vehicle-stickers/special-programs/">Read more...</a>)</li>
												<li> <strong> Purchase Date </strong>(Stickers purchased after July 15, 2013 are subject to a late fee except for recently purchased vehicles and vehicles owned by new Chicago residents.  <a href="/city-stickers-parking/about-city-vehicle-stickers/pricing/">Read more...</a>)</li>
												<li> <strong> Annual Residential Parking Feature </strong> (Optional and not applicable for all vehicles nor all residents.  <a href="/city-stickers-parking/about-residential-parking/">Read more...</a>)</li>
												</ul>
												<p> The table below lists the 2,500 most popular vehicles on the road today and possible sticker prices.</p>

												
												
												<p>Use the controls below to sort, filter and search this table to find vehicles and corresponding vehicle/sticker type.</p>
												<table id="datatable" class="table table-bordered table-striped table-condensed">
													<thead>
														<tr>
															<td class="hide">id</td>
															<td>Make</td>
															<td>Model</td>
															<td>Sticker Type</td>
															<td>Price</td>
															<td>Price (with late fee)</td>
															<td>Price for Seniors</td>
															<td>Price for Seniors (with late fee)</td>
															<td>Add Residential Parking?</td>
														</tr>
													</thead>
													<tfoot>
														<tr>
															<th class="hide">&nbsp;</th>
															<th>Make</th>
															<th>Model</th>
															<th>Type</th>
															<th>&nbsp;</th>
															<th>&nbsp;</th>
															<th>&nbsp;</th>
															<th>&nbsp;</th>
															<th>&nbsp;</th>
														</tr>
													</tfoot>
													<tbody>
														<?php while ($pricing = mysql_fetch_object($pricing_result)) : ?>
														<tr>
															<td class="hide"></td>
															<td><?php echo $pricing->make; ?></td>
															<td><?php echo $pricing->model; ?></td>
															<td><?php echo $pricing->sticker; ?></td>
															<td><?php echo $pricing->price; ?></td>
															<td><?php echo $pricing->priceLateFee; ?></td>
															<td><?php echo $pricing->seniorPrice; ?></td>
															<td><?php echo $pricing->seniorPriceLateFee; ?></td>
															<td><?php echo $pricing->addResidential; ?></td>
														</tr>
														<?php endwhile; ?>
													</tbody>
												</table>
												<div style="clear: both;"></div>
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
	<p>&copy; 2012 Office of the City Clerk, City of Chicago. All Rights Reserved.</p>
</div>
</body>
</html>