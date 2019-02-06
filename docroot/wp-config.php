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

 /**
  * Don't edit this file directly, instead, create a wp-config-dev.php file and
  * add your settings and defines in there.
*/
if ( file_exists( dirname( __FILE__ ) . '/wp-config-dev.php' ) ) {
  include( dirname( __FILE__ ) . '/wp-config-dev.php' );
  define( 'WP_ENV', 'development');
}

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv( 'MYSQL_DATABASE' ) ?: 'default' );

/** MySQL database username */
define( 'DB_USER', getenv( 'MYSQL_USER' ) ?: 'user' );

/** MySQL database password */
define( 'DB_PASSWORD', getenv( 'MYSQL_PASSWORD' ) ?: 'user' );

/** MySQL hostname */
define( 'DB_HOST', getenv( 'MYSQL_HOST' ) ?: 'db' );

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
define( 'AUTH_KEY',         'bRIfPh6x6aV=vcG&[wx,Eh0yIc6@Lsj:#1wK^AR26(~v+iIx|bnlhG>vz3NX_Q&*' );
define( 'SECURE_AUTH_KEY',  'CG|;zA(jO{1B>z7&{9}=4C]0!+Z0|fv>2%hxTb-<HlwJj+Qn& rDn)%4|AP;4Y-n' );
define( 'LOGGED_IN_KEY',    'ob^!&ydHsTu{k;C&|-=60W):Dw D=;*B./i{T[vKdWovzr&lfCV@kp;Pz iYj,2O' );
define( 'NONCE_KEY',        'hq9L<|Vh[G+o~%anD^_~[A_rDs3;+R<owzdQ;kX)./>oYWYzQvuse0:7Mr-NluP1' );
define( 'AUTH_SALT',        'w<iFj/MTa.K/)GzR`~jXwEA$N$YI*r,v<6x6t1+*u;1JKOi<QO{QO1I;[-skq`]C' );
define( 'SECURE_AUTH_SALT', 'S_ge/|Fdxnfpkqhf @(%:`<7TMu<F18B./1!yJ>iZ,WVL-u(_#Zxaw@G%hZetdFx' );
define( 'LOGGED_IN_SALT',   'v$8|d1p;^NPx&hV-$#VOrHI=E:swl(,QMJCGoeC]ZmH.g!Vmn?Eb*}Q6{;zp8e-x' );
define( 'NONCE_SALT',       'CK67hIfx0~we|S{YQReLfr@N1]w!|0;-yT<zXnFz.Y0N6[c-M8=Gar$,KIVB2WPl' );

/**
 * Advanced Options
 */

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = getenv( 'WP_TABLE_PREFIX' ) ?: 'tp_';

// Define Site and Home URL with or without SSL
if ( isset( $_SERVER['HTTP_HOST'] ) ) {
	// HTTP is still the default scheme for now.
	$scheme = 'http';
	// If we have detected that the end use is HTTPS, make sure we pass that
	// through here, so <img> tags and the like don't generate mixed-mode
	// content warnings.
	if ( $_SERVER['HTTPS'] == 'on' || $_SERVER['REQUEST_SCHEME'] == 'https' ) {
		$scheme = 'https';
		// Force SSL on admin
		define('FORCE_SSL_ADMIN', true);
	}

	define('WP_HOME', $scheme . '://' . $_SERVER['HTTP_HOST']);
	define('WP_SITEURL', $scheme . '://' . $_SERVER['HTTP_HOST'] . '/' . getenv( 'WP_PATH' ) );
}

// Define path & url for wp-content
define( 'WP_CONTENT_URL', WP_HOME . '/wp-content' );
define( 'WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/wp-content' );


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' . getenv( 'WP_PATH' ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
