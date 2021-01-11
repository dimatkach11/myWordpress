<?php

add_action('wp_enqueue_scripts', 'style_theme');

function style_theme() {
  echo 'collegamento dei miei script';
}