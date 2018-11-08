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
	<div class="wrapper">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', get_post_format() );

				the_post_navigation();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</main><!-- #main -->
		</div><!-- #primary -->

	<?php
	get_sidebar('service'); ?>
	</div>
</section>
<?php get_footer();
