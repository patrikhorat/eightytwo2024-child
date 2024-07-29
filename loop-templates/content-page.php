<?php
/**
 * Partial template for content in page.php
 *
 * @package eightytwo2024
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php
	if ( ! is_page_template( 'page-templates/no-title.php' ) ) {
		the_title(
			'<header class="entry-header"><h1 class="entry-title">',
			'</h1></header><!-- .entry-header -->'
		);
	}

	echo get_the_post_thumbnail( $post->ID, 'large' );
	?>

	<div class="entry-content">

		<?php
		the_content();
		eightytwo2024_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php eightytwo2024_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
