<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

$svc_args = array(
    'post_type'     => 'service',
    'posts_per_page'=> '-1',
    'order'         => 'ASC'
);
$svcs   = get_posts($svc_args);
if( $svcs ) {  ?>
<aside id="secondary" class="widget-area" role="complementary">
	<div class="widget service-side">
        <ul class="services_sublinks">
        <?php foreach($svcs as $row) { $id = $row->ID; ?>
            <li><a href="<?php echo get_permalink($id);?>"><?php echo get_the_title($id);?></a></li>
        <?php } ?>
        </ul>
	</div>
</aside><!-- #secondary -->
<?php } ?>
