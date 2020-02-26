<?php


namespace MS\ACF\Groups;


use TFR\ACFToPost\Base\Group;
use TFR\ACFToPost\Util\FieldGenerator;

class Page extends Group {
	public function __construct() {
		parent::__construct();

		// Set the group parameters
		$this->setTitle( __( 'Page Group', 'tfr' ) );
		$this->setPostTypes( ['page', 'post'] );
		$this->setHiddenElements( ['the_content'] );
	}
}
