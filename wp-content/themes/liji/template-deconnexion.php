<?php /* Template Name: Deconnexion */

session_start();

$urlLogout = esc_url(home_url($web['pages']['home']['slug']));

wp_logout();

wp_safe_redirect($urlLogout, $status = 302, $x_redirect_by = 'WordPress');
exit();