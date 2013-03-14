<?php
/**
 * @package VLRFC
 * @subpackage
 */

if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'sidebarRight',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => 'sidebarRightLinksPage',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => 'Premium Sponsors',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => 'Tournament Premium Sponsors',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => 'Tournament Side Bar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

}
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'menus' );
}
/* Theme option page. Nothing too fancy just some defualt header stuff */
add_action('admin_menu', 'vlrfc_theme_page');
function vlrfc_theme_page() {
    add_option( 'vlrfc_theme_header_home_pitch', 'Randall\'s Island, NYC' );
    add_option( 'vlrfc_theme_header_training'  , 'Tue & Thur 7:30pm @ East River Park' );
    add_option( 'vlrfc_theme_header_sponsor'   , 'Croxley\'s Ale House' );
    add_option( 'vlrfc_theme_header_hotline'   , '(212) 631-3533' );
    add_option( 'vlrfc_theme_header_join_us_slug'   , 'join-us' );
    add_theme_page(__('VLRFC Header Options'), __('VLRFC Header Options'), 'edit_themes', basename(__FILE__), 'vlrfc_theme_page_options');
}

function vlrfc_theme_page_options() {
    if( !empty( $_POST['action'] ) ) {
        if( $_POST['action'] == 'update' ) {
            $vlrfcOptions = array( 'vlrfc_theme_header_home_pitch', 'vlrfc_theme_header_training', 'vlrfc_theme_header_sponsor', 'vlrfc_theme_header_hotline', 'vlrfc_theme_header_join_us_slug');
            foreach( $vlrfcOptions as $option ) {
                if ( isset( $_POST[$option] ) ) {
                    $value = $_POST[$option];
                }
                $value = trim( $value );
                $value = stripslashes_deep( $value );
                update_option( $option, $value );
            }
        }
    }

    ?>
<div class="wrap">
        <?php screen_icon(); ?>
    <h2>Village Lions Rugby Club Theme Header Options</h2>
        <?php if( $_POST['action'] == 'update' ) : ?>
    <div style="background-color: rgb(255, 251, 204);" id="message" class="updated fade">
        <p><strong>Settings saved.</strong></p>
    </div>
        <?php endif; ?>
    <form name="form" action="" method="post" id="vlrfc-options">
            <?php wp_nonce_field('options-options') ?>
        <input type="hidden" name="action" value="update" />
        <input type='hidden' name='vlrfc_option_page' value='options' />

        <table class="form-table">
            <tr valign="top">
                <th scope="row"><label for="vlrfc_theme_header_home_pitch"><?php _e('Home Pitch Text') ?></label></th>
                <td>
                    <input name="vlrfc_theme_header_home_pitch" type="text" id="vlrfc_theme_header_home_pitch" value="<?php form_option('vlrfc_theme_header_home_pitch'); ?>" class="regular-text code" />
                    <span class="setting-description"><?php _e('This option is for defining the home pitch text on the top left of the header'); ?></span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="vlrfc_theme_header_training"><?php _e('Training Text') ?></label></th>
                <td>
                    <input name="vlrfc_theme_header_training" type="text" id="vlrfc_theme_header_training" value="<?php form_option('vlrfc_theme_header_training'); ?>" class="regular-text code" />
                    <span class="setting-description"><?php _e('This option is for defining the training text on the top left of the header'); ?></span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="vlrfc_theme_header_sponsor"><?php _e('Sponsors Text') ?></label></th>
                <td>
                    <input name="vlrfc_theme_header_sponsor" type="text" id="vlrfc_theme_header_sponsor" value="<?php form_option('vlrfc_theme_header_sponsor'); ?>" class="regular-text code" />
                    <span class="setting-description"><?php _e('This option is for defining the sponsors text on the top right of the header'); ?></span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="vlrfc_theme_header_hotline"><?php _e('Hotline Text') ?></label></th>
                <td>
                    <input name="vlrfc_theme_header_hotline" type="text" id="vlrfc_theme_header_hotline" value="<?php form_option('vlrfc_theme_header_hotline'); ?>" class="regular-text code" />
                    <span class="setting-description"><?php _e('This option is for defining the hotline text on the top right of the header'); ?></span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="vlrfc_theme_header_join_us_slug"><?php _e('Join Us Slug') ?></label></th>
                <td>
                    <input name="vlrfc_theme_header_join_us_slug" type="text" id="vlrfc_theme_header_join_us_slug" value="<?php form_option('vlrfc_theme_header_join_us_slug'); ?>" class="regular-text code" />
                    <span class="setting-description"><?php _e('This option is for setting the the slug for the "Join Us" link in the header'); ?></span>
                </td>
            </tr>
        </table>
        <p class="submit">
            <input type="submit" name="Update" value="<?php _e('Save Changes') ?>" class="button-primary" />
        </p>
    </form>
</div>
<?php
}

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

