<?php
define( 'DISALLOW_FILE_EDIT', true );
define('DISALLOW_FILE_MODS',true);
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/omisevn/domains/omise.vn/private_html/wp-content/plugins/wp-super-cache/' );
define('DISABLE_WP_CRON', true);
define('SCRIPT_DEBUG', true);
define('CONCATENATE_SCRIPTS', false);


/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'omisevn_ttt');

/** MySQL database username */
define('DB_USER', 'omisevn_hhh');

/** MySQL database password */
define('DB_PASSWORD', 'a0mOlsjM');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', 'ssakkjhh');
define( 'AUTH_KEY', '{K 2rUF&u y(Ak0(M3J%f(W&ADLiI(+#^W*H|0@jdAc(0LHOz3)gaiOoDgN_;W+2' );
define( 'SECURE_AUTH_KEY', ']n+=#}^=3BdTn~FoS@8K#o|~WgC@#?Oj*s[L+Y+tInaOjNCFa1h59vRL#!R[[{UI' );
define( 'LOGGED_IN_KEY', 'hFe,fw?jgX@@X,Yl]jz9!qoD]v8N[TNDvleEaE5zH=|`D+yUYM|>/=8KRelv=XPE' );
define( 'NONCE_KEY', 'fkrSg(v-|/&=TC{66rgrX[_VpWv$.{a{q$CvjvjB$AP<5q?|58{6xvN{xut r?|j' );
define( 'AUTH_SALT', 'kVVt8^+oh,$|?g RxaWq_Px RwC%^^r?8zhQ+GDUWp:QB]W!tPHins]RJ@a%P_ue' );
define( 'SECURE_AUTH_SALT', '>|tv)^94YuNk[:+)l<5ubJ0uTdo3gn9|YN.0J/MR1R>T=oe1}eov*ds@Z.&PA%&q' );
define( 'LOGGED_IN_SALT', 'E,C#!<lf6B $y;-nfjP10$rea?g/_A,V0tkbqCNJMfOO)Ml4&JUhM]bU[*w]oh,X' );
define( 'NONCE_SALT', '$qbgS^/Dj.RJC-,S<y9L7SV9EMuyB <wQS`}poc;Yd{PGa$!,b*oL<qX!cPMqXh`' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'abyhh_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
