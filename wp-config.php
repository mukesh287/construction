<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'contruction' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'tv|R4/*An.Fw|A$]0MiuRlKWR3h/7rT,j%WiGq4xf@FF/HG]+sCeJA[Behk~Vs<!' );
define( 'SECURE_AUTH_KEY',  '@fJT8QJX/74C.x?mfi0>|U`^;KNCqM_[_jsjl#V/v$|a[N(3u{Ok4g@.(sR0ESAS' );
define( 'LOGGED_IN_KEY',    'E.a:YE)ia?L_AuW{/*z6?qnR:u?{E(o1!{=,1@)?$7Y9`<*V:BJ9o]T-7e^z)CaQ' );
define( 'NONCE_KEY',        '(`Xa1=I@:>G6/xFcGGUmmcFqQ{N)47|uCG/e~UbHqH>==<B*[,j3` m9[v!`Om*t' );
define( 'AUTH_SALT',        'xWT%t*,)8!g4h2Hn3UT )xzzS:Blm1R<s`0`fcR9[@iv5r%8}k?+vd[@yE1=M`UK' );
define( 'SECURE_AUTH_SALT', 'CG&M1fC_T1 a#X:c hl8zgkjY@K-niTMh.*g~m2,?}vp3e/]Ae[0~N}e-`Z4zSvS' );
define( 'LOGGED_IN_SALT',   'LoP^`8=M5_xBSv@%V!{k544c[EWs3IRh9hL6D.j8GNW`AQ7=bMfpn5&d,1I=+K0o' );
define( 'NONCE_SALT',       ':l)tq%qKBB9)prdU@?ms5 |8<66M=9!SyP-QA!3L$9Iuf6w[jN-{)hWrmXw}#I-t' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
