<?php
/**
 * Plugin name: WP Session Test Plugin
 * Description: A simple plugin to test the WP Session setup within a plugin. Based on WP Session Manager and the Easy Digital Downloads implementation.
 * Author: Jeffrey van Rossum
 * Author URI: https://vanrossum.dev
 * Version: 0.1
 */

/**
 * Main WP_Session_Test_Plugin Class.
 */
class WP_Session_Test_Plugin {

	/**
	 * @var WP_Session_Test_Plugin The one true WP_Session_Test_Plugin.
	 */
	private static $instance;

	/**
	 * @var object|WSTP_Session
	 */
	public $session;

	/**
	 * Main WP_Session_Test_Plugin Instance.
	 *
	 * @return WP_Session_Test_Plugin
	 */
	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self();

			self::$instance->setup_constants();
			self::$instance->includes();

			self::$instance->session = new WSTP_Session();
		}

		return self::$instance;
	}

	/**
	 * Includes plugin files.
	 *
	 * @return void
	 */
	public function includes() {
		if ( ! class_exists( 'Recursive_ArrayAccess' ) ) {
			require_once WSTP_PLUGIN_PATH . 'includes/class-recursive-arrayaccess.php';
		}

		require_once WSTP_PLUGIN_PATH . 'includes/class-wp-session.php';
		require_once WSTP_PLUGIN_PATH . 'includes/class-wstp-session.php';
	}

	/**
	 * Setup plugin constants.
	 *
	 * @return void
	 */
	public function setup_constants() {
		if ( ! defined( 'WP_SESSION_COOKIE' ) ) {
			define( 'WP_SESSION_COOKIE', 'wstp_wp_session' );
		}

		if ( ! defined( 'WSTP_PLUGIN_PATH' ) ) {
			define( 'WSTP_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
		}
	}
}

/**
 * Plugin main function.
 *
 * @return WP_Session_Test_Plugin
 */
function wstp() {
	return WP_Session_Test_Plugin::get_instance();
}

// Get running.
wstp();
