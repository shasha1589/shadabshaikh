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
define('DB_NAME', 'shadabshaikh');

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
define('AUTH_KEY',         ']AWLRG,kQ]bpP8.*NJ~4-MW{d(V>Td8pS~1g0BwDF2  !{p8aQ5?ywZU5KGmlq+I');
define('SECURE_AUTH_KEY',  '$[%#)vL2(7o5`|S4A]m*^tLW`Ku}sT$6($. 1I2/92b-V69YkC;DFzy~Jxr4<WwT');
define('LOGGED_IN_KEY',    'mZ=ot9]RKuGG;A:/-!(.(VY1SaA4d$/_7dF=)oyK(JB{$ju_xZku:{CZ I*qYRoF');
define('NONCE_KEY',        '>&P@gA*u(A!*$tJz0dKB4p^|&O_hoPfgz.rB=~:@6]5eLs}SM}?BUc257!VL(uOn');
define('AUTH_SALT',        'WVCrUUh!U8s/oeuhaMmLU]utR-hyh3P1vz/sKJgHM?Hnb?h.G&FK(~M}}{Yh8h2u');
define('SECURE_AUTH_SALT', 'qK)k%M/?tf0gm$o)*5nt>Ajx>]SnPUmvm0Hw-@%Snf1Aq=*OyJ6QD`j)Y|g5NlXE');
define('LOGGED_IN_SALT',   '-WQP@9doZ>!v,tvl1h5)i9q&Jv6ZK]M3uBgR`H?oPV28FKpVRcJw`XGurOwW>k6<');
define('NONCE_SALT',       'Am^ti{+zC*FY+#LvLP/QlejE!(eSh6,&!<s ?o_Fe-pC@=)|5CdQa^/!v#=h6+`m');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ss_';

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
