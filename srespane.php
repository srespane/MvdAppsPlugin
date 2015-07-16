<?php
/**
 * Plugin Name: srespane
 * Plugin URI: http://e-cerebrum.com
 * Description: Este plugin agrega una appStore a tu wordpress
 * Version: 1.0.0
 * Author: Santiago Respane
 * Author URI: https://twitter.com/lagartoSan
 * License: GPL2
 **/
require_once('includes/adminMenu.php');
require_once('includes/db.php');
require_once('includes/clases/apps.php');
require_once('includes/clases/flow.php');
require_once('includes/clases/transparency.php');


MvdApps::init();
MvdFlow::init();
MvdTransparency::init();

/*AAAA PROBAR!*/
/*function loopThroughPosts(){
    $the_query = new WP_Query( 'cat=4' );

    // The Loop
    if ( $the_query->have_posts() ) {
        echo '<ul>';
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            echo '<li>' . get_the_title() . '</li>';
            if ( has_post_thumbnail() ) {
                echo get_the_post_thumbnail( get_the_ID(), 'thumbnail' );
            }
        }
        echo '</ul>';
    } else {
        // no posts found
    }
    wp_reset_postdata();
}*/

?>