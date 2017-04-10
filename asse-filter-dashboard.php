<?php

// @codingStandardsIgnoreFile

function removeDashboardWidgets()
{
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
}
if (defined('ASSE_DISABLE_DEFAULT_DASHBOARD_WIDGETS') && ASSE_DISABLE_DEFAULT_DASHBOARD_WIDGETS === true) {
    add_action('wp_dashboard_setup', 'removeDashboardWidgets');
}

function remove_core_updates(){
    global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');
