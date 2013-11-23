<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ClubhouseCreative');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'R+-=kB(:y(PFV%[Mja~]6n+*Va}#%!I`/$82)nOLGu_&9SMRgy6^D5mqQSPYZV{i');
define('SECURE_AUTH_KEY',  'optUFv,x,]|^1EeIGWa6NGkLaxt;9|UOwJ?p9|NW&Hqp#74Uybe!q4rFZ(8*HW.>');
define('LOGGED_IN_KEY',    '[oba{uM$U{yR#i_+gYfLbIEo/qHA|]]pC.0~,X.A|&2c6(M<5+@Gy`>fc5I#KG~/');
define('NONCE_KEY',        'oP2}_*PQE7Rpvs|P+lBanmg_^13]u8aS4+{K.Tgclq*M#XlZ]v-),d_;$*i$-A?F');
define('AUTH_SALT',        '`e*ruG];h?3c{^=DD3Z<#l){E~! 1tu ,*lBRTy%P8a@/`(5Onz7+5+|sVN#NeHq');
define('SECURE_AUTH_SALT', '[Iq|:uK5ukeQRa>}]S,x<:Dm*d7B/u-Lzy(@KG|P*gLSP-.apIZ1GQ +Np Xoc~n');
define('LOGGED_IN_SALT',   '2NTW;Z9=c{ltE:G6uRlx}EnS]$7-(~yRx2v2V;[+>F2%hP_])LBBRk{OMV#BY8^O');
define('NONCE_SALT',       'In+B|O)M<srPnx+M^z-j[@pH,tkizjT^*|qI~5WyxxL8T`qQCArz& |[4-$,!mB(');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
