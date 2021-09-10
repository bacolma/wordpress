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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dermaclean_app' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '_Yy+ai~#rpr6:KET6PNYl,}$.NPUCIdN&qUdY]o5oAcY >*gxnb%aaUd?#w$(c_E' );
define( 'SECURE_AUTH_KEY',  'gyi*/4=#|J0D(D^3)(TDfMcSo4j(uH%.]ksQ`R^Ikrr~094 vABgZy6zi]7+VD3&' );
define( 'LOGGED_IN_KEY',    'pjT`L][d/m!e|LAP$}?S=k>(OU%)h!0~v#|iKU0(Krg[<]OZ43hALhq>R4m0DbA]' );
define( 'NONCE_KEY',        '(ny;UkW%Q)JwALU@40a&$Su.%Z*DAG%.SmA1-*ym3!4I3]#]KW6{4||m?o>@nIu{' );
define( 'AUTH_SALT',        'MYZ0m1i6PHI6+-Z Jb=3MR~C=?tiW 0o@$6FXS2^?>`xBE~n#f;`A`8ynGt$q|,$' );
define( 'SECURE_AUTH_SALT', 'FO-c_M&>*m%/dqSh^aGoDNf6Cp75FwepluY(3Ey&1hiD!}Qs5>/cU6$h+dwo;;D`' );
define( 'LOGGED_IN_SALT',   'CO7LQW;n4XCtdbqh[`=^p7Evf@]%q_xJk(Nxh,YJS`Ov5~|sjRqscf2M%eWw+e&<' );
define( 'NONCE_SALT',       '[(9ZBx~iWe24ZIgH YG])!Hfp` ~7PTW.bv8K`c:i!/((O<nnl9KioK4QE.nwNEl' );

define('JWT_AUTH_SECRET_KEY', 'D(RRn&IXM^d^fWjd');
define('JWT_AUTH_CORS_ENABLE', true);
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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
