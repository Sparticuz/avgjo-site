<?php
//Send correct 404 error to browser and search engines
header($_SERVER["SERVER_PROTOCOL"], true, 404);
?>
<?php get_header(); ?>
<div id="content">
	<h3>Error 404 - Page Not Found</h3>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>