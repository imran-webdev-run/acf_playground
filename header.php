<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACF_Playground
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'acf_playground' ); ?></a>

	<header id="masthead" class="site-header layout-padding pt-20 pb-20">
		<div class="site-branding">
			<div class="site-branding">

				<?php 
					$logo = get_field('logo' , 'option');
					if(!empty($logo)) : 
					?>
					<a href="<?php echo esc_url(home_url('/')) ; ?>"><img src="<?php echo esc_url($logo['url']) ; ?>" alt=""></a>
					<?php endif; ?>
			</div>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
