<?php

class PadmaStoreBlockProductsOptions extends PadmaBlockOptionsAPI {
	
	public $tabs;
	public $sets;
	public $inputs;

	public function __construct(){

		$this->tabs = array(
			'general' 			=> 'General',
			'query-filters' 	=> 'Query Filters',
		);
		
		$this->sets = array();

		$this->inputs = array(

			'general' => array(

				'style' =>	array(
					'name' => 'style',
					'type' => 'select',
					'label' => __('Style','padma-store'),
					'default' => 'default',
					'options' => array(
						'default'	=> 'Default',
					),
					'tooltip' => __('Choose style','padma-store')
				),

			),

			'query-filters' => array(

				'display-product-attributes' => array(
					'name' => 'display-product-attributes',
					'type' => 'heading',
					'label' => __('Display Product Attributes','padma-store')
				),
				
				'limit' => array(
					'type' => 'integer',
					'name' => 'limit',
					'label' => __('Limit','padma-store'),
					'tooltip' => __('The number of products to display. Defaults to and -1 (display all)  when listing products, and -1 (display all) for categories.','padma-store'),
					'default' => -1
					
				),

				'columns' => array(
					'type' => 'select',
					'name' => 'columns',
					'label' => __('Columns','padma-store'),
					'tooltip' => __('The number of columns to display. Defaults to 4.','padma-store'),
					'options' => array(
						1 => 1,
						2 => 2,
						3 => 3,
						4 => 4,
						5 => 5,
						6 => 6,
					),
					'default' => 4
				),

				'paginate' => array(
					'type' => 'select',
					'name' => 'paginate',
					'label' => __('Paginate','padma-store'),
					'tooltip' => __('Toggles pagination on. Use in conjunction with limit. Defaults to false set to true to paginate .','padma-store'),
					'options' => array(
						'true' => __('True','padma-store'),
						'false' => __('False','padma-store')
					)
				),

				'orderby' => array(
					'type' => 'select',
					'name' => 'orderby',
					'label' => __('Order By','padma-store'),
					'tooltip' => __('Sorts the products displayed by the entered option. One or more options can be passed by adding both slugs with a space between them.','padma-store'),
					'options' => array(
						'date' => __('Date','padma-store'),
						'id' => 'ID',
						'menu_order' => __('Menu Order','padma-store'),
						'popularity' => __('Popularity','padma-store'),
						'rand' => __('Random','padma-store'),
						'title' => __('Title','padma-store'),
						'rating' => __('Rating','padma-store'),
					),
					'default' => 'title'
				),
				
				'skus' => array(
					'type' => 'text',
					'name' => 'skus',
					'label' => 'Skus',
					'tooltip' => __('Comma-separated list of product SKUs.','padma-store'),
				),

				'category' => array(
					'type' => 'multi-select',
					'name' => 'category',
					'label' => __('Categories','padma-store'),
					'tooltip' => '',
					'options' => 'get_categories()'
				),

				'tag' => array(
					'type' => 'multi-select',
					'name' => 'tag',
					'label' => __('Tags','padma-store'),
					'tooltip' => '',
					'options' => 'get_tags()'
				),

				'order' => array(
					'type' => 'select',
					'name' => 'order',
					'label' => __('Order','padma-store'),
					'tooltip' => __('States whether the product order is ascending (ASC) or descending (DESC), using the method set in orderby. Defaults to ASC.','padma-store'),
					'options' => array(
						'DESC' => __('Descending','padma-store'),
						'ASC' => __('Ascending','padma-store'),
					)
				),

				'class' => array(
					'name' => 'class',
					'type' => 'text',
					'label' => __('CSS Div Class','padma-store'),
					'tooltip' => __('Adds an HTML wrapper class so you can modify the specific output with custom CSS.','padma-store')
				),

				'custom-retrieve' => array(
					'type' => 'select',
					'name' => 'custom-retrieve',
					'label' => __('Custom Retrieve','padma-store'),
					'tooltip' => __('Retrieve on sale,  best selling or top rated products.','padma-store'),
					'options' => array(
						'normal' => 'Normal',
						'on_sale' => __('On Sale products','padma-store'),
						'best_selling' => __('Best Selling products','padma-store'),
						'top_rated' => __('Top Rated products','padma-store'),
					),
				),

				'content-product-attributes' => array(
					'name' => 'content-product-attributes',
					'type' => 'heading',
					'label' => __('Content Product Attributes','padma-store')
				),

				'attribute' => array(
					'type' => 'select',
					'name' => 'attribute',
					'label' => __('Attribute','padma-store'),
					'tooltip' => 'Retrieves products using the specified attribute slug.',
					'options' => 'get_attribute()'
				),

				'terms' => array(
					'name' => 'terms',
					'type' => 'text',
					'label' => __('Terms','padma-store'),
					'tooltip' => __('Comma-separated list of attribute terms to be used with attribute.','padma-store')
				),

				'terms-operator' => array(
					'type' => 'select',
					'name' => 'terms-operator',
					'label' => __('Terms operator','padma-store'),
					'tooltip' => __('Operator to compare attribute terms.','padma-store'),
					'default' => 'IN',
					'options' => array(
						'AND' => __('AND - Will display products from all of the chosen attributes.','padma-store'),
						'IN' => __('IN - Will display products with the chosen attribute.','padma-store'),
						'NOT IN' => __('NOT IN - Will display products that are not in the chosen attributes.','padma-store'),
					),
				),

				'tag-operator' => array(
					'type' => 'select',
					'name' => 'tag-operator',
					'label' => __('Tag operator','padma-store'),
					'tooltip' => __('Operator to compare tags.','padma-store'),
					'default' => 'IN',
					'options' => array(
						'AND' => __('AND - Will display products from all of the chosen tags.','padma-store'),
						'IN' => __('IN - Will display products with the chosen tags.','padma-store'),
						'NOT IN' => __('NOT IN - Will display products that are not in the chosen tags.','padma-store'),
					),
				),

				'visibility' => array(
					'type' => 'select',
					'name' => 'visibility',
					'label' => __('Visibility','padma-store'),
					'tooltip' => __('Will display products based on the selected visibility.','padma-store'),
					'default' => 'visible',
					'options' => array(
						'visible' => __('Visible - Products visible on shop and search results.','padma-store'),
						'catalog' => __('Catalog - Products visible on the shop only, but not search results.','padma-store'),
						'search' => __('Search - Products visible in search results only, but not on the shop.','padma-store'),
						'hidden' => __('Hidden - Products that are hidden from both shop and search, accessible only by direct URL.','padma-store'),
						'featured' => __('Featured - Products that are marked as Featured Products.','padma-store'),
					),
				),

				'specific-category' => array(
					'name' => 'specific-category',
					'type' => 'text',
					'label' => __('Specific category','padma-store'),
					'tooltip' => __('Retrieves products using the specified category slug.','padma-store')
				),

				'specific-tag' => array(
					'name' => 'specific-tag',
					'type' => 'text',
					'label' => __('Specific tag','padma-store'),
					'tooltip' => __('Retrieves products using the specified tag slug.','padma-store')
				),

				'cat-operator' => array(
					'type' => 'select',
					'name' => 'cat-operator',
					'label' => __('Tag operator','padma-store'),
					'tooltip' => __('Operator to compare category terms.','padma-store'),
					'default' => 'IN',
					'options' => array(
						'AND' => __('AND - Will display products that belong in all of the chosen categories.','padma-store'),
						'IN' => __('IN - Will display products within the chosen category.','padma-store'),
						'NOT IN' => __('NOT IN - Will display products that are not in the chosen category.','padma-store'),
					),
				),

				'ids' => array(
					'name' => 'ids',
					'type' => 'text',
					'label' => __('Specific Ids','padma-store'),
					'tooltip' => __('Will display products based on a comma-separated list of Post IDs.','padma-store')
				),

			),				
			
		);

	}

