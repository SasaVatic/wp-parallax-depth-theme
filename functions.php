<?php
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

// content
function home_meta_box()
{
  add_meta_box(
    'home_fields',
    'Home Page Fields',
    'home_fields_callback',
    'page',
    'normal',
    'high'
  );
}
add_action('add_meta_boxes', 'home_meta_box');
function home_fields_callback($post)
{
  if (get_page_template_slug($post) != 'front-page.php')
    return;

  wp_nonce_field('home_fields_nonce', 'home_fields_nonce');

  $heading = get_post_meta($post->ID, '_home_heading', true);
  $intro_text = get_post_meta($post->ID, '_home_intro', true);
  ?>
  <p>
    <label for="home_heading"><strong>Heading</strong></label><br>
    <input type="text" id="home_heading" name="home_heading" value="<?php echo esc_attr($heading); ?>"
      style="width:100%;">
  </p>
  <p>
    <label for="home_intro"><strong>Intro Text</strong></label><br>
    <textarea id="home_intro" name="home_intro" style="width:100%;"><?php echo esc_textarea($intro_text); ?></textarea>
  </p><?php
}
function save_home_fields($post_id)
{
  if (!isset($_POST['home_fields_nonce']) || !wp_verify_nonce($_POST['home_fields_nonce'], 'home_fields_nonce'))
    return;

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
    return;

  if (!current_user_can('edit_post', $post_id))
    return;

  if (isset($_POST['home_heading'])) {
    update_post_meta($post_id, '_home_heading', sanitize_text_field($_POST['home_heading']));
  }

  if (isset($_POST['home_intro'])) {
    update_post_meta($post_id, '_home_intro', sanitize_textarea_field($_POST['home_intro']));
  }
}
add_action('save_post', 'save_home_fields');

function about_meta_box()
{
  add_meta_box(
    'about_fields',
    'About Page Fields',
    'about_fields_callback',
    'page',
    'normal',
    'high'
  );
}
add_action('add_meta_boxes', 'about_meta_box');

function about_fields_callback($post)
{
  if (get_page_template_slug($post) != 'page-about.php')
    return;

  wp_nonce_field('about_fields_nonce', 'about_fields_nonce');

  $heading = get_post_meta($post->ID, '_about_heading', true);
  $subheading = get_post_meta($post->ID, '_about_subheading', true);
  $paragraph_one = get_post_meta($post->ID, '_about_paragraph_one', true);
  $paragraph_two = get_post_meta($post->ID, '_about_paragraph_two', true);
  $cards = get_post_meta($post->ID, '_about_cards', true);

  if (!is_array($cards))
    $cards = [
      ['title' => '', 'text' => ''],
      ['title' => '', 'text' => '']
    ];
  ?>
  <p>
    <label for="about_heading"><strong>Heading</strong></label><br>
    <input type="text" id="about_heading" name="about_heading" value="<?php echo esc_attr($heading); ?>"
      style="width:100%;">
  </p>
  <p>
    <label for="about_subheading"><strong>Subheading</strong></label><br>
    <input type="text" id="about_subheading" name="about_subheading" value="<?php echo esc_attr($subheading); ?>"
      style="width:100%;">
  </p>
  <p>
    <label for="about_paragraph_one"><strong>Paragraph One</strong></label><br>
    <textarea id="about_paragraph_one" name="about_paragraph_one"
      style="width:100%;"><?php echo esc_textarea($paragraph_one); ?></textarea>
  </p>
  <p>
    <label for="about_paragraph_two"><strong>Paragraph Two</strong></label><br>
    <textarea id="about_paragraph_two" name="about_paragraph_two"
      style="width:100%;"><?php echo esc_textarea($paragraph_two); ?></textarea>
  </p>
  <?php
  for ($i = 0; $i < 2; $i++) {
    $title = $cards[$i]['title'] ?? '';
    $text = $cards[$i]['text'] ?? '';
    ?>
    <hr>
    <p><strong>Card <?php echo $i + 1; ?></strong></p>
    <p>
      <label>Title:</label><br>
      <input type="text" name="about_cards[<?php echo $i; ?>][title]" value="<?php echo esc_attr($title); ?>"
        style="width:100%;">
    </p>
    <p>
      <label>Text:</label><br>
      <textarea name="about_cards[<?php echo $i; ?>][text]"
        style="width:100%;"><?php echo esc_textarea($text); ?></textarea>
    </p>
    <?php
  }
}

function save_about_fields($post_id)
{
  if (!isset($_POST['about_fields_nonce']) || !wp_verify_nonce($_POST['about_fields_nonce'], 'about_fields_nonce'))
    return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
    return;
  if (!current_user_can('edit_post', $post_id))
    return;

  update_post_meta($post_id, '_about_heading', sanitize_text_field($_POST['about_heading'] ?? ''));
  update_post_meta($post_id, '_about_subheading', sanitize_text_field($_POST['about_subheading'] ?? ''));
  update_post_meta($post_id, '_about_paragraph_one', sanitize_textarea_field($_POST['about_paragraph_one'] ?? ''));
  update_post_meta($post_id, '_about_paragraph_two', sanitize_textarea_field($_POST['about_paragraph_two'] ?? ''));

  if (isset($_POST['about_cards']) && is_array($_POST['about_cards'])) {
    $cards = [];
    foreach ($_POST['about_cards'] as $card) {
      $cards[] = [
        'title' => sanitize_text_field($card['title'] ?? ''),
        'text' => sanitize_textarea_field($card['text'] ?? '')
      ];
    }
    update_post_meta($post_id, '_about_cards', $cards);
  }
}
add_action('save_post', 'save_about_fields');