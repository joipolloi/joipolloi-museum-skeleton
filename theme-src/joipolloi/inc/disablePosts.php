<?php

/**
 * Disables posts on site
 */

// Remove post page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit.php');
});
