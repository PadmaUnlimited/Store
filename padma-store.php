<?php
/*
Plugin Name: Padma Store
Plugin URI: https://www.padmaunlimited.com/plugins/store
Description: Ecommerce Blocks for Padma Unlimited
Version: 1.0.3
Author: Padma Unlimited team
Author URI: https://www.padmaunlimited.com
License: GNU GPL v2
*/

add_action('after_setup_theme', function() {

    if ( !class_exists('Padma') )
		return;

	if (!class_exists('PadmaBlockAPI') )
		return;

	/**
	 *
	 * Register elements as blocks
	 *
	 */
	
	$blocks = array(		
		'products' => 'PadmaStoreBlockProducts',
		'account' => 'PadmaStoreBlockAccount',
		'login-button' => 'PadmaStoreBlockLoginButton',
	);

	foreach ($blocks as $file => $class) {
			
		$block_type_url = substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1);
		$class_file = __DIR__ . '/blocks/'.$file.'/'.$file.'.php';
		$icons = array(
			'path' => __DIR__ . '/blocks/' . $file . '/',
			'url' => $block_type_url . '/blocks/' . $file . '/'
		);

		padma_register_block(
			$class,
			$block_type_url,
			$class_file,
			$icons
		);
		

		/**
		 *
		 * Check if there is the Padma Loader
		 *
		 */		
		if ( version_compare(PADMA_VERSION, '1.1.70', '<=') ){			
			include_once $class_file;
		}
	}

});