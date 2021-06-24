<?php
/**
 * AMP Facebook Fix.
 *
 * @package   AMP_Facebook_Fix.
 * @author    Milind, rtCamp
 * @license   GPL-2.0-or-later
 * @copyright 2020 rtCamp pvt. ltd.
 *
 * @wordpress-plugin
 * Plugin Name: AMP Facebook App Browser fix.
 * Description: The plugin temporary fix for <a href="https://developers.facebook.com/support/bugs/386564952789501/?join_id=f22e1cd3806adb8">Facebook redirection issue</a> it removes redirection script if it found Facebook's in app browser agents <code>FB_IAB</code>, <code>FB4A</code>, <code>FBAV</code>
 * Version: 0.0.1
 * Author: Milind, rtCamp
 * Author URI: https://wpindia.co.in/
 * License: GNU General Public License v2 (or later)
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

defined( 'ABSPATH' ) || exit;

/**
 * The function checks for browser user agents and removes redirection script if Facebook user agent found.
 *
 * @return void
 */
function amp_facebook_app_browser_fix() {

	// Get use agents.
	$user_agent = filter_input( INPUT_SERVER, 'HTTP_USER_AGENT', FILTER_SANITIZE_STRING );

	// If there is none return.
	if ( empty( $user_agent ) ) {
		return;
	}

	$is_facebook_app     = false; // facebook app browser flag.
	$facebook_app_agents = array( 'FB_IAB', 'FB4A', 'FBAV' ); // List of unique user agents for facebook app browser.

	// Loop facebook agents with recevied agnets.
	foreach ( $facebook_app_agents as $facebook_app_agent ) {
		if ( ! $is_facebook_app ) {

			// if found set flag true.
			if ( strpos( $user_agent, $facebook_app_agent ) !== false ) {
				$is_facebook_app = true;
			}
		}
	}

	// If flag is true remove the script, only works if user is not logged in or check preview in customizer.
	if ( $is_facebook_app ) {
		add_filter( 'amp_mobile_client_side_redirection', '__return_false' );
		add_filter( 'amp_pre_is_mobile', '__return_false' );
	}
}

add_action( 'wp', 'amp_facebook_app_browser_fix' );
