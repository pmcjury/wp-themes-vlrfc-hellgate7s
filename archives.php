<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>
<div id="content_container">
	<div id="content_main">
		<div id="content_main_inner">

	<?php get_search_form(); ?>
	
		<h2>Archives by Month:</h2>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
		
		<h2>Archives by Subject:</h2>
			<ul>
				 <?php wp_list_categories(); ?>
			</ul>
	
		</div> <!-- end of div#content_main_inner -->			        	
	</div> <!-- end of div#content_main -->
<?php get_footer(); 
