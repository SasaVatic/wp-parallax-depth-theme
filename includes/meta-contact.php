<?php
// contact page
function contact_meta_box()
{
  add_meta_box(
    'contact_fields',
    'Contact Page Fields',
    'contact_fields_callback',
    'page',
    'normal',
    'high'
  );
}
add_action('add_meta_boxes', 'contact_meta_box');

function contact_fields_callback($post)
{
  if (get_page_template_slug($post) != 'page-contact.php')
    return;

  wp_nonce_field('contact_fields_nonce', 'contact_fields_nonce');

  $heading = get_post_meta($post->ID, '_contact_heading', true);
  $form_heading = get_post_meta($post->ID, '_contact_form_heading', true);
  $email = get_post_meta($post->ID, '_contact_email', true);
  $phone = get_post_meta($post->ID, '_contact_phone', true);
  $address = get_post_meta($post->ID, '_contact_address', true);
  $website = get_post_meta($post->ID, '_contact_website', true);
  ?>

  <label for="contact_heading"><strong>Heading</strong></label><br>
  <input type="text" id="contact_heading" name="contact_heading" value="<?php echo esc_attr($heading); ?>"
    style="width:100%;"><br><br>
  <label for="contact_form_heading"><strong>Form Heading</strong></label><br>
  <input type="text" id="contact_form_heading" name="contact_form_heading" value="<?php echo esc_attr($form_heading); ?>"
    style="width:100%;"><br><br>
  <label>Email:</label><br>
  <input type="text" name="contact_email" value="<?php echo esc_attr($email); ?>" style="width:100%;"><br>
  <label>Phone:</label><br>
  <input type="text" name="contact_phone" value="<?php echo esc_attr($phone); ?>" style="width:100%;"><br>
  <label>Address:</label><br>
  <input type="text" name="contact_address" value="<?php echo esc_attr($address); ?>" style="width:100%;"><br>
  <label>Website:</label><br>
  <input type="text" name="contact_website" value="<?php echo esc_attr($website); ?>" style="width:100%;"><br>
  <?php
}

function save_contact_fields($post_id)
{
  if (!isset($_POST['contact_fields_nonce']) || !wp_verify_nonce($_POST['contact_fields_nonce'], 'contact_fields_nonce'))
    return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
    return;
  if (!current_user_can('edit_post', $post_id))
    return;

  update_post_meta($post_id, '_contact_heading', sanitize_text_field($_POST['contact_heading'] ?? ''));
  update_post_meta($post_id, '_contact_form_heading', sanitize_text_field($_POST['contact_form_heading'] ?? ''));
  update_post_meta($post_id, '_contact_email', sanitize_text_field($_POST['contact_email'] ?? ''));
  update_post_meta($post_id, '_contact_phone', sanitize_text_field($_POST['contact_phone'] ?? ''));
  update_post_meta($post_id, '_contact_address', sanitize_text_field($_POST['contact_address'] ?? ''));
  update_post_meta($post_id, '_contact_website', sanitize_text_field($_POST['contact_website'] ?? ''));
}
add_action('save_post', 'save_contact_fields');
