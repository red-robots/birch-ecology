<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<!--<link href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" rel="stylesheet" />
<link href="<?php echo get_template_directory_uri(); ?>/css/birch-ecology-custom.css" type="text/css" rel="stylesheet" />-->


<script defer src="<?php bloginfo( 'template_url' ); ?>/assets/svg-with-js/js/fontawesome-all.js"></script>


<?php wp_head(); 

// see if we need to push the content down or not.
$banner_image = get_field('banner_photo');
if( !empty($banner_image) && $banner_image['url'] !='' || is_front_page() ){
    $contentClass = 'yes-image';
} else {
    $contentClass = 'no-image';
}



?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acstarter' ); ?></a>
        
        
        <header class="header site-header" id="masthead">
            <div class="topbar">
                <div class="container">
                    
                    <?php 
                    echo acc_social_links();
                    ?>
                    
                </div>
            </div>
            <div class="container">
                    <h1 class="logo">
                    <?php
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    if ( has_custom_logo() ) {
                    ?>
                        <a href="<?php bloginfo('url'); ?>"><img src="<?php echo esc_url( $logo[0] );?>"></a>
                    <?php
                    } else {
                    ?>
                        <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
                    <?php 
                    }
                    ?>
                    </h1>
                    
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <div class="h-menu">
                            <?php $phone_number = get_field('phone', 'option'); ?>
                            <div class="resp-phone"><a href="tel:<?php echo $phone_number;?>"><?php echo $phone_number;?></a></div>
                            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'MENU', 'acstarter' ); ?></button>
                            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
                        </div> 
                    </nav><!-- #site-navigation -->
            </div>
        </header>

	<div id="content" class="site-content <?php echo $contentClass; ?>">
