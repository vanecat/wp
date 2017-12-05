<?php
/**
 * Created by PhpStorm.
 * User: ivanvelev
 * Date: 11/29/17
 * Time: 6:37 PM
 */

function ivv_test_print() {
    return 'ivan!';
}

add_shortcode('ivv_test_print', 'ivv_test_print');