<?php
/**
 * Class Name: Navwalker
 * Description: An extended Wordpress Navwalker object that displays Bulma framework's Navbar https://bulma.io/ in Wordpress.
 * Author: Carlo Operio - https://www.linkedin.com/in/carlooperio/, Bulma-Framework
 * Author URI: https://github.com/wp-bootstrap
 * License: GPL-3.0+
 * License URI: https://github.com/Poruno/Bulma-Navwalker/blob/master/LICENSE
 */

namespace App\Navigation;

use Walker_Nav_Menu;

class Navwalker extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = array() ) {

        $output .= "<div class='navbar-dropdown'>";
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

        $liClasses = 'navbar-item '.$item->title;

        $hasChildren = $args->walker->has_children;
        $liClasses .= $hasChildren? " has-dropdown is-hoverable": "";

        if($hasChildren){
            $output .= "<div class='".$liClasses."'>";
            $output .= "\n<a class='navbar-link is-arrowless' href='".$item->url."'>".$item->title."</a>";
        }
        else {
            $output .= "<a class='".$liClasses."' href='".$item->url."'>".$item->title;
        }

        // Adds has_children class to the item so end_el can determine if the current element has children
        if ( $hasChildren ) {
            $item->classes[] = 'has_children';
        }
    }

    public function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0 ){

        if(in_array("has_children", $item->classes)) {

            $output .= "</div>";
        }
        $output .= "</a>";
    }

    public function end_lvl (&$output, $depth = 0, $args = array()) {

        $output .= "</div>";
    }
}

/*
Copyright (c) 2018 Carlo Operio

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
 */
