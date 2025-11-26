<?php
// home page
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