<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tmch-mbk
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,700&display=swap" rel="stylesheet">


	<?php wp_head(); ?>

	<!-- Link Swiper's CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'tmch-mbk' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="nav-wrapper">
				<div class="logo-container">
					<?php the_custom_logo(); ?>
				</div>
				<nav>
					<input class="hidden" type="checkbox" id="menuToggle">
					<label class="menu-btn" for="menuToggle">
						<div class="menu"></div>
						<div class="menu"></div>
						<div class="menu"></div>
					</label>
					<div class="nav-container">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								'items_wrap'     => '<ul class="nav-tabs">%3$s</ul>',
								'add_li_class'   => 'nav-tab'
							)
						);
					?>
					</div>
				</nav>
			</div>
		</div>
	</header><!-- #masthead -->