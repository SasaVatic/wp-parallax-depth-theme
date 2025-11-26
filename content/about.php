<?php
// about page
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
  $cards = get_post_meta($post->ID, '_about_cards', true);
  if (!is_array($cards))
    $cards = [];

  for ($i = 0; $i < 2; $i++) {
    $icon = $cards[$i]['icon'] ?? '';
    $title = $cards[$i]['title'] ?? '';
    $text = $cards[$i]['text'] ?? '';
    ?>
    <hr>
    <p><strong>Card <?php echo $i + 1; ?></strong></p>
    <label>Icon:</label><br>
    <input type="text" name="about_cards[<?php echo $i; ?>][icon]" value="<?php echo esc_attr($icon); ?>"
      style="width:50px;"><br>
    <label>Title:</label><br>
    <input type="text" name="about_cards[<?php echo $i; ?>][title]" value="<?php echo esc_attr($title); ?>"
      style="width:100%;">
    <label>Text:</label><br>
    <textarea name="about_cards[<?php echo $i; ?>][text]" style="width:100%;"><?php echo esc_textarea($text); ?></textarea>
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
        'icon' => sanitize_text_field($card['icon'] ?? ''),
        'title' => sanitize_text_field($card['title'] ?? ''),
        'text' => sanitize_textarea_field($card['text'] ?? '')
      ];
    }
    update_post_meta($post_id, '_about_cards', $cards);
  }
}
add_action('save_post', 'save_about_fields');