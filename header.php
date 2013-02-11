<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>" />
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<?php
		//If it's a search, don't index,
		if (is_search()) { ?><meta name="robots" content="noindex, nofollow" /><?php } ?>
	<title><?php
		if (function_exists('is_tag') && is_tag()) {
			single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		elseif (is_archive()) {
			wp_title(''); echo ' - '; }
		elseif (is_search()) {
			echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		elseif (!(is_404()) && (is_single()) || (is_page())) {
			wp_title(''); echo ' - '; }
		elseif (is_404()) {
			echo 'Not Found - '; }
		if (is_home()) {
			bloginfo('name'); echo ' - '; bloginfo('description'); }
		else {
			bloginfo('name'); }
		if ($paged>1) {
			echo ' - page '. $paged; }?></title>
	<meta name="description" content="Average Jo Magazine Website!" />
	<meta name="author" content="Apollo Projects" />
	<!-- Mobile viewport optimized: h5bp.com/viewport -->
	<meta name="viewport" content="width=device-width,initial-scale=1"/>
	<meta property="fb:app_id" content="249178715160402" />
	<meta property="fb:admins" content="kylemcnally" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<!-- Other Included CSS Files -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/stylesheets/foundation.css" />
	<link href="http://fonts.googleapis.com/css?family=Oxygen|Gorditas" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/stylesheets/app.css" />
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/stylesheets/ie.css" />
	<![endif]-->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
	<?php include (TEMPLATEPATH . '/inc/analytics.php' ); ?>
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=249178715160402";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<div id="container">
		<header class="row shadow" id="header">
			<div class="twelve columns">
				<?php include (TEMPLATEPATH . '/inc/menu.php' ); ?>
				<div class="row">
					<div class="four columns" style="text-align: center;">
						<!--<div class="ad"><img src="http://placedog.com/g/101/101?p=<?php echo rand(); ?>"/></div>-->
					</div>
					<hgroup class="four columns">
						<h1 style="text-align:center;"><a href="<?php echo site_url(); ?>/"><img src="<?php bloginfo('template_directory'); ?>/images/header.png" alt="<?php bloginfo('name'); ?>" /></a></h1>
						<h2 class="subheader description" style="display:none;"><?php bloginfo('description'); ?></h2>
					</hgroup>
					<div class="four columns">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</header>