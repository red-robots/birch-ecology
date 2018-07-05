<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header();

if ( has_post_thumbnail() ) { 
?>
<div class="home-pg">
	<div class="hp-banner">
		<?php the_post_thumbnail(); ?>
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
			?>

			</main><!-- #main -->
		</div><!-- #primary -->

	<?php
	get_sidebar('service'); ?>
	</div>
</section>
<?php 
get_footer();
