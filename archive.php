<?php get_header(); ?>
<div id="content" class="row shadow">
	<div class="twelve columns">
		<div class="post panel">
	<?php if (have_posts()) : ?>
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
			<h2><em><?php single_cat_title(); ?></em></h2>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
			<h2>Posts Tagged <em><?php single_tag_title(); ?></em></h2>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h2>Archive for <?php the_time('F jS, Y'); ?></h2>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h2>Archive for <?php the_time('F, Y'); ?></h2>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h2>Archive for <?php the_time('Y'); ?></h2>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h2>Author Archive</h2>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h2>Blog Archives</h2>
		<?php } ?>

		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
			<ul>
		<?php while (have_posts()) : the_post(); ?>
			<li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<div class="panel clearfix">
					<?php //this is where the posts are on the category pages ?>
					<header>
						<h2 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
						<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
					</header>
					<article class="entry">
						<div class="image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
						<?php the_content("Continue reading " . the_title('', '', false)); ?>
					</article>
					<!--<footer class="postmetadata">
						<?php the_tags('Tags: ', ', ', '<br />'); ?>
						Posted in <?php the_category(', ') ?> |
						<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
					</footer>-->
				</div>
			</li>

			<?php endwhile; ?>
			</ul>
			<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

			<?php else : ?>
				<h2>Not Found</h2>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php //get_sidebar(); ?>

<?php get_footer(); ?>
