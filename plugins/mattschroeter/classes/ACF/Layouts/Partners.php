<?php


namespace MS\ACF\Layouts;

use TFR\ACFToPost\Util\FieldGenerator;
use TFR\ACFToPost\Base\Layout;

class Partners extends Layout {

	public function __construct() {
		parent::__construct();

		$this->setName( 'partners' );
		$this->setLabel( __( 'Partners', 'tfr' ) );
		$this->setRepeaters( ['modules'] );
	}

	public function setFields() {
		$fields = new FieldGenerator( $this->getKey() );

		$this->fields = [
			$fields->add( 'text', [
				'name'  => 'heading',
				'label' => __( 'Section Heading', 'tfr' )
			] ),

			$fields->add( 'wysiwyg', [
				'name'  => 'subtext',
				'label' => __( 'Sub Text', 'tfr' ),
			] ),

			$fields->add( 'repeater', [
				'name'   => 'partners',
				'label'  => __( 'Partners', 'tfr' ),
				'layout' => 'block',
				'sub_fields' => [

					$fields->add( 'image', [
						'name'    => 'image',
						'label'   => __( 'Image', 'tfr' )
					] )
				]
			] )

		];
	}
}
