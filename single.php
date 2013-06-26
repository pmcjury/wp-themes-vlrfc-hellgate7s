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

		<?php if (have_posts()) : ?>
		
			<?php while (have_posts()) : the_post(); ?>

				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<?php
                                            $h1_css =  (($postCount == 0) ? "no_topmargin" : "" );
                                            $alt_headline = get_post_meta($post->ID, "alt_headline_title", true);
                                            $alt_author = get_post_meta($post->ID, "alt_author_name", true);

                                            ?>
                            <h1 class="<?php echo $h1_css; ?>" id="post-<?php the_ID(); ?>" ><a href="<?php the_permalink(); ?>" style="color:#fff;"><?php empty($alt_headline) ? the_title() : print($alt_headline); ?></a><br/><small style="color:#e0e0e0; font-size: 11px; font-weight: normal; text-transform: lowercase;">Posted on <?php the_date( 'l F jS, Y \@ h:i:s a' ); ?><?php echo !empty($alt_author) ? " by ".$alt_author : ""; ?></small></h1>

		
					<?php the_content('<p class="serif">Read more ...</p>'); ?>
	
					<p class="postmetadata alt">
						<small>
							<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
							<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
							<!-- This entry was posted
							<?php /* This is commented, because it requires a little adjusting sometimes.
								You'll need to download this plugin, and follow the instructions:
								http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
								/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
							on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
							and is filed under <?php the_category(', ') ?>.
							You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.
	`						-->
							<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
								// Both Comments and Pings are open ?>
								You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.
	
							<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
								// Only Pings are Open ?>
								Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.
	
							<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
								// Comments are open, Pings are not ?>
								You can skip to the end and leave a response. Pinging is currently not allowed.
	
							<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
								// Neither Comments, nor Pings are open ?>
								<!-- Both comments and pings are currently closed. -->
	
							<?php } edit_post_link('Edit this entry','','.'); ?>
	
						</small>
					</p>
				</div>

				<?php // comments_template(); ?>

			<?php endwhile; else: ?>

				<p>Sorry, no posts matched your criteria.</p>

		<?php endif; ?>

		</div> <!-- end of div#content_main_inner -->			        	
	</div> <!-- end of div#content_main -->
	
<?php get_sidebar(); ?>

<?php get_footer(); 