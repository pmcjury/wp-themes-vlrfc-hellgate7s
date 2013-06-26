<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

/*
Template Name: Links
*/
get_header(); 
?>
	<div id="content_container">
		<div id="content_main">
			<div id="content_main_inner">
				<h1>Sponsors</h1>
					<ul>
						<?php wp_list_bookmarks('categorize=0&title_li='); ?>	
					</ul>
			</div> <!-- end of div#content_main_inner -->			        	
		</div> <!-- end of div#content_main -->

<?php get_sidebar(); ?>

<?php get_footer();