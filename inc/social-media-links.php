<?php 
/*____________________________________

			
			Social Media icons

_______________________________________*/
function acc_social_links() {

	$socials = array();
					
	$facebooklink = get_field('facebook', 'option');
	//$twitterlink = get_field('twitter_link', 'option');
	$linkedinlink = get_field('linkedin', 'option');
	$instagramlink = get_field('instagram', 'option');
	//$googlelink = get_field('google_link', 'option');
	
	$phone_number = get_field('phone', 'option');
	
	$linkedin = array(
		'class' => 'linkedin',
		'link' => $linkedinlink,
		'text' => '<i class="fa fa-linkedin" aria-hidden="true"></i>',
	);
	
	$facebook = array(
		'class' => 'facebook',
		'link' => $facebooklink,
		'text' => '<i class="fa fa-facebook" aria-hidden="true"></i>',
	);
	$twitter = array(
		'class' => 'twitter',
		'link' => $twitterlink,
		'text' => 'Follow us on Twitter',
	);
	
	$instagram = array(
		'class' => 'instagram',
		'link' => $instagramlink,
		'text' => '<i class="fa fa-instagram" aria-hidden="true"></i>',
	);
	$google = array(
		'class' => 'google',
		'link' => $googlelink,
		'text' => 'Follow us on Google',
	);
	
	
	
	// Add Chosen Social media to the list
	if($linkedinlink != "") {
		$socials[] = $linkedin;
	}
	if($instagramlink != "") {
		$socials[] = $instagram;
	} 
	if($facebooklink != "") {
		$socials[] = $facebook;
	}
	if($twitterlink != "") {
		$socials[] = $twitter;
	}
	
	
	if($googlelink != "") {
		$socials[] = $google;
	}
	// See what data we have.
	/*
	echo '<pre>';
	print_r($socials);
	echo '</pre>';
	*/
	
	// count for width
	$socialcount = count($socials);
	if($socialcount == 1) {
		$snumber = 'socialone';	
	} elseif($socialcount == 2) {
		$snumber = 'socialtwo';	
	} elseif($socialcount == 3) {
		$snumber = 'socialthree';	
	} elseif($socialcount == 4) {
		$snumber = 'socialfour';	
	} elseif($socialcount == 5) {
		$snumber = 'socialfive';	
	} elseif($socialcount == 6) {
		$snumber = 'socialsix';	
	}
	
	echo '<div id="sociallinks" class="social ' . $snumber . '">';
	echo '<ul>';
	
	foreach ( $socials as $social ) {
		echo '<li class="'. $social['class'] . '">';
		echo '<a href="' . $social['link'] . '" target="_blank">';
		echo $social['text'];
		echo '</a>';
		echo '</li>';
	}
	
	echo '</ul>';
	echo '</div><!-- social links -->'; 
	
	if($phone_number){
            echo '<div class="call">';
                echo '<a href="tel:'.$phone_number.'">'.$phone_number.'</a>';
            echo '</div>';
        }
} // end acc social links 


function get_my_social_style() { // Loads css 
	wp_enqueue_style( 'acc-social', get_template_directory_uri() . '/css/social.css', array( 'twentytwelve-style' ), '20121010' );
}
add_action( 'wp_enqueue_scripts', 'get_my_social_style' );