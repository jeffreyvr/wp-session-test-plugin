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
}
