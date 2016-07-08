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
define('DB_NAME', 'grifus_vn');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'ePo.nOe$N+c<dc _(=*n}Z7$g/Qvpf(}-<iWG_@sE;Ry42Av/VY)FCgJFS#8x[Qb');
define('SECURE_AUTH_KEY',  '@{[NL;a;aA+#yQi:7N.*USLVUf+-U,v>7aQe.*P#KB[V<PZF-/)(`lBa)ByfU%i/');
define('LOGGED_IN_KEY',    'nB!4Nlq=6l^OQd mR/H|e-f0!DCji@gd3%khiB4^N}brtGr`i!^)|r~&ZR_diJxj');
define('NONCE_KEY',        'd)YaUHa-D!V]&7Mot.^V@+j`YRNN!owt^px+&-[.+L9n;Xab#[`2>Ybb$wc|]`KN');
define('AUTH_SALT',        '<:f=X{tf(7&jIE0z B9F=lqv-mqY>0@4onJprj).Sq%@/@M=_j5K!Zo4zBlVEviW');
define('SECURE_AUTH_SALT', 'mNky)d37[YI[;OAOTe{&TTm*lb*[|I<Nyx+44OF!7bSX:[DPstepf=X?tnLxd%h7');
define('LOGGED_IN_SALT',   'r9)vDpYu//x9BQ#-S!y3]uq*360T-i(Z[E?]|FPq4AXX`tE^eiXOS_J(|9DM. ps');
define('NONCE_SALT',       '*Ocu/B7qSdW^kMX+gi`cKG9f)&U^=e||sIz7OC1+ 1}]M9|*|@b&60.|-dG|e@IT');

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
