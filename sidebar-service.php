<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

$bullets = get_field('bullet_points');
?>

<aside id="secondary" class="widget-area" role="complementary">
	<div class="widget service-side">
		<?php echo $bullets; ?>
	</div>
</aside><!-- #secondary -->
