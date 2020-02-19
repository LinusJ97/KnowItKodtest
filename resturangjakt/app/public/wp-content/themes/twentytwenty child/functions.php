<?php


add_action('add_meta_boxes', 'change_meta_box_titles');
function change_meta_box_titles() {
    global $wp_meta_boxes;
    $wp_meta_boxes['resturang']['normal']['core']['commentstatusdiv']['title'] = 'Omröstning';
}
function remove_trackbacks_pingbacks ($post_type, $post) {
    global $wp_meta_boxes, $current_screen;
    # Remove "ping_status" from `commentstatusdiv`:
    $wp_meta_boxes[$current_screen->id]['normal']['core']['commentstatusdiv']['callback'] = function($post) {

        ?>
            <input name="advanced_view" type="hidden" value="1">
            <p class="meta-options">
                <label for="comment_status" class="selectit">
                    <input id="comment_status" name="comment_status" type="checkbox" value="open" <?php checked($post->comment_status, 'open'); ?>> Tillåt omrösning?
                </label>
                <?php do_action('post_comment_status_meta_box-options', $post); ?>
            </p>
        <?php
    };
}

function remove_meta_boxes() {
    remove_meta_box('commentsdiv','resturang','normal');
  }
  add_action('admin_init','remove_meta_boxes');

function remove_comments(){
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'remove_comments' );

add_action('add_meta_boxes', 'remove_trackbacks_pingbacks', 10, 2);


add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
 
    $parent_style = 'parent-style';
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

add_action( 'wp_enqueue_scripts', 'enqueue_custom_scripts', 0);
function enqueue_custom_scripts() {
    wp_enqueue_style('custom', get_stylesheet_directory_uri()."/assets/css/custom.css", [], "2020021" );
    wp_enqueue_script('rating', get_stylesheet_directory_uri()."/assets/js/rating.js", [], "2020021" );
}

//google maps api-key for ACF
function my_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyB-XX5U186IYwDVH0gkZI46UqA7QsQ8EAA';
	return $api;
}
wp_enqueue_script("jquery");
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
 
function custom_post_type() {

   // Set UI labels for Custom Post Type
   $labels = array(
      'name'                => _x( 'Resturanger', 'Post Type General Name'),
      'singular_name'       => _x( 'Resturang', 'Post Type Singular Name'),
      'menu_name'           => __( 'Resturanger' ),
      'parent_item_colon'   => __( 'Parent Resturang'),
      'all_items'           => __( 'All Resturanger'),
      'view_item'           => __( 'View Resturang'),
      'add_new_item'        => __( 'Add New Resturang'),
      'add_new'             => __( 'Add New'),
      'edit_item'           => __( 'Edit Resturang'),
      'update_item'         => __( 'Update Resturang'),
      'search_items'        => __( 'Search Resturang'),
      'not_found'           => __( 'Not Found'),
      'not_found_in_trash'  => __( 'Not found in Trash'),
   );
   
   // Set other options for Custom Post Type

   $args = array(
      'label'               => __( 'Resturanger'),
      'description'         => __( 'Resturanger och deras ranking'),
      'labels'              => $labels,
      'supports'            => array( 'title', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'tags', ),
      'hierarchical'        => false,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'menu_position'       => 5,
      'menu_icon'           => 'dashicons-store',
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'capability_type'     => 'page',
   );

   // Registering your Custom Post Type
   register_post_type( 'resturang', $args );

   }
   add_action( 'init', 'custom_post_type', 0 );
