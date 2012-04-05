<?php
	/* Our navigation menu.
	 * If one isn't filled out, wp_nav_menu falls back to wp_page_menu.
	 * The menu assiged to the primary position is the one used.
	 * If none is assigned, the menu with the lowest ID is used.
	 */

	$args = array(
		'theme_location'  => 'main-menu',
		//'menu'            => ,
		'container'       => 'nav',
		'container_class' => 'row',
		//'container_id'    => ,
		'menu_class'      => 'nav-bar',
		//'menu_id'         => ,
		//'echo'            => true,
		//'fallback_cb'     => 'wp_page_menu',
		//'before'          => ,
		//'after'           => ,
		//'link_before'     => ,
		//'link_after'      => ,
		//'items_wrap'      => '<ul id=\"%1$s\" class=\"%2$s\">%3$s</ul>',
		//'depth'           => 0,
		//'walker'          =>
	);

	wp_nav_menu( $args );
?>