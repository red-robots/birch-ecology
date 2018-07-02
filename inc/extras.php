<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ACStarter
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function acstarter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'acstarter_body_classes' );


function our_service_func( $atts ) {


   $ser_arg = array(
                'post_type'         => 'service',
                'posts_per_page'    => '-1',
                //'orderby'          => 'menu_order',
                'order'            => 'ASC',
                );
    $ser_loop   = new WP_Query($ser_arg);
    ?>
    <?php if( $ser_loop->have_posts() ) { ?>
        <?php while ($ser_loop->have_posts()) { $ser_loop->the_post() ; 
            
            $feature_image = get_field('featured_photo',get_the_ID());
            /*
            echo "<pre>";
            print_r($feature_image);
            echo "</pre>";
            */
            ?>
                 <div class="col-three">
                    <a href="<?php the_permalink();?>">
                        <?php if($feature_image['url'] != ''){ ?>
                            <img src="<?php echo $feature_image['url'];?>" alt="<?php echo $feature_image['alt'];?>" />
                        <?php } ?>
                        <h3><?php the_title();?></h3>
                    </a>
                </div>
                
        <?php } 
        wp_reset_postdata();
        ?>
    <?php }
    

}
add_shortcode( 'our_service', 'our_service_func' );


function our_project_func( $atts ) {

   $ser_arg = array(
                'post_type'         => 'project',
                'posts_per_page'    => '3',
                //'orderby'          => 'menu_order',
                'order'            => 'ASC',
                );
    $ser_loop   = new WP_Query($ser_arg);
    ?>
    <?php if( $ser_loop->have_posts() ) { ?>
        <?php while ($ser_loop->have_posts()) { $ser_loop->the_post() ; 
            
            $feature_image = get_field('featured_image',get_the_ID());
            ?>
                <div class="col-three">
                    <div class="thumbnail">
                        <?php if($feature_image['url'] != ''){ ?>
                        <div class="img">
                            <img src="<?php echo $feature_image['url'];?>" alt="<?php echo $feature_image['alt'];?>" />
                        </div>
                        <?php } ?>
                        <h3><?php the_title();?></h3>
                        <?php 
                        if(get_the_content()){
                            echo '<p>'.mb_strimwidth(get_the_content(), 0, 158, '...').'</p>';
                        }
                        ?>
                        <a href="<?php the_permalink();?>" class="project-btn">VIEW PROJECT</a>
                        
                    </div>
                </div>
                
                
        <?php } 
        wp_reset_postdata();
        ?>
    <?php }
    

}
add_shortcode( 'our_project', 'our_project_func' );

//remove_filter ('acf_the_content', 'wpautop');

