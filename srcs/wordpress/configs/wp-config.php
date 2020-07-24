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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

$_SERVER['HTTPS'] = 'off';

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'admin' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql:3306' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'xx%DeRh>ajVT>>?7`Sb1VnuS$UG?V4ss~0n|)d(r-RCs]o]5wFLVCAgN})1=`ET#');
define('SECURE_AUTH_KEY',  'Fgnx8P|-n|KM]~%%85552um|>nRr_+]Pk^.+s|H^4Ic>|xLb{R$<rjA](3h}Og_X');
define('LOGGED_IN_KEY',    'k@q7e)#WVPz2/di 2t6H{-R+:Jn:e!6.64qJ3Se$q gs*#ipP6Ft4]MDKVp+H+L~');
define('NONCE_KEY',        '=D*44+_`%t|JqyzbZWIql)I-1*-!FGrU*k]|]@?+K+}H-=ugj KC|1?q(qkc~.?H');
define('AUTH_SALT',        'QQG? WP%^DDUEKoHG wJ-3A-elN0#BFL9-9:z0+L ]^RLpz*:}F|4;Y0^m(kC+iC');
define('SECURE_AUTH_SALT', 'x5l+o]56wOBoQw`nE-8fNwm+[6m.{i<e)Zn@+ydSrk%^@km=ll7*54D&4yRZ.THo');
define('LOGGED_IN_SALT',   '1tK.-@-sXAk&9uSO=|ITrFk?Ao2e,+CaZ:;Q|z/dLG?n!+=D C>~AJ5,3/&R$7$J');
define('NONCE_SALT',       '4)RQr%W9=},bn1i.lBrQARMxxHPpFmwlUq@|`=r7Q|zPbKOHWp$o+M)a:Jv3sw)}');
/**#@-*/

/**
 * WordPress Database Table prefix.
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
define( 'WP_DEBUG', enable );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
