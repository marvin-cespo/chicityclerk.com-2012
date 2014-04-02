<?php get_header(); ?>
<div id="content" class="container">
	<div class="row">
		<div class="span12">
			<div class="lighter">
				<div class="lefty" id="google_translate_element"></div>
				<script type="text/javascript">
					function googleTranslateElementInit() {
  						new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true, gaId: 'UA-4427438-1'}, 'google_translate_element');
					}
				</script>
				<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
				<div class="righty"><?php get_search_form(); ?></div>
			<div class="clear"></div>
		</div>
		</div>

		<div class="span3home" id="left-column">
			<div id="announcements">
				<h2>City Council</h2>
				<div class="announcement" id="announcement-council">
					<h5><a href="#calendar-select" data-toggle="modal">Next City Council Meeting</a></h5>
					<p>Wednesday, April 30, 2014<br />Time: 10:00a.m.<br />Location: City Council Chambers<br>
					City Hall 121 N LaSalle St</p>
					<div id="calendar-select" class="modal hide fade in" style="display: none;">
						<div class="modal-header">
							<a class="close" data-dismiss="modal">x</a>
							<h3>Add Council Meeting to Calendar</h3>
						</div>
						<div class="modal-body">
							<table style="width: 100%;">
								<tbody>
									<tr>
										<td><a class="btn btn-primary btn-block" href="https://www.google.com/calendar/embed?src=chicagocityclerk%40gmail.com&ctz=America/Chicago" target="_blank">Add to Google Calendar</a></td>
										<td><a class="btn btn-primary btn-block" href="webcal://chicityclerk.com/city-council.ics" target="_blank">Add to Outlook Calendar</a></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<a id="modal-show" data-toggle="modal" class="btn btn-block btn-info" href="#calendar-select">Add to Calendar</a>
				</div>
				<?php 
				$announcements_args = array( 'post_type' => 'occ_announcements', 'posts_per_page' => 4 );
				$announcements = new WP_Query( $announcements_args );
				$homepage_i = 0;
				while ($announcements->have_posts()) : $announcements->the_post();
					$homepage_i++;
					$homepage_show = get_post_meta($post->ID, 'show-on-index', true);
					if( $homepage_i == 1 ) {
						$btn_color = "danger";
					} elseif( $homepage_i == 2 ) {
						$btn_color = "success";
					} elseif( $homepage_i == 3 ) {
						$btn_color = "primary";
					} elseif( $homepage_i == 4 ) {
						$btn_color = "info";
					}
				?>
				<div class="announcement" id="announcement-<?php echo $homepage_i; ?>">
					<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					<p><?php the_excerpt(); ?></p>
					<a class="btn btn-block btn-<?php echo $btn_color; ?>" href="<?php the_permalink(); ?>">Read More</a>
				</div>
				<?php endwhile; ?>
			</div>
			<div id="quick-links">
				<ul>
				<?php
					$quicklink_args = array( 'orderby' => 'id', 'limit' => -1, 'category_slug' => 'quick-links' );
					wp_list_bookmarks($quicklink_args);
				?>
				</ul>
			</div>
		</div>
		<div class="span9home homeborder" id="right-column">
			<!-- BEGIN DAY-OF,PRESTART COUNCIL NEWS CENTRAL BANNER 
			<div id="cnc-ad">
				<a class="cnc-ad-link" href="/council/council-news-central.php">
					<span class="cnc-top">City Council Meets Today, Wednesday, April 2nd, 10am.  Check Out...</span>
					<span class="cnc-title">Council News Central</span>
					<span class="cnc-bottom">... to watch live video, read community tweets, and connect with council members.</span>					
				</a>
			</div>
			<!-- END DAY-OF,PRESTART COUNCIL NEWS CENTRAL BANNER 
			
			<!-- BEGIN DAY-OF,CONCLUDED NO VIDEO COUNCIL NEWS CENTRAL BANNER 
			<div id="cnc-ad">
				<a class="cnc-ad-link" href="https://chicago.legistar.com/MeetingDetail.aspx?ID=297716&GUID=D98723D6-14A0-4175-9A72-5C5077A33827&Options=&Search=">
					<span class="cnc-top">City Council met earlier today.  Check out the...</span>
					<span class="cnc-title">Legislative Information Center</span>
					<span class="cnc-bottom">... to view meeting records.  Video will be posted shortly.</span>					
				</a>
			</div>
			<!-- END DAY-OF,CONCLUDED NO VIDEO COUNCIL NEWS CENTRAL BANNER -->
			
			
			<!-- BEGIN DAY-OF,CONCLUDED VIDEO UP COUNCIL NEWS CENTRAL BANNER -->
			<div id="cnc-ad">
				<a class="cnc-ad-link" href="https://chicago.legistar.com/MeetingDetail.aspx?ID=302139&GUID=3671F5C0-6D8A-4F53-91A9-975C3C07EE7B&Options=&Search=">
					<span class="cnc-top">City Council met this week.  Check out the...</span>
					<span class="cnc-title">Legislative Information Center</span>
					<span class="cnc-bottom">... to watch video and view meeting records.</span>
				</a>
			</div>
			<!-- END DAY-OF,CONCLUDED VIDEO UP COUNCIL NEWS CENTRAL BANNER -->
			
			<a class="btn btn-primary btn-block btn-large btn-lic" style="text-decoration:none;" href="https://webapps3.cityofchicago.org/StickerOnlineWeb/" target="_self">Buy City Stickers &amp; Guest Passes online now</a>


			 <div id="slideshow">
				<div id="slides" style="overflow: hidden;">
					<div id="slide-animal" style="width: 770px; height: 250px;">
						<a href="/clerk-news/city-clerk-susana-a-mendoza-is-protecting-pets-consumers/">
							<span class="panel-animal-head">How Chicago City Clerk Susana A. Mendoza is Protecting Consumers &amp; Pets</span>
							<span class="panel-animal-body"><br />
							<button id="csp-btn" style="margin-top:10px;" class="btn btn-info btn-large">Learn More</button></span>
						</a>
					</div>
					<div id="slide-pothole" style="width: 770px; height: 250px;">
						<a href="/programs-services/claims/" target="_self">
							<span class="panel-pothole-head">POTHOLE DAMAGE</span><br />
							<span class="panel-pothole-body">Find more information about filing a damage claim.<br />
								<button id="csp-btn" style="margin-top:10px;" class="btn btn-info btn-large">Learn More</button></span>
						</a>
					</div>
					<div id="slide-2" style="width: 770px; height: 250px;">
						<a href="/city-stickers-parking/year-round-sales-2014/" target="_self">
							<span class="panel-2-head">COMING IN 2014, YEAR-ROUND CHICAGO CITY VEHICLE STICKER SALES</span>
							<span class="panel-2-body">Historic changes and Better service are on the way!<br />
								<button id="csp-btn" style="margin-top:10px;" class="btn btn-info btn-large">Learn More</button></span>
						</a>
					</div>
					<div id="slide-3" style="width: 770px; height: 250px;">
						<a href="/city-stickers-parking/storelocator/">
							<span class="panel-3-head">FIND A LOCAL CITY VEHICLE STICKER VENDOR</span>
							<span class="panel-3-body">Locate City Clerk Offices &amp; our partner community vendors<br />
							<button id="csp-btn" style="margin-top:10px;" class="btn btn-info btn-large">Purchase a City Sticker</button></span>
						</a>
					</div>
					<div id="slide-4" style="width: 770px; height: 250px;">
						<a href="/office-info/about-city-clerk-susana-a-mendoza/">
							<span class="panel-4-head">Susana A. Mendoza</span>
							<span class="panel-4-body">Chicago's first female City Clerk. She served six terms in the Illinois House of Representatives and is dedicated to making the Office of the City Clerk work for you.<br />
							<button id="csp-btn" style="margin-top:10px;" class="btn btn-info btn-large">Learn More</button></span>			
						</a>
					</div>
				</div>			
			</div>
			
			<div id="newsfeed">
				<ul class="occ-tabs">
					<li><a class="occ-tab-link current" id="occ-tab-toggle-clerk" href="javascript:;">City Clerk News</a></li>
					<!-- <li><a class="occ-tab-link" id="occ-tab-toggle-council" href="javascript:;">City Council News</a></li> -->
					<li><a class="occ-tab-link" id="occ-tab-toggle-fb" href="javascript:;">Facebook</a></li>
					<!-- <li><a class="occ-tab-link" id="occ-tab-toggle-tw" href="javascript:;">Twitter</a></li> -->
				</ul>
				<div id="occ-tab-content">
					<div class="occ-tab-int current" id="occ-tab-content-clerk">
						<?php
							$clerknews_args = array( 'post_type' => 'occ_clerk_news', 'posts_per_page' => 5 );
							$clerknews = new WP_query( $clerknews_args );
							while ($clerknews->have_posts()) : $clerknews->the_post();
						?>
						<div class="feed-box">
							<div class="feed-thumb">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array( 100, 100 ), array( 'class' => 'img-polaroid' )) ; ?></a>
							</div>
							<div class="feed-text">
								<h5><?php echo get_the_date(); ?></h5>
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<?php the_excerpt(); ?>
							</div>
							<div style="clear:both;"></div>
						</div>
						<?php endwhile; ?>
						<div class="view-all-items">
							<a class="btn btn-primary" a href="/news/city-clerk-news/">View All City Clerk News</a>
						</div>
					</div>
					<!-- <div class="occ-tab-int" id="occ-tab-content-council">
						<?php
							$councilnews_args = array( 'post_type' => 'occ_council_news', 'posts_per_page' => 5 );
							$councilnews = new WP_Query( $councilnews_args );
							while ($councilnews->have_posts()) : $councilnews->the_post();
						?>
						<div class="feed-box">
							<div class="feed-thumb">
								<?php the_post_thumbnail( array( 100, 100 ), array( 'class' => 'img-polaroid' )); ?>
							</div>
							<div class="feed-text">
								<h5><?php echo get_the_date(); ?></h5>
								<h4><?php the_title(); ?> <span class="ordinance"><?php the_excerpt(); ?></span></h4>
								<?php $url_details = get_post_meta( $post->ID, 'details-status', true ); ?>
								<?php $url_legis = get_post_meta( $post->ID, 'view-legislation', true ); ?>
								<a class="btn btn-primary" href="<?php echo $url_details; ?>" target="_blank">Details / Status</a> <a class="btn btn-primary" href="<?php echo $url_legis; ?>" target="_blank">Read Legislation</a>
							</div>
							<div style="clear:both;"></div>
						</div> 
						<?php endwhile; ?> 
						<div class="view-all-items">
							<a class="btn btn-primary" href="/news/city-council-news/">View All City Council Headlines</a>
						</div>
					</div> -->
					<div class="occ-tab-int" id="occ-tab-content-fb">
						<ul id="facebook-feed">
							<?php
								$FBpage = file_get_contents('https://graph.facebook.com/chicityclerk/feed?access_token=315821565159515|x93RFUqbxrJG5lpqaUwGlL-IGTo');
								$FBdata = json_decode($FBpage);
								foreach ($FBdata->data as $news ) :
									$StatusID = explode("_", $news->id);
									$fbLinkString = $news->id;
									$fbMessage = $news->message;
									$fbStatus = preg_replace('/https?:\/\/[^\s"<>]+/', '<a class="extracted" href="$0" target="_blank">$0</a>', $fbMessage);
									$fbLink = substr($fbLinkString, strpos($fbLinkString, "_") +1 );
									if ($news->type == ("link" || "status") && $news->from->id == "225920074101043") :
										if (!empty($news->message)) : 
							?>
							<li>
								<div class="fb-thumb"><img src="/wp-content/themes/occwp/images/facebook-pic.png" /></div>
								<div class="fb-story">
									<a href="https://www.facebook.com/chicityclerk/posts/<?php echo $fbLink; ?>" target="_blank"><abbr class="time-ago" title="<?php echo $news->created_time; ?>"></abbr></a>
									<?php echo $fbStatus; ?>
								</div>
								<div style="clear:both;"></div>
							</li>
							<?php 
										endif;
									endif; 
								endforeach;
							?>
						</ul>
					</div>
					<!-- <div class="occ-tab-int" id="occ-tab-content-tw">
						<div class="tweet"></div>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>