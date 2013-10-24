<?php

include '../media/inc/clerkDataCon.inc';


$query = sprintf("SELECT * FROM councilJournals");
$journal_result = mysql_query($query);


?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<title>Journals of the Proceedings | Office of the City Clerk, City of Chicago</title>
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
<script type="text/javascript" src="assets/js/jquery.placeholder.min.js"></script>
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
		"aaSorting": [[ 0, "desc" ], [1, "desc"], [2, "desc"]],
		"aoColumns": [ { "sWidth": "15%" }, {"sWidth": "15%" }, { "sWidth": "15%" }, {"sWidth": "30%" }, { "sWidth": "25%" } ],
		"aLengthMenu": [[ 10, 25, 50, 100, -1 ], [ 10, 25, 50, 100, "All" ]],
		"bProcessing": true,
		"oLanguage": { "sSearch": "Search all columns:" },
		"sPaginationType": "bootstrap"
	}).columnFilter({
		"aoColumns": [ { type: "text" }, { type: "text" }, { type: "text" }, { type: "text" }, null ]
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
							<li class="menu-item menu-item-20">
								<a href="/city-stickers-parking/">City Stickers &amp; Parking</a>
							</li>
							<li class="menu-item current-page-ancestor menu-item-19">
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
										<a href="/legislation-records/">Legislative Information Center</a>
									</li>
									<li>
										<a href="/legislation-records/about-chicago-government/">About Chicago Government</a>
									</li>
									<li class="current-menu-parent">
										<a href="/legislation-records/journals-reports/">Journals &amp; Reports</a>
										<ul class="sub-menu nav">
											<li class="current-menu-item">
												<a href="/council/journals.php">&raquo; Journals of the Proceedings</a>
											</li>
											<li>
												<a href="/council/reports.php">&raquo; Council Meeting Reports</a>
											</li>
											<li>
												<a href="/legislation-records/city-budgets/">&raquo; City Budgets</a>
											</li>
											<li>
												<a href="/council/exec.php">&raquo; Executive Orders</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="/legislation-records/municipal-code/">Municipal Code</a>
									</li>
									<li>
										<a href="/council/sofi.php">Financial Disclosures</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div id="right-column" class="span9">
						<div class="interior-content">
							<article id="content">
								<div id="post-234">
									<h2 class="entry-title">Journals of the Proceedings</h2>
									<div class="entry-content">
										<p>The Journal of the Proceedings serves as the official record of City Council meetings and reflects all legislative actions. Included in the official record is a synopsis of Mayoral and Aldermanic introductions referred to committees, committee reports, complete text of adopted legislation, roll call votes, motions and parliamentary actions, notifications of filings with and legislative publications by the City Clerk, approval of City Council Journal, and other actions taken on the Council Floor.</p>
										
										<div class="alert-box" style="margin:10px 0;">
										<p>Due to the file size of the Journal of Proceedings, the journals will now be provided as ZIP files. Download times for the Journal of Proceedings may take a few minutes based on internet connections.</p>
										</div>
										<ul class="occ-tabs">
											<li><a class="occ-tab-link current" href="/council/journals.php">View All Journals</a></li>
											<li><a class="occ-tab-link" href="/council/journals-search.php">Search Journals</a></li>
										</ul>
										<div id="occ-tab-content">
											<div class="occ-tab-int">
												<table id="datatable" class="table table-condensed table-striped table-bordered">
													<thead>
														<tr>
															<td>Year</td>
															<td>Month</td>
															<td>Day</td>
															<td>Meeting Notes</td>
															<td>Download</td>
														</tr>
													</thead>
													<tfoot>
														<tr>
															<th>Year</th>
															<th>Month</th>
															<th>Day</th>
															<th class="last">Meeting Notes</th>
															<th>&nbsp;</th>
														</tr>
													</tfoot>
													<tbody>
													<?php
														while ($journal = mysql_fetch_object($journal_result)) :
															if (strlen($journal->journalDay) < 2) {
																$journal_day 	= 0 . $journal->journalDay;
															} else {
																$journal_day = $journal->journalDay;
															}
															if (strlen($journal->journalMonth) < 2) {
																$journal_month	= 0 . $journal->journalMonth;
															} else {
																$journal_month = $journal->journalMonth;
															}
											
													?>
														<tr>
															<td><?php echo $journal->journalYear; ?></td>
															<td><?php echo $journal_month; ?></td>
															<td><?php echo $journal_day; ?></td>
															<td><?php echo $journal->journalNotes; ?></td>
															<td><a class="btn btn-primary btn-block" href="<?php echo $journal->journalURL; ?>" target="_blank">Download</a></td>
														</tr>
													<?php
														endwhile;
													?>
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
	<div id="push"></div>
</div>
<div id="footer">
	<p>© 2012 Office of the City Clerk, City of Chicago. All Rights Reserved.</p>
</div>
</body>
</html>