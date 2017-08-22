<?php
/**
 * Plugin Name: WP Twilio Twiml
 * Plugin URI: https://github.com/csfreak/wp-twilio-twiml
 * Description: A plugin that extends wp-twilio-core to add support for twiml applications
 * Version: 0.9 
 * Author: Jason Ross
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */
 
 function twiml_custom_post_type()
 {
     register_post_type('twiml',
                       [
                           'labels'      => [
                               'name'          => __('TWIML'),
                               'singular_name' => __('TWIML'),
                           ],
                           'public'              => true,
                           'has_archive'         => false,
                           'heirarchical'        => true,
                           'exclude_from_search' => true,
                           'publicly_queryable'  => false,
                           'show_in_nav_menues'  => false,
                           'rewrite' => [
                               'slug'  => 'twiml',
                               'pages' => 'false',
                           ],
                           'can_export'          => false,
                       ]
                       )
 }
add_action( 'init', 'twiml_custom_post_type' );
 
function twiml_install()
{
    // trigger our function that registers the custom post type
    twiml_custom_post_type();
 
    // clear the permalinks after the post type has been registered
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'twiml_install' );

function twiml_deactivation()
{
    // our post type will be automatically removed, so no need to unregister it
 
    // clear the permalinks to remove our post type's rules
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'twiml_deactivation' );


