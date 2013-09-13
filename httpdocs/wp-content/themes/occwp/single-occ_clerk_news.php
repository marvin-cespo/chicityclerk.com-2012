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
				<h2 class="entry-title">City Clerk News</h2>
					<div class="entry-content">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'entry' ); ?>
					<?php endwhile; endif; ?>
					</div>
			</article>
			<?php edit_post_link( __( 'Edit', 'blankslate' ), '<div class="edit-link">', '</div>' ) ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>