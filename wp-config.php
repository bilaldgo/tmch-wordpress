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
define( 'DB_NAME', 'tmch_new' );

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
define( 'AUTH_KEY',         '30RYiJIn4vhF#HoFBWm*5Ou16}8W<6sZ/PS6:QTOH:`U:]! n6BTRa$/_>v5k5^&' );
define( 'SECURE_AUTH_KEY',  'fWPE?p6%v}:1~#a/J[o#@Y~b~9>vy:nX>Sxz@@Fyf<^:{yKb=I{smHa2w(7tA$:D' );
define( 'LOGGED_IN_KEY',    '8R/e%7GsY&BY*`Fs$-&Ue7+pz5C,ajs`ShzFM8Be@c. 6E(-i9wyJA{%];j}t/?.' );
define( 'NONCE_KEY',        'lzh+dEH*U/E_7]7n=vb$P7gyH:>VD,&|33mrj{gRUaWa(c-cbm#AlY@1ZbvzPlbs' );
define( 'AUTH_SALT',        'V Jml&>@qJlxcQL>wr0H~W,3#PhV|6o{5>)O-9.5z BGTpRZicxKclG{JP]EE!v+' );
define( 'SECURE_AUTH_SALT', 'B(jj|xtiX~XttsxsU$rFZ5m@qC3n?%7sH3H~TFEwJ)ep9@{rVxr%r}q7>2R< Sum' );
define( 'LOGGED_IN_SALT',   'p^wSc7P*2_k>CGHU4f;Q:}FpnO%lt)y(SxQ;9v~P_q=0TJ1@<u`#{QMAB7p$6&%f' );
define( 'NONCE_SALT',       'JfHTEJ%SH7=Cv:/3fEDI/@_;xZ>1yu.9?5cI8f+n04~Jq3Y:99K]z{<w19e[B}]Z' );

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
