<?php
require get_template_directory() . '/content/home.php';
require get_template_directory() . '/content/about.php';
require get_template_directory() . '/content/features.php';
require get_template_directory() . '/content/gallery.php';
require get_template_directory() . '/content/contact.php';

// remove unicode filter
remove_action('wp_head', 'print_emoji_detection_script', 7);
// styles
function parallax_styles()
{
  wp_enqueue_style('parallax-style', get_template_directory_uri() . '/css/main.css', [], filemtime(get_template_directory() . '/css/main.css'));
}
add_action('wp_enqueue_scripts', 'parallax_styles');

// page head
function get_page_title()
{
  add_theme_support('title-tag');
}
add_action('after_setup_theme', 'get_page_title');

// scripts
function parallax_scripts()
{
  wp_enqueue_script(
    'parallax-main',
    get_template_directory_uri() . '/js/mouse-follower.js',
    [],
    filemtime(get_template_directory() . '/js/mouse-follower.js'),
    true
  );
}
add_action('wp_enqueue_scripts', 'parallax_scripts');

function home_page_scripts()
{
  if (!is_page_template('front-page.php'))
    return;

  wp_enqueue_script(
    'home-js',
    get_template_directory_uri() . '/js/parallax-layer.js',
    [],
    filemtime(get_template_directory() . '/js/parallax-layer.js'),
    true
  );
}
add_action('wp_enqueue_scripts', 'home_page_scripts');

function features_page_scripts()
{
  if (!is_page_template('page-features.php'))
    return;

  wp_enqueue_script(
    'features-js',
    get_template_directory_uri() . '/js/carousel.js',
    [],
    filemtime(get_template_directory() . '/js/carousel.js'),
    true
  );
}
add_action('wp_enqueue_scripts', 'features_page_scripts');

function gallery_page_scripts()
{
  if (!is_page_template('page-gallery.php'))
    return;

  wp_enqueue_script(
    'gallery-js',
    get_template_directory_uri() . '/js/fade-in-animation.js',
    [],
    filemtime(get_template_directory() . '/js/fade-in-animation.js'),
    true
  );
}
add_action('wp_enqueue_scripts', 'gallery_page_scripts');
function contact_page_scripts()
{
  if (!is_page_template('page-contact.php'))
    return;

  wp_enqueue_script(
    'contact-js',
    get_template_directory_uri() . '/js/form.js',
    [],
    filemtime(get_template_directory() . '/js/form.js'),
    true
  );
}
add_action('wp_enqueue_scripts', 'contact_page_scripts');
