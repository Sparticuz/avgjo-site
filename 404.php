<?php
//Send correct 404 error to browser and search engines
header($_SERVER["SERVER_PROTOCOL"], true, 404);

get_header(); ?>
	<!-- Row for main content area -->
		<div id="content" class="row shadow" role="main">
			<div class="twelve columns">
				<div class="post panel">
					<h1>Page not found</h1>
					<div class="alert-box error">
						<p class="bottom">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
					</div>
					<p>Please try the following:</p>
					<ul> 
						<li>Check your spelling</li>
						<li>Return to the <a href="<?php home_url(); ?>">home page</a></li>
						<li>Click the <a href="javascript:history.back()">Back</a> button</li>
					</ul>
				</div>
			</div>
		</div>
<?php get_footer(); ?>