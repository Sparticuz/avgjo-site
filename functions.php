<?php

	/*Add Menu Management, Thumbnail support and RSS to head*/
	if (function_exists('add_theme_support')){
		add_theme_support('menus');
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size( 480, 270 );
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

	// Load jQuery from Google
	if ( !is_admin() ) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"), false);
		wp_register_script('foundation', (get_stylesheet_directory_uri()."/javascripts/foundation.js"), false);
		wp_register_script('app', (get_stylesheet_directory_uri()."/javascripts/app.js"), false);
		wp_register_script('modernizr', (get_stylesheet_directory_uri()."/javascripts/modernizr.foundation.js"), false);
		wp_enqueue_script('jquery');
		wp_enqueue_script('modernizr');
		wp_enqueue_script('foundation');
		wp_enqueue_script('app');

	}

	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');

    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="panel widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h3>',
    		'after_title'   => '</h3>'
    	));
    }

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