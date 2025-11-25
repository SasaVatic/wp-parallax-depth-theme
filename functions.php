<?php
function parallax_styles()
{
  wp_enqueue_style('parallax-style', get_template_directory_uri() . '/css/main.css', [], filemtime(get_template_directory() . '/css/main.css'));
}

function get_page_title()
{
  add_theme_support('title-tag');
}

add_action('wp_enqueue_scripts', 'parallax_styles');
add_action('after_setup_theme', 'get_page_title');
