<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>
	<div id="content_container">
		<div id="content_main">
			<div id="content_main_inner">
			<?php 
				$postCount = 0;
				if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<h1 class="<?php echo (($postCount == 0) ? "no_topmargin" : "" ) ?>">
						<a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <?php the_title(); ?>
					</h1>
					<p class="attachment">
						<a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a>
					</p>
					<div class="caption">
						<?php if ( !empty($post->post_excerpt) ) the_excerpt(); // this is the "caption" ?>
					</div>
					
					<?php the_content('Read the rest of this entry &raquo;'); ?>
					
					<small>
						<p class="postmetadata">
							<?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
					</small>
				</div>
			<?php
			 	$postCount++;	
			 	//comments_template(); 
			 	endwhile; else: 
			 ?>
				<p>Sorry, no attachments matched your criteria.</p>
			<?php endif; ?>
		</div> <!-- end of div#content_main_inner -->			        	
	</div> <!-- end of div#content_main -->
<?php get_footer(); 