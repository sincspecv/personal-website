<?php


namespace MS\ACF\Layouts;

use TFR\ACFToPost\Util\FieldGenerator;
use TFR\ACFToPost\Base\Layout;

class CascadingServices extends Layout {

	public function __construct() {
		parent::__construct();

		$this->setName( 'cascading_services' );
		$this->setLabel( __( 'Cascading Services', 'tfr' ) );
		$this->setRepeaters( ['modules', 'post_modules'] );
	}

	public function setFields() {
		$fields = new FieldGenerator( $this->getKey() );

		$this->fields = [
			$fields->add( 'repeater', [
				'name'   => 'blocks',
				'label'  => __( 'Blocks', 'tfr' ),
				'layout' => 'block',
				'sub_fields' => [

					$fields->add( 'text', [
						'name'    => 'icon_class',
						'label'   => __( 'Icon Class', 'tfr' ),
						'wrapper' => [
							'width' => '25%'
						]
					] ),

					$fields->add( 'text', [
						'name'    => 'heading',
						'label'   => __( 'Heading', 'tfr' ),
						'wrapper' => [
							'width' => '75%'
						]
					] ),

					$fields->add( 'wysiwyg', [
						'name'  => 'text',
						'label' => __( 'Text', 'tfr' )
					] ),

					$fields->add( 'link', [
						'name'  => 'link',
						'label' => __( 'Link', 'tfr' )
					] ),
				]
			] ),
		];
	}
}
