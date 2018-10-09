<?php
function my_login_logo() { ?>
    <style type="text/css">
        .login h1 a{
            background: transparent url("<?php echo get_template_directory_uri(); ?>/images/logo.png") no-repeat top center !important;
            width: 300px !important;
            height: 115px !important;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// if(is_bot()) header("Location: /",TRUE,301);
// function is_bot(){
//     $botlist = array("Teoma", "alexa", "froogle", "Gigabot", "inktomi",
//         "looksmart", "URL_Spider_SQL", "Firefly", "NationalDirectory",
//         "Ask Jeeves", "TECNOSEEK", "InfoSeek", "WebFindBot", "girafabot",
//         "crawler", "www.galaxy.com", "Googlebot", "Scooter", "Slurp",
//         "msnbot", "appie", "FAST", "WebBug", "Spade", "ZyBorg", "rabaz",
//         "Baiduspider", "Feedfetcher-Google", "TechnoratiSnoop", "Rankivabot",
//         "Mediapartners-Google", "Sogou web spider", "WebAlta Crawler","TweetmemeBot",
//         "Butterfly","Twitturls","Me.dium","Twiceler","bot","Bot");
//     foreach($botlist as $bot)
//     {
//         if(strpos($_SERVER['HTTP_USER_AGENT'], $bot) !== false)
//         return $bot;
//     }
//     return false;
// }

// hide login url in file /wp-admin/admin.php, replace function auth_redirect()
// if ( !is_user_logged_in()) {
//     wp_redirect( '/wp-login.php' ); 
//     exit;
// }

// changing the logo link from wordpress.org to your site 
function my_login_url() { return '/'; }
// changing the alt text on the logo to show your site name 
function my_login_title() { return get_option('blogname'); }
// calling it only on the login page
add_filter('login_headerurl', 'my_login_url');
add_filter('login_headertitle', 'my_login_title');


add_filter('site_url', 'wplogin_filter', 10, 3);
function wplogin_filter( $url, $path, $orig_scheme )
{
	$old = array( "/(wp-login)/");
	$new = array( "netsalog");
	return preg_replace( $old, $new, $url, 1);
}

/* Main redirection of the default login page */
// function redirect_login_page() {
// 	$login_page  = home_url('/login/');
// 	$page_viewed = basename($_SERVER['REQUEST_URI']);

// 	if($page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
// 		wp_redirect($login_page);
// 		exit;
// 	}
// }
// add_action('init','redirect_login_page');

/* Where to go if a login failed */
// function custom_login_failed() {
// 	$login_page  = home_url('/login/');
// 	wp_redirect($login_page . '?login=failed');
// 	exit;
// }
// add_action('wp_login_failed', 'custom_login_failed');

/* Where to go if any of the fields were empty */
// function verify_user_pass($user, $username, $password) {
// 	$login_page  = home_url('/login/');
// 	if($username == "" || $password == "") {
// 		wp_redirect($login_page . "?login=empty");
// 		exit;
// 	}
// }
// add_filter('authenticate', 'verify_user_pass', 1, 3);

/* What to do on logout */
// function logout_redirect() {
// 	$login_page  = home_url('/login/');
// 	wp_redirect($login_page . "?login=false");
// 	exit;
// }
// add_action('wp_logout','logout_redirect');