<?php get_header(); ?>
<div class="row">
	<div id="left-column" class="span3">
		<div class="interior-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'news-nav', 'sort_column' => 'menu_order' ) ); ?>
		</div>
	</div>
	<div id="right-column" class="span9">
		<div class="interior-content">
			<article id="content">
				<?php the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h2 class="entry-title"><?php the_title(); ?></h2>
					<div class="entry-content">
					<?php the_content(); ?>
					
					
					<?php if( is_page(25) ) : ?>
					
						<div id="news-landing-tabs">
							<ul class="occ-tabs">
								<li><a class="occ-tab-link current" id="occ-tab-toggle-clerk" href="javascript:;">City Clerk News</a></li>
								<li><a class="occ-tab-link" id="occ-tab-toggle-council" href="javascript:;">City Council News</a></li>
								<li><a class="occ-tab-link" id="occ-tab-toggle-fb" href="javascript:;">Facebook</a></li>
								<li><a class="occ-tab-link" id="occ-tab-toggle-tw" href="javascript:;">Twitter</a></li>
							</ul>
							<div id="occ-tab-content">
								<div class="occ-tab-int current" id="occ-tab-content-clerk">
									<h2 class="tab-title">Recent News from the Office of the City Clerk</h2>
									<?php
										$clerknews_args = array( 'post_type' => 'occ_clerk_news', 'posts_per_page' => 4 );
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
										<a class="btn btn-primary" href="/news/city-clerk-news/">View All City Clerk News</a>
									</div>
								</div>
								<div class="occ-tab-int" id="occ-tab-content-council">
									<h2 class="tab-title">Recent News from Chicago City Council</h2>
									<?php
										$councilnews_args = array( 'post_type' => 'occ_council_news', 'posts_per_page' => 4 );
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
								</div>
								<div class="occ-tab-int" id="occ-tab-content-fb">
									<img src="/wp-content/themes/occwp/images/facebook-feed.jpg" />
									<div class="fb-like" data-href="http://facebook.com/chicityclerk" data-send="false" data-width="450" data-show-faces="true"></div>
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
												if (!empty($news->message)) : ?>
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
								<div class="occ-tab-int" id="occ-tab-content-tw">
									<div id="twitter-logo">
										<img src="/wp-content/themes/occwp/images/twitter-feed.png" />
									</div>
									<div id="twitter-follow-btn"><a href="https://twitter.com/ChiCityClerk" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @ChiCityClerk</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>
									<div style="clear:both;"></div>
									<div class="tweet"></div>
								</div>
							</div>
						</div>
					<?php endif; ?>
					
					
					
		
					
					<?php if( is_page(492) ) : ?>
						<div id="city-clerk-feed">
							<?php
								$clerknews_args = array( 'post_type' => 'occ_clerk_news', 'posts_per_page' => -1 );
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
						</div>
					<?php endif; ?>
					
					
					<?php if( is_page(494) ) : ?>
						<div id="city-council-feed">
							<?php
								$councilnews_args = array( 'post_type' => 'occ_council_news', 'posts_per_page' => -1 );
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
						</div>
					<?php endif; ?>
					
					<! -- begin copy of city council 2012, editted for 2013 --> 
					
					<?php if( is_page(954) ) : ?>
						<div id="city-council-feed">
							<?php
								$councilnews_args = array( 'post_type' => 'occ_council_news', 'posts_per_page' => -1, 'year' => 2013 );
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
						</div>
					<?php endif; ?>
					
					<! -- end copy of city council 2012, editted for 2013 --> 
					
					
					<?php if( is_page(712) ) : ?>
						<div id="city-council-feed">
							<?php
								$councilnews_args = array( 'post_type' => 'occ_council_news', 'posts_per_page' => -1, 'year' => 2012 );
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
						</div>
					<?php endif; ?>
					
					<!-- END COPY OF CITY CLERK 2012 LIST, UPDATED FOR 2013 -->
					
					<?php if( is_page(944) ) : ?>
						<div id="city-clerk-feed">
							<?php
								$clerknews_args = array( 'post_type' => 'occ_clerk_news', 'posts_per_page' => -1, 'year' => 2013 );
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
						</div>
					<?php endif; ?>
					
					<!-- END COPY OF CITY CLERK 2012 LIST, UPDATED FOR 2013  -->
					
					
					
					<?php if( is_page(519) ) : ?>
						<div id="city-clerk-feed">
							<?php
								$clerknews_args = array( 'post_type' => 'occ_clerk_news', 'posts_per_page' => -1, 'year' => 2012 );
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
						</div>
					<?php endif; ?>
					
					
					
					<?php if( is_page(521) ) : ?>
						<div id="city-clerk-feed">
							<?php
								$clerknews_args = array( 'post_type' => 'occ_clerk_news', 'posts_per_page' => -1, 'year' => 2011 );
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
						</div>
					<?php endif; ?>
					
					
					
					
					
					
					
					
					
					<?php if( is_page(645) ) : ?>
						<div id="announcements-feed">
							<?php
								$announcement_feed_args = array( 'post_type' => 'occ_announcements', 'posts_per_page' => -1 );
								$announcement_feed = new WP_query( $announcement_feed_args );
								while ($announcement_feed->have_posts()) : $announcement_feed->the_post();
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
						</div>
					<?php endif; ?>
					
					
					
					
					
					<?php if( is_page(563) ) : ?>
						<div id="pr-library">
							<table id="datatable" class="table table-condensed table-bordered table-striped">
								<thead>
									<tr>
										<td style="width: 43px;"><strong>Year</strong></td>
										<td style="width: 32px;"><strong>Month</strong></td>
										<td style="width: 25px;"><strong>Day</strong></td>
										<td style="width: 525px;"><strong>Title</strong></td>
										<td class="btn-col"><strong>Download</strong></td>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Year</td>
										<th>Month</td>
										<th>Day</td>
										<th class="last">Title</td>
										<th>&nbsp;</td>
									</tr>
								</tfoot>
								<tbody>
								<?php
									$pr_lib_args = array( 'post_type' => 'occ_clerk_news', 'posts_per_page' => -1 );
									$pr_lib = new WP_query( $pr_lib_args );
									while ($pr_lib->have_posts()) : $pr_lib->the_post();
										$url_pdf = get_post_meta( $post->ID, 'pdf', true );
								?>
									
									<tr>
										<td><?php echo get_the_date('Y'); ?></td>
										<td><?php echo get_the_date('m'); ?></td>
										<td><?php echo get_the_date('d'); ?></td>
										<td><?php the_title(); ?></td>
										<td><a class="btn btn-primary btn-block" href="<?php echo $url_pdf; ?>" target="_blank">Download PDF</a></td>
									</tr>
									
								<?php
									endwhile;
								?>
								</tbody>
							</table>
							<div style="clear:both;"></div>
						</div>
					<?php endif; ?>
 					
 					
 					<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'blankslate' ) . '&after=</div>') ?>
					<?php edit_post_link( __( 'Edit', 'blankslate' ), '<div class="edit-link">', '</div>' ) ?>
					</div>
				</div>
			</article>
		</div>
	</div>
	<div style="clear:both;"></div>
</div>
<?php get_footer(); ?>