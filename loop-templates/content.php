<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package eightytwo2024
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php
		the_title(
			sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>'
		);
		?>

		<?php if ( 'post' === get_post_type() ) : ?>

			<div class="entry-meta">
				<?php eightytwo2024_posted_on(); ?>
			</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php
		the_excerpt();
		eightytwo2024_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php eightytwo2024_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
