<?php
/* Template Name: Tournament Main Template
 * @package VLRFC
 * @subpackage 
 */
get_header() ?>
		<div id="content_container">
			<div id="content_main">
				<div id="content_main_inner" >
				<?php $postCount = 0; ?>
				<?php if (have_posts()) : ?>
				
					<?php while (have_posts()) : the_post(); ?>
					
						<?php
							$h1_css =  ( ( $postCount == 0 ) ? "no_topmargin" : "" );
							$alt_headline = get_post_meta($post->ID, "alt_headline_title", true);
						?>
					
						<?php the_content( '<p class="serif">Read the rest of this page &raquo;</p>'); ?>
		
						<?php wp_link_pages (array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		
					<?php $postCount++;	?>
					<?php endwhile; ?>
				
				<?php endif; ?>
					<div class="clear"></div>
				</div> <!-- end of div#content_main_inner -->			        	
				<div class="clear"></div>
			</div> <!-- end of div#content_main -->
	<?php get_sidebar( );
get_footer( );
