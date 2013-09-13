<?php

header('Location: https://webapps.cityofchicago.org/ezbuy/');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="SHORTCUT ICON" href="../images/icons/favicon.ico" />
<title>Office of the Chicago City Clerk | Vehicle Sticker Store</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
<meta name="og:title" content="I just bought my 2012-2013 Chicago City Sticker on EZ BUY!" />
<meta name="og:description" content="The Office of the City Clerk's EZ BUY site is the easiest way to buy 2012-2013 City Stickers and Residential Daily Guest Permits. Don't forget to register your dog while you're there!" />
<meta name="og:image" content="http://chicityclerk.com/ezbuy/images/2012-annual-sticker.jpg" />
<link rel="stylesheet" type="text/css" href="style.css" />
<style type="text/css">
.FBConnectButton, .FBConnectButton_Small {
	background: none;
}
</style>
<script language="javascript" type="text/javascript">
<!--
function journal(url) {
	newwindow=window.open(url,'name','scrollbars=yes,toolbar=yes,menubar=yes,location=yes,status=yes,width=740,height=500');
	if (window.focus) {newwindow.focus()}
	return false;
}

// -->
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
<script type="text/javascript" language="JavaScript">
<!--
function checkCheckBoxes(theForm) {
	if (
	theForm.terms.checked == false)
	{
		alert ('Please agree to Terms and Conditions');
		return false;
	} else { 	
		return true;
	}
}
//-->
</script> 
</head>
<body>
	<div class="container">
		<div id="header">
			<img src="images/header.png"/>
		</div>
		<div id="subheader">
            <div id="go-back"><a href="../index.html"><img src="images/go-back.png" border="0" /></a></div>
            <div id="store-logo">
            	<img src="images/subheader.png"  width="200" />
			</div>
			<div id="shopping-cart">
            	<table width="245" align="right" border="0">
  <tr>
    <td align="right" valign="top" width="125"><img src="images/share.png" /></td>
    <td align="right" valign="top" width="50"><a href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Fwebapps.cityofchicago.org%2FStickerOnlineWeb%2Fpageflows%2Fsearch%2FstartOnlinePurchase.do
&t=Buy%20City%20of%20Chicago%20Vehicle%20Stickers%20and%20Residential%20Daily%20Parking%20Permits%20on%20EZ%20BUY!" target="_blank"><img src="images/facebook.jpg" width="36" /></a></td>
	<td align="left" valign="top" width="40"><a href="https://twitter.com/intent/tweet?text=Buy+2012-2013+Chicago+Vehicle+Stickers%2C+Dog+Emblems%2C+and+Guest+Passes+online.+Clerk+Mendoza%E2%80%99s+EZ+BUY+site+makes+it+easy+http%3A%2F%2Fis.gd%2F7aZd7w" target="_blank"><img src="images/twitter.jpg" width="36" /></td>
  </tr>
</table>
          </div>
		</div>
		<div id="progress">
			<img src="images/progress-1.png" />
		</div>
		<div id="content">
			<form action="product-select.html" onsubmit="return checkCheckBoxes(this);">
				<h1>Need one of these?</h1>
   				<div id="stickers">
        			<div id="annual-sticker">
            			<p>2012-2013 Vehicle Sticker</p>
            			<img src="images/2012-annual-sticker.jpg" width="230" vspace="7" alt="2012-2013 Vehicle Sticker" />
       				</div>
        			<div id="guest-pass">
          				<p>Daily Residential Parking Permits</p>            
           				<img src="images/guest-pass.jpg" width="217" alt="Daily Residential Parking Permits" />
            		</div>
                    <div id="dog-emblem">
                    	<p>Dog Registration Emblem</p>
                        <img src="images/dog-emblem.jpg" alt="Dog Registration Emblem" />
                    </div>
            		<div style="clear:both;"></div>
        		</div>
    			<h2 class="margtop">Great! You've come to the right place.</h2>
    			<p style="font-size: 16px;">Please check the box below to agree to the <span onclick="return journal('http://chicityclerk.com/ezbuy/terms-and-conditions.html')"><a href="javascript:;">Terms and Conditions</a></span>, then click Next.</p>
    			<div><input type="checkbox" name="terms" /> I agree to the Terms and Conditions
                </div>
                <p align="right"><input type="submit" class="continue" /></p>
                <!-- <p style="color: #FF0000; font-size: 14px; font-weight: bold;">We apologize for the inconvenience.  The City of Chicago is currently experiencing a technical issue impacting payment and purchasing services, including City Vehicle Stickers, Daily Residential Guest Parking Permits, and Dog Registration.  We anticipate having this issue resolved quickly – please check back soon.</p> -->
			</form>
			<div style="clear: both;"></div>
		</div>
        <!-- <div id="logos">
        	<p class="lrgwhite">Did you hear...</p>
        </div> -->
        <div id="footer">
        	<p>Office of the City Clerk | City of Chicago | Susana A. Mendoza, City Clerk</p>
		</div>
	</div>
</body>
</html>
