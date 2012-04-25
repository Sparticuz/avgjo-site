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
		<div class="row">
			<div id="featured-stories" class="twelve columns">
				<div class="row" style="padding-left: 1%;">
				<?php
				//Let's show the stickies
				/* Get all Sticky Posts */
				$sticky = get_option( 'sticky_posts' );
				/* Sort Sticky Posts, newest at the top */
				rsort( $sticky );
				/* Query Sticky Posts */
				query_posts( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) ); ?>
				<?php	if (have_posts()) {
							while (have_posts()) {
								the_post();
								if (has_post_thumbnail()) { ?>
									<div class="featured-hero-image six columns" style="margin:0 auto;float:left;width:480px !important;">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>
											<h2><span><?php the_title(); ?></span></h2>
										</a>
									</div>
									
				<?php			}
							}
						}
				?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="twelve columns" id="all-posts">
				<ul class="block-grid mobile three-up">
				<?php query_posts( array( 'ignore_sticky_posts' => true ) ); ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<div class="panel">
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

					<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

					<?php else : ?>
						<h2>Not Found</h2>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
	<!--<div class="three columns">

		<?php //get_sidebar(); ?>

	</div>-->

</div>

<?php get_footer(); ?>