	public function modify_arguments($args = false) {


	}
	
	function get_categories() {
		return PadmaQuery::get_categories('product');
	}
	
	function get_tags() {
		return PadmaQuery::get_tags('product_tag');
	}

	function get_authors() {
		return PadmaQuery::get_authors();
	}

	function get_post_types() {
		return PadmaQuery::get_post_types();
	}

	function get_taxonomies() {
		return PadmaQuery::get_taxonomies();
	}

	function get_post_status() {
		return PadmaQuery::get_post_status();
	}

	function get_attribute() {

		$attributes = array('' => '');
		foreach (wc_get_attribute_taxonomies() as $key => $attribute) {
			$attributes[ $attribute->attribute_name ] = $attribute->attribute_label;
		}
		
		return $attributes;
	}
}

class PadmaStoreBlockProducts extends PadmaBlockAPI {
	

	public $id;
	public $name;
	public $options_class;
	public $description;
	public $categories;
	

	public function __construct(){
		
		$this->id 				= 'store-products';	
		$this->name 			= 'Products';
		$this->options_class 	= 'PadmaStoreBlockProductsOptions';	
		$this->description 	= 'Allows you to display products by post ID, SKU, categories, attributes, with support for pagination, random sorting, and product tags';
		$this->categories 		= array('store','content','dynamic-content');
	}


