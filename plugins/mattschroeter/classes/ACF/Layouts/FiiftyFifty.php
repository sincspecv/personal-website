<?php


namespace MS\ACF\Layouts;

use TFR\ACFToPost\Util\FieldGenerator;
use TFR\ACFToPost\Base\Layout;

class FiiftyFifty extends Layout {

	public function __construct() {
		parent::__construct();

		$this->setName( '50_50' );
		$this->setLabel( __( '50/50', 'tfr' ) );
		$this->setRepeaters( ['modules', 'service_modules', 'post_modules'] );
	}

	public function setFields() {
		$fields = new FieldGenerator( $this->getKey() );

		$this->fields = [
			$fields->add( 'repeater', [
				'name'       => 'rows',
				'label'      => __( 'Rows', 'tfr' ),
				'layout'     => 'block',
				'sub_fields' => [

					$fields->add( 'image', [
						'name'  => 'image',
						'label' => __( 'Image', 'tfr' ),
					]),

					$fields->add( 'wysiwyg', [
						'name'  => 'text',
						'label' => __( 'Text', 'tfr' ),
					]),
				]
			]),
		];
	}
}
