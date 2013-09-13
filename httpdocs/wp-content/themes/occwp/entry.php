<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if( is_archive() || is_search() ){
	} else { ?>
	<h5 class="entry-date"><?php echo the_date(); ?></h5>
	<?php } ?>
	<h3 class="entry-title"><?php the_title(); ?></h3>
	<?php
	if(is_archive() || is_search()){
	get_template_part('entry','summary');
	} else {
	get_template_part('entry','content');
	}
	?>
	<?php 
	$url_pdf = get_post_meta( $post->ID, 'pdf', true );
	?>
	<?php if( is_archive() || is_search() ){
	} else { ?>
	<div class="download-pdf">
		<a class="btn btn-primary btn-pdf" href="<?php echo $url_pdf; ?>" target="_blank">Download PDF</a>
	</div>
	<?php } ?>
</div> 