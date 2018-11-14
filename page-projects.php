<?php
/**
 * Template Name: Projects
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
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	
		<div id="primary" class="content-area-full">
			<main id="main" class="site-main" role="main">
				<div class="wrapper">
					<section class="intro">
						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'page' );

						endwhile; // End of the loop.
						?>
					</section>
				</div>
			<?php 
			

			$ser_arg = array(
                'post_type'         => 'project',
                'posts_per_page'    => '-1',
                //'orderby'          => 'menu_order',
                'order'            => 'ASC',
                'paged' => $paged,
                );
			    $ser_loop   = new WP_Query($ser_arg);
			    ?>
			    <?php if( $ser_loop->have_posts() ) { ?>
			    
			    <div class="hp-projects">
        			<div class="container">
        				<div class="wrapper">
			        <?php while ($ser_loop->have_posts()) { $ser_loop->the_post() ; 
			            
			            //$feature_image = get_field('featured_image',get_the_ID());
			            $feature_image = get_field('banner_image',get_the_ID());
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
			        pagi_posts_nav();
			        wp_reset_postdata();
			        ?>
			        	</div>
			        </div>
			    </div>

			    <?php } ?>

			</main><!-- #main -->
		</div><!-- #primary -->

	<?php
	//get_sidebar('service'); ?>
	
</section>
<?php 
get_footer();
