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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define('AUTH_KEY',         'VF0ymJcj871xQ5tKjDfeVF/ZxS1b9ih+KEKGFCIauN3kX54Ci9MYm3oFsv8WJZ7UMeJSV2yRqFlVO7oFJ4JLrw==');
define('SECURE_AUTH_KEY',  'T/XNQks99ob0hTte2PxKk4h3DJc74HAdiKlxLcyaASvfb02ek+OzRzOsvRnFehzJWXIqKS/WcrTmwd3L3/V/7w==');
define('LOGGED_IN_KEY',    'eSlOBx1J7ZlsmOxaw0NTEJVFAAn0FM/tcpkdNdqqmpoNq4FNHMBYS71VAvTU5HgSlNPla2YYPzygl3IHN4wnHQ==');
define('NONCE_KEY',        'xtOmRIa3RhJFpmXtI58PuGyNsmTTW4OTfK3y+tmg63EPvLDM7JCsMlCiEqLjhTL5rnA2PoYsqTlZ9nEUD8vZug==');
define('AUTH_SALT',        'IQSTiwaDRdAHH61J2h2WPtYdDiE10EDcOeQ+o08MglQA+tu2t0NXxezdkiwc8cG+rZK0t9wDFxh8w3r0CgW3lg==');
define('SECURE_AUTH_SALT', 'u7yY3IwezM8VaFjQWjHPQcvGtcdj9WZcE9dD/8Ry3BQIOyqGhm/U7j/NR95DFEZ0xyQlOd1CsxaHHGEonprJ+A==');
define('LOGGED_IN_SALT',   '/YDi3flRaHFYYoH9XJayiecDuoy0IUQN9biviCI290Ec4ROl0z4D3GvzVFFC/qlPxSHBLqRznZ66DTZdZQLZ+w==');
define('NONCE_SALT',       'yb3FuaBi+KAzGvXdQd2bU7XfjPu8aA6CnIVAJvC6abU+DB2jsozbKIljAkpRa3ST+Kz5l2G6mZqF/6wDSQUq8w==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
