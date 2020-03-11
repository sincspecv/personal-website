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

    public static function pagination( $args = [] ) {
        global $wp_query, $wp_rewrite;

        $total = $wp_query->max_num_pages;
        $big = 999999999; // need an unlikely integer

        if( $total > 1 )  {
            if( !$current_page = get_query_var('paged') )
                $current_page = 1;
            if( get_option('permalink_structure') ) {
                $format = 'page/%#%/';
            } else {
                $format = '&paged=%#%';
            }

            // Setting up default values based on the current URL.
            $pagenum_link = html_entity_decode( get_pagenum_link() );
            $url_parts    = explode( '?', $pagenum_link );

            // Get max pages and current page out of the current query, if available.
            $current = max( 1, get_query_var('paged') );

            // Append the format placeholder to the base URL.
            $pagenum_link = str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) );

            $prev_arrow = is_rtl() ? '&gt;' : '&lt;';
            $next_arrow = is_rtl() ? '&lt;' : '&gt;';

            $defaults = [
                'base'               => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below)
                'format'             => $format, // ?page=%#% : %#% is replaced by the page number
                'total'              => $total,
                'current'            => $current,
                'aria_current'       => 'page',
                'show_all'           => false,
                'prev_next'          => true,
                'prev_text'          => $prev_arrow,
                'next_text'          => $next_arrow,
                'end_size'           => 1,
                'mid_size'           => 3,
                'type'               => 'array',
                'add_args'           => [], // array of query args to add
                'add_fragment'       => '',
                'before_page_number' => '',
                'after_page_number'  => '',
            ];

            $args = wp_parse_args( $args, $defaults );

            if ( ! is_array( $args['add_args'] ) ) {
                $args['add_args'] = [];
            }

            // Merge additional query vars found in the original URL into 'add_args' array.
            if ( isset( $url_parts[1] ) ) {
                // Find the format argument.
                $format       = explode( '?', str_replace( '%_%', $args['format'], $args['base'] ) );
                $format_query = isset( $format[1] ) ? $format[1] : '';
                wp_parse_str( $format_query, $format_args );

                // Find the query args of the requested URL.
                wp_parse_str( $url_parts[1], $url_query_args );

                // Remove the format argument from the array of query arguments, to avoid overwriting custom format.
                foreach ( $format_args as $format_arg => $format_arg_value ) {
                    unset( $url_query_args[ $format_arg ] );
                }

                $args['add_args'] = array_merge( $args['add_args'], urlencode_deep( $url_query_args ) );
            }

            // Who knows what else people pass in $args
            $total = (int) $args['total'];
            if ( $total < 2 ) {
                return;
            }
            $current  = (int) $args['current'];
            $end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.
            if ( $end_size < 1 ) {
                $end_size = 1;
            }
            $mid_size = (int) $args['mid_size'];
            if ( $mid_size < 0 ) {
                $mid_size = 2;
            }

            $add_args   = $args['add_args'];
            $r          = '';
            $page_links = array();
            $dots       = false;

            if ( $args['prev_next'] && $current && 1 < $current ) :
                $link = str_replace( '%_%', 2 == $current ? '' : $args['format'], $args['base'] );
                $link = str_replace( '%#%', $current - 1, $link );
                if ( $add_args ) {
                    $link = add_query_arg( $add_args, $link );
                }
                $link .= $args['add_fragment'];

                $page_links[] = sprintf(
                    '<a class="pagination-previous" href="%s" aria-label="previous">%s</a>',
                    /**
                     * Filters the paginated links for the given archive pages.
                     *
                     * @since 3.0.0
                     *
                     * @param string $link The paginated link URL.
                     */
                    esc_url( apply_filters( 'paginate_links', $link ) ),
                    $args['prev_text']
                );
            endif;

            for ( $n = 1; $n <= $total; $n++ ) :
                if ( $n == $current ) :
                    $page_links[] = sprintf(
                        '<span aria-current="%s" class="pagination-link is-current">%s</span>',
                        esc_attr( $args['aria_current'] ),
                        $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number']
                    );

                    $dots = true;
                else :
                    if ( $args['show_all'] || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
                        $link = str_replace( '%_%', 1 == $n ? '' : $args['format'], $args['base'] );
                        $link = str_replace( '%#%', $n, $link );
                        if ( $add_args ) {
                            $link = add_query_arg( $add_args, $link );
                        }
                        $link .= $args['add_fragment'];

                        $page_links[] = sprintf(
                            '<a class="pagination-link" href="%s">%s</a>',
                            /** This filter is documented in wp-includes/general-template.php */
                            esc_url( apply_filters( 'paginate_links', $link ) ),
                            $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number']
                        );

                        $dots = true;
                    elseif ( $dots && ! $args['show_all'] ) :
                        $page_links[] = '<span class="page-numbers dots">' . __( '&hellip;' ) . '</span>';

                        $dots = false;
                    endif;
                endif;
            endfor;

            if ( $args['prev_next'] && $current && $current < $total ) :
                $link = str_replace( '%_%', $args['format'], $args['base'] );
                $link = str_replace( '%#%', $current + 1, $link );
                if ( $add_args ) {
                    $link = add_query_arg( $add_args, $link );
                }
                $link .= $args['add_fragment'];

                $page_links[] = sprintf(
                    '<a class="pagination-next" href="%s" aria-label="next">%s</a>',
                    /** This filter is documented in wp-includes/general-template.php */
                    esc_url( apply_filters( 'paginate_links', $link ) ),
                    $args['next_text']
                );
            endif;

            ?>
            <nav class="pagination" role="navigation" aria-label="navigation">
                <ul class="pagination-list">
                    <?php foreach($page_links as $page) {
                        echo '<li>';
                            echo $page;
                        echo '</li>';
                    } ?>
                </ul>
            </nav>
            <?php
        }
    }
}
