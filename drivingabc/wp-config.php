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
define('DB_NAME', 'autoklase_cc');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'ZY,6M9W,upxp.F&te+VSL#8|>1HL;@a}uRqdr xH-=TV| |eiMNUYce,|^#YaEAU');
define('SECURE_AUTH_KEY',  ']`1w_K#-0##-g-=Lv>2s*==_t|_+1PvfN1h>c~0:2-I}OfFQ6d{+{$uI!7<b>UQw');
define('LOGGED_IN_KEY',    'ka#UJwVA#] *X<f(hCQ:!9yuqEeXUgnS0Q!n/#c)>ta)y|{[DR,knS`_5?S#S_+,');
define('NONCE_KEY',        'tw@?-qT-@#sPEY7Cnf5!{qi2.)xW|i+U3Z9zDNXiBLS:yS`E[Z$k%*Gk]Uz9wJg#');
define('AUTH_SALT',        '@mlv5g{<J9!28shFts6O#m&u|%HA#OZAt}tH+->Ie^uK1134XZp:B!rv/z6IOPQg');
define('SECURE_AUTH_SALT', 'dTAa41z8xBL=+r|7Xenj5gjQIRd<_+e-/JcZNI8>B4s#6|QT[Exls} g3s9{zp+p');
define('LOGGED_IN_SALT',   'IUBX/+egw}R2>7W,j_Y~x.7P,W,Uz6vQV2Y5pl2N lp^E4b`h1aNOUeF5j3&ew<~');
define('NONCE_SALT',       'v)c:Sl2XkDT/Z!_L&>UnGm[I]0Ra-CbLw#eQ9R$hF$.K$(m9pqyYxr?NjqC]$%p$');

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
define('WPLANG', 'lt_LT');

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
