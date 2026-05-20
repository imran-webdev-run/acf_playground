<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ACF_Playground
 */



get_header();
?>

	<main id="primary" class="site-main layout-padding">

	

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="post-type-filter">
				<?php get_template_part( 'inc/archive-filter' ); ?>
			</div>
			
		<div class="project-filter">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile; ?>
		</div>
		<?php
			the_posts_pagination( array(
				'mid_size'        => 1,
				'prev_text'       => __( 'Previous', 'acf_playground' ),
				'next_text'       => __( 'Next', 'acf_playground' ),
				'screen_reader_text' => __( 'Posts Navigation', 'acf_playground' ),
			));
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
