<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://eboxnet.com/
 * @since             1.0.0
 * @package           Woo_Columns
 *
 * @wordpress-plugin
 * Plugin Name:       Woo Columns
 * Plugin URI:        http://eboxnet.com/woo-columns
 * Description:       Simple plugin for changing WooCommerce's pages columns number.Will also keep-make your WooCommerce pages responsive
 * Version:           1.0.0
 * Author:            Vagelis P.
 * Author URI:        http://eboxnet.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woo-columns
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-woo-columns-activator.php
 */
function activate_woo_columns() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woo-columns-activator.php';
	Woo_Columns_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-woo-columns-deactivator.php
 */
function deactivate_woo_columns() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woo-columns-deactivator.php';
	Woo_Columns_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_woo_columns' );
register_deactivation_hook( __FILE__, 'deactivate_woo_columns' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-woo-columns.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_woo_columns() {

	$plugin = new Woo_Columns();
	$plugin->run();

}

function woocolumns_admin_page() {
?>
<div class="wrap">
<h2>Woo Columns Settings Page</h2>
<form method="post" action="options.php">
    <?php settings_fields( 'woocolumns-group' ); ?>
    <?php do_settings_sections( 'woocolumns-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Number of columns</th>
		  <td>
			<select name="woocolumns-columns">
  <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
			  <option selected="<?php echo esc_attr( get_option('woocolumns-columns') ); ?>"><?php echo esc_attr( get_option('woocolumns-columns') ); ?></option>
</select></td>
        </tr>      
        Woo Columns will keep-make your WooCommerce pages responsive.    
    </table>   
    <?php submit_button(); ?>
</form>
  If you like this simple plugin please rate on wordpress.org,<br/>
  You can contact me by email ( <a href="mailto:info@eboxnet.com">info@eboxnet.com</a> )<br/>
  Or you can buy me a coffee by using the Paypal button<br/>
<br/>
   <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="M5AB5VWKWDTZ4">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form><br/>
Thank you
</div>
<?php 
}

add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return get_option('woocolumns-columns');
	}
}

add_filter( 'body_class', 'woo_columns_add_class', 10, 2 );
function woo_columns_add_class( $classes, $class )
{

    if( is_product_category() or is_shop() )
    {	
	$classes[] = 'columns-'.get_option('woocolumns-columns');
    }    
    return $classes;
}

run_woo_columns();
