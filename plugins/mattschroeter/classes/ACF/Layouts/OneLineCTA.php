<?php


namespace MS\ACF\Layouts;

use TFR\ACFToPost\Util\FieldGenerator;
use TFR\ACFToPost\Base\Layout;

class OneLineCTA extends Layout {

	public function __construct() {
		parent::__construct();

		$this->setName( 'one_line_cta' );
		$this->setLabel( __( 'One Line CTA', 'tfr' ) );
		$this->setRepeaters( ['modules', 'service_modules', 'post_modules'] );
	}

	public function setFields() {
		$fields = new FieldGenerator( $this->getKey() );

		$this->fields = [
			$fields->add( 'text', [
				'name'  => 'text',
				'label' => __( 'CTA Text', 'tfr' ),
			]),

			$fields->add( 'link', [
				'name'  => 'link',
				'label' => __( 'CTA Link', 'tfr' ),
			]),
		];
	}
}
