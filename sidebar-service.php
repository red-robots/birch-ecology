<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

//$bullets = get_field('bullet_points');
$bullets = get_field('services');

$browsers = ['is_iphone', 'is_chrome', 'is_safari', 'is_NS4', 'is_opera', 'is_macIE', 'is_winIE', 'is_gecko', 'is_lynx', 'is_IE', 'is_edge'];
$classes[] = join(' ', array_filter($browsers, function ($browser) {
    return $GLOBALS[$browser];
}));

$broswer_type = ( isset($classes[0]) && $classes[0] ) ? $classes[0] : '';
$is_sticky = ($broswer_type=='is_IE' || $broswer_type=='is_winIE is_IE') ? '':' sticky';

if($bullets) {
    $links = array();
    foreach($bullets as $b) {
        $title = $b['service_title'];
        $string = preg_replace('/\s+/','', $title);
        if( $string ) {
           $slug = sanitize_title_with_dashes($title);
           $links[] = array($slug,$title);
        }
    }
?>
<?php if($links) { ?>
<aside id="secondary" class="widget-area desktop services-sidebar<?php echo $is_sticky;?>" role="complementary">
	<div class="widget service-side">
        <ul class="services_sublinks">
        <?php foreach($links as $a) { ?>
            <li><a href="#<?php echo $a[0];?>"><?php echo $a[1];?></a></li>
        <?php } ?>
        </ul>
	</div>
</aside><!-- #secondary -->
<aside id="secondary_mobile" class="widget-area small-screen services-sidebar" role="complementary">
	<a id="sidebarNavMobile" class="burgerNav"><span></span></a>
    <span class="active-section"><?php echo get_the_title();?></span>
    <div id="svclinks" class="widget service-side">
        <ul class="services_sublinks">
        <?php foreach($links as $a) { ?>
            <li><a href="#<?php echo $a[0];?>"><?php echo $a[1];?></a></li>
        <?php } ?>
        </ul>
	</div>
</aside><!-- #secondary -->
<?php } ?>
<?php } ?>
