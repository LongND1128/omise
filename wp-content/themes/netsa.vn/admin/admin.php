<?php


$result = false;
$url = $_SERVER['REQUEST_URI'];
$os = array("plugins.php","plugin-install.php","plugin-editor.php", "page=wpcf7", "edit-comments.php", "users.php","tools.php","import.php","export.php","themes.php","customize.php");

add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
function load_admin_styles() {
    wp_enqueue_style( 'admin_css_foo', get_template_directory_uri() . '/admin/custom.css', false, '1.0.0' );
}

foreach($os as $k => $vl){
    if(strpos($url, $vl) !== false){
        wp_die('You are not role this page');
    }
}
// end of block profile menu for users with role


add_action('admin_menu','uss');
function uss(){
    // add_menu_page("User", "User", "administrator", "profile.php",'','','25');
    add_menu_page("Danh Mục", "Danh Mục", "administrator", "nav-menus.php",'','','55');
    // add_menu_page("SB", "Sidebar", "administrator", "widgets.php",'','','75');
    // add_menu_page("cache", "Cache", "administrator", "options-general.php?page=wpsupercache&tab=contents",'','','75');
    // add_menu_page("Đơn Hàng", "Đơn Hàng", "administrator", "edit.php?post_type=shop_order",'','','55');

}


// remove unwanted dashboard widgets for relevant users
function remove_dashboard_widgets() {
    $user = wp_get_current_user();
    if ( ! $user->has_cap( 'manage_options' ) ) {
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_special_offers', 'dashboard', 'side' );
    }
}
add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );

