<?php

include '../media/inc/clerkDataCon.inc';


$query = sprintf("SELECT * FROM councilReports");
$report_result = mysql_query($query);


?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<title>Council Meeting Reports | Office of the City Clerk, City of Chicago</title>
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
		"aLengthMenu": [[ 10, 25, 50, 100, -1 ], [ 10, 25, 50, 100, "All" ]],
		"bProcessing": true,
		"oLanguage": { "sSearch": "Search all columns:" },
		"sPaginationType": "bootstrap"
	}).columnFilter({
		"aoColumns": [ { type: "text" }, { type: "text" }, { type: "text" }, { type: "text" }, { type: "text" }, null ]
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

th input.input-large {
	width: 125px;
}

th input.input-mini {
	width: 40px;
}

th.download {
	width: 120px;
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
											<li>
												<a href="/council/journals.php">&raquo; Journals of the Proceedings</a>
											</li>
											<li class="current-menu-item">
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
									<h2 class="entry-title">Council Meeting Reports</h2>
									<div class="entry-content">
										<p>The Office of the City Clerk produces the following reports for each city council meeting:</p>
										<ul>
											<li>Referred Legislation Report – summary report of legislation introduced and referred to committee.</li>
											<li>Attendance and Divided Roll Call Reports – summary report of Aldermanic attendance and split or divided vote tallies.</li>
										</ul>
										<p>For your convenience, we have published these reports to the document library below. Please use the onscreen controls to locate then download / open reports you are interested in.</p>
										<table id="datatable" class="table table-condensed table-striped table-bordered">
											<thead>
												<tr>
													<td>Year</td>
													<td>Month</td>
													<td>Day</td>
													<td>Report Type</td>
													<td>Report Name</td>
													<td>Download</td>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>Year</th>
													<th>Month</th>
													<th>Day</th>
													<th class="last">Report Type</th>
													<th class="last">Report Name</th>
													<th class="download">&nbsp;</th>
												</tr>
											</tfoot>
											<tbody>
											<?php
											while ( $report = mysql_fetch_object($report_result) ) :
												if( strlen( $report->reportMonth) < 2 ) :
													$reportMonth = 0 . $report->reportMonth;
												else :
													$reportMonth = $report->reportMonth;
												endif;
												if( strlen( $report->reportDay) < 2 ) :
													$reportDay = 0 . $report->reportDay;
												else :
													$reportDay = $report->reportDay;
												endif;
											?>
												<tr>
													<td><?php echo $report->reportYear; ?></td>
													<td><?php echo $reportMonth; ?></td>
													<td><?php echo $reportDay; ?></td>
													<td><?php echo $report->reportType; ?></td>
													<td><?php echo $report->reportName; ?></td>
													<td><a class="btn btn-block btn-primary" href="<?php echo $report->reportURL; ?>" target="_blank">Download</a></td>
												</tr>
											<?php
											endwhile;
											?>
											</tbody>
										</table>
										<div style="clear: both;"></div>
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