<?php 
/*
 * Plugin Name:       A Tanvir Plugin
 * Plugin URI:        www://tanvir-pluign.com
 * Description:       Learning Plugin
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Tanvir
 * Author URI:        https://tanvir.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       tanvir-plugin
 */


function tp_custom_post_type() {
    
    register_post_type('tp_product',
    // ('tp_product') is the unique slug (identifier) for the post type. This is how you will refer to this custom post type in your code.
		array(
			'labels'      => array(
				'name'          => __('Tanvir Products', 'textdomain'), 
                'singular_name' => __('Product Singular', 'textdomain'), 
                // __(): A WordPress translation function that ensures the text can be translated into other languages.
			),
				'public'      => true,               
				'has_archive' => true,
                'publicly_queryable' => true,       
                'rewrite'     => array( 'slug' => 'tanvir-products' )   
		)
	);
}



add_action('init', 'tp_custom_post_type');

function tp_add_custom_post_types($query) {
    if(is_home() && $query->is_main_query())
    {
        $query->set( 'post_type', array( 'post', 'tp_product'));
    }
}
add_action('pre_get_posts', 'tp_add_custom_post_types');