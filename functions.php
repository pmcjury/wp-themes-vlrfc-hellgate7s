<?php
/**
 * @package VLRFC
 * @subpackage
 */

if ( function_exists('register_sidebar') ) {

    register_sidebar(array(
        'name' => 'Tournament Side Bar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

}

register_nav_menu( 'tournament', 'Tournament Menu' );

/* Theme option page. Nothing too fancy just some defualt header stuff */

/* limits */
function pmc_set_post_limits( $args ){
    return 3;
}
//add_filter( 'post_limits', 'pmc_set_post_limits' );
/* Stick post stuff */
$pmc_added_stickey = false;
function get_sticky_posts( $the_content = '', $num_posts = 1){
    global $pmc_added_stickey;
    if(  is_home() ){//&& !$pmc_added_stickey ){
        $sticky = get_option( 'sticky_posts' );
        $html = '';
        if( count($sticky) > 0 ){
            rsort( $sticky );
            $sticky = array_slice( $sticky, 0, $num_posts );
            $sticky_posts = get_posts( array( 'post__in' => $sticky, 'caller_get_posts' => 1, 'numberposts' => $num_posts) );
            $html .= '<div class="sticky_post">';
            foreach($sticky_posts as $post){
                $html .= '
                        <p>' . $post->post_content . '</p>
                          <small>As of ' . date( "l F jS, Y \@ h:i:s a", strtotime( $post->post_date ) ) . '</small>';
            }
            $html .= '</div>';
            }
        $pmc_added_stickey = true;
        return $html. $the_content;
    }
    else{
        return $the_content;
    }
}
add_filter('pmc_sticky_post', 'get_sticky_posts');

/**
 * Displays html for pages of certain posts categories retrieved from the page's custom fields.
 * Should be a comma seperated list on the page. The main argument in the arguments array is
 * display_type which can have the values index or portfolio.
 * @global wp_posts $posts
 * @global WP_Query $wp_query
 * @global int      $more
 * @param  array    $arguments
 */
function pmc_page_of_posts( $arguments = array() ) {
    global $posts;
    global $wp_query;
    $default_args = array( 'posts_per_page' => -1, 'do_not_show_stickies' => 1, 'show_nav' => false, 'display_type' => 'index', 'order' => 'DESC' );
    extract ( array_merge( $default_args, $arguments) );
    if ( is_page() ) {
        $category = get_post_meta($posts[0]->ID, 'category', true);
        $posts_per_page = 1;
    }
    if ( $category ) {
        $cat = get_cat_ID( $category );
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args = array(
                'category__in' => array( $cat ),
                'orderby' => 'date',
                'order' => $order,
                'paged' => $paged,
                'posts_per_page' => $posts_per_page,
                'caller_get_posts' => $do_not_show_stickies
        );
        $temp = $wp_query;  // assign orginal query to temp variable for later use
        //$wp_query = null;
        $wp_query = new WP_Query( $args );
            switch( $display_type ) {
                case 'index' :
                default:
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            //the_shortlink();
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
                        // do something
                        ?>
                        <h2>No posts yet...</h2>
                        <p>
                            Check back soon!
                        </p>
                        <?php
                    endif;
                    break;
        }
        $wp_query = $temp;  //reset back to original query
    }
    else{
        echo "Enter a category for page of posts to work!!! (Its a custom field on the page, and should be comma seperated. If its not there add the custom field `category`.)";
    }
}