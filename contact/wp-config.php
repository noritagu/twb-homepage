<?php
define('WP_AUTO_UPDATE_CORE', true);// This setting is required to make sure that WordPress updates can be properly managed in WordPress Toolkit. Remove this line if this WordPress website is not managed by WordPress Toolkit anymore.
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
define('DB_NAME', 'wordpress_6');

/** MySQL database username */
define('DB_USER', 'wordpress_b');

/** MySQL database password */
define('DB_PASSWORD', 'r7$gJCT1j0');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '8eIi6vPYNw2WpQ)xlH10nI%s!p41oG(4twd@x&OXmUq8Of^xwPSxEr17R*l7xo!@');
define('SECURE_AUTH_KEY',  'PKxCcw)8Vbk9a^mOu@i7AeJkH&1rPXmVDfJuoe88Op(Rme5lN4nzio6PQtyRVsRg');
define('LOGGED_IN_KEY',    'mvDz#xRkYM)crbLmqYMwQ&R*%MX(94@6pWQP6U6NfJS^xEKRD&PPZo^K(RcJ6OPW');
define('NONCE_KEY',        'VK)IBLrXFOujtsy5znE#i)mvDlwltkjq4T&pxZ@tlbTtX5PWOo&w9t#@(NlFgIwX');
define('AUTH_SALT',        'gVCkwV91AWgQpxw0gl4Nwj6P80d#FQ42L@TEDP%&i*U&4S1iT5Gq2PmEONqWrjXz');
define('SECURE_AUTH_SALT', '0bslOdo%m!K3mgm@xT&&HO4EwLzaKIEJ4Jo#ER9Wi3n1LvE!9e7S0Jf%d0u0SAyy');
define('LOGGED_IN_SALT',   'md8w28%uzFbV(aw#JVDKNNXj0nCGj2q&5lWD0E%UXTH7zqGjMoKGwAk5sF905FbA');
define('NONCE_SALT',       '@42GRhxAU5!gvEj8Ec&2g57fFH6h%NXXFy!AT#ZybHkyv5g*ir8HjUG1pwOT4Y@B');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');
