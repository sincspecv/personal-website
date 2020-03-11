<?php


namespace MS\ACF\Layouts;

use TFR\ACFToPost\Util\FieldGenerator;
use TFR\ACFToPost\Base\Layout;

class NumberedSequence extends Layout {

	public function __construct() {
		parent::__construct();

		$this->setName( 'numbered_sequence' );
		$this->setLabel( __( 'Numbered Sequence', 'tfr' ) );
		$this->setRepeaters( ['modules', 'service_modules'] );
	}

	public function setFields() {
		$fields = new FieldGenerator( $this->getKey() );

		$this->fields = [
			$fields->add( 'text', [
				'name'  => 'section_heading',
				'label' => __( 'Section Heading', 'tfr' ),
			]),

			$fields->add( 'repeater', [
				'name'   => 'sequence_items',
				'label'  => __( 'Sequence Items', 'tfr' ),
				'layout' => 'block',
				'sub_fields' => [

					$fields->add( 'text', [
						'name'    => 'heading',
						'label'   => __( 'Heading', 'tfr' ),
					] ),

					$fields->add( 'textarea', [
						'name'  => 'text',
						'label' => __( 'Text', 'tfr' )
					] ),
				]
			] ),
		];
	}
}