	public function init() {


	}
	
	public function setup_elements() {

		$this->register_block_element(array(
			'id' => 'products-container',
			'name' => 'Products container',
			'selector' => '.woocommerce',
		));

		$this->register_block_element(array(
			'id' => 'notices',
			'name' => 'Notices',
			'selector' => '.woocommerce-notices-wrapper',
		));

		$this->register_block_element(array(
			'id' => 'result-count',
			'name' => 'Result count',
			'selector' => '.woocommerce-result-count',
		));

		$this->register_block_element(array(
			'id' => 'ordering',
			'name' => 'Ordering',
			'selector' => '.woocommerce-ordering',
		));

		$this->register_block_element(array(
			'id' => 'products-on-page-form',
			'name' => 'Products on page',
			'selector' => '.woocommerce > div > form',
		));

		$this->register_block_element(array(
			'id' => 'ordering-select',
			'name' => 'Ordering select',
			'selector' => '.woocommerce-ordering select',
		));

		$this->register_block_element(array(
			'id' => 'products',
			'name' => 'Products',
			'selector' => '.products',
		));

		$this->register_block_element(array(
			'id' => 'single-product',
			'name' => 'Single product',
			'selector' => '.products .product',
			'states' => array(
				'Product Hover' => '.products .product:hover',
				'Button when Hover' => '.products .product:hover a:not(.added_to_cart)',
				'Button added to cart' => '.products .product a.added_to_cart',
			)
		));

		$this->register_block_element(array(
			'id' => 'single-product-button',
			'name' => 'Button',
			'selector' => '.product a.button',
			'states' => array(
				'Hover' => '.product a.button:hover',
				//'Button Hover' => '.products .product a:hover',
			)
		));

		$this->register_block_element(array(
			'id' => 'onsale',
			'name' => 'Sale',
			'selector' => '.products .product .onsale',
		));

		$this->register_block_element(array(
			'id' => 'image',
			'name' => 'Image',
			'selector' => '.products .product img',
		));

		$this->register_block_element(array(
			'id' => 'title',
			'name' => 'Title',
			'selector' => '.products .product h2',
		));

		$this->register_block_element(array(
			'id' => 'price',
			'name' => 'Price',
			'selector' => '.products .product .price',
		));

		$this->register_block_element(array(
			'id' => 'amount',
			'name' => 'Amount',
			'selector' => '.products .product .amount',
		));

		$this->register_block_element(array(
			'id' => 'currency-symbol',
			'name' => 'Currency symbol',
			'selector' => '.products .product .woocommerce-Price-currencySymbol',
		));

		$this->register_block_element(array(
			'id' => 'pagination',
			'name' => 'Pagination',
			'selector' => '.woocommerce-pagination',
		));

		$this->register_block_element(array(
			'id' => 'page-numbers',
			'name' => 'Page numbers',
			'selector' => '.page-numbers',
		));

		$this->register_block_element(array(
			'id' => 'page-single-number',
			'name' => 'Number',
			'selector' => '.page-numbers li',
		));

		$this->register_block_element(array(
			'id' => 'page-single-number-span',
			'name' => 'Number span',
			'selector' => '.page-numbers li .page-numbers',
		));

		$this->register_block_element(array(
			'id' => 'page-single-number-span-current',
			'name' => 'Current Number span',
			'selector' => '.page-numbers li .page-numbers.current',
		));
	}


