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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '%bv6)bIc7xZzb%O,I*[CXr0c9HrG2H<f_`^Tfb0ILOZiMeMXwk2rRwdgP;O|wyoL' );
define( 'SECURE_AUTH_KEY',   'H#vp>2:u{$_av>![d~.V%$.n31rTMB.k&IZq4z4 TD&@S]MCMQ}qz_jbPxeHJY=V' );
define( 'LOGGED_IN_KEY',     '!Nvt4|az)%JRz dt9sNXa12)Z~PjK)l]x*o,1TwW=zVF5+D=8i}eHAx6Z5r(I$N)' );
define( 'NONCE_KEY',         '6`8{4I#:`Tw7r_;0r:Yp*NxGk9]5/d3JnnI1uf.=sc{ct%45?b,=Y=]/&F=lXTdk' );
define( 'AUTH_SALT',         'BhY8G*<0g/A=fySj9Y@xNt tBU~LU4P,D;$UM`OugrZuDvkeQ C7$_>s3gH6;BS8' );
define( 'SECURE_AUTH_SALT',  'svd/64wPj$fiN:4X,*d..ihsGhG`&e 3/-@SM>^}!Cz}[un^/D4j.2jD#kf&QTH+' );
define( 'LOGGED_IN_SALT',    '](D0,Mz,P[K7unaA8Qm|KkNzS5$a,<vZmAcrSuK0OlZQIH(M&7?!d(?&b:#ezM@0' );
define( 'NONCE_SALT',        '_jeJ7-*+g1D &F990k(8~Qxe!2P@|/faxMF!S!DkJP>Liz7q>h%&~C+!5?@(&bfd' );
define( 'WP_CACHE_KEY_SALT', '9,4@CRTjsXDhc{YT3f<kO7Oa?<ZNaHw @aGEJnt%{Ih<u`z}`vQOMFF$K_70&)sa' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
