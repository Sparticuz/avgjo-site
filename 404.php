<?php
//Send correct 404 error to browser and search engines
header($_SERVER["SERVER_PROTOCOL"], true, 404);

get_header(); ?>
	<!-- Row for main content area -->
		<div id="content" class="eight columns" role="main">
	
			<div class="post-box">
				<h1>Page not found</h1>
				<div class="error">
					<p class="bottom">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
				</div>
				<p><?php _e('Please try the following:', 'reverie'); ?></p>
				<ul> 
					<li><?php _e('Check your spelling', 'reverie'); ?></li>
					<li><?php printf(__('Return to the <a href="%s">home page</a>', 'reverie'), home_url()); ?></li>
					<li><?php _e('Click the <a href="javascript:history.back()">Back</a> button', 'reverie'); ?></li>
				</ul>
			</div>

		</div><!-- End Content row -->
		
		<?php get_sidebar(); ?>
		
<?php get_footer(); ?>