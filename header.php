<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package B2Me_Starter_Theme_-_eCommerce
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php
		$primary_color = get_field('primary_color', 'option');
		$secondary_color = get_field('secondary_color', 'option');
		$accent_color = get_field('accent_color', 'option');

		echo '<style>
		:root {
			--primary-color: '. $primary_color .';
			--secondary-color: '. $secondary_color .';
			--accent-color: '. $accent_color .';
		}
		</style>';
	?>
	<meta name="theme-color" content="<?= $primary_color; ?>">
	<meta name="msapplication-navbutton-color" content="<?= $primary_color; ?>">
	<?php wp_head(); ?>
</head>
<?php
	$ip_class = '';
	if (!is_front_page()) $ip_class = 'ip-container';
?>
<body <?php body_class($ip_class); ?>>
<?php
			$website_name = get_field('website_name', 'option');
			$header_logo = get_field('header_logo', 'option');
			$primary_email_address = get_field('primary_email_address', 'option');
			$primary_phone_number = get_field('primary_phone_number', 'option');
			$company_address = get_field('company_address', 'option');
			$street_address = $company_address['street_address'];
			$city = $company_address['city'];
			$region = $company_address['region'];
			$postal_code = $company_address['postal_code'];
			$country = $company_address['country'];
			$facebook = get_field('facebook', 'option');
			$instagram = get_field('instagram', 'option');
			$twitter = get_field('twitter', 'option');
			$linkedin = get_field('linkedin', 'option');
			$youtube = get_field('youtube', 'option');

			echo '<script type="application/ld+json">
				[{
					"@context": "http://schema.org/",
					"@type": "LocalBusiness",
					"name": "'. $website_name .'",
					"@id": "'. get_site_url() .'",
					"logo": "'. $header_logo .'",
					"url": "'. get_site_url() .'",
					"email": "'. $primary_email_address .'",
					"telephone": "'. $primary_phone_number .'",
					"legalName": "'. $website_name .'",
					"contactPoint": {
						"@type": "ContactPoint",
						"telephone": "'. $primary_phone_number .'",
						"contactType": "Customer Service"
					},
					"address": {
						"@type": "PostalAddress",
						"streetAddress": "'. $street_address .'",
						"addressLocality": "'. $city .'",
						"addressRegion": "'. $region .'",
						"postalCode": "'. $postal_code .'",
						"addressCountry": {
							"@type": "Country",
							"name": "'. $country .'"
						}
					},
					"sameAs": ["'. $facebook .'", "'. $instagram .'", "'. $linkedin .'"],
					"openingHoursSpecification": [{
						"@type": "OpeningHoursSpecification",
						"dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
						"opens": "9:00",
						"closes": "17:50"
					}, {
						"@type": "OpeningHoursSpecification",
						"dayOfWeek": ["Saturday", "Sunday"],
						"opens": "00:00",
						"closes": "00:00"
					}],
					"priceRange": "N/A"
					},
					{
					"@context": "http://schema.org/",
					"@type": "Website",
					"name": "'. $website_name .'",
					"url": "'. get_site_url() .'"
					}
				]
			</script>';
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'b2me-master-theme' ); ?></a>

			<div class="b2-mh-wrap b2-hide-desktop">
				<div class="b2-mh-top-bar">
					<div class="b2-mh-top-bar-col col-logo">
						<a href="<?= get_site_url(); ?>" title="<?= get_bloginfo(); ?>">
							<img src="<?= get_stylesheet_directory_uri(); ?>/images/global/site-logo.png" alt="<?= get_bloginfo(); ?>" class="b2-img-responsive">
						</a>
					</div>
					<div class="b2-mh-top-bar-col col-menu">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'mobilenav',
								)
							);
						?>
					</div>
					<div>
						<?php
							if ( function_exists( 'b2me_starter_theme_ecommerce_woocommerce_header_cart' ) ) {
								b2me_starter_theme_ecommerce_woocommerce_header_cart();
							}
						?>
					</div>
				</div>
			</div>

			<header id="masthead" class="b2-hide-mobile">
				<a href="<?= get_site_url(); ?>" title="<?= get_bloginfo(); ?>">
					<img src="<?= get_stylesheet_directory_uri(); ?>/images/global/site-logo.png" alt="<?= get_bloginfo(); ?>" class="b2-img-responsive">
				</a>
				<nav class="main-navigation">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'headernav',
							)
						);
					?>
				</nav>
				<div>
					<?php
						if ( function_exists( 'b2me_starter_theme_ecommerce_woocommerce_header_cart' ) ) {
							b2me_starter_theme_ecommerce_woocommerce_header_cart();
						}
					?>
				</div>
			</header>