<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package B2Me_Starter_Theme_-_eCommerce
 */

?>

			<footer class="site-footer">
				<nav class="main-navigation">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'footernav',
								'depth'        	 => 1,
							)
						);
					?>
				</nav>
				<p class="footer-copyright">
					&copy; Copyright <?= date('Y'); ?> <?= get_bloginfo(); ?> - <a href="https://www.b2me.marketing/services/web" target="_blank" class="b2-text-underline">Website Design & Development</a> by <a href="https://www.b2me.marketing/" target="_blank" class="b2-text-underline">B2Me Marketing</a>
				</p>
			</footer>
		</div>
		<div class="b2-btt-toggle b2-ease">
			<a href="#" title="Back To Top" rel="nofollow">
				<i class="fa-solid fa-angle-up"></i>
			</a>
		</div>
		<div class="b2-mob-phone b2-hide-desktop">
			<?php
				$primary_phone_number = get_field('primary_phone_number', 'option');
			?>
			<a href="tel:<?= $primary_phone_number; ?>" title="Call Us" rel="nofollow">
				<i class="fa-solid fa-phone"></i>
			</a>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>