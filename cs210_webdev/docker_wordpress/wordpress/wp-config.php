<?php
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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', '172.17.0.1:3306' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Mw*z[tr7)w>~A#vCOdgV,16O~a/0TbYy[UKiOF5{HZvsyknOPS;#<<*7%[CcWqC*' );
define( 'SECURE_AUTH_KEY',  'Fn)s>~j@@tw$J_7PJwb3R#Y3 P#^jNP)VgN-r!dljIRU[CiIh #`t$c^7^?J&?:`' );
define( 'LOGGED_IN_KEY',    'Mbh>,OW/BsRu%Va9A_w=Ex73*Urr+rVG6hJkl;p&/>kAOqtI@QNFjCr35PP%pt%a' );
define( 'NONCE_KEY',        'ykQu]>XMJp:!yF5dj=}._J4~~U:FJPBpoE4|i_UZ)#e90Yd&szL|WR3Yoq|T>Ej+' );
define( 'AUTH_SALT',        'n<vf:ZA&9&NL5?S{oMXqo@Sn{]n22qY~99S=|2v?d$`~lf2+v2+!lo(;UR4$XnPe' );
define( 'SECURE_AUTH_SALT', 's^`j_%MD|o-d*0b5K! 0i<:+uP6~pJ&.6O$W}5sxD*afV!6Z+hbwwN%Td,5X/PVp' );
define( 'LOGGED_IN_SALT',   '9Fdfg0z)B(! k/=E^F=dXb9(c p#9Dp+x<.~$):^CiPq1=~Otj`Rq608K#?#wj$%' );
define( 'NONCE_SALT',       'Kd=?W! 0pex{((S>)R5}-wp|%O4*E_>od[Y7]eHv;mk-9`hV<yYw]~uDFOj9E@p}' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);
define('WP_DEBUG_LOG', false);
define('COOKIE_DOMAIN','');



define( 'WP_ALLOW_MULTISITE', true );
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', true );
$base = '/';
define( 'DOMAIN_CURRENT_SITE', 'www.mywordpress.local' );
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );

/* That's all, stop editing! Happy blogging. */
    // If we're behind a proxy server and using HTTPS, we need to alert Wordpress of that fact
    // see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
    if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
    }

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
