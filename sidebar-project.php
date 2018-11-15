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
<aside id="secondary" class="widget-area" role="complementary">
	<div class="widget service-side">
        <h3 class="widget-title">Services Provided</h3>
        <ul class="services_sublinks">
        <?php foreach($services as $row) { $id = $row->ID; ?>
            <li><a href="<?php echo get_permalink($id);?>"><?php echo $row->post_title;?></a></li>
        <?php } ?>
        </ul>
	</div>
</aside><!-- #secondary -->
<?php } ?>
