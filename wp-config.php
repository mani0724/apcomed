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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'apcomed' );

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
define( 'AUTH_KEY',         'v>#yA^7x7&]A&4ge?JRblW2*bUN@+tiHdULuIvx~@w+Iur@LB89IDfoh/w&wrBJK' );
define( 'SECURE_AUTH_KEY',  'v+gt-.RG8>k}+$E >5gPE>V:N lc8)EWz%ydV-5g~Eag40YoWh>Nh*!gbQPLvMM[' );
define( 'LOGGED_IN_KEY',    '= c0Hyhcn$*kF^|Qa8$WnuSi8v&<}<U.`5S+0CapP(u+73hx)8Oh~@-K>j:<UPf ' );
define( 'NONCE_KEY',        'D(0$k[5vJc~hy>zF&@3e~AGs6Gh J? ePC99#0K9>Tq+-Lt*@)>yB>MFHWZ@iAmC' );
define( 'AUTH_SALT',        'M*`BEC44ZB%B=`d;5*{l)e:cT{Mr0Yi_dX)P>t^l#{P52dn(Zx(V?X-&aw2e1Koz' );
define( 'SECURE_AUTH_SALT', 'B`Qh=`BqrAws$ltM8_QHZGi3kls*`d:!nos-O/3S{:~y4,-70Zm,ZV#e NlX{HdE' );
define( 'LOGGED_IN_SALT',   '2@xCE<?9E8/c7&9J:NsL=|xdD{8PMuZG/=z+8h8Y+I7{!kjNy2MR5N)GL}ep]w&7' );
define( 'NONCE_SALT',       '%e]sAil*a{F<>bD+1]_{5iSh~{<@Cw$UYGu&8NKG.r^&~whun{&VuvV3VDFlEJWn' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
