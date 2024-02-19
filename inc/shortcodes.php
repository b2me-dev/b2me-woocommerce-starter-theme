<?php

	/* Built-in shortcodes for B2Me starter theme */

	class App_Shortcodes {

		public function __construct() {
			add_shortcode('b2-section', array($this, 'section'));
			add_shortcode('b2-content', array($this, 'content'));
			add_shortcode('b2-row', array($this, 'row'));
			add_shortcode('b2-col', array($this, 'column'));
			add_shortcode('b2-div', array($this, 'div'));
			add_shortcode('b2-heading', array($this, 'heading'));
			add_shortcode('b2-image', array($this, 'image'));
			add_shortcode('b2-link', array($this, 'link'));
			add_shortcode('b2-email', array($this, 'email'));
			add_shortcode('b2-phone', array($this, 'phone'));
			add_shortcode('b2-home-banner', array($this, 'slideshow'));
			add_shortcode('b2-banner-image', array($this, 'bannerimage'));
			add_shortcode('b2-partners-slider', array($this, 'partners'));
			add_shortcode('b2-partners-logo', array($this, 'partnerslogo'));
			add_shortcode('b2-faq-item', array($this, 'faqitem'));
			add_shortcode('b2-blogs', array($this, 'blogs'));
			add_shortcode('b2-sitemap', array($this, 'sitemap'));
			add_shortcode('b2-social', array($this, 'social'));
			add_shortcode('b2-stylesheetdirectory', array($this, 'stylesheetdirectory'));
			add_shortcode('b2-site-name', array($this, 'sitename'));
			add_shortcode('b2-site-header-logo', array($this, 'siteheaderlogo'));
			add_shortcode('b2-site-footer-logo', array($this, 'sitefooterlogo'));
			add_shortcode('b2-site-email', array($this, 'siteemail'));
			add_shortcode('b2-site-phone', array($this, 'sitephone'));
			add_shortcode('b2-site-full-address', array($this, 'sitefulladdress'));
			add_shortcode('b2-site-facebook', array($this, 'sitefacebook'));
			add_shortcode('b2-site-instagram', array($this, 'siteinstagram'));
			add_shortcode('b2-site-twitter', array($this, 'sitetwitter'));
			add_shortcode('b2-site-linkedin', array($this, 'sitelinkedin'));
			add_shortcode('b2-site-youtube', array($this, 'siteyoutube'));
			add_shortcode('b2-list-pdf', array($this, 'listpdf'));
			add_shortcode('b2-custom-select', array($this, 'customselect'));
		}

		public function section($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'id' => '',
				'animate' => '',
				'animate-duration' => '',
				'animate-delay' => '',
				'faq-page' => '',
			), $attr);
	
			$element_id = '';
			$element_animate = '';
			$faq_attr = '';

			if ($attr['faq-page'] == 'true') {
				$faq_attr = 'itemscope itemtype="https://schema.org/FAQPage"';
			}

			// Check if has id
			if ($attr['id'] != '') {
				$element_id = 'id="'. $attr['id'] .'"';
			}
	
			// Check if has animation
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'" data-aos-delay="'. $attr['animate-delay'] .'"';
			}
	
			// Construct HTML
			$html = '<section class="'. $attr['class'] .'" '. $element_id .' '. $element_animate .' '. $faq_attr .'>
				' . do_shortcode( $content ) . '
			</section>';
	
			return $html;
		}

		public function content($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'id' => '',
				'animate' => '',
				'animate-duration' => '',
				'animate-delay' => '',
			), $attr);

			$element_id = '';
			$element_animate = '';
	
			// Check if has id
			if ($attr['id'] != '') {
				$element_id = 'id="'. $attr['id'] .'"';
			}
	
			// Check if has animation
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'" data-aos-delay="'. $attr['animate-delay'] .'"';
			}
	
			// Construct HTML
			$html = '<div class="b2-inner-content '. $attr['class'] .'" '. $element_id .' '. $element_animate .'>
				' . do_shortcode( $content ) . '
			</div>';
	
			return $html;
		}

		public function row($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'spacing' => '',
				'aligncenter' => '',
			), $attr);

			$alignment = '';
			if ($attr['aligncenter'] == 'yes') {
				$alignment = 'v-center';
			}

			// Construct HTML
			$html = '<div class="b2-row '. $attr['spacing'] .' '. $alignment .' '. $attr['class'] .'">
				' . do_shortcode( $content ) . '
			</div>';
	
			return $html;
		}

		public function column($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'size' => '',
				'animate' => '',
				'animate-duration' => '',
				'animate-delay' => '',
			), $attr);

			// Check if has animation
			$element_animate = '';
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'" data-aos-delay="'. $attr['animate-delay'] .'"';
			}

			// Construct HTML
			$html = '<div class="b2-col col-'. $attr['size'] .' '. $attr['class'] .'" '. $element_animate .'>
				' . do_shortcode( $content ) . '
			</div>';
	
			return $html;
		}

		public function div($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'id' => '',
				'animate' => '',
				'animate-duration' => '',
				'animate-delay' => '',
			), $attr);

			$element_id = '';
			$element_animate = '';

			// Check if has id
			if ($attr['id'] != '') {
				$element_id = 'id="'. $attr['id'] .'"';
			}

			// Check if has animation
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'" data-aos-delay="'. $attr['animate-delay'] .'"';
			}
	
			// Construct HTML
			$html = '<div class="'. $attr['class'] .'" '. $element_animate .' '. $element_id .'>
				' . do_shortcode( $content ) . '
			</div>';
	
			return $html;
		}

		public function heading($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'id' => '',
				'size' => '',
				'pre-heading' => '',
				'animate' => '',
				'animate-duration' => '',
				'animate-delay' => '',
			), $attr);

			$element_animate = '';
			$pre_heading = '';
			$element = 'h'. $attr['size'];
			$element_id = '';

			// Check if has pre-heading
			if ($attr['pre-heading'] != '') {
				$pre_heading = '<span>'. $attr['pre-heading'] .'</span>';
			}

			// Check if has animation
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'" data-aos-delay="'. $attr['animate-delay'] .'"';
			}

			// Check if has id
			if ($attr['id'] != '') {
				$element_id = 'id="'. $attr['id'] .'"';
			}

			// Construct HTML
			$html = '<'. $element .' class="'.$attr['class'].'" '. $element_animate .' '. $element_id .'>
				'. $pre_heading .'
				' . do_shortcode( $content ) . '
			</'. $element .'>';
	
			return $html;
		}

		public function image($attr) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'src' => '',
				'data-src' => '',
				'alt' => '',
				'width' => '',
				'height' => '',
				'animate' => '',
				'animate-duration' => '',
				'animate-delay' => '',
				'b2-lazyload' => '',
			), $attr);

			$element_animate = '';
			$element_lazyload = '';
			$element_datasrc = '';

			// Check if has data
			if ($attr['data-src'] != '') {
				$element_datasrc = 'data-src="'. $attr['data-src'] .'"';
			}
			
			// Check if has lazyload
			if ($attr['b2-lazyload'] == true) {
				$element_lazyload = 'b2-lazyload';
			}

			// Check if has animation
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'" data-aos-delay="'. $attr['animate-delay'] .'"';
			}

			// Construct HTML
			$html = '<img '. $element_datasrc .' src="'. $attr['src'] .'" alt="'. $attr['alt'] .'" width="'. $attr['width'] .'" height="'. $attr['height'] .'" class="'.$attr['class'].'" '. $element_animate .' '. $element_lazyload .'>';
	
			return $html;
		}

		public function link($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'id' => '',
				'rel' => '',
				'href' => '',
				'target' => '',
				'animate' => '',
				'animate-duration' => '',
				'animate-delay' => '',
			), $attr);

			$element_animate = '';
			$element_target = '';
			$element_id = '';
			$element_rel = '';

			// Check if has target
			if ($attr['target'] != '') {
				$element_target = 'target="'. $attr['target'] .'"';
			}

			// Check if has animation
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'" data-aos-delay="'. $attr['animate-delay'] .'"';
			}

			// Check if has id
			if ($attr['id'] != '') {
				$element_id = 'id="'. $attr['id'] .'"';
			}

			// Check if has id
			if ($attr['rel'] != '') {
				$element_rel = 'rel="'. $attr['rel'] .'"';
			}

			// Construct HTML
			$html = '<a href="'. $attr['href'] .'" '. $element_target .' class="'.$attr['class'].'" '. $element_animate .' '. $element_id .' '. $element_rel .'>
				' . do_shortcode( $content ) . '
			</a>';
	
			return $html;
		}

		public function email($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'animate' => '',
				'animate-duration' => '',
				'animate-delay' => '',
			), $attr);

			$element_animate = '';

			// Check if has animation
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'" data-aos-delay="'. $attr['animate-delay'] .'"';
			}

			// Construct HTML
			$html = '<a href="mailto:'. $content .'" title="Send an email to '. $content .'" rel="nofollow" class="'.$attr['class'].'" '. $element_animate .'>
				' . $content . '
			</a>';
	
			return $html;
		}

		public function phone($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'ext' => '',
				'animate' => '',
				'animate-duration' => '',
				'animate-delay' => '',
			), $attr);

			// Remove spacing
			$phone = str_replace(' ', '', $content);

			$element_animate = '';
			// Check if has animation
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'" data-aos-delay="'. $attr['animate-delay'] .'"';
			}

			// Construct HTML
			$html = '<a href="tel:'. $attr['ext'] . $phone .'" title="Call '. $phone .'" rel="nofollow" class="'.$attr['class'].'" '. $element_animate .'>
				' . $content . '
			</a>';
	
			return $html;
		}

		public function slideshow($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'fade' => '',
				'autoplay' => '',
				'speed' => '',
				'dots' => '',
				'arrows' => '',
			), $attr);

			// Construct settings
			$slider_fade = 'data-fade="'. $attr['fade'] .'"';
			$slider_autoplay = 'data-autoplay="'. $attr['autoplay'] .'"';
			$slider_speed = 'data-speed="'. $attr['speed'] .'"';
			$slider_dots = 'data-dots="'. $attr['dots'] .'"';
			$slider_arrows = 'data-arrows="'. $attr['arrows'] .'"';
	
			// Construct HTML
			$html = '<div class="b2-hp-banner">
				<div class="b2-hp-banner-slide '. $attr['class'] .'" '. $slider_fade .' '. $slider_autoplay .' '. $slider_speed .' '. $slider_dots .' '. $slider_arrows .'>
				' . do_shortcode( $content ) . '
				</div>
				<div class="b2-hp-banner-arrows">
					<span class="prev">
						<i class="fa-solid fa-angle-left"></i>
					</span>
					<span class="next">
						<i class="fa-solid fa-angle-right"></i>
					</span>
				</div>
				<div class="b2-hp-banner-dots"></div>
			</div>';
	
			return $html;
		}

		public function bannerimage($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'src' => '',
				'link-text' => '',
				'link-url' => '',
			), $attr);
	
			// Construct HTML
			$html = '<div>
				<div class="b2-hp-banner-slide-item">
					<canvas width="1920" height="1080" style="background-image: url('. $attr['src'] .')"></canvas>
					<div>
						'. do_shortcode( $content ) .'
						<a href="'. $attr['link-url'] .'" title="' . $attr['link-text'] . '" class="b2-link">' . $attr['link-text'] . '</a>
					</div>
				</div>
			</div>';
	
			return $html;
		}

		public function partners($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'autoplay' => '',
				'speed' => '',
				'slides-to-show' => '',
			), $attr);

			// Construct settings
			$slider_autoplay = 'data-autoplay="'. $attr['autoplay'] .'"';
			$slider_speed = 'data-speed="'. $attr['speed'] .'"';
			$slider_slidestoshow = 'data-slides-to-show="'. $attr['slides-to-show'] .'"';
	
			// Construct HTML
			$html = '<div class="b2-partners">
				<div class="b2-partners-slide '. $attr['class'] .'" '. $slider_autoplay .' '. $slider_speed .' '. $slider_slidestoshow .'>
				' . do_shortcode( $content ) . '
				</div>
			</div>';
	
			return $html;
		}

		public function partnerslogo($attr) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'src' => '',
				'company' => '',
				'link' => '',
				'target' => '',
			), $attr);

			$element_target = '';
			$element_link = '#';
			$element_has_link = 'no-link';

			// Check if has target
			if ($attr['target'] != '') {
				$element_target = 'target="'. $attr['target'] .'"';
			}

			// Check if has link
			if ($attr['link'] != '#') {
				$element_has_link = 'has-link';
				$element_link = $attr['link'];
			}

			// Construct HTML
			$html = '<div>
				<div class="b2-partners-item">
					<a href="'. $element_link .'" class="'. $element_has_link .'" '. $element_target .'>
						<img src="'. $attr['src'] .'" alt="'. $attr['company'] .'" class="b2-img-responsive '. $attr['class'] .'">
					</a>
				</div>
			</div>';
	
			return $html;
		}

		public function faqitem($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'question' => '',
				'animate' => '',
				'animate-duration' => '',
				'animate-delay' => '',
			), $attr);

			$element_animate = '';
			// Check if has animation
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'" data-aos-delay="'. $attr['animate-delay'] .'"';
			}
	
			// Construct HTML
			$html = '<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="b2-faq-item '. $attr['class'] .'" '. $element_animate .'>
				<div class="b2-faq-item-q tab-close">
					<p itemprop="name">'. $attr['question'] .'</p>
					<i class="fa-solid fa-angle-up"></i>
				</div>
				<div class="b2-faq-item-a" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
					<span itemprop="text">
					'. $content .'
					</span>
				</div>
			</div>';
	
			return $html;
		}

		public function blogs($attr) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'limit' => '',
				'category' => '',
				'show-image' => '',
				'excerpt-limit' => '',
				'animate' => '',
				'animate-duration' => '',
				'animate-delay' => '',
			), $attr);

			$element_animate = '';
			// Check if has animation
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'" data-aos-delay="'. $attr['animate-delay'] .'"';
			}

			// Query
			$query = new WP_Query([
				'post_type' => 'post',
				'posts_per_page' => $attr['limit'],
				'category_name' => $attr['category'],
			]);

			$blogs = '';

			if ( $query->have_posts() ) :
				while ( $query->have_posts() ) :
					$query->the_post();

					$title = get_the_title();
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
					$image_element = '';
					$content = substr(strip_tags(get_the_content()), 0, $attr['excerpt-limit']);
					$link = get_the_permalink();
					$post_date = get_the_date( 'Y M j' );

					if ($attr['show-image'] == 'yes') {
						$image_element = '<div class="b2-blog-item-image" '. $element_animate .'>
							<canvas height="200" style="background-image: url('. $featured_img_url .')"></canvas>
						</div>';
					}

					$blogs .= '<div class="b2-col col-3">
						<div class="b2-blog-item">
							<a href="'. $link .'" title="'. $title .'">
								'. $image_element .'
								<div class="b2-blog-item-details">
									<h3>'. $title .'</h3>
									<p>'. $content .'...</p>
									<span class="b2-link">Read Article</span>
								</div>
							</a>
						</div>
						<script type="application/ld+json">
							{
								"@context": "https://schema.org",
								"@type": "BlogPosting",
								"mainEntityOfPage": {
									"@type": "WebPage",
									"@id": "'. $link .'"
								},
								"headline": "'. $title .'",
								"description": "'. $content .'",
								"image": [
									"'. $featured_img_url .'"
								],  
								"datePublished": "'. $post_date .'"
							}
						</script>
					</div>';

				endwhile;
			endif;
	
			// Construct HTML
			$html = '<div class="b2-blogs">
				<div class="b2-row">
					'. $blogs .'
				</div>
			</div>';
	
			return $html;
		}

		public function sitemap($attr) {
			// Options
			$attr = shortcode_atts(array(
				'hide-pages' => '',
			), $attr);

			$list = '';
  			$pages = get_pages();
			$hide_arr = explode(',', $attr['hide-pages']);

  			foreach ( $pages as $page ) {
				$children = get_pages( array( 'child_of' => $page->ID ) );
				$children_count = count($children);
				$sub_list = '';
				$child_pages = '';

				if ($children_count > 0) {
					foreach ( $children as $sub_page ) {
						$sub_list .= '<li data-page-id="'. $sub_page->ID .'">
							<a href="' . get_page_link( $sub_page->ID ) . '" title="'. $sub_page->post_title .'">'. $sub_page->post_title .'</a>
						</li>';
					}

					$child_pages = '<ul class="b2-sitemap-child">
						'. $sub_list .'
					</ul>';
				}

				if (!in_array($page->ID, $hide_arr)) {
					if (!$page->post_parent) {
						$list .= '<li data-page-id="'. $page->ID .'">
							<a href="' . get_page_link( $page->ID ) . '" title="'. $page->post_title .'">'. $page->post_title .'</a>
							'. $child_pages .'
						</li>';
					}
				}
  			}

			// Construct HTML
			$html = '<ul class="b2-sitemap">
				'. $list .'
			</ul>';
	
			return $html;
		}

		public function social($attr) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'platform' => '',
				'url' => '',
				'animate' => '',
				'animate-duration' => '',
				'animate-delay' => '',
			), $attr);

			$icon = '';
			switch ($attr['platform']) {
				case 'Facebook':
				case 'facebook':
					$icon = 'facebook-f';
				break;
				case 'Twitter':
				case 'twitter':
					$icon = 'twitter';
				break;
				case 'LinkedIn':
				case 'Linkedin':
					$icon = 'linkedin-in';
				break;
				case 'Instagram':
				case 'instagram':
					$icon = 'instagram';
				break;
				case 'YouTube':
				case 'Youtube':
				case 'youtube':
					$icon = 'youtube';
				break;
			}

			$element_animate = '';
			// Check if has animation
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'" data-aos-once="true" data-aos-delay="'. $attr['animate-delay'] .'"';
			}

			// Construct HTML
			$html = '<a href="'. $attr['url'] .'" title="'. $attr['platform'] .'" target="_blank" class="b2-social '. $attr['class'] .'" '. $element_animate .'>
				<i class="fa-brands fa-'. $icon .'"></i>
			</a>';
	
			return $html;
		}

		public function stylesheetdirectory() {
			$theme_dir = get_stylesheet_directory_uri();
			return $theme_dir;
		}

		public function sitename() {
			$site_name = get_field('website_name', 'option');
			return $site_name;
		}

		public function siteheaderlogo() {
			$header_logo = get_field('header_logo', 'option');
			$site_name = get_field('website_name', 'option');
			$header_logo_element = '<a href="/" title="'. $site_name .'"><img src="'. $header_logo .'" alt="'. $site_name .'" class="b2-img-responsive"></a>';

			return $header_logo_element;
		}

		public function sitefooterlogo() {
			$footer_logo = get_field('footer_logo', 'option');
			$site_name = get_field('website_name', 'option');
			$footer_logo_element = '<a href="/" title="'. $site_name .'"><img src="'. $footer_logo .'" alt="'. $site_name .'" class="b2-img-responsive"></a>';

			return $footer_logo_element;
		}

		public function siteemail($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
			), $attr);

			$email_address = get_field('primary_email_address', 'option');
			$email_address_element = '<a href="mailto:'. $email_address .'" rel="nofollow" class="'. $attr['class'] .'">'. $content .'</a>';

			return $email_address_element;
		}

		public function sitephone($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
			), $attr);

			$phone = get_field('primary_phone_number', 'option');
			$phone_element = '<a href="tel:'. $phone .'" rel="nofollow" class="'. $attr['class'] .'">'. $content .'</a>';

			return $phone_element;
		}

		public function sitefulladdress($attr) {
			// Options
			$attr = shortcode_atts(array(
				'map-link' => '',
				'class' => '',
			), $attr);

			$company_address = get_field('company_address', 'option');
			$street_address = $company_address['street_address'];
			$city = $company_address['city'];
			$region = $company_address['region'];
			$country = $company_address['country'];
			$postal_code = $company_address['postal_code'];

			$full_address = '<a href="'. $attr['map-link'] .'" title="View on Google Maps" rel="nofollow" target="_blank" class="'. $attr['class'] .'">' . $street_address . ' ' . $city . ', ' . $region . ', ' . $country . ' ' . $postal_code . '</a>';

			return $full_address;
		}

		public function sitefacebook($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
			), $attr);

			$social_link = get_field('facebook', 'option');
			$social_link_element = '<a href="'. $social_link .'" rel="nofollow" class="'. $attr['class'] .'" target="_blank">' . $content . '</a>';
			return $social_link_element;
		}

		public function siteinstagram($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
			), $attr);

			$social_link = get_field('instagram', 'option');
			$social_link_element = '<a href="'. $social_link .'" rel="nofollow" class="'. $attr['class'] .'" target="_blank">' . $content . '</a>';
			return $social_link_element;
		}

		public function sitetwitter($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
			), $attr);

			$social_link = get_field('twitter', 'option');
			$social_link_element = '<a href="'. $social_link .'" rel="nofollow" class="'. $attr['class'] .'" target="_blank">' . $content . '</a>';
			return $social_link_element;
		}

		public function sitelinkedin($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
			), $attr);

			$social_link = get_field('linkedin', 'option');
			$social_link_element = '<a href="'. $social_link .'" rel="nofollow" class="'. $attr['class'] .'" target="_blank">' . $content . '</a>';
			return $social_link_element;
		}

		public function siteyoutube($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
			), $attr);

			$social_link = get_field('youtube', 'option');
			$social_link_element = '<a href="'. $social_link .'" rel="nofollow" class="'. $attr['class'] .'" target="_blank">' . $content . '</a>';
			return $social_link_element;
		}

		public function listpdf($attr) {
			// Options
			$attr = shortcode_atts(array(
				'title' => '',
				'src' => '',
				'sortby' => '',
			), $attr);

			$pdf_list = '';

			$folder_path = get_template_directory() . $attr['src'];
			$pdf_files = glob($folder_path . '/*.pdf');

			if ($attr['sortby'] == "modifiedtime") {
				usort($pdf_files, function($a, $b) {
					return filemtime($b) <=> filemtime($a);
				});
			} else {
				usort($pdf_files, function($a, $b) {
					return filectime($b) <=> filectime($a);
				});
			}

			$html_class = '';
			if (!$pdf_files) {
				$html_class = 'hidden';		
			}

			foreach ($pdf_files as $pdf_file) {
				if ($attr['sortby'] == "modifiedtime") {
					$time = filemtime($pdf_file);
				} else {
					$time = filectime($pdf_file);
				}
				$date = date('M d, Y', $time);

				$pdf_list .= '<div class="sp-item-files-pdf">
					<a href="'. $pdf_file .'" title="Download" download>
						<strong>' . $date . '</strong>
						<h3>' . basename($pdf_file) . '</h3>
						<span>Download</span>
					</a>
				</div>';
			}
	
			$html = '<div class="sp-item '. $html_class .'">
				<h2>'. $attr['title'] .'</h2>
				<div class="sp-item-files">
					'. $pdf_list .'
				</div>
			</div>';

			return $html;
		}

		public function customselect($attr) {
			// Options
			$attr = shortcode_atts(array(
				'id' => '',
				'class' => '',
				'label' => '',
				'options' => '',
			), $attr);

			$options = $attr['options'];
			$options_arr = explode(",", $options);
			$options_count = count($options_arr);
			$default_value = '';
			$options_list_1 = '';
			$options_list_2 = '';
			for ($i = 0; $i < $options_count; $i++) {
				$default_value = $options_arr[0];
				$options_list_1 .= '<option value="'. $options_arr[$i] .'">'. $options_arr[$i] .'</option>';
				$options_list_2 .= '<li data-value="'. $options_arr[$i] .'">'. $options_arr[$i] .'</li>';
			}

			$label_element = '';
			if ($attr['label']) {
				$label_element = '<label for="'. $attr['id'] .'">'. $attr['label'] .'</label>';
			}

			$html = '<div class="b2-custom-select '. $attr['class'] .'">
				'. $label_element .'
				<select name="'. $attr['id'] .'" id="'. $attr['id'] .'">'. $options_list_1 .'</select>
				<div class="b2-custom-select-container">
					<p>'. $default_value .'</p>
					<i class="fa-solid fa-angle-down"></i>
					<ul>'. $options_list_2 .'</ul>
				</div>
			</div>';

			return $html;
		}

	}

	new App_Shortcodes();