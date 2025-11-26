<?php
/* Template Name: Gallery Page */
get_header();
$heading = get_post_meta(get_the_ID(), '_gallery_heading', true);
$gallery_items = get_post_meta(get_the_ID(), '_gallery_items', true);
$fallbacks = [
  [
    'img' => 'https://images.unsplash.com/photo-1633356122544-f134324a6cee?w=600&h=300&fit=crop',
    'title' => 'Deep Space',
    'subtitle' => 'Infinite parallax layers'
  ],
  [
    'img' => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=600&h=300&fit=crop',
    'title' => 'Ocean Depths',
    'subtitle' => 'Underwater perspectives'
  ],
  [
    'img' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600&h=300&fit=crop',
    'title' => 'Mountain Peaks',
    'subtitle' => 'Elevation changes'
  ],
  [
    'img' => 'https://images.unsplash.com/photo-1514565131-fce0801e5785?w=600&h=300&fit=crop',
    'title' => 'City Lights',
    'subtitle' => 'Urban depth fields'
  ],
  [
    'img' => 'https://images.unsplash.com/photo-1618005198919-d3d4b5a92ead?w=600&h=300&fit=crop',
    'title' => 'Abstract Realm',
    'subtitle' => 'Geometric dimensions'
  ],
  [
    'img' => 'https://images.unsplash.com/photo-1604076913837-52ab5629fba9?w=600&h=300&fit=crop',
    'title' => 'Time Warp',
    'subtitle' => 'Temporal layers'
  ],
  [
    'img' => 'https://images.unsplash.com/photo-1534996858221-380b92700493?w=600&h=300&fit=crop',
    'title' => 'Aurora Borealis',
    'subtitle' => 'Natural light phenomena'
  ],
  [
    'img' => 'https://images.unsplash.com/photo-1446776653964-20c1d3a81b06?w=600&h=300&fit=crop',
    'title' => 'Digital Matrix',
    'subtitle' => 'Cyber dimensions'
  ],
];

if (!is_array($gallery_items)) {
  $gallery_items = [['img' => '', 'title' => '', 'subtitle' => ''], ['img' => '', 'title' => '', 'subtitle' => ''], ['img' => '', 'title' => '', 'subtitle' => ''], ['img' => '', 'title' => '', 'subtitle' => ''], ['img' => '', 'title' => '', 'subtitle' => ''], ['img' => '', 'title' => '', 'subtitle' => ''], ['img' => '', 'title' => '', 'subtitle' => ''], ['img' => '', 'title' => '', 'subtitle' => ''],];
}
?>

<main>
  <!-- Gallery Section -->
  <section class="gallery-section section-gradient" id="gallery">
    <div class="container">
      <h1 class="section-title"><?php echo $heading ? esc_html($heading) : 'Dynamic Gallery' ?></h1>
      <div class="gallery-grid">
        <?php foreach ($gallery_items as $index => $item): ?>
          <div class="gallery-item">
            <img src=<?php echo $item['img'] ? esc_html($item['img']) : $fallbacks[$index]['img'] ?> alt=<?php echo $item['title'] ? esc_html($item['title']) : '' ?> class="gallery-image" />
            <div class="gallery-overlay">
              <h2 class="gallery-title">
                <?php echo $item['title'] ? esc_html($item['title']) : $fallbacks[$index]['title'] ?>
              </h2>
              <p class="gallery-subtitle">
                <?php echo $item['subtitle'] ? esc_html($item['subtitle']) : $fallbacks[$index]['subtitle'] ?>
              </p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Navigation -->
    <a href="/features" class="nav-btn-prev" title="Previous Page">
      <div class="hexagon">
        <span class="hex-content">▲</span>
      </div>
    </a>
    <a href="/contact" class="nav-btn-next" title="Next Page">
      <div class="pyramid">
        <div class="pyramid-face"></div>
        <div class="pyramid-face"></div>
        <div class="pyramid-face"></div>
        <div class="pyramid-face"></div>
        <div class="pyramid-base"></div>
        <span class="pyramid-inner">▼</span>
      </div>
    </a>
  </section>
</main>

<?php get_footer() ?>