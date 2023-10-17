<?php
class PhoneNumberFormatter {
	private static $instance;
	private $codigoPais = "55";

	private function __construct() {

	}

	public static function getInstance() {
		if (self::$instance === null) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function formatPhoneNumber($phoneNumber) {
		$phoneNumber = preg_replace("/[^0-9]/", "", $phoneNumber);
		return $this->codigoPais . $phoneNumber;
	}
}