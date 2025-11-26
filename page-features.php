<?php
/* Template Name: Features Page*/
get_header();
$heading = get_post_meta(get_the_ID(), '_features_heading', true);
$cards = get_post_meta(get_the_ID(), '_features_cards', true);

if (!is_array($cards))
  $cards = [['icon' => '', 'title' => '', 'text' => ''], ['icon' => '', 'title' => '', 'text' => ''], ['icon' => '', 'title' => '', 'text' => ''], ['icon' => '', 'title' => '', 'text' => ''], ['icon' => '', 'title' => '', 'text' => ''], ['icon' => '', 'title' => '', 'text' => '']]
    ?>

  </main>
  <!-- Features Section with 3D Carousel -->
  <section class="content-section features-section-bg" id="features">
    <!-- Grid Overlay -->
    <div class="features-grid-overlay">
      <div class="features-grid"></div>
      <div class="features-grid-large"></div>
    </div>

    <div class="container">
      <h2 class="section-title"><?php echo $heading ? esc_html($heading) : 'Layered Features'; ?></h2>
    <div class="features-container">
      <div class="carousel-3d" id="carousel">
        <?php foreach ($cards as $index => $card): ?>
          <?php
          if ($index === 0) {
            $fallback_icon = '🚀';
            $fallback_title = 'Speed Layers';
            $fallback_text = 'Multiple parallax layers moving at different speeds create
              realistic depth perception as you scroll through the experience.';
          } elseif ($index === 1) {
            $fallback_icon = '✨';
            $fallback_title = '3D Transforms';
            $fallback_text = 'Elements respond to interactions with smooth 3D rotations and
            translations, creating an engaging visual hierarchy.';
          } elseif ($index === 2) {
            $fallback_icon = '🎨';
            $fallback_title = 'Gradient Mastery';
            $fallback_text = 'Dynamic gradients and color transitions guide the eye through
            different depth levels, enhancing the parallax effect.';
          } elseif ($index === 3) {
            $fallback_icon = '💫';
            $fallback_title = 'Floating Elements';
            $fallback_text = 'Cards and orbs float independently, each with unique animation
            timing to create organic movement patterns.';
          } elseif ($index === 4) {
            $fallback_icon = '🌊';
            $fallback_title = 'Smooth Scrolling';
            $fallback_text = 'Optimized performance ensures buttery-smooth scrolling even with
            multiple animated layers and effects.';
          } elseif ($index === 5) {
            $fallback_icon = '🎯';
            $fallback_title = 'Interactive Focus';
            $fallback_text = 'Mouse-following effects and hover states add another dimension
            of interactivity to the parallax experience.';
          }
          ?>
          <div class="feature-card-3d" data-index=<?php echo "{$index}" ?>>
            <span class="feature-number"><?php echo $index < 10 ? "0" . ($index + 1) : ($index + 1); ?></span>
            <div class="feature-icon-3d"><?php echo $card['icon'] ? esc_html($card['icon']) : $fallback_icon; ?></div>
            <h3 class="feature-title-3d"><?php echo $card['title'] ? esc_html($card['title']) : $fallback_title; ?></h3>
            <p class="feature-description-3d">
              <?php echo $card['text'] ? esc_html($card['text']) : $fallback_text; ?>
            </p>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="carousel-controls">
        <div class="carousel-btn" id="prevBtn">◀</div>
        <div class="carousel-btn" id="nextBtn">▶</div>
      </div>
      <div class="carousel-indicators" id="indicators"></div>
    </div>
  </div>

  <!-- Navigation -->
  <a href="#about" class="nav-btn-prev" title="Previous Page">
    <div class="hexagon">
      <span class="hex-content">▲</span>
    </div>
  </a>
  <a href="#gallery" class="nav-btn-next" title="Next Page">
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