<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://eboxnet.com/
 * @since      1.0.0
 *
 * @package    Woo_Columns
 * @subpackage Woo_Columns/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Woo_Columns
 * @subpackage Woo_Columns/admin
 * @author     Vagelis P. <info@eboxnet.com>
 */
class Woo_Columns_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
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
		 * defined in Woo_Columns_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woo_Columns_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/woo-columns-admin.css', array(), $this->version, 'all' );

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
		 * defined in Woo_Columns_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woo_Columns_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/woo-columns-admin.js', array( 'jquery' ), $this->version, false );

	}
		/**
		 * Create menu entry the admin area.
		 *
		 * @since    1.0.0
		 */
		public function create_menu() {

	    add_menu_page('Woo Columns', 'Woo Columns', 'administrator', 'woo-columns-options', 'woocolumns_admin_page');
		}
		/**
		 * Register settings variables
		 *
		 * @since    1.0.0
		 */
		public function register_settings() {

		register_setting( 'woocolumns-group', 'woocolumns-columns' );
		}

}
