<?php

namespace MS\ACF\Repeaters;


use TFR\ACFToPost\Base\FlexibleContent;

class PostModules extends FlexibleContent {
	public function __construct() {
		parent::__construct();

		$this->setLabel( __( 'Post Modules', 'tfr' ) );
		$this->setName( 'post_modules' );
		$this->setButtonLabel( __( 'Add Module', 'tfr' ) );
		$this->setGroups( ['post'] );
	}
}
