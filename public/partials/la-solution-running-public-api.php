<?php

/**
 * Provide a public-api on Wordpress
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    La_Solution_Running
 * @subpackage La_Solution_Running/public/partials
 */

class La_Solution_Running_Public_API {

    public function __construct() {
        global $wpdb;
		$this->connector = $wpdb;
	}


	public function get_number_of_variation_with_this_ean_exists( $data ) {

		$sku = $data['sku'];

		$prepared_sql = $this->connector->prepare(
            "
            SELECT COUNT(*)
            FROM {$this->connector->postmeta} as pm
            INNER JOIN {$this->connector->posts} as p ON p.ID = pm.post_id
            WHERE p.post_type='product_variation'
            AND p.post_status='publish'
            AND pm.meta_key='_sku'
            AND pm.meta_value=%s;
            ",
            $sku,
        );

        // Use `get_var` instead of `query` for obtain only the result of count.
        // Else, query return the number of line (always 1)
        $results = $this->connector->get_var($prepared_sql);

		$posts = array(
		  'number_of_this_sku_present' => $results,
		);
		if ( empty( $sku ) ) {
			return new WP_Error( 'no_sku', 'Empty sku', array( 'status' => 404 ) );
		}

		return $posts;
	  }

	public function get_number_of_products_with_this_name_exists( $data ) {

		$product_name = $data['name'];

		$prepared_sql = $this->connector->prepare(
            "
            SELECT COUNT(*) FROM {$this->connector->posts}
            WHERE post_type='product'
            AND post_status='publish'
            AND post_title=%s ;
            ",
            $product_name,
        );

        // Use `get_var` instead of `query` for obtain only the result of count.
        // Else, query return the number of line (always 1)
        $results = $this->connector->get_var($prepared_sql);

		$posts = array(
		  'number_of_this_product_name_present' => $results,
		);
		if ( empty( $product_name ) ) {
			return new WP_Error( 'no_name', 'Empty name', array( 'status' => 404 ) );
		  }

		return $posts;
	  }
}

?>