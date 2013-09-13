<?php

include '../media/inc/clerkDataCon.inc';

$budget_query = sprintf("SELECT * FROM councilBudgets ORDER BY id DESC");
$budget_result = mysql_query($budget_query);


?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<title>City Budgets | Office of the City Clerk, City of Chicago</title>
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
		"aaSorting": [[ 0, "desc" ]],
		"aLengthMenu": [[ 10, 25, 50, 100, -1 ], [ 10, 25, 50, 100, "All" ]],
		"bProcessing": true,
		"oLanguage": { "sSearch": "Search all columns:" },
		"sPaginationType": "bootstrap"
	}).columnFilter({
		"aoColumns": [ { type: "text" }, null ]
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
											<li>
												<a href="/council/reports.php">&raquo; Council Meeting Reports</a>
											</li>
											<li class="current-menu-item">
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
									<h2 class="entry-title">City Budgets</h2>
									<div class="entry-content">
										<p>The annual city budget contains the revenues, expenditures and liabilities of the City for the next fiscal year. Illinois law <a href="http://www.ilga.gov/legislation/ilcs/ilcs4.asp?DocName=006500050HArt.+8+Div.+2&amp;ActID=802&amp;ChapterID=14&amp;SeqStart=79800000&amp;SeqEnd=81800000" target="_blank">(Chapter 65 ILCS 5/8-2-1)</a> requires that the City Council adopt their annual budget on or before December 31 of the previous year.</p>
										<h4>The Budget Process</h4>
										<p>Each year the City Council approves a corporate budget, formally known as the Annual Appropriation Ordinance. This document contains the expenditures and liabilities of the City and specifies the appropriations for the next fiscal year (Jan. 1 - Dec. 31).</p>
										<p>Departments submit revenue and expenditure estimates to the <a href="http://www.cityofchicago.org/city/en/depts/obm.html" target="_blank">Office of Budget and Management</a> for preparation of the budget. Before August 1 of each year, the Budget Director files the next year’s Annual Financial Analysis Report with the City Clerk outlining the City’s fiscal projection <a href="http://docs.chicityclerk.com/exec/MayorEmanuel/F2011-124.pdf" target="_blank">(Mayoral Executive Order 2011-7)</a>. In accordance with Illinois law, the Mayor is required to submit his Executive Budget recommendations for  City Council consideration <a href="http://www.ilga.gov/legislation/ilcs/documents/006500050K8-2-2.htm" target="_blank">(65 ILCS 5/8-2-2)</a>. Once introduced the budget is immediately sent to the <a href="http://committeeonthebudget.cityofchicago.org/" target="_blank">City Council Committee on Budget and Government Operations</a> for review.  Prior to final consideration and under State law, the full City Council will hold at least one public hearing to give citizens’ an opportunity to speak on the proposed budget.</p>
										<p>After considering any amendments or adjustments, the City Council must then vote to approve a final balanced  budget no later than  Dec. 31 of each year.</p>
										<ul class="occ-tabs">
											
											<li><a class="occ-tab-link current" id="occ-tab-toggle-prev" href="javascript:;">Annual Budgets</a></li>
										</ul>
										<div id="occ-tab-content">
											<div class="occ-tab-int current" id="occ-tab-content-prev">
												<table id="datatable" class="table table-bordered table-striped table-condensed">
													<thead>
														<tr>
															<td>Year</td>
															<td>Download</td>
														</tr>
													</thead>
													<tfoot>
														<tr>
															<th>Year</th>
															<th>&nbsp;</th>
														</tr>
													</tfoot>
													<tbody>
														<?php
															while ($budget = mysql_fetch_object($budget_result)) {
																$budget_year 		= 	$budget->budgetYear;
																$budget_url		=	$budget->budgetURL;
														?>
														<tr>
															<td><?php echo $budget_year;?></td>
															<td><a class="btn btn-primary btn-block" href="<?php echo $budget_url;?>" target="_blank">Download</a></td>
														</tr>
														<?php	
															}
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