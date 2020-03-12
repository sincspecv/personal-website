<?php


namespace MS\ACF\Layouts;

use TFR\ACFToPost\Util\FieldGenerator;
use TFR\ACFToPost\Base\Layout;

class FiiftyFiftyForm extends Layout {

	public function __construct() {
		parent::__construct();

		$this->setName( '50_50_form' );
		$this->setLabel( __( '50/50 With Form', 'tfr' ) );
		$this->setRepeaters( ['modules', 'service_modules', 'post_modules'] );
	}

	public function setFields() {
		$fields = new FieldGenerator( $this->getKey() );

		$this->fields = [
			$fields->add( 'wysiwyg', [
				'name'  => 'text',
				'label' => __( 'Text', 'tfr' ),
			]),

			$fields->add( 'select', [
				'name'    => 'form',
				'label'   => __( 'Form', 'tfr' ),
				'choices' => $this->getFluentForms(),
			]),
		];
	}

	private function getFluentForms() {
		$forms = wpFluent()->table('fluentform_forms')->findAll('status', 'published');
		$formSelectChoices = [];
		foreach($forms as $form) {
			$formSelectChoices[$form->id] = $form->title;
		}

		return $formSelectChoices;
	}
}
