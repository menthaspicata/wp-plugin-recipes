<?php

function recipes_wp_add_new_steps() {
    global $typenow;
    if( $typenow == 'resipes') {
      

        wp_register_script( 'step-box', RECIP_URL . 'js/recipes_wp_add_steps.js', array( 'jquery' ), '1.0' );
        wp_enqueue_script( 'step-box' );
    }
}

add_action( 'admin_enqueue_scripts', 'recipes_wp_add_new_steps' );