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
define('DB_NAME', 'wp_general_shop');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'Sz$w{lko8J7D>$*jibW@>HMi7CL|=Q}DT?;|~$P@C2.P0^Zl-602=vb@>BY@/EG`');
define('SECURE_AUTH_KEY',  'Z0SWp)|Q3^Ae>b9LS)G+iX|?v,[EBLkQkeyYq-DxU-g2&eNQ:m|$!)/4@EsodHyM');
define('LOGGED_IN_KEY',    'Iu~X9gwyF+O#8Q@}cGt~jMx&yPyxN<[pU7]/V@TRSNNZ|,5GMge~<VJQcbR~nns-');
define('NONCE_KEY',        '1>`t1-dqR:;x9abuSZ 3/W-Gn+F[|Y/hiFCtMU MFG?o[M6vOgi+A6q-A)o,.O)E');
define('AUTH_SALT',        '/EkNz} -g-JVDL!{}D`Ev ,KU]o}FMtZtkC}$|_4mN]|}jZ/+,SxW;2g1+dJ_mq|');
define('SECURE_AUTH_SALT', 'dmro/+[C+U_~0;$vr,}%*^n-xK)}=Z>D1g&,?et=u*QNg$._}CxuwjbhD_K>lke?');
define('LOGGED_IN_SALT',   'SxP)$+<r#n@R*dWn-I]W9PO&6.ZVvt.?zux8un[)chUW!c<#|*oP#c,M}he2N,5n');
define('NONCE_SALT',       ':kU__+q9q#m-`OZ~.[?Z)m L9=/U_0=Q(O5;pr:^FdE}8bxJ`ADIPL-!hq>Y.T@Z');

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
define('WP_DEBUG', true);
set_time_limit(600);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
