<?php
	include '../media/inc/clerkDataCon.inc';

	
	$ald_query = sprintf("SELECT * FROM aldermanicData WHERE id > 0");
	$ald_result = mysql_query($ald_query);

?>
<!DOCTYPE html>
<html>
<head>
<title>Interactive City Council Seating Chart | Office of the City Clerk, City of Chicago</title>
<meta name="viewport" content="width=1080" />
<link rel="SHORTCUT ICON" href="/wp-content/themes/occwp/images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Arvo:400,700|Open+Sans:400,800" />
<link rel="stylesheet" type="text/css" href="/media/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/council/css/seating.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/media/js/bootstrap.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	$('a.closer').hide();
	$('[rel=popover]').click(function() {
		$('[rel=popover]').popover('destroy');
		$(this).popover('show');
		$('a.closer').show();
	});
	$('a.closer').click(function() {
		$('[rel=popover]').popover('destroy');
		$(this).hide();
	})
});

</script>
</head>
<body id="cnc">
<div id="wrap">
	<div class="navbar navbar-inverse navbar-static-top">
	    <div class="navbar-inner">
	    	<div class="container">
	    		<div class="span12">
	    			<ul class="nav">
	    				<li><a href="/index.php">Office of the City Clerk: Home</a></li>
	    			</ul>
	    		</div>
	    	</div>
	    </div>
	</div>
	<div class="container">
		<div class="row">
			<div class="span12">
				<div id="occ-banner">
					<img src="/wp-content/themes/occwp/images/header.png" />
				</div>
				<div id="right-column">
					<div id="page-content">
						<h2 class="entry-title">Council Seating Chart</h2>
						<p>Below is the seating chart for Chicago City Council meetings. Click on the image of any Alderman or Council member to view their contact information.</p>
						<ul id="ald-seats">								
							<?php
						
							while ($ald = mysql_fetch_object($ald_result)) :
								$ald_twitter_url 	=	"http://twitter.com/" . substr($ald->ald_twitter, 1);
								
							?>
								
							<li id="ward-<?php echo $ald->ward;?>">
								<a href="javascript:;" rel="popover" data-content="
									<?php
										echo "<p>";
										echo "<strong class='ward-num'>";
										if ($ald->ward < 51) {
											echo "Ward " . $ald->ward . "</strong>";
										} elseif ($ald->ward == 51) {
											echo "City Clerk</strong>";
										} elseif ($ald->ward == 52) {
											echo "Mayor</strong>";
										}
										if ($ald->ward == 52) {
										} else { 
											echo "<br /><strong>Phone</strong>" . " " . $ald->ald_phone;
										}
										if (!is_null($ald->ald_email)) {
											echo "<br /><strong>E-mail</strong>" . " " . $ald->ald_email;
										}
										if (!is_null($ald->ald_website)) {
											echo "<br /><strong>Website</strong>" . " " . "<a href='" . $ald->ald_website . "' target='_blank'>" . $ald->ald_website . "</a>"; 
										}
										if (!is_null($ald->ald_twitter)) {
											echo "<br /><strong>Twitter</strong>" . " " . "<a href='" . $ald_twitter_url . "' target='_blank'><img src='/wp-content/themes/occwp/images/icons/twitter-16.png' /></a>&nbsp;<a href='" . $ald_twitter_url . "' target='_blank'>" . $ald->ald_twitter . "</a>";
										}
										if (!is_null($ald->ald_facebook)) {
											echo "<br /><strong>Facebook</strong>" . " " . "<a href='" . $ald->ald_facebook . "' target='_blank'><img src='/wp-content/themes/occwp/images/icons/facebook-16.png' /></a>";
										}
										echo "</p>";
									
									?>
									
								" data-placement="top" data-title="<?php echo $ald->ald_name;?>">&nbsp;</a>
							</li>
							
							<?php

							endwhile;
							 
						?>
						
						</ul>
						<a style="text-align: right;" class="closer btn btn-primary push-right" href="javascript:;">Hide Aldermanic information</a>
						<div style="clear:both;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="footer">
	<p>Office of the City Clerk | City of Chicago | Susana A. Mendoza, City Clerk</p>
</div>
</body>
</html>