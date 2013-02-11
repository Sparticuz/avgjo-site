<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package AvgJo
 * @subpackage Theme
 */
?>

<?php get_header(); ?>
<div id="content" class="row shadow">
	<div class="twelve columns">
		<!--<div style="width:500px;height:281px;">-->
		<div style="width:500px;height:281px;margin:0 auto;">
                <div class="row" id="hero-stories">
			<?php include (TEMPLATEPATH . '/inc/hero.php' ); ?>
		</div>
		</div>
		<div class="row" id="posts" style="margin-top:15px;">
			<div class="twelve columns">
				<ul class="block-grid mobile three-up" id="all-posts">
				<?php //query_posts( array( 'post__not_in' => get_option( 'sticky_posts' ) ) ); ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); if(is_sticky()) continue; ?>
					<li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<div class="panel">
							<header class="overflow">
								<h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
								<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
							</header>
							<article class="entry overflow">
								<div class="image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
								<?php the_content("Continue reading " . the_title('', '', false)); ?>
							</article>
							<!--<footer class="postmetadata overflow">
								<?php the_tags('Tags: ', ', ', '<br />'); ?>
								Posted in <?php the_category(', ') ?> |
								<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
							</footer>-->
						</div>
					</li>

					<?php endwhile; ?>

					<?php else : ?>
						<h2>Not Found</h2>
					<?php endif; wp_reset_query(); ?>
				</ul>
				<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
