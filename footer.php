<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	
            
            <?php
                $footer_creds = get_field('footer_creds');
            ?>
            <div class="wrapper">
                <div class="footer-info">
                    <?php 
                    echo acc_social_links();
                    ?>
                </div>
                <div class="site-info">
                    <?php
                    if($footer_creds){
                        echo $footer_creds;
                    }
                    else{
                        echo '&copy; '.date('Y').' - Birch Ecology. <br>All Rights Reserved.';
                    }
                    ?>
                </div><!-- .site-info -->
            </div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
$( document ).ready(function() {
    
    $('p').each(function() {
        var $this = $(this);
        if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
            $this.remove();
    });
});
</script>
</body>
</html>
