<?php


namespace MS;


class Plugin {
	/**
	 * Plugin version
	 */
	const VERSION = '1.0.0';

	/**
	 * Plugin Path
	 *
	 * @var \Directory|false|null
	 */
	public $path;

	public function __construct() {
		$this->setVariables();
		Bootstrap::init();
	}

	private function setVariables() {
		$this->path = dirname(__FILE__);
	}
}
