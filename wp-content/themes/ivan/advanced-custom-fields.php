<?php
/**
 * Created by PhpStorm.
 * User: ivanvelev
 * Date: 11/29/17
 * Time: 6:56 PM
 */

$MY_ACF_LOAD_VALUE_ALLOWED_FIELDS = array('testa');

function my_acf_load_value( $value, $post_id, $field )
{
    global $MY_ACF_LOAD_VALUE_ALLOWED_FIELDS;
    if (!in_array( $field['name'], $MY_ACF_LOAD_VALUE_ALLOWED_FIELDS)) {
        return $value;
    }
    if (is_admin()) {
        return $value;
    }

    // run the_content filter on all textarea values
    $value = do_shortcode($value);
    return $value;
}


// acf/load_value - filter for every value load
add_filter('acf/load_value', 'my_acf_load_value', 10, 3);

// acf/load_value/type={$field_type} - filter for a value load based on it's field type
//add_filter('acf/load_value/type=select', 'my_acf_load_value', 10, 3);

// acf/load_value/name={$field_name} - filter for a specific value load based on it's field name
//add_filter('acf/load_value/name=my_select', 'my_acf_load_value', 10, 3);

// acf/load_value/key={$field_key} - filter for a specific field based on it's name
//add_filter('acf/load_value/key=field_508a263b40457', 'my_acf_load_value', 10, 3);




function my_acf_format_value( $value, $post_id, $field ) {

    // run do_shortcode on all textarea values
    $value = do_shortcode($value);


    // return
    return $value;
}

//add_filter('acf/format_value/type=textarea', 'my_acf_format_value', 10, 3);
