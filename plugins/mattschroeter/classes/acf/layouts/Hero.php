<?php


namespace MS\ACF\Layouts;

use TFR\ACFToPost\Util\FieldGenerator;
use TFR\ACFToPost\Base\Layout;

class Hero extends Layout {

	public function __construct() {
		parent::__construct();

		$this->setName( 'hero' );
		$this->setLabel( __( 'Hero', 'tfr' ) );
		$this->setRepeaters( ['modules'] );
	}

	public function setFields() {
		$fields = new FieldGenerator( $this->getKey() );

		$this->fields = [
			$fields->add( 'text', [
				'name'  => 'heading',
				'label' => __( 'Heading', 'tfr' ),
			]),

			$fields->add( 'wysiwyg', [
				'name'  => 'text',
				'label' => __( 'Text', 'tfr' ),
			]),
		];
	}
}
