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
<div id="content" class="row">
	<div class="nine columns">
		<div class="row">
			<div class="eight columns">
				<div id="featured-stories">
					<?php
					//Let's show the stickies as the jQuery Orbit!
					/* Get all Sticky Posts */
					$sticky = get_option( 'sticky_posts' );
					/* Sort Sticky Posts, newest at the top */
					rsort( $sticky );
					/* Query Sticky Posts */
					query_posts( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) ); ?>
					<?php if (have_posts()) {
							while (have_posts()) {
								the_post();
								?><img src="http://lorempixel.com/472/250/?p=<?php echo rand(); ?>"/><?php
								if (has_post_thumbnail()) { ?>
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
					<?php		}
							}
						}
					?>
				</div>
			</div>
			<div id="new" class="four columns">

				<div class="panel">
					<ul>
					<?php
						$args = array(
							'numberposts'     => 5,
							//'offset'          => 0,
							//'category'        => ,
							'orderby'         => 'post_date',
							'order'           => 'DESC',
							//'include'         => ,
							//'exclude'         => ,
							//'meta_key'        => ,
							//'meta_value'      => ,
							'post_type'       => 'post',
							//'post_mime_type'  => ,
							//'post_parent'     => ,
							'post_status'     => 'publish'
						);
						$myposts = get_posts( $args );
						foreach( $myposts as $post ) :	setup_postdata($post); ?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>

			</div>
		</div>

		<div class="row" id="all-posts">
		<?php query_posts( array( 'ignore_sticky_posts' => true ) ); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="four columns">
				<div <?php post_class('panel') ?> id="post-<?php the_ID(); ?>">
					<header>
						<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
						<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
					</header>
					<!--<article class="entry">
						<?php the_content(); ?>
					</article>-->
					<footer class="postmetadata">
						<?php the_tags('Tags: ', ', ', '<br />'); ?>
						Posted in <?php the_category(', ') ?> |
						<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
					</footer>
				</div>
			</div>

			<?php endwhile; ?>

			<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

			<?php else : ?>
				<h2>Not Found</h2>
			<?php endif; ?>
		</div>
	</div>

	<div class="three columns">

		<?php get_sidebar(); ?>

	</div>

</div>

<?php get_footer(); ?>
