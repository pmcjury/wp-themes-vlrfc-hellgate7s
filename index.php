<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div id="content_container">
		<div id="content_main">
			<div id="content_main_inner">

		<?php 
			$postCount = 0;
			if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h1 class="<?php echo (($postCount == 0) ? "no_topmargin" : "" ) ?>">
					<?php the_title(); ?>
				</h1>
				
				<?php the_content('Read the rest of this entry &raquo;'); ?>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>

		<?php
		 $postCount++;	
		 endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>

		</div> <!-- end of div#content_main_inner -->			        	
	</div> <!-- end of div#content_main -->

<?php get_sidebar(); ?>

<?php get_footer(); 
