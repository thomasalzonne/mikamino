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
define( 'DB_NAME', 'mikamino' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'toor' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'XmCAiBL8vrIssbSHuOZiD9xPp7GuZRL7SXtx9iXx7fYmYhrQE12MVpXCzMLZmuWA' );
define( 'SECURE_AUTH_KEY',  'hjYJtu0m6nWtScIZKD1WPCcsj2vZ0ylFJGujelsgUOki5UHg9so5THvbj3AYcl5i' );
define( 'LOGGED_IN_KEY',    'qiisgttklmOUGTaxi1In0RlWd8E2A3VT8uh1WKOgHdzOFWHYZORvoOVDzHHcURSe' );
define( 'NONCE_KEY',        'eZbt51mc5NKoMohQlkT71mARrRZfuvPSnq3xHLd5s4BC7lWtsFQcMjswo2CxL9PT' );
define( 'AUTH_SALT',        'zWyBgSJrEJYocp89B0UKcQgtlMOKDcprf04kNOJNgBYycYdUW8duKC179hrvBZXA' );
define( 'SECURE_AUTH_SALT', 'gR2BewecSyUyS3LUgRzQ0OZnfk1cek1I5GwiD8xY7rAmiMZLFMmuEgOVOJHYGwIP' );
define( 'LOGGED_IN_SALT',   '0Lw1A3NdpidiaZOrC1y9Z3fo0HT8xGAlm9dnP5wSXqkAUa2l2wok36LRYLFaSnNQ' );
define( 'NONCE_SALT',       'v7atVg1pKToX1dnkKfPZ2llgy8uIE5cQQSXcY8oAQMSnK3cJrZ0i7l39OiWdm7Gh' );

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
