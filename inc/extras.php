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

/* GENERATE SITEMAP */
function generate_sitemap() {
    global $wpdb;
    $lists = array();
    $menus = wp_get_nav_menu_items('main-menu');
    $menu_orders = array();
    $menu_with_children = array();
    if($menus) {
        $i=0;
        foreach($menus as $m) {
            $page_id = $m->object_id;
            $menu_title = $m->title;
            $page_url = $m->url;
            $post_parent = $m->post_parent;
            $submenu = array();
            if($post_parent) {
                $submenu = array(
                        'id'=>$page_id,
                        'title'=>$menu_title,
                        'url'=>$page_url
                    );
                $menu_with_children[$post_parent][$page_id] = $submenu;
            } else {
                $menu_orders[$page_id] = $menu_title;
            } 
            $i++;
        }
    }
    
    $results = $wpdb->get_results( "SELECT ID,post_title FROM {$wpdb->prefix}posts WHERE post_type = 'page' AND post_status='publish' AND post_parent=0 ORDER BY post_title ASC", OBJECT );
    $childPages = $wpdb->get_results( "SELECT ID,post_title,post_parent as parent_id FROM {$wpdb->prefix}posts WHERE post_type = 'page' AND post_status='publish' AND post_parent>0 ORDER BY post_title ASC", OBJECT );
    $childrenList = array();
    $childrenAll = array();
    /* child pages */
    if($childPages) {
        foreach($childPages as $cp) {
            $pId = $cp->parent_id;
            $iD = $cp->ID;
            $childrenAll[$iD] = array(
                                'id'=>$cp->ID,
                                'title'=>$cp->post_title,
                                'url'=>get_permalink($iD)
                            );
            $childrenList[$pId][] = array(
                                'id'=>$cp->ID,
                                'title'=>$cp->post_title,
                                'url'=>get_permalink($cp->ID)
                            );
        }
    }

    if($results) {
        foreach($results as $row) {
            $id = $row->ID;
            $page_title = $row->post_title;
            $page_link = get_permalink($id);
            if(array_key_exists($id,$menu_orders)) {
                $page_title = $menu_orders[$id];
            }
            
            $lists[$id]['parent_id'] = $id;
            $lists[$id]['parent_title'] = $page_title;
            $lists[$id]['parent_url'] = $page_link;
            
            if($menu_with_children) {

                $ii_childrens = array();
                if(array_key_exists($id,$menu_with_children)) {
                    $ii_childrens = $menu_with_children[$id];
                    $lists[$id]['children'] = $ii_childrens;
                }

                /* Show children page even if does not exist on Menu dropdown */
                if($childrenList && array_key_exists($id, $childrenList)) {
                    $cc_children = $childrenList[$id];
                    $exist_children = $lists[$id]['children'];
                    
                    foreach($cc_children as $cd) {
                        $x_id = $cd['id'];
                        if(!array_key_exists($x_id, $ii_childrens)) {
                            $addon[$x_id] = $cd;
                            $exist_children[$x_id] = $cd;
                        }
                    } 

                    $lists[$id]['children'] = $exist_children;
                }

            } else {
                if($childrenList && array_key_exists($id, $childrenList)) {
                    $c_obj = $childrenList[$id];
                    $lists[$id]['children'] = $c_obj;
                }
            }
            
            /* Blog or News Categories */
            $news_ID = 7;
            if($id == $news_ID) {
                $cat_args = array('hide_empty' => 1, 'parent' => 0, 'exclude'=>1);
                $lists[$id]['categories'] = get_categories($cat_args);
            }
        }
    }
    
    return $lists;
    
}

