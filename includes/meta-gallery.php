<?php
// gallery page
function gallery_meta_box()
{
  add_meta_box(
    'gallery_fields',
    'Gallery Page Fields',
    'gallery_fields_callback',
    'page',
    'normal',
    'high'
  );
}
add_action('add_meta_boxes', 'gallery_meta_box');

function gallery_fields_callback($post)
{
  if (get_page_template_slug($post) != 'page-gallery.php')
    return;

  wp_nonce_field('gallery_fields_nonce', 'gallery_fields_nonce');

  $heading = get_post_meta($post->ID, '_gallery_heading', true);
  ?>
  <p>
    <label for="gallery_heading"><strong>Heading</strong></label><br>
    <input type="text" id="gallery_heading" name="gallery_heading" value="<?php echo esc_attr($heading); ?>"
      style="width:100%;">
  </p>
  <?php

  $gallery_items = get_post_meta($post->ID, '_gallery_items', true);
  if (!is_array($gallery_items))
    $gallery_items = [];

  for ($i = 0; $i < 8; $i++) {
    $img = $gallery_items[$i]['img'] ?? '';
    $title = $gallery_items[$i]['title'] ?? '';
    $subtitle = $gallery_items[$i]['subtitle'] ?? '';
    ?>
    <hr>
    <p><strong>Gallery Item <?php echo $i + 1; ?></strong></p>
    <label>Image URL:</label><br>
    <input type="text" name="gallery_items[<?php echo $i; ?>][img]" value="<?php echo esc_url($img); ?>"
      style="width:100%;"><br>
    <label>Title:</label><br>
    <input type="text" name="gallery_items[<?php echo $i; ?>][title]" value="<?php echo esc_attr($title); ?>"
      style="width:100%;"><br>
    <label>Subtitle:</label><br>
    <input type="text" name="gallery_items[<?php echo $i; ?>][subtitle]" value="<?php echo esc_attr($subtitle); ?>"
      style="width:100%;">
    <?php
  }
}

function save_gallery_fields($post_id)
{
  if (!isset($_POST['gallery_fields_nonce']) || !wp_verify_nonce($_POST['gallery_fields_nonce'], 'gallery_fields_nonce'))
    return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
    return;
  if (!current_user_can('edit_post', $post_id))
    return;

  update_post_meta($post_id, '_gallery_heading', sanitize_text_field($_POST['gallery_heading'] ?? ''));

  if (isset($_POST['gallery_items']) && is_array($_POST['gallery_items'])) {
    $gallery_items = [];
    foreach ($_POST['gallery_items'] as $item) {
      $gallery_items[] = [
        'img' => esc_url_raw($item['img'] ?? ''),
        'title' => sanitize_text_field($item['title'] ?? ''),
        'subtitle' => sanitize_text_field($item['subtitle'] ?? '')
      ];
    }
    update_post_meta($post_id, '_gallery_items', $gallery_items);
  }
}
add_action('save_post', 'save_gallery_fields');