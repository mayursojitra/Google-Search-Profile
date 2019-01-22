<?php
/*
Plugin Name: Google Search Profile
Plugin URI: https://www.theandroid-mania.com
Description: To add your social media profiles to your website’s Google Profile
Author: Mayur Sojitra
Author URI: https://www.theandroid-mania.com
Text Domain: google-search-profile
Version: 1.0.1

*/

define( 'GSP_VERSION', '5.0.1' );
define( 'GSP_PLUGIN', __FILE__ );
define( 'GSP_DIR', __DIR__ );
define( 'GSP_SCHEME_ENABLE', false);
define( 'GSP_PLUGIN_NAME','google-search-profile');

function gsp_setting_menu(){
	add_menu_page('Google Search Profile', 'Google Profile', 'manage_options', 'google-search-profile', 'gsp_setting_page',plugins_url(GSP_PLUGIN_NAME.'/images/gsp-icon.png'));
}
// Add menu action at WP-ADMIN
if(function_exists('gsp_setting_menu'))
	add_action('admin_menu', 'gsp_setting_menu');

function gsp_setting_page(){
	require_once "settings-page.php";
}

/* Create options while Activation of Plugin */
function gsp_activate() {

	$options = array(
		'_gsp_facebook' => 'https://www.facebook.com',
		'_gsp_gplus' => 'https://plus.google.com',
		'_gsp_twitter' => 'https://www.twitter.com',
		'_gsp_instagram' => 'https://www.instagram.com',
		'_gsp_youtube' => 'https://www.youtube.com',
		'_gsp_linkedin' => 'https://www.linkedin.com',
		'_gsp_enable' => GSP_SCHEME_ENABLE
	);
	
	foreach($options as $metaKey => $metaValue)
		if(get_option( $metaKey )=='')
			update_option( $metaKey, $metaValue );

}
if(function_exists('gsp_activate'))
	register_activation_hook( __FILE__, 'gsp_activate' );

/* Delete options while Deactivation of Plugin */
function gsp_deactivate() {
	
	delete_option( '_gsp_enable' );

	delete_option( '_gsp_facebook' );
	delete_option( '_gsp_gplus' );
	delete_option( '_gsp_twitter' );
	delete_option( '_gsp_instagram' );
	delete_option( '_gsp_youtube' );
	delete_option( '_gsp_linkedin' );

}

if(function_exists('gsp_deactivate'))
	register_deactivation_hook( __FILE__, 'gsp_deactivate' );


function gsp_add_schema() {
    if(get_option('_gsp_enable') == 1){
    	$social = array();

    	$facebook = get_option('_gsp_facebook');
    	$gplus = get_option('_gsp_gplus');
    	$twitter = get_option('_gsp_twitter');
    	$instagram = get_option('_gsp_instagram');
    	$youtube = get_option('_gsp_youtube');
    	$linkedin = get_option('_gsp_linkedin');

    	if($facebook != "" && $facebook != "https://www.facebook.com"){
    		$social[] = $facebook;
    	}
    	if($gplus != "" && $gplus != "https://plus.google.com"){
    		$social[] = $gplus;
    	}
    	if($twitter != "" && $twitter != "https://www.twitter.com"){
    		$social[] = $twitter;
    	}
    	if($instagram != "" && $instagram != "https://www.instagram.com"){
    		$social[] = $instagram;
    	}
    	if($youtube != "" && $youtube != "https://www.youtube.com"){
    		$social[] = $youtube;
    	}
    	if($linkedin != "" && $linkedin != "https://www.linkedin.com"){
    		$social[] = $linkedin;
    	}

    	$socialschema = implode('","',$social);
    	if(sizeof($social) > 0 ){


    	?>
    	<script type="application/ld+json">
			{ "@context" : "http://schema.org/",
			"@type" : "Organization",
			"name" : "<?php echo get_bloginfo( 'name' ); ?>",
			"url" : "<?php echo get_bloginfo( 'url' ); ?>",
			"sameAs" : [ "<?php echo $socialschema; ?>"] 
			}
		</script>
    	<?php
    	}
    }
}
if(function_exists('gsp_add_schema'))
	add_action('wp_head', 'gsp_add_schema');