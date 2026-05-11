<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ACF_Playground
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



	<div class="entry-content">
		<?php if (get_the_content()) :
			the_content();
		else: 
			get_template_part('template-parts/content-none' , 'page') ;
		endif;

		
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
