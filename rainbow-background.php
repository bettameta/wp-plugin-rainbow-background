<?php
/*
Plugin Name: Rainbow Background
Plugin URI: https://example.com/plugins/rainbow-background
Description: Adds a rainbow effect to the background of the homepage
Version: 1.0
Author: Reese St Amant
Author URI: https://bettameta.com/
License: GPL2
*/

// Add the necessary JavaScript and CSS files
function rb_enqueue_scripts() {
    wp_enqueue_script( 'rb-colors', plugin_dir_url( __FILE__ ) . 'rainbow-colors.js', array(), '1.0', true );
    wp_enqueue_style( 'rb-style', plugin_dir_url( __FILE__ ) . 'style.css', array(), '1.0' );
}

// Add the rainbow effect to the homepage
function rb_add_rainbow() {
    if ( is_front_page() ) {
        ?>
        <div id="rb-container">
            <div id="rb-rainbow"></div>
        </div>
        <script>
            var colors = ['#ff0000', '#ffa500', '#ffff00', '#008000', '#0000ff', '#4b0082', '#ee82ee'];
            var rainbow = document.getElementById('rb-rainbow');
            var position = 0;
            setInterval(function() {
                position++;
                if (position >= colors.length) {
                    position = 0;
                }
                rainbow.style.backgroundColor = colors[position];
            }, 1000);
        </script>
        <?php
    }
}

// Register the hooks
add_action( 'wp_enqueue_scripts', 'rb_enqueue_scripts' );
add_action( 'wp_footer', 'rb_add_rainbow' );
