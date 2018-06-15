<?php
/**
 * @package WordPress
 * @subpackage WP Woo General
 * @since wd_general
 **/

require_once get_template_directory()."/framework/abstract.php";
$tvlgiao_wpdance_theme = new TvlgiaoWpdanceGeneralTheme(array(
	'tvlgiao_wpdance_theme_name'	=>	"WP Woo General",
	'tvlgiao_wpdance_theme_slug'	=>	'wd_general'
));
$tvlgiao_wpdance_theme->init();
require_once (get_template_directory().'/admin/index.php');

?>