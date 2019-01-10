<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); 
// wp_reset_query();
$banner_image = get_field('banner_image');
// echo $banner_image;
if(!empty($banner_image) && $banner_image['url'] !=''){
?>
<div class="home-pg">
	<div class="hp-banner">
		<img src="<?php echo $banner_image['url'];?>" alt="<?php echo $banner_image['title'];?>">
	</div>
</div>
<?php } ?>
<section class="page">
	<div class="wrapper">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
                <?php
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/content', get_post_format() );
                endwhile; // End of the loop.

                if( $galleries = get_field('image_gallery') ) { ?>
                <div class="galleryWrapper clear">
                    <?php $i=1; foreach($galleries as $g) { 
                        $image_caption = $g['caption'];
                        $image_details = $g['description']; 
                        $divClass = ($image_details) ? 'has-description':'no-description';
                        ?>
                        <div class="photo-wrapper clear <?php echo $divClass;?><?php echo ($i==1) ?' first':'';?>">
                            <div class="frame clear">
                                <div class="pad">
                                    <img src="<?php echo $g['url'];?>" alt="<?php echo $g['title'];?>" />
                                    <?php if( $image_caption ) { ?>
                                    <div class="caption"><?php echo $image_caption;?></div>
                                    <?php } ?>
                                    <?php if( $image_details ) { ?>
                                    <div class="photo-description insideframe"><?php echo nl2br($image_details);?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php if( $image_details ) { ?>
                            <div class="photo-description"><?php echo nl2br($image_details);?></div>
                            <?php } ?>
                        </div>
                    <?php $i++; } ?>
                </div>
                <?php } ?>
			</main><!-- #main -->
		</div><!-- #primary -->

	<?php get_sidebar('project'); ?>
	</div>
</section>
<?php get_footer();
