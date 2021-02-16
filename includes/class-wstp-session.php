<?php
/**
 * WSTP_Session class.
 */
class WSTP_Session {

	/**
	 * @var WP_Session Instance of WP_Session.
	 */
	public $session;

	/**
	 * Class constructor.
	 */
	public function __construct() {
		$this->session = WP_Session::get_instance();

		add_action( 'plugins_loaded', array( $this, 'wp_session_start' ) );
		add_action( 'shutdown', array( $this, 'wp_session_write_close' ) );
	}

	/**
	 * Get key from session.
	 *
	 * @param string $key The key to look for.
	 * @return mixed
	 */
	public function get( $key ) {
		$session = $this->session->toArray();

		return $session[ $key ] ?? false;
	}

	/**
	 * Set key and value on session.
	 *
	 * @param mixed $key The key to set.
	 * @param mixed $value The value to set.
	 * @return self
	 */
	public function set( $key, $value ) {
		$this->session[ $key ] = $value;

		return $this;
	}

	/**
	 * Return the current cache expire setting.
	 *
	 * @return int
	 */
	public function wp_session_cache_expire() {
		return $this->session->cache_expiration();
	}

	/**
	 * Alias of wp_session_write_close()
	 */
	public function wp_session_commit() {
		$this->wp_session_write_close();
	}

	/**
	 * Load a JSON-encoded string into the current session.
	 *
	 * @param string $data
	 */
	public function wp_session_decode( $data ) {
		return $this->session->json_in( $data );
	}

	/**
	 * Encode the current session's data as a JSON string.
	 *
	 * @return string
	 */
	public function wp_session_encode() {
		return $this->session->json_out();
	}

	/**
	 * Regenerate the session ID.
	 *
	 * @param bool $delete_old_session
	 *
	 * @return bool
	 */
	public function wp_session_regenerate_id( $delete_old_session = false ) {
		$this->session->regenerate_id( $delete_old_session );

		return true;
	}

	/**
	 * Start new or resume existing session.
	 *
	 * Resumes an existing session based on a value sent by the _wp_session cookie.
	 *
	 * @return bool
	 */
	public function wp_session_start() {
		do_action( 'wp_session_start' );

		return $this->session->session_started();
	}

	/**
	 * Return the current session status.
	 *
	 * @return int
	 */
	public function wp_session_status() {
		if ( $this->session->session_started() ) {
			return PHP_SESSION_ACTIVE;
		}

		return PHP_SESSION_NONE;
	}

	/**
	 * Unset all session variables.
	 */
	public function wp_session_unset() {
		$this->session->reset();
	}

	/**
	 * Write session data and end session
	 */
	public function wp_session_write_close() {
		$this->session->write_data();

		do_action( 'wp_session_commit' );
	}
}
