<?php
	include '../media/inc/clerkDataCon.inc';

	
	$query = sprintf("SELECT * FROM aldermanicData");
	$ald_result = mysql_query($query);

?>
<!DOCTYPE html>
<html>
<head>
<title>Council News Central: Watch City Council Meetings Live | Office of the City Clerk, City of Chicago</title>
<meta name="viewport" content="width=1080" />
<link rel="SHORTCUT ICON" href="/wp-content/themes/occwp/images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Arvo:400,700|Open+Sans:400,800" />
<link rel="stylesheet" type="text/css" href="/media/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/council/css/cnc.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/media/js/bootstrap.min.js"></script>
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
	<div class="container" style="margin-bottom: 15px;">
		<div class="row">
			<div class="span12">
				<div id="occ-banner">
					<img src="/wp-content/themes/occwp/images/header.png" />
				</div>
				<div id="cnc-banner">
					<p class="banner-top">Welcome to...</p>
					<p class="banner-title">Council News Central</p>
					<p class="banner-bottom">Council will meet Wednesday, July 30, 2014 at 10a.m.<a href="https://chicago.legistar.com/Calendar.aspx" target="_blank">Visit the LIC to view prior meetings</a>.</p>
				</div>
				<div id="quick-links">
					<table style="width: 100%;">
						<tbody>
							<tr>
								<!-- <td style="width: 20%; padding: 5px;"><span class="os-strong">HELPFUL LINKS:</span></td> -->
								<td style="width: 20%; padding: 5px;"><a class="btn btn-danger btn-block btn-large" href="https://chicago.legistar.com/MeetingDetail.aspx?ID=319669&GUID=F75BB9DD-BA4A-40BC-9B57-6FE865261546&Options=&Search=" target="_blank">Meeting Agenda</a></td>
								<td style="width: 20%; padding: 5px;"><a class="btn btn-warning btn-block btn-large" href="http://chicityclerk.com/legislation-records/journals-reports/city-budgets/" target="_blank">2014 City Budget</a></td>
								<td style="width: 20%; padding: 5px;"><a class="btn btn-info btn-block btn-large" href="/council/seating-chart.php" target="_blank">Council Seating Chart</a></td>
								<td style="width: 20%; padding: 5px;"><a class="btn btn-primary btn-block btn-large" href="/legislation-records/about-chicago-government/about-city-council-meetings/" target="_blank">Rules of Order</a></td>
								<td style="width: 20%; padding: 5px;"><a class="btn btn-success btn-block btn-large" href="http://chicago.legistar.com/Calendar.aspx" target="_blank">Previous Meetings</a></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div id="right-column">
					<div id="page-content">
						<table class="table table-bordered" id="cnc-table">
							<thead>
								<tr>
									<td class="first">Meeting Video and Captions</td>
									<td class="tweet">Community Tweets</td>
									<td class="last">Connect with City Council</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										
										<!-- Begin photo Placeholders -->
										<div id="cnc-placeholder">
        									<a href="https://chicago.legistar.com/Calendar.aspx" target="_blank"><span class="link">Video and captions will begin streaming in this area about 15 minutes prior to meeting - just refresh the browser at that time. Video of prior meetings is available in the <span class="red">Legislative Information Center</span>.</span></a>
        								</div>
        								
        								
										<!-- End photo Placeholder -->
										
										<!-- Begin Video + Caption Container 
										<div id="cnc-video" class="pull-up">
											<iframe id="DataStreamController" height="0" width="0" style="height: 0px; width: 0px; border:0; "></iframe>
			                        		<script type="text/javascript" src="http://chicago.granicus.com/core/js/flash/swfobject.js"></script>
			                        		<script type="text/javascript" src="http://chicago.granicus.com/js/MicrosoftAjax.js"></script>
			                        		<script type="text/javascript" src="http://chicago.granicus.com/js/Silverlight.js"></script>
			                        		<script type="text/javascript" src="http://chicago.granicus.com/core/js/flash/FlashPlayer.js"></script>
			                        		<script type="text/javascript" src="http://chicago.granicus.com/core/js/html5player/html5player.js"></script>
			                        		<script type="text/javascript" src="http://chicago.granicus.com/js/video.js"></script>
			                        		<script type="text/javascript" src="http://chicago.granicus.com/core/js/html5player/androidhtml5player.js"></script>
			                        		<script type="text/javascript" src="http://chicago.granicus.com/js/PluginWMPDetect.js"></script>
			                        		<script type="text/javascript" src="http://chicago.granicus.com/js/GranicusPlayer.js"></script>
			                        		<div id="MediaPlayerContainer"><object id="silverlightControl" data="data:application/x-silverlight-2," type="application/x-silverlight-2" width="400" height="335" style="height: 335px; width: 400px; "><param name="initParams" value="PlayerTemplateGuid=b3f4f7e5-a6fe-11df-9735-fade6870f990,Height=360,Width=480,SourceUrl=http://chicago.granicus.com/ASX.php?view_id=&amp;camera_id=1&amp;r=c91981d8ae81b53d05c7b3ee4117c985&amp;xp=n&amp;sn=chicago.granicus.com&amp;bitrate=,ScriptUrl=http://chicago.granicus.com/JSON.php?view_id=&amp;camera_id_id=&amp;r=c91981d8ae81b53d05c7b3ee4117c985,DirectUrl=,DirectUrlStreamType=,IndexItemsURL=http://chicago.granicus.com/JSON.php?view_id=&amp;camera_id_id=&amp;r=c91981d8ae81b53d05c7b3ee4117c985&amp;only_agenda=1,AutoStart=true,LiveStream=true,AspectRatio=true,EventStartTime=0001-01-01 12:00:00 AM,EnableHighDefinition=false,EnableClosedCaptions=true,EnableGranicusCaptions=false,CaptionsUrl=Caption URL,EnableEmbedding=true,ShowDefaultThumbnail=false,DefaultThumbnailGuid=00000000-0000-0000-0000-000000000000,MetaID=,OnStopCheckUrl=http://chicago.granicus.com/IsBroadcasting.php?camera_id=1&amp;r=c91981d8ae81b53d05c7b3ee4117c985,StartOffset=0,ErrorCode=0"><param name="source" value="http://chicago.granicus.com/core/Players/SL/ModernPlayer.xap"><param name="onError" value=" + onSilverlightError"><param name="onLoad" value="silverlightControl_onLoad"><param name="background" value="black"><param name="minRuntimeVersion" value="4.0.50401.0"><param name="autoUpgrade" value="true"><param name="enableHtmlAccess" value="true"><param name="Windowless" value="false"><a href="http://go.microsoft.com/fwlink/?LinkID=149156&amp;v=4.0.50401.0" style="text-decoration:none"> <img src="http://go.microsoft.com/fwlink/?LinkId=149156" alt="Get Microsoft Silverlight" style="border-style:none"></a></object>
			                        		</div> 
			                        		<script type="text/javascript">
												function Play() {
													MediaPlayer.Play();
												}
												function Pause() {
													MediaPlayer.Pause();
												}
												function Stop() {
													MediaPlayer.Stop();
												}
												function FastForward() {
													MediaPlayer.FastForward();
												}
												function Rewind() {
													MediaPlayer.Rewind();
												}
												function GetPlayerPosition() {
													return MediaPlayer.GetPlayerPosition();
												}
												function SetPlayerPosition(pos,selectbox) { 
													MediaPlayer.SetPlayerPosition(pos);
													if(selectbox != null) {
														selectbox.selectedIndex = 0; 
													}
												}
											</script>
											<a class="btn btn-info btn-large btn-silverlight" href="http://www.microsoft.com/getsilverlight" target="_blank">Download Microsoft Silverlight</a>
											<iframe height="160" width="400" frameborder="0" src="http://textcast.peoplesupport.com/textcast.asp?id=chicago&font=helvetica&fontsize=12&bold=false&allowsettings=false&toolbar=false&backgroundcolor=FFFFFF&fontcolor=000000&"></iframe>
										</div>
										<!-- End Video + Caption Container -->
									
									
									
									
									
									</td>
									<td class="timeline">
										<a class="twitter-timeline" href="https://twitter.com/search?q=%23ChiCouncil" data-widget-id="261190124929417216">Tweets about "#ChiCouncil"</a>
										<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
									</td>
									<td>
										<div id="cnc-connect-wrap">
		        							<table id="cnc-connect">
			        							<tbody>
			        								<tr>
									 	  				<td><strong>Rahm Emanuel</strong></td>
									 	  				<td>Mayor</td>
									 	  				<td><a href="https://www.facebook.com/ChicagoMayorsOffice" target="_blank"><img src="img/facebook-24.png" /></a></td>
									 	  				<td></td>
									 	  			</tr>
							                        <tr class="table-row-odd">
							                        	<td colspan="4"><a href="http://twitter.com/ChicagosMayor" target="_blank"><img src="img/twitter-24.png" /></a>&nbsp;<a href="http://twitter.com/ChicagosMayor" target="_blank">@ChicagosMayor</a></td>
							                        </tr>
							                        <tr>
							                        	<td><strong>Susana A. Mendoza</strong></td>
							                            <td>City Clerk</td>
							                            <td><a href="https://www.facebook.com/chicityclerk" target="_blank"><img src="img/facebook-24.png" /></a></td>
							                            <td></td>
							                        </tr>
							                        <tr class="table-row-odd">
							                        	<td colspan="4"><a href="http://twitter.com/ChiCityClerk" target="_blank"><img src="img/twitter-24.png" /></a>&nbsp;<a href="http://twitter.com/ChiCityClerk" target="_blank">@ChiCityClerk</a></td>
							                        </tr>
	
			        								<?php 
				        								
			        								$ald_query 		= 	sprintf("SELECT * FROM aldermanicData");
			        								$ald_result		=	mysql_query($ald_query);
			        								$ald_num		=	mysql_num_rows($ald_result);
			        								$ald_i			=	0;
			        								
			        								while ($ald_i < 50) :
														$ald_ward			=	mysql_result($ald_result, $ald_i, 'ward');
				        								$ald_name			=	mysql_result($ald_result, $ald_i, 'ald_name');
														$ald_phone			=	mysql_result($ald_result, $ald_i, 'ald_phone');
														$ald_email			=	mysql_result($ald_result, $ald_i, 'ald_email');
														$ald_website		=	mysql_result($ald_result, $ald_i, 'ald_website');
														$ald_twitter		=	mysql_result($ald_result, $ald_i, 'ald_twitter');
														$ald_twitter_url 	=	"http://twitter.com/" . substr($ald_twitter, 1);
														$ald_facebook		=	mysql_result($ald_result, $ald_i, 'ald_facebook');
	
													?>
													
													<tr <?php if (is_null($ald_twitter)) { ?>class="table-row-odd"<?php } ?>>
														<td><strong><?php echo $ald_name;?></strong></td>
														<td>Ward <?php echo $ald_ward;?></td>
														<td><?php if (!is_null($ald_facebook)) { ?><a href="<?php echo $ald_facebook;?>" target="_blank"><img src="img/facebook-24.png" /></a><?php } ?></td>
														<td></td>
													</tr>
													<?php 
														if (!is_null($ald_twitter)) : 
													?>
													<tr class="table-row-odd">
														<td colspan="4"><a href="<?php echo $ald_twitter_url;?>" target="_blank"><img src="img/twitter-24.png" /></a>&nbsp;<a href="<?php echo $ald_twitter_url;?>" target="_blank"><?php echo $ald_twitter;?></a></td>
													</tr>
													<?php
													
														endif;
														$ald_i++; 
													endwhile;
				        								
			        								?>
							                     </tbody>
				                    		</table>
	        							</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="push"></div>
</div>
<div id="footer">
	<p>Office of the City Clerk | City of Chicago | Susana A. Mendoza, City Clerk</p>
</div>
</body>
</html>