<?php
define("MEMBERSHIP_LEVELS", 1);
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */


// ** MySQL settings - You can get this info from your web host ** //
$url = 'http://' . $_SERVER['HTTP_HOST'] . '';
$dev_url = 'http://dev.mathmonkeykc.com'; // enter local dev url
 
if ( $url == $dev_url ) {
    $db_name = 'math_v1';
    $db_user = 'root';
    $db_pass = '310design';
} else {
    $db_name = 'two020cr_math3';
    $db_user = 'two020cr_math3';
    $db_pass = 'X6tH0Tv05KuTyfeI';
}


/** The name of the database for WordPress */
define( 'DB_NAME', $db_name );

/** MySQL database username */
define( 'DB_USER', $db_user );

/** MySQL database password */
define( 'DB_PASSWORD', $db_pass );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define('AUTH_KEY',         '|U`:a[`otYsHYYvjnN3oFzBbmj#!Xbf7 ?|:x%WKwh`&5ko$xS7B~lO[6NC9<,4H');
define('SECURE_AUTH_KEY',  'h^y;J,(<^QfboS2%!P}pl(gf4nBywo}Rue=.-$m c.+J_Yj cMlN`vv,u}kBhGi^');
define('LOGGED_IN_KEY',    'fvYin^p36Zw:GwB|k*?RhlcWpl.5|UPZYXb1xZA_Y/#!Ss#%.jUn6W._A]9A#-uQ');
define('NONCE_KEY',        'n?s+6L?K_|b_d!k-hi?2(/J1R_)~9P]x-,?bqcjh&^w>-~<F=? PfR|-~-I%bOn^');
define('AUTH_SALT',        '+*T}_ [;;/X@icA-)ZyXst~JU%8~Cu8WK_6cly6AtXHBheK2f>rZ#}2FU!97e!8y');
define('SECURE_AUTH_SALT', '+Y]}6p6$WG+=p>J+lxUWUfLs>F-z-}3AgK_kB-p85nrV.to|sV7|8MqI?wZDtc(:');
define('LOGGED_IN_SALT',   'Svd6 k1:E EnIzo~%-F&_R9`.`_I[ne*NSP,$0n>n+^-m>4n%q4Z%ifcS^Q>5<Ez');
define('NONCE_SALT',       '+XS<DX&1f13+L9._=+Gk#$GmE0ghzTGCKc&@ropv8i**qlqOfDpAi-qN{.;Q*n-)');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'mathwp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);
define('WP_CACHE', true);
define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '');
define('WP_HOME',    'http://' . $_SERVER['HTTP_HOST'] . '');
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');