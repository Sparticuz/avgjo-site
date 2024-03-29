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
						<?php the_content(); ?>
						<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
						<?php the_tags( 'Tags: ', ', ', ''); ?>
					</div>
				</div>
			<div class="clearfix"></div>
			<?php if(comments_open()) comments_template(); ?>
			<?php endwhile; endif; ?>
		</div>
	</div>
</div>
<?php //get_sidebar(); ?>

<?php get_footer(); ?>