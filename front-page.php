<?php
/**
 * The template for displaying all pages.
 * Template Name: Home Page
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="home-pg">
    <!-- ===== Banner Section Start===== -->
    <?php
    $banner_image = get_field('banner_image');
    $main_title = get_field('banner_title');
    $sub_title = get_field('sub_title');
    $button_text = get_field('button_text');
    $button_link = get_field('button_link');
    if(!empty($banner_image) && $banner_image['url'] !=''){
    ?>
    <div class="hp-banner">
        <a href="<?php echo $button_link;?>"><img src="<?php echo $banner_image['url'];?>" alt="<?php echo $banner_image['title'];?>">
        <div class="caption">
            <div class="inside clear">
                <?php if($main_title !='' ){?>
                    <h2><?php echo $main_title;?></h2>
                <?php } ?>
                <?php if($sub_title !='' ){ ?>
                    <p><?php echo $sub_title;?></p>
                <?php } ?>
                <?php if($button_text !='' && $button_link !='' ){ ?>
                    <span class="banner-btn"><?php echo $button_text;?></span>
                <?php } ?>
            </div>
        </div>
        </a>
    </div>
    <?php
    }
    ?>
    <!-- ===== Banner Section End===== -->
    
    <!-- ===== Who we are Start===== -->
    <?php
    $who_we_are_title = get_field('title');
    $who_we_are_text = get_field('who_we_are');
    //$who_we_are_text = apply_filters('the_content', $who_we_are_text);
    if($who_we_are_title !=''){
    ?>
    <div class="hp-who-we-are">
        <div class="container">
        <h2><?php echo $who_we_are_title;?></h2>
        <?php if($who_we_are_text != ''){ ?>
        <p><?php echo $who_we_are_text;?></p>
        <?php } ?>
        </div>
    </div>
    <?php
    }
    ?>
    <!-- ===== Who we are End===== -->
    
    <!-- ===== Our service Start===== -->
    <div class="hp-service">
        <div class="container">
            <h2>Our Services</h2>
            <div class="row clear services-rows">
                <?php echo do_shortcode('[our_service]'); ?>
            </div>
        </div>
    </div>
    <!-- ===== Our service End===== -->
    
    
    <!-- ===== What Sets Start===== -->
    <?php
    $section_title = get_field('section_title');
    $background_image = get_field('background_image');
    $what_sets_them_apart = get_field('what_sets_them_apart');
    
    
    if($section_title != '' && $background_image['url'] !=''){
    ?>
    <div class="hp-content" style="background-image:url('<?php echo $background_image['url'];?>')">
        <div class="container">
                <div class="text">
                <h3><?php echo $section_title;?></h3>
                <?php 
                if(!empty($what_sets_them_apart)){ ?>
                <ul>
                    <?php
                    foreach($what_sets_them_apart as $what_sets_them_apart_val){
                        echo '<li>'.$what_sets_them_apart_val['item'].'</li>';
                    }
                    ?>
                </ul>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- ===== What Sets end===== -->
    
    
    <!-- ===== Project Start===== -->
    <?php
    $section_title_2 = get_field('section_title_2');
    $button_text_2 = get_field('button_text_2');
    $button_link_2 = get_field('button_link_2');
    $featured_projects = get_field('project_picker');
    
    ?>
    <div class="hp-projects">
        <div class="container">
            <?php if($section_title_2 != ''){ echo '<h2>'.$section_title_2.'</h2>'; } ?>
            <div class="row projectsList clear">
            <?php //echo do_shortcode('[our_project]'); ?>
            <?php if($featured_projects) { ?>
                <?php foreach($featured_projects as $p) { 
                    $post_id = $p->ID; 
                    $project_info = $p->post_content;
                    $project_image = get_field('banner_image', $post_id); ?>
                    <div class="col-three">
                        <div class="inside clear">
                            <div class="thumbnail">
                                <?php if($project_image){ ?>
                                    <div class="img">
                                        <img src="<?php echo $project_image['url'];?>" alt="<?php echo $project_image['title'];?>" />
                                    </div>
                                <?php } ?>
                                <h3><?php echo $p->post_title?></h3>
                                <?php if($project_info){ ?>
                                <div class="excerpt">
                                    <!-- <p><?php echo mb_strimwidth($project_info, 0, 158, '...'); ?></p> -->
                                    <?php the_excerpt(); ?>
                                </div>
                                <?php } ?>
                                <div class="buttondiv">
                                    <a href="<?php echo get_the_permalink($post_id);?>" class="project-btn">VIEW PROJECT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
            </div>
            <?php if($button_text_2 != '' && $button_link_2 !='' ){ ?>
            <a href="<?php echo $button_link_2;?>" class="project-btn"><?php echo $button_text_2;?></a>
            <?php } ?>
        </div>
    </div>
    <!-- ===== Project End===== -->

    
</div>
<?php
//get_sidebar();
get_footer();
