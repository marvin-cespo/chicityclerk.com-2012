<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
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
define('DB_NAME', 'wordpress_5');

/** MySQL database username */
define('DB_USER', 'wordpress_9');

/** MySQL database password */
define('DB_PASSWORD', '$98mZkSGl1');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '%K#T^Gv0uHXuJU0##uHL@kFLsffwbY1h*6ekHlH!5EA7lGCPw!q!$#kqq#Spqe9p');
define('SECURE_AUTH_KEY',  'fbB73z4NCD!#&w!^Sc^I(ILCMf$o#H@$JM*WAqfot6n9Ntdgjw8xdf&h5jL2#Qkg');
define('LOGGED_IN_KEY',    'Bcqqj@RR@EktHEpbAR1osLyZGy!wnl1ZMgxB$zrNPb5Od)BYkEo!EjtC6^4&De8j');
define('NONCE_KEY',        'KRiWFcSA(&OiDbM3V(J(A3l4#FqS6&QWwJwsvKr5SLNINRuDFHsqvaioqYs$mwIb');
define('AUTH_SALT',        'fSUkVjj4*WQORe9kbT9S%m)Ttju$V%vP$Xtbl(oAg1Jy!STTaaWMTGyxIXgStd!A');
define('SECURE_AUTH_SALT', 'DK*8XsWINyKTMXvd*^R!GnBQS*Vla%B!1RO%54f%7wpHllp*RmsI*m&bcjJbok3F');
define('LOGGED_IN_SALT',   'vsGHxCuj@pLUFBNnO42P()*vSODdwBPkijGOWm9)RJ8ClKR%ORvz)gPh3yr9FD1%');
define('NONCE_SALT',       '*e82vhsUJxyvYy7k#gHannAMF2o@IXPL5FGp6yZylm6I)f1Xw5amN^07vU030nVx');
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
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', 'en_US');

define ('FS_METHOD', 'direct');

define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

?>
