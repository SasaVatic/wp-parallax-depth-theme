<?php
// features page
function features_meta_box()
{
  add_meta_box(
    'features_fields',
    'Features Page Fields',
    'features_fields_callback',
    'page',
    'normal',
    'high'
  );
}
add_action('add_meta_boxes', 'features_meta_box');

function features_fields_callback($post)
{
  if (get_page_template_slug($post) != 'page-features.php')
    return;

  wp_nonce_field('features_fields_nonce', 'features_fields_nonce');

  $heading = get_post_meta($post->ID, '_features_heading', true);
  ?>

  <label for="features_heading"><strong>Heading</strong></label><br>
  <input type="text" id="features_heading" name="features_heading" value="<?php echo esc_attr($heading); ?>"
    style="width:100%;">

  <?php
  $cards = get_post_meta($post->ID, '_features_cards', true);
  if (!is_array($cards))
    $cards = [];

  for ($i = 0; $i < 6; $i++) {
    $icon = $cards[$i]['icon'] ?? '';
    $title = $cards[$i]['title'] ?? '';
    $text = $cards[$i]['text'] ?? '';
    ?>
    <p><strong>Card <?php echo $i + 1; ?>:</strong></p>
    <label>Icon:</label><br>
    <input type="text" name="features_cards[<?php echo $i; ?>][icon]" value="<?php echo esc_attr($icon); ?>"
      style="width:50px;"><br>
    <label>Title:</label><br>
    <input type="text" name="features_cards[<?php echo $i; ?>][title]" value="<?php echo esc_attr($title); ?>"
      style="width:100%;"><br>
    <label>text:</label><br>
    <textarea name="features_cards[<?php echo $i; ?>][text]"
      style="width:100%;"><?php echo esc_textarea($text); ?></textarea>
    <hr>
    <?php
  }
}

function save_features_fields($post_id)
{
  if (!isset($_POST['features_fields_nonce']) || !wp_verify_nonce($_POST['features_fields_nonce'], 'features_fields_nonce'))
    return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
    return;
  if (!current_user_can('edit_post', $post_id))
    return;

  if (isset($_POST['features_cards']) && is_array($_POST['features_cards'])) {
    $cards = [];
    foreach ($_POST['features_cards'] as $card) {
      $cards[] = [
        'icon' => sanitize_text_field($card['icon'] ?? ''),
        'title' => sanitize_text_field($card['title'] ?? ''),
        'text' => sanitize_textarea_field($card['text'] ?? ''),
      ];
    }
    update_post_meta($post_id, '_features_cards', $cards);
  }
}
add_action('save_post', 'save_features_fields');