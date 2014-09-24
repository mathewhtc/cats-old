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
define('DB_NAME', 'thevastc_htc');

/** MySQL database username */
define('DB_USER', 'thevastc_htc');

/** MySQL database password */
define('DB_PASSWORD', 'KQ*P;]cDQwcB');

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
define('AUTH_KEY',         'bF$$8><E~3wm(|X`:R_~1zzOeJ+zK/Ay[_.x_JY TrOU}p0*28IaN,[SkpC6I#oN');
define('SECURE_AUTH_KEY',  ';F>_C1=xb$`?}]@Jy+^WAvq?%>H07|N-Q,1(+1Bmjqv+?&F4&V;C3# F}uP/GL3#');
define('LOGGED_IN_KEY',    'x;Fu7U<-rSCzN0}KTLn5q_SCm^v|%pwAo;B;D`OjEBc Xkt<`ww@r|zb8@bjzyA0');
define('NONCE_KEY',        'LT[PR:q0m(}~A`=ba1K#Im?%M-p&kzuVFN@.cqE8=-/Ta47]]P<apGP00a>FXUk~');
define('AUTH_SALT',        'xJY|[pD? `u.Jp4}S*T}?(GV}px`s1f~?H`ULJuFyB<~`01N;F/uCNN+GA_w%PP|');
define('SECURE_AUTH_SALT', '@e^7L+{Q2?i|I0nqX8`fi Bx&MLh|/}B$RtDku];YmC|>UbxfdD[SQP]ag.OS:YT');
define('LOGGED_IN_SALT',   '*E=|n#(F9c=KH4a+$oQBIv@wo]W3T:,{:MVA5D0!twP2<3UV8xDIqBCbO#?0PI=7');
define('NONCE_SALT',       'adE>+J;C|-FUK+ojR>_g(T gxk)9rjWd=SJ?}z?-1^z;DX#(cMJXIU80_MT[?.kp');

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
