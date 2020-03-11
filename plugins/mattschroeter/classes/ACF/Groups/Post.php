<?php


namespace MS\ACF\Groups;


use TFR\ACFToPost\Base\Group;
use TFR\ACFToPost\Util\FieldGenerator;

class Post extends Group {
	public function __construct() {
		parent::__construct();

		// Set the group parameters
		$this->setTitle( __( 'Post Content', 'tfr' ) );
		$this->setPostTypes( ['post'] );
		$this->setHiddenElements( ['the_content'] );
	}

	public function setFields() {
		if( !is_front_page() ) {
			$fields = new FieldGenerator($this->getKey());

			$this->fields = [
				$fields->add('text', [
					'name'  => 'subtitle',
					'label' => __('Subtitle', 'tfr')
				]),

				$fields->add('wysiwyg', [
					'name'  => 'intro_text',
					'label' => __('Intro Text', 'tfr')
				])
			];
		}
	}
}
