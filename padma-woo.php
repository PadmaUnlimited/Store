<?php
/*
Plugin Name: Padma Woo
Plugin URI: https://www.padmaunlimited.com/plugins/woo
Description: Ecommerce Blocks for Padma Unlimited
Version: 0.0.1
Author: Padma Unlimited team
Author URI: https://www.padmaunlimited.com
License: GNU GPL v2
*/

add_action('after_setup_theme', 'register_visual_elements');
function register_visual_elements() {

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
		'accordion' => 'PadmaVisualElementsBlockAccordion',
		'basic-heading' => 'PadmaVisualElementsBlockBasicHeading',
		'box' => 'PadmaVisualElementsBlockBox',
		'button' => 'PadmaVisualElementsBlockButton',
		'columns' => 'PadmaVisualElementsBlockColumns',
		'content-to-accordion' => 'PadmaVisualElementsBlockContentToAccordion',
		'content-to-cards' => 'PadmaVisualElementsBlockContentToCards',
		'content-to-tabs' => 'PadmaVisualElementsBlockContentToTabs',
		'dailymotion' => 'PadmaVisualElementsBlockDailymotion',
		'divider' => 'PadmaVisualElementsBlockDivider',
		'dummy-image' => 'PadmaVisualElementsBlockDummyImage',
		'dummy-text' => 'PadmaVisualElementsBlockDummyText',
		'fontawesome' => 'PadmaVisualElementsFontAwesomeBlock',
		'gmap' => 'PadmaVisualElementsBlockGmap',
		'heading' => 'PadmaVisualElementsBlockHeading',
		'label' => 'PadmaVisualElementsBlockLabel',
		'lightbox' => 'PadmaVisualElementsBlockLightbox',
		'portfolio' => 'PadmaVisualElementsBlockPortfolio',
		'post-data' => 'PadmaVisualElementsBlockPostData',
		'spacer' => 'PadmaVisualElementsBlockSpacer',
		'spoiler' => 'PadmaVisualElementsBlockSpoiler',
		'tabs' => 'PadmaVisualElementsBlockTabs',
		'vimeo' => 'PadmaVisualElementsBlockVimeo',
		'youtube' => 'PadmaVisualElementsBlockYoutube',
		'quote' => 'PadmaVisualElementsBlockQuote',
	);

	foreach ($blocks as $file => $class) {
			
		$block_type_url = substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1);		
		$class_file = __DIR__ . '/blocks/'.$file.'.php';
		$icons = __DIR__;

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

}