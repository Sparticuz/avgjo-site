<?php

	/*Add Menu Management, Thumbnail support and RSS to head*/
	if (function_exists('add_theme_support')){
		add_theme_support('menus');
		add_theme_support('post-thumbnails');
		//this is the size of the two hero images on index
		set_post_thumbnail_size( 500, 281 );
		add_theme_support('automatic-feed-links');
	}

	//Register Main Menu
	add_action('init', 'register_main_menu');
	function register_main_menu(){
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu' )
			)
		);
	}

	// Disable the admin bar, set to true if you want it to be visible.
	show_admin_bar( false );

	// Load jQuery from Google instead of the wordpress install
	if ( !is_admin() ) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"), false);
		wp_register_script('masonry', (get_stylesheet_directory_uri()."/javascripts/jquery.masonry.js"), false);
		wp_register_script('orbit', (get_stylesheet_directory_uri()."/javascripts/jquery.orbit.js"), false);
		wp_register_script('placeholder', (get_stylesheet_directory_uri()."/javascripts/jquery.placeholder.min.js"), false);
		wp_register_script('modernizr', (get_stylesheet_directory_uri()."/javascripts/modernizr.foundation.js"), false);
		wp_register_script('app', (get_stylesheet_directory_uri()."/javascripts/app.js"), false);
		wp_enqueue_script('jquery');
		wp_enqueue_script('modernizr');
		wp_enqueue_script('placeholder');
		wp_enqueue_script('orbit');
		wp_enqueue_script('masonry');
		wp_enqueue_script('app');

	}

	// Clean up the <head> for security
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');

	//Replace wordpress comment count with fb comment count
	function get_fb_comment_count(){
		global $post;
		$url = get_permalink($post->ID);

		$ch = curl_init('https://graph.facebook.com/?ids='.$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch);
		$json = json_decode($response);
		curl_close($ch);
		return $json->$url->comments;
	}
	//add_filter('get_comments_number','get_fb_comment_count');

?>