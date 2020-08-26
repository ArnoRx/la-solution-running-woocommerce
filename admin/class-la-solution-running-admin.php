<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    La_Solution_Running
 * @subpackage La_Solution_Running/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    La_Solution_Running
 * @subpackage La_Solution_Running/admin
 * @author     Your Name <email@example.com>
 */
class La_Solution_Running_Admin {

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
	 * @param      string    $la_solution_running       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $la_solution_running, $version ) {

		$this->la_solution_running = $la_solution_running;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->la_solution_running, plugin_dir_url( __FILE__ ) . 'css/la-solution-running-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->la_solution_running, plugin_dir_url( __FILE__ ) . 'js/la-solution-running-admin.js', array( 'jquery' ), $this->version, false );

	}

}
