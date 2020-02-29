<?php

namespace MS\ACF\Repeaters;


use TFR\ACFToPost\Base\FlexibleContent;

class ServiceModules extends FlexibleContent {
	public function __construct() {
		parent::__construct();

		$this->setLabel( __( 'Service Modules', 'tfr' ) );
		$this->setName( 'service_modules' );
		$this->setButtonLabel( __( 'Add Module', 'tfr' ) );
		$this->setGroups( ['service'] );
	}
}
