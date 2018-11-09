<?php
/**
 * Template Name: Sitemap
 */

get_header(); 

$banner_image = get_field('banner_image');
if(!empty($banner_image) && $banner_image['url'] !=''){
?>
<div class="home-pg">
	<div class="hp-banner">
		<img src="<?php echo $banner_image['url'];?>" alt="<?php echo $banner_image['title'];?>">
	</div>
</div>
<?php } ?>

<section class="page sitemap">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="wrapper">
		<div id="primary" class="content-area-full">
			<main id="main" class="site-main" role="main">
                <?php
                while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content', 'page' );

                endwhile; // End of the loop.
                ?>
                <?php get_template_part( 'template-parts/content', 'sitemap' ); ?>
			</main><!-- #main -->
		</div><!-- #primary -->
	<?php
	get_sidebar('service'); ?>
	</div>
</section>
<?php 
get_footer();
