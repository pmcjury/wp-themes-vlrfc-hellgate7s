<?php
/* 
 * XTemplate Name: Tournament Main Template
 * @package VLRFC
 * @subpackage 
 */
include(TEMPLATEPATH . '/4leafs/header.php'); ?>
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
					
						<!--
						 <h1 class="<?php echo $h1_css; ?>" id="post-<?php the_ID(); ?>" ><?php empty( $alt_headline ) ? the_title() : print($alt_headline); ?></h1>
						-->
						<?php the_content( '<p class="serif">Read the rest of this page &raquo;</p>'); ?>
		
						<?php wp_link_pages (array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		
					<?php $postCount++;	?>
					<?php endwhile; ?>
				
				<?php endif; ?>
				<?php edit_post_link( 'Edit this entry.', '<p>', '</p>' );  ?>
				<?php
					$catId = '';
					if( is_page( 'tournament' ) ) {
						$catId = "3,48";
					}
					if( is_page( '25' ) ) {
						$catId = '13';
					}
					if( is_page( '45' ) ) {
						$catId = '8';
					}
					if( !empty( $catId ) || !empty( $catName ) ){
						include( TEMPLATEPATH . '/posts-inc.php' );
					}
				?>
					<div class="clear"></div>
				</div> <!-- end of div#content_main_inner -->			        	
				<div class="clear"></div>
			</div> <!-- end of div#content_main -->
	<?php include(TEMPLATEPATH . '/4leafs/sidebar.php'); ?>
<?php include(TEMPLATEPATH . '/4leafs/footer.php'); 
