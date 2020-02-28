<?php


namespace MS\ACF\Layouts;

use TFR\ACFToPost\Util\FieldGenerator;
use TFR\ACFToPost\Base\Layout;

class Testimonial extends Layout {

	public function __construct() {
		parent::__construct();

		$this->setName( 'testimonial' );
		$this->setLabel( __( 'Testimonial', 'tfr' ) );
		$this->setRepeaters( ['modules'] );
	}

	public function setFields() {
		$fields = new FieldGenerator( $this->getKey() );

		$this->fields = [
			$fields->add( 'text', [
				'name'  => 'testimonial',
				'label' => __( 'Testimonial Text', 'tfr' ),
			]),

			$fields->add( 'text', [
				'name'  => 'attribution_name',
				'label' => __( 'Attribution Name', 'tfr' ),
				'wrapper' => [
					'width' => '50%'
				]
			]),

			$fields->add( 'text', [
				'name'  => 'attribution_org',
				'label' => __( 'Attribution Organization', 'tfr' ),
				'wrapper' => [
					'width' => '50%'
				]
			]),
		];
	}
}
