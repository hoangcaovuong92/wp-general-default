<?php
/*
*	Template Name: Theme option extract
*/
get_header(); 
$tvlgiao_wpdance_wd_data = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("wd_data");?>
<pre>
<?php echo  serialize( $tvlgiao_wpdance_wd_data );?>
</pre>

<?php get_footer(); ?>
