<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<title>City of Chicago, Office of the City Clerk</title>
<meta name="keywords" content="Office of the City Clerk, Susana A. Mendoza, Chicago Clerks Office, Chicago Illinois, City Sticker, Vehicle Sticker" />
<meta name="description" content="City of Chicago Illinois, Office of the City Clerk. -  Acquire your Chicago Vehicle Stickers. Learn about Chicago legislation." />
<meta name="DC.title" content="City of Chicago, Office of the City Clerk" />
<meta name="geo.region" content="US-IL" />
<meta name="geo.placename" content="Chicago" />
<meta name="geo.position" content="41.883852;-87.632061" />
<meta name="ICBM" content="41.883852, -87.632061" />
<meta name="msvalidate.01" content="22BEA9D3A4DB263239AC06E8EA9D83D9" />
<link rel="shortcut icon" href="/wp-content/themes/occwp/images/favicon.ico" />
<meta name="viewport" content="width=1080" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Arvo:400,700|Open+Sans:400,800" />
<link rel="stylesheet" type="text/css" href="/media/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/media/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/media/js/jquery.bxSlider.min.js"></script>
<script type="text/javascript" src="/media/js/jquery.tweet.js"></script>
<script type="text/javascript" src="/media/js/jquery.timeago.js"></script>
<script type="text/javascript" src="/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="/media/js/jquery.dataTables.columnFilter.js"></script>
<script type="text/javascript" src="/media/js/jquery.dataTables.bootstrap.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('ul.nav li.menu-item-facebook a').attr('target', '_blank');
	$('ul.nav li.menu-item-twitter a').attr('target', '_blank');
});
</script>
<?php 
	$page_has_tabs = array(25, 55, 58, 67, 72, 77, 83, 89, 242);
	if( is_page($page_has_tabs) ) : ?>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.occTabs.js"></script>
<?php endif; ?>
<?php wp_head(); ?>

<?php if( is_home() ) : ?>
<!-- Load Slideshow On Homepage -->
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.occTabs.js"></script>
	<link rel="stylesheet" href="/wp-content/themes/occwp/images/slideshow/bx_styles/bx_styles.css" />
	<script type="text/javascript">
		$(document).ready(function() {
			$('.home #slideshow #slides').bxSlider({
				mode: 'fade',
				controls: false,
				auto: true,
				autoControls: true,
				pager: true,
				pause: 7000,
				startText: 'start',
				stopText: 'pause'
			});
		});
	</script>
<? endif; ?>

<?php if (is_404() ) : ?>
	<script type="text/javascript">
	<!--
		setTimeout("location.href = 'http://chicityclerk.com/';", 5000);
	-->
	</script>
<?php endif; ?>

<?php if ( is_page(55) ) : ?>
<!-- Local Nav Hack on Pricing Page -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('li.menu-item-742').addClass('current-menu-item');
		});
	</script>
<?php endif; ?>

<?php if( is_page(342) ) : ?>
<!-- Slideshow on Clerks Kids Page -->
	<link rel="stylesheet" href="/media/css/bx_styles/bx_styles.css" />
	<script type="text/javascript">
		$(document).ready(function() {
			$('.page-id-342 #right-column #ck-slides').bxSlider({
				"auto": true,
				"controls": true
			});
			$('ul.nav li.menu-item-programs').addClass('current-menu-item');
		});
	</script>
<?php endif; ?>

<?php if( is_page(619) ) : ?>
<!-- Read More on CSP Landing Page -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('#readmore-daily').hide();
			$('#readmore-annual').hide();
			$('a.readmore-daily').click(function() {
				$('#readmore-daily').fadeIn();
				$(this).fadeOut();
			});
			$('a.readmore-annual').click(function() {
				$('#readmore-annual').fadeIn();
				$(this).fadeOut();
			});
		});
	</script>
<? endif; ?>

<?php if( is_page(89) ) : ?>
<!-- About City Council Meetings Scripts -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('#show-regular').hide();
			$('#special-meeting-agenda').hide();
			$('#show-special').click(function() {
				$(this).hide();
				$('#show-regular').show();
				$('#regular-meeting-agenda').fadeOut();
				$('#special-meeting-agenda').fadeIn();
			});
			$('#show-regular').click(function() {
				$(this).hide();
				$('#show-special').show();
				$('#special-meeting-agenda').fadeOut();
				$('#regular-meeting-agenda').fadeIn();
			});
			$('.order-hide').hide();
			$('.hide-all-orders').hide();
			$('a.index-readmore-order').click(function() {
				var x = this.id.split('-');
				$('#order-' + x[1]).fadeIn('fast');
				$(this).hide();
			});
			$('a.index-readmore-order-close').click(function() {
				var x = this.id.split('-');
				$('#order-' + x[1]).fadeOut('fast');
				$('#toggle-' + x[1]).show();
			});
			$('a.show-all-orders').click(function() {
				$('.order-hide').fadeIn('fast');
				$('.index-readmore-order').hide();
				$('a.hide-all-orders').show();
				$(this).hide();
			});
			$('a.hide-all-orders').click(function() {
				$('.order-hide').fadeOut('fast');
				$('.index-readmore-order').show();
				$('a.show-all-orders').show();
				$(this).hide();
			});
		});
	</script>
<? endif; ?>

<?php if( is_page(271) ) : ?>
<!-- Dog of Distinction Toggle -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('#dod-hide').hide();
			$('#dod-toggle').click(function() {
				$(this).hide();
				$('#dod-hide').fadeIn();
			});
		});
	</script>
<?php endif; ?>

<?php $toggle_kids_id = array( 353, 366 ); ?>
<?php if( is_page($toggle_kids_id) ) : ?>
<!-- KIDS ID Button Toggle -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('#show-back').hide();
			$('.id-toggle').click(function() {
				var id_side = this.id.split('toggle-');
				$(this).addClass('disabled');
				$(this).siblings().removeClass('disabled');
				$('#show-' + id_side[1]).show();
				$('#show-' + id_side[1]).siblings().hide();
			});
		});
	</script>
<?php endif; ?>

<?php if( is_page(25) ) : ?>
<!-- NEWS PAGE TWITTER FEED -->
	<script type="text/javascript">
		$(document).ready(function($){
	        $(".tweet").tweet({
	            username: "ChiCityClerk",
	            join_text: "auto",
	            avatar_size: 36,
	            count: 15,
	            auto_join_text_default: "", 
	            auto_join_text_ed: "",
	            auto_join_text_ing: "",
	            auto_join_text_reply: "",
	            auto_join_text_url: "",
	            loading_text: "Loading Tweets..."
	        }).bind("loaded",function(){$(this).find("a").attr("target","_blank");});
	        $('abbr.time-ago').timeago();
	    });
	</script>
<?php endif; ?>

<?php if( is_page(27) ) : ?>
<!-- CONTACT US PAGE TOGGLES -->
<script type="text/javascript">
	$(document).ready(function() {
		$('.toggle-content').hide();
		$('a.btn-toggle').click(function() {
			var toggle = this.id.split('show-');
			$('#content-' + toggle[1]).slideDown();
			$('#content-' + toggle[1]).siblings().slideUp();
		});
	});
</script>
<?php endif; ?>

<?php if( is_home() ) : ?>
	<script type="text/javascript">
		$(document).ready(function($){
	        $(".tweet").tweet({
	            username: "ChiCityClerk",
	            join_text: "auto",
	            avatar_size: 36,
	            count: 15,
	            auto_join_text_default: "", 
	            auto_join_text_ed: "",
	            auto_join_text_ing: "",
	            auto_join_text_reply: "",
	            auto_join_text_url: "",
	            loading_text: "Loading Tweets..."
	        }).bind("loaded",function(){$(this).find("a").attr("target","_blank");});
	        $('abbr.time-ago').timeago();
	    });
	</script>
<?php endif; ?>

<?php $post_type = get_post_type(); 

	if ( is_single($post->ID) ) :
		if ( $post_type == 'occ_clerk_news') :
?>
<!-- GLOBAL AND LOCAL NAVIGATION ON NEWS ITEMS -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('ul.nav li.menu-item-news').addClass('current-menu-item');
			$('ul.menu li.menu-item-clerk-news').addClass('current-menu-item');
		});
	</script>
<?php
		elseif ( $post_type == 'occ_announcements') :
?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('ul.nav li.menu-item-news').addClass('current-menu-item');
			$('ul.menu li.menu-item-announcements').addClass('current-menu-item');
		});
	</script>
<?php
		endif;
	endif;
?>
<?php if( is_page(563) ) : ?>
	<link rel="stylesheet" href="/media/css/jquery.dataTables.css" />
	<script type="text/javascript">
		$(document).ready(function() {
			oTable = $('#datatable').dataTable({
				"aaSorting": [[ 0, "desc" ]],
				"aLengthMenu": [[ 10, 25, 50, 100, -1 ], [ 10, 25, 50, 100, "All" ]],
				"bProcessing": true,
				"oLanguage": { "sSearch": "Search all columns:" },
				"sPaginationType": "bootstrap"
			}).columnFilter({
				"aoColumns": [ { type: "text" }, { type: "text" }, { type: "text" }, { type: "text" }, null ],
			});
			$('tfoot input').addClass('input-mini');
			$('tfoot th.last input').removeClass('input-mini').addClass('input-large');
		});
	</script>
<?php endif; ?>

<!-- GOOGLE ANALYTICS TRACKING CODE -->

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
<body <?php body_class(); ?>>
<?php if( is_page(25) ) : ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php endif; ?>
<div id="wrapper" class="hfeed">
	<div class="navbar navbar-inverse navbar-static-top">
		<div class="navbar-inner">
	    	<div class="container">
	    		<div class="span12">
	    			<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'sort_column' => 'menu_order', 'items_wrap' => '<ul class="nav">%3$s</ul>' ) ); ?>
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
			<div id="container">
				<div class="alert-box">
					<p><strong>Please Note:</strong> The Office of the City Clerk will not be open on Monday, November 11, 2013 in honor of Veterans Day. <a style="color:#fff; font-weight:bold; text-decoration:underline;" href="/office-info/office-locations/" title="Hours and Locations for the Office of the City Clerk" target="_self">Normal business hours</a> will resume on Tuesday, November 12, 2013.</p>
				</div>