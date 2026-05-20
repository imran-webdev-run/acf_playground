<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ACF_Playground
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div>



	<div class="entry-content">
		<?php 
		   $excerpt = get_the_excerpt();
		   $trim_excerpt = wp_trim_words( $excerpt , 4 ) ;
		   echo esc_html( $trim_excerpt ) ; ; 
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
