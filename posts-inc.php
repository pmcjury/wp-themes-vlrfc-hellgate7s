<?php 

	$postCount = 0;
	if (have_posts()) :
		while (have_posts()) : the_post();
                    the_shortlink();
		?>
		
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h1 class="<?php echo (($postCount == 0) ? "no_topmargin" : "" ) ?>">
				<a style='color:#fff;' href="<?php the_permalink(); ?>"	><?php the_title(); ?> </a>
			</h1>
			
			<?php //the_excerpt();
				  the_content('Read more...'); ?>

			<small>
				<p class="postmetadata">
					Posted in: <?php the_category(', ') ?><?php edit_post_link('	edit', ' | ', '  '); ?>  
					<?php //comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
					<br/>
					<?php the_tags('Tags: ', ', ', ''); ?> 
				</p>			
			</small>
		</div>

	<?php
		$postCount++;	
		endwhile; 
		$newerPostText = 'Read Newer Match Reports &raquo;';
		$olderPostText = '&laquo; Read Previous Match Reports';
		include( 'paged-navigation-inc.php' );
	else : 
	?>
		
	<?php 
		//get_search_form(); 
	endif;