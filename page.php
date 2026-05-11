
<?php
// Template Name: Homepage

get_header(); while (have_posts()) : the_post(); 

?>
	<?php $page_title_visibility = get_field('page_title') ; ?>
	<header class="entry-header layout-padding">
		<?php if($page_title_visibility == true ) : ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php endif; ?>
	</header><!-- .entry-header -->

<?php if(have_rows('cms')) : ?>
	<?php while(have_rows('cms')) : the_row(); 
	
	$layout = get_row_layout();
		get_template_part('template-parts/sections/' . $layout ) ;
	endwhile;
	else:
		get_template_part('template-parts/content-page' , 'page') ;

	endif;
	
	?>



<?php get_footer(); endwhile; ?>