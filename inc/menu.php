<div id="menu">
	<?php
	/* Our navigation menu.
	 * If one isn't filled out, wp_nav_menu falls back to wp_page_menu.
	 * The menu assiged to the primary position is the one used.
	 * If none is assigned, the menu with the lowest ID is used.
	 */

	$args = array(
		//'depth' => 1,
		'link_before' => '<span>',
		'link_after' => '</span>'
	);

	wp_nav_menu( $args ); ?>
</div>