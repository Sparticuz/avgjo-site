<?php //we're not using wordpress comments, we are using facebook; the code below will load the fb comments
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="password-protected alert">This post is password protected. Enter the password to view comments.</p>
	<?php return; } ?>

	<div class="fb-comments" data-href="<?php the_permalink() ?>" data-num-posts="10" data-width="470" data-colorscheme="light"></div>