<?php
/*
Template Name: Request
*/

global $wpdb;

$creches = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}content");
echo json_encode($creches);

