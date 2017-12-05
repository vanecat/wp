<?php
/**
 * Created by PhpStorm.
 * User: ivanvelev
 * Date: 11/28/17
 * Time: 12:33 PM
 */

require('shortcodes.php');
require('advanced-custom-fields.php');



function wpb_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

function my_mce_before_init_insert_formats( $init_array ) {

// Define the style_formats array

    $style_formats = array(
        /*
        * Each array child is a format with it's own settings
        * Notice that each array has title, block, classes, and wrapper arguments
        * Title is the label which will be visible in Formats menu
        * Block defines whether it is a span, div, selector, or inline style
        * Classes allows you to define CSS classes
        * Wrapper whether or not to add a new block-level element around any selected elements
        */
          array(
                'title' => 'Content Block',
                'inline' => 'span',
                'classes' => 'content-block',
                'wrapper' => true,

          ),
          array(
                'title' => 'Blue Button',
                'inline' => 'span',
                'classes' => 'blue-button',
                'wrapper' => true,
          ),
          array(
                'title' => 'Red Button',
                'inline' => 'span',
                'classes' => 'red-button',
                'wrapper' => true,
          ),
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );

    return $init_array;

}

function wpdocs_theme_add_editor_styles() {
    add_editor_style( 'editor-styles-ivan.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );

// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );
