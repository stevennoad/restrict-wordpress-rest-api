<?php
/*
Plugin Name: Restrict REST API Access
Plugin URI:  https://github.com/stevennoad/restrict-wordpress-rest-api
Description: Restricts access to the WordPress REST API to authenticated users only.
Version:     1.0.1
Author:      Steve Noad
License:     MIT
Text Domain: restrict-wordpress-rest-api
*/

// Prevent direct access to the file
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// Add the filter to restrict REST API access
add_filter( 'rest_authentication_errors', function( $result ) {
  if (true === $result || is_wp_error($result)) {
		return $result;
	}

	if ( ! is_user_logged_in() ) {
    return new WP_Error( 'Unauthorized', 'Authentication credentials are missing or invalid. Please provide a valid API token.', array( 'status' => 401 ) );
  }
  return $result;
});

// Wordpress auto updater
require 'includes/plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
  'https://github.com/stevennoad/restrict-wordpress-rest-api/',
  __FILE__,
  'restrict-wordpress-rest-api'
);

// Set the branch that contains the stable release.
$myUpdateChecker->getVcsApi()->enableReleaseAssets();