	public static function dynamic_css($block_id, $block) {

	}
	
	public function content($block) {

		$style = parent::get_setting( $block, 'style', 'default' );

		$limit = parent::get_setting( $block, 'limit', -1 );
		$columns = parent::get_setting( $block, 'columns', 4 );
		$paginate = parent::get_setting( $block, 'paginate', 'false' );
		$orderby = parent::get_setting( $block, 'orderby', 'title' );
		$skus = parent::get_setting( $block, 'skus', '' );
		$category = parent::get_setting( $block, 'category', array() );
		$tag = parent::get_setting( $block, 'tag', '' );
		$order = parent::get_setting( $block, 'order', 'ASC' );
		$class = parent::get_setting( $block, 'class', '' );
		$custom_retrieve = parent::get_setting( $block, 'custom-retrieve', 'normal' );
		$attribute = parent::get_setting( $block, 'attribute', '' );
		$terms = parent::get_setting( $block, 'terms', '' );
		$terms_operator = parent::get_setting( $block, 'terms-operator', 'IN' );
		$tag_operator = parent::get_setting( $block, 'tag-operator', 'IN' );
		$visibility = parent::get_setting( $block, 'visibility', 'visible' );
		$specific_category = parent::get_setting( $block, 'specific-category', '' );
		$specific_tag = parent::get_setting( $block, 'specific-tag', '' );
		$cat_operator = parent::get_setting( $block, 'cat-operator', 'IN' );
		$ids = parent::get_setting( $block, 'ids', '' );


		$shortcode = '[products ';
		$shortcode .= 'limit="'. $limit .'" ';
		$shortcode .= 'columns="'. $columns .'" ';
		
		if( $paginate )
			$shortcode .= 'paginate="true" ';
		else{
			$shortcode .= 'paginate="false" ';
		}

		$shortcode .= 'orderby="'. $orderby .'" ';
		
		if( strlen($skus) > 0 ){
			$shortcode .= 'skus="'. $skus .'" ';
		}


		$categories = '';
		foreach ($category as $key => $value) {
			$categories .= $value . ',';
		}
		if( strlen($categories) > 0 ){
			$categories = rtrim($categories,',');
			$shortcode .= 'category="'. $categories .'" ';			
		}



		$tags = '';
		foreach ($tag as $key => $value) {
			$tags .= $value . ',';
		}
		if( strlen($tags) > 0 ){
			$tags = rtrim($tags,',');
			$shortcode .= 'tag="'. $tags .'" ';
			$shortcode .= 'tag_operator="'. $tag_operator .'" ';

		}

		$shortcode .= 'order="'. $order .'" ';

		if( strlen($class) > 0 ){
			$shortcode .= 'class="'. $class .'" ';
		}


		if( $custom_retrieve !== 'normal' ){

			switch ($custom_retrieve) {

				case 'on_sale':
					$shortcode .= 'on_sale="true" ';
					break;

				case 'best_selling':
					$shortcode .= 'best_selling="true" ';
					break;

				case 'top_rated':
					$shortcode .= 'top_rated="true" ';
					break;
			}

		}

		if( strlen($attribute) > 0 && strlen($terms) > 0 ){
			$shortcode .= 'attribute="' . $attribute . '" terms="' . $terms . '" ';
			$shortcode .= 'terms_operator="' . $terms_operator . '" ';
		}


		$shortcode .= 'visibility="' . $visibility . '" ';

		if( strlen($specific_category) > 0 ){
			$shortcode .= 'specific_category="'. $specific_category .'" ';
		}

		if( strlen($specific_tag) > 0 ){
			$shortcode .= 'specific_tag="'. $specific_tag .'" ';
		}

		$shortcode .= 'cat_operator="' . $cat_operator . '" ';


		if( strlen($ids) > 0 ){
			$shortcode .= 'ids="'. $ids .'" ';
		}
		

		
		$shortcode .= ']';		

		echo do_shortcode($shortcode);
	}

	public static function enqueue_action($block_id, $block = false) {
	
	}

	
}	
