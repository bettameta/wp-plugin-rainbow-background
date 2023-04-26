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
        echo '<style>
            #rb-container {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
            }

            #rb-rainbow {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                transition: background-color 1s ease-in-out;
            }
        </style>';
        echo '<div id="rb-container"><div id="rb-rainbow"></div></div>';
        ?>
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
add_action( 'wp_head', 'rb_add_rainbow' );
