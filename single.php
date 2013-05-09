<?php get_header(); ?>
<div id="content" class="row shadow">
	<div class="twelve columns">
		<div class="post panel">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<h2><?php the_title(); ?></h2>
					<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
					<div class="entry">	
						<?php the_post_thumbnail(); ?>
						<?php 
						$paragraphAfter= 1; //display after the first paragraph
						$content = apply_filters('the_content', get_the_content());
						$content = explode("</p>", $content);
						for ($i = 0; $i <count($content); $i++ ) {
							if ($i == $paragraphAfter) { 
								// this is where the html for an ad would go
								// it would be inserted after the first paragraph
								// of text in a single post page. ?>
								<!--<div class="ad" style="margin:0 auto;"><img src="http://placedog.com/g/400/100" /></div>-->
							<?php }
							echo $content[$i] . "</p>";
						} ?>
						<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
						<?php the_tags( 'Tags: ', ', ', '');
							  echo "<br />Categories: ";
							  the_category( ', '); ?>
					</div>
				</div>
			<?php if(comments_open()) comments_template(); ?>
			<?php endwhile; endif; ?>
		</div>
	</div>
</div>
<?php //get_sidebar(); ?>

<?php get_footer(); ?>