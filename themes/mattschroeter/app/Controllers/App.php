<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    /**
     * Social media accounts defined in site settings
     *
     * @return object
     */
    public function social_media() {
        return json_decode(json_encode(get_field('social_accounts', 'site_settings')));
    }

    /**
     * Slug for ACF modules based on post type. This variable is used in the modules.blade.php template.
     *
     * @return string
     */
    public function modules_slug() {
        return get_post_type() . '_modules';
    }
}
