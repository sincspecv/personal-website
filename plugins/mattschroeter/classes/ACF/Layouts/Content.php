<?php


namespace MS\ACF\Layouts;

use TFR\ACFToPost\Util\FieldGenerator;
use TFR\ACFToPost\Base\Layout;

class Content extends Layout {

	public function __construct() {
		parent::__construct();

		$this->setName( 'content' );
		$this->setLabel( __( 'Content', 'tfr' ) );
		$this->setRepeaters( ['modules', 'service_modules'] );
	}

	public function setFields() {
		$fields = new FieldGenerator( $this->getKey() );

		$this->fields = [
			$fields->add( 'wysiwyg', [
				'name'  => 'text',
				'label' => __( 'Text', 'tfr' ),
			]),
		];
	}
}