/** Pay pal links custom post types for SHaron Berger 09/23/2010
 *  Added custom post type and meta box for display. Also added a new template
 *  single-product_links
 */
// Add Post Types
function add_products_link_post_type(){
    $labels = array(
        'name' => __( 'Product Links' ),
        'singular_name' => __( 'Product Link' ),
        'add_new' => __( 'Add Product Link' ),
        'add_new_item' => __( 'Add New Product Link' ),
        'new_item' => __( 'New Product Link' ),
        'view_item' => __( 'View Product Link' ),
        'search_item' => __( 'Search Product Links' ),
        'not_found' => __( 'No Product Links found...' )
    );

    register_post_type( 'product_links',
            array(
                'labels' => $labels,
                'hierarchical' => true,
                'description' => __( 'Product Links for club use' ),
                'public' => true,
                'show_ui' => true,
                'show_in_nav_menus' => true,
                'rewrite' => array( 'slug' => 'vlrfc-store' ),
                'supports' => array(
                    'title', 'author', 'editor'//, 'custom-fields'
                ),
            )
    );
    $labels = array(
        'name' => _x( 'Product Link Type', 'product_link_type' ),
        'singular_name' => _x( 'Type', 'product_link_type' ),
        'search_items' => __( 'Search Product Link Type' ),
        'all_items' => __( 'All Product Link Type' ),
        'parent_item' => __( 'Parent Product Link Type' ),
        'parent_item_colon' => __( 'Parent Product Link Type:' ),
        'edit_item' => __( 'Edit Product Link Type' ),
        'update_item' => __( 'Update Product Link Type' ),
        'add_new_item' => __( 'Add New Product Link Type' ),
        'new_item_name' => __( 'New Product Link Type' ),
    );

    register_taxonomy( 'product_link_type', array( 'product_links' ), array(
        'public' => true,
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'vlrfc-store-payment' ),
            )
    );
}
add_action( 'init', 'add_products_link_post_type' );
// Add Meta Box for link
function create_product_links_meta_box(){
    global $post;
    $product_link_url = get_post_meta( $post->ID, 'product_link_url', true );
    ?>
    <p>
        <label for="product_link_url">Product Link:</label> <input name="product_link_url" id="products_link_url" class="code" tabindex="99" value="<?php echo $product_link_url; ?>" type="text" style="width:100%" />
        <br> ( The product link to the paypal, scrumbot, etc. )
    </p>
    <?php
    wp_nonce_field( 'products_link_post_type', 'products_link_post_type_wpnonce', false, true );
}
function add_product_links_meta_box(){
    add_meta_box( 'new-meta-boxes', 'Product Link', 'create_product_links_meta_box', 'product_links', 'normal', 'high' );
}
add_action( 'admin_menu', 'add_product_links_meta_box' );
// Save meta information
function save_product_links_meta_box( $post_id ){
    global $post;
    if( wp_verify_nonce( $_POST['products_link_post_type_wpnonce'], 'products_link_post_type' ) && current_user_can( 'edit_post', $post_id ) && $_POST ){
        update_post_meta( $post_id, 'product_link_url', $_POST['product_link_url'] );
    }
    else{
        return $post_id;
    }
}
add_action( 'save_post', 'save_product_links_meta_box' );
// Misc function
function mcjent_get_the_post_image_info( $args = array() ) {
    global $post;
    global $wp_query;
    $post_id = $post->ID;
    $images =& get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post_id );
    $options = array( 'size' => 'thumbnail', $echo = false );
    extract ( array_merge( $options, $args) );
    //error_log ( print_r( $post, true ));
    //die();
    if( $images  ) {
        $keys = array_keys( $images );
        $image_id = $keys[0]; // could loop to get all attachments for post
        //$image_info = array(array);
        switch( $size ) {
            case 'full':
            case 'f':
                //$image_url =  wp_get_attachment_url( $image_id );
                $image_info['full']['attrs'] = wp_get_attachment_image_src( $image_id, 'large' );
                $image_info['full']['html'] = wp_get_attachment_image( $image_id, 'large' );
                break;
            case 'medium':
            case 'm':
                $image_info['medium']['attrs'] = wp_get_attachment_image_src( $image_id, 'medium' );
                $image_info['medium']['html'] = wp_get_attachment_image( $image_id, 'medium' );
                break;
            case 'medium_and_full':
            case 'mf':
                $image_info['medium']['attrs'] = wp_get_attachment_image_src( $image_id, 'medium' );
                $image_info['medium']['html'] = wp_get_attachment_image( $image_id, 'medium' );
                $image_info['full']['attrs'] = wp_get_attachment_image_src( $image_id, 'full' );
                $image_info['full']['html'] = wp_get_attachment_image( $image_id, 'full' );
                break;
            case 'thumbnail_and_medium':
            case 'tm':
                $image_info['thumbnail']['attrs'] = wp_get_attachment_image_src( $image_id, 'thumbnail' );
                $image_info['thumbnail']['html'] = wp_get_attachment_image( $image_id, 'thumbnail' );
                $image_info['medium']['attrs'] = wp_get_attachment_image_src( $image_id, 'medium' );
                $image_info['medium']['html'] = wp_get_attachment_image( $image_id, 'medium' );
                break;
            case 'thumbnail_and_full':
            case 'tf':
                add_filter( 'wp_get_attachment_image_attributes', 'mcjent_filter_image_attr' );
                $image_info['thumbnail']['attrs'] = wp_get_attachment_image_src( $image_id, 'thumbnail' );
                $image_info['thumbnail']['html'] = wp_get_attachment_image( $image_id, 'thumbnail' );
                $image_info['full']['attrs'] = wp_get_attachment_image_src( $image_id, 'full' );
                $image_info['full']['html'] = wp_get_attachment_image( $image_id, 'full' );
                break;
            case 'all':
            case 'a':
                $image_info['thumbnail']['attrs'] = wp_get_attachment_image_src( $image_id, 'thumbnail' );
                $image_info['thumbnail']['html'] = wp_get_attachment_image( $image_id, 'thumbnail' );
                $image_info['medium']['attrs'] = wp_get_attachment_image_src( $image_id, 'medium' );
                $image_info['medium']['html'] = wp_get_attachment_image( $image_id, 'medium' );
                $image_info['full']['attrs'] = wp_get_attachment_image_src( $image_id, 'full' );
                $image_info['full']['html'] = wp_get_attachment_image( $image_id, 'full' );
                break;
            case 'thumbnail':
            case 't':
            default:
                $image_info['thumbnail']['attrs'] = wp_get_attachment_image_src( $image_id, 'thumbnail' );
                $image_info['thumbnail']['html'] = wp_get_attachment_image( $image_id, 'thumbnail' );
                break;
        }
        return $image_info;
    }
}
function the_pmc_thumbnail(){
    $img = mcjent_get_the_post_image_info();
    echo $img['thumbnail']['html'];
}
function mcjent_filter_image_attr( $attrs ){
    //error_log('calling' . print_r($attrs, true));
    return $attrs;
}
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