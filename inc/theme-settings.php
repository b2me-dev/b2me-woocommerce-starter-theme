<?php

/* Theme Settings */
function my_theme_settings_page() {
    if( function_exists('acf_add_options_page') ) {
	
        acf_add_options_page(array(
            'page_title' 	=> 'Theme Settings',
            'menu_title'	=> 'Theme Settings',
            'menu_slug' 	=> 'theme-settings',
            'capability'	=> 'manage_options',
            'redirect'		=> false
        ));

        acf_add_options_sub_page(array(
            'page_title' 	=> 'Color Scheme',
            'menu_title'	=> 'Color Scheme',
            'parent_slug'	=> 'theme-settings',
        ));
    
        acf_add_options_sub_page(array(
            'page_title' 	=> 'Social Media',
            'menu_title'	=> 'Social Media',
            'parent_slug'	=> 'theme-settings',
        ));
        
        acf_add_options_sub_page(array(
            'page_title' 	=> 'Ratings',
            'menu_title'	=> 'Ratings',
            'parent_slug'	=> 'theme-settings',
        ));
        
    }
}

add_action('admin_menu', 'my_theme_settings_page');