<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

$services = get_field('services');
if( $services ) {  ?>

<aside id="secondary" class="widget-area desktop services-sidebar sticky sticky-sidebar" role="complementary">
	<div class="widget service-side">
		<h3 class="widget-title">Services Provided</h3>
        <ul class="services_sublinks">
        <?php foreach($services as $row) { $id = $row->ID; ?>
            <li><a href="<?php echo get_permalink($id);?>"><?php echo $row->post_title;?></a></li>
        <?php } ?>
        </ul>
	</div>
</aside>

<aside id="secondary_mobile" class="widget-area small-screen services-sidebar" role="complementary">
	<a id="sidebarNavMobile" class="burgerNav"><span></span></a>
    <span class="active-section">Services Provided</span>
    <div id="svclinks" class="widget service-side">
        <ul class="services_sublinks">
        <?php foreach($services as $row) { $id = $row->ID; ?>
            <li><a href="<?php echo get_permalink($id);?>"><?php echo $row->post_title;?></a></li>
        <?php } ?>
        </ul>
	</div>
</aside>

<?php } ?>
