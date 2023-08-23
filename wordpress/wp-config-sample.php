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
define( 'DB_NAME', 'database_name_here' );

/** Database username */
define( 'DB_USER', 'username_here' );

/** Database password */
define( 'DB_PASSWORD', 'password_here' );

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
define('AUTH_KEY',         'ppuO130::|Dj60p|=@/TrM5Hm)Z@f-Ywa8)W@ea+f&/}T9[56COO4:HT;4@rcx?o');
define('SECURE_AUTH_KEY',  'y$X}(=%m.`Ot0.EiHa0rB#G8K+/&v&h=Z^M?Q[sy8W}7e~)i_SN9>{|0,rzShFXg');
define('LOGGED_IN_KEY',    ':Lk6pr* sZJgJ`L$-_%8K9LIm:$vN`_kSeM..`8K6gwS=rZx!<;{2p2ZQ7Z9@Kwx');
define('NONCE_KEY',        '/r)m+rR_Z/6nu][U?`n? 3CLF)D:W-Pu7s&`j2*s|(Ni.j`Hx{}! 68!!]FN$@s3');
define('AUTH_SALT',        'I*J@<O1f3qF kF6jQryUi/?%>+@ja6<S#zqBYNthT|{/[gTJ;]/RTvriU=)>YQ.a');
define('SECURE_AUTH_SALT', '|Kj+4J*-|7KSo2_/gvq*99qN4w#a/ j<e!^E3?ga;nJ.y<K4Br.,B-K$cNH?_+}q');
define('LOGGED_IN_SALT',   '@SxE2ntWJqx9rl~)8 Mvp@C;[^%_M t{(mQKBGQ~v+hk<!V`t&{5mj-ob S^Rq/&');
define('NONCE_SALT',       'AF?x9z?OnVGiF(m=e_ H/z3vV m-A%2Zu=H.pHy*X7!AAZJof*yi#O9*]JCj&Xqo');

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
