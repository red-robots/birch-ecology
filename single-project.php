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
                    <?php $i=1; foreach($galleries as $g) { ?>
                    <div class="frame clear<?php echo ($i==1) ?' first':'';?>">
                        <div class="pad">
                            <img src="<?php echo $g['url'];?>" alt="<?php echo $g['title'];?>" />
                            <?php if( $g['caption'] ) { ?>
                            <div class="caption"><?php echo $g['caption'];?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php $i++; } ?>
                </div>
                <?php } ?>
			</main><!-- #main -->
		</div><!-- #primary -->

	<?php
	get_sidebar('project'); ?>
	</div>
</section>
<?php get_footer();
