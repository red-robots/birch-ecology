<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); 

$banner_image = get_field('banner');
if(!empty($banner_image) && $banner_image['url'] !=''){
?>
<div class="home-pg">
	<div class="hp-banner">
		<img src="<?php echo $banner_image['url'];?>" alt="<?php echo $banner_image['title'];?>">
	</div>
</div>
<?php } ?>

<section class="page">
	<div class="wrapper clear">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_format() );
			endwhile; // End of the loop.
			?>
                
                <?php if( $bullets = get_field('services') ) { ?>
                    <div class="services-item-section">
                        <?php $i=1; foreach($bullets as $b) { 
                        $description = $b['service_description'];
                        $title = $b['service_title'];
                        $string = preg_replace('/\s+/','', $title);
                        $img = $b['service_image'];
                        $image_caption = '';
                        if($img) {
                            $img_string = preg_replace('/\s+/','', $img['caption']);
                            $image_caption = ($img_string) ? $img['caption'] : '';
                        }
                        if( $string ) {
                            $sectionID = sanitize_title_with_dashes($title); ?>
                            <div id="<?php echo $sectionID;?>" class="svc-info clear<?php echo ($i==1) ? ' first':'';?>">
                                <h3 class="svc_title"><?php echo $title;?></h3>
                                <div class="textwrap <?php echo ($img) ? 'half':'full' ?>">
                                    <div class="pad clear">
                                        <?php echo $description;?>
                                    </div>
                                </div>
                                <?php if($img) { ?>
                                <div class="imagewrap">
                                    <div class="wrap">
                                        <img src="<?php echo $img['url'];?>" alt="<?php echo $img['title'];?>" />
                                        <?php if( $image_caption ) { ?>
                                        <div class="image-caption"><?php echo $image_caption;?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        <?php $i++; } ?>
                        <?php } ?>
                    </div>
                    <div class="sticky-stopper"></div>
                <?php } ?>
                
			</main><!-- #main -->
		</div><!-- #primary -->
    
	<?php get_sidebar('service'); ?>
	</div>
    
    
</section>
<?php get_footer();
