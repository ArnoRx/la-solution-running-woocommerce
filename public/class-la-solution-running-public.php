<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    La_Solution_Running
 * @subpackage La_Solution_Running/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    La_Solution_Running
 * @subpackage La_Solution_Running/public
 * @author     Your Name <email@example.com>
 */
class La_Solution_Running_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $la_solution_running    The ID of this plugin.
	 */
	private $la_solution_running;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $la_solution_running       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $la_solution_running, $version ) {

		$this->la_solution_running = $la_solution_running;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in La_Solution_Running_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The La_Solution_Running_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->la_solution_running, plugin_dir_url( __FILE__ ) . 'css/la-solution-running-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in La_Solution_Running_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The La_Solution_Running_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->la_solution_running, plugin_dir_url( __FILE__ ) . 'js/la-solution-running-public.js', array( 'jquery' ), $this->version, false );

	}

	public function enqueue_rest_routes() {
		/**
		 * Register all API route from la-solution-running-public-api.php
		 */
		$method_collection = new La_Solution_Running_Public_API();

		register_rest_route( 'lasolution-api', 'number-of-this-product-with-name/(?P<name>[\w|\W]+)', array(
			'methods' => 'GET',
			'callback' => array( $method_collection, 'get_number_of_products_with_this_name_exists'),
			)
		);
		register_rest_route( 'lasolution-api', 'number-of-this-variation-with-sku/(?P<sku>[\w|\W]+)', array(
			'methods' => 'GET',
			'callback' => array( $method_collection, 'get_number_of_variation_with_this_ean_exists'),
			)
		);
	}
}
