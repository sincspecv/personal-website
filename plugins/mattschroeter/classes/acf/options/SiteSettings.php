<?php

namespace MS\ACF\Options;

class SiteSettings {
	const SLUG = 'site_settings';
	const SOCIAL_GROUP = 'social_media';

	public static function init() 	{
		add_action('acf/init', [self::class, 'additions']);
	}

	public static function additions() 	{
		if (!function_exists('acf_add_options_page')) {
			return;
		}

		acf_add_options_page([
			'page_title' => __('Site Settings', 'tfr'),
			'menu_title' => __('Site Settings', 'tfr'),
			'menu_slug'  => self::SLUG,
			'post_id'    => self::SLUG,
			'capability' => 'manage_options',
		]);

		acf_add_local_field_group([
			'key'      => 'social_media',
			'title'    => __('Social Media', 'tfr'),
			'fields'   => [
				[
					'key'          => self::SOCIAL_GROUP . '_accounts',
					'label'        => __('Accounts', 'tfr'),
					'type'         => 'repeater',
					'name'         => 'social_accounts',
					'button_label' => __('Add Account', 'tfr'),
					'layout'       => 'block',
					'sub_fields'   => [

						[
							'key'     => self::SOCIAL_GROUP . '_link',
							'label'   => __('Link', 'tfr'),
							'type'    => 'url',
							'name'    => 'link',
							'wrapper' => [
								'width' => 50,
							],
						],
						[
							'key'     => self::SOCIAL_GROUP . '_network',
							'label'   => __('Network', 'tfr'),
							'type'    => 'select',
							'name'    => 'network',
							'choices' => [
								'facebook'  => 'Facebook',
								'twitter'   => 'Twitter',
								'youtube'   => 'YouTube',
								'instagram' => 'Instagram',
								'linkedin'  => 'LinkedIn',
								'flickr'    => 'Flickr',
								'github'    => 'GitHub',
							],
							'wrapper' => [
								'width' => 50,
							],
						],
					],
				],
			],
			'location' => [
				[
					[
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => self::SLUG,
					],
				],
			],
		]);
	}
}
