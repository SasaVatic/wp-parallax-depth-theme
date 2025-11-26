<?php
/* Template Name: About Page*/
get_header();
$page_id = get_the_ID();
$heading = get_post_meta($page_id, '_about_heading', true);
$subheading = get_post_meta($page_id, '_about_subheading', true);
$paragraph_one = get_post_meta($page_id, '_about_paragraph_one', true);
$paragraph_two = get_post_meta($page_id, '_about_paragraph_two', true);
$cards = get_post_meta($page_id, '_about_cards', true);

if (!is_array($cards))
  $cards = [['title' => '', 'text' => ''], ['title' => '', 'text' => '']]
    ?>

  <!-- About Section -->
  <section class="content-section section-gradient" id="about">
    <div class="container">
      <h1 class="section-title"><?php echo $heading ? esc_html($heading) : 'About The Experience'; ?></h1>
    <div class="about-content">
      <div class="about-text">
        <h2><?php echo $heading ? esc_html($subheading) : 'Crafted with Precision'; ?></h2>
        <p><?php echo $paragraph_one ? wp_kses_post($paragraph_one) : 'This parallax experience represents the cutting edge of modern web design, where every scroll reveals new
          dimensions and every interaction creates magic. Built with pure CSS and vanilla JavaScript, it demonstrates
          the power of creative coding.'; ?></p>
        <p><?php echo $paragraph_two ? wp_kses_post($paragraph_two) : 'Our multi-layered approach creates genuine depth perception, with background elements moving slower than
          foreground ones, mimicking real-world parallax. Each layer is carefully orchestrated to provide smooth,
          butter-like scrolling performance.'; ?></p>

        <div class="about-boxes">
          <?php foreach ($cards as $index => $card): ?>
            <?php
            if ($index === 0) {
              $card_icon = '⚡';
              $fallback_title = 'Performance';
              $fallback_text = 'Optimized animations with 60fps smooth scrolling and GPU acceleration for
                flawless experience.';
            } elseif ($index === 1) {
              $card_icon = '🎯';
              $fallback_title = 'Precision';
              $fallback_text = 'Pixel-perfect design with carefully calculated parallax speeds and seamless
              transitions.';
            }
            ?>
            <div class="info-box">
              <div class="box-icon">
                <?php echo $card_icon ?>
                <span class="box-number"><?php echo $index + 1; ?></span>
              </div>
              <h3 class="box-title"><?php echo $card['title'] ? esc_html($card['title']) : $fallback_title; ?></h3>
              <p class="box-description"><?php echo $card['text'] ? esc_html($card['text']) : $fallback_text; ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="about-visual">
        <div class="orbit-container">
          <div class="orbit orbit-1">
            <div class="orbit-dot dot-1"></div>
          </div>
          <div class="orbit orbit-2">
            <div class="orbit-dot dot-2"></div>
          </div>
          <div class="orbit orbit-3">
            <div class="orbit-dot dot-3"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navigation -->
  <a href="/" class="nav-btn-prev" title="Previous Page">
    <div class="hexagon">
      <span class="hex-content">▲</span>
    </div>
  </a>
  <a href="/features" class="nav-btn-next" title="Next Page">
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

<?php get_footer() ?>