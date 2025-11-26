<?php
/* Template Name: Front Page */
get_header() ?>

<!-- Hero Section with Parallax Layers -->
<main>
  <section class="hero-container" id="hero">
    <?php $heading = get_post_meta(get_the_ID(), '_home_heading', true);
    $intro_text = get_post_meta(get_the_ID(), '_home_intro', true); ?>

    <!-- Grid Overlay -->
    <div class="grid-overlay">
      <div class="grid-diagonal-1"></div>
      <div class="grid-diagonal-2"></div>
    </div>

    <!-- Background Layer -->
    <div class="parallax-layer layer-bg"></div>

    <!-- Floating Elements Layer -->
    <div class="parallax-layer layer-float">
      <!-- Bottom Left Rectangle Group -->
      <div class="rectangles-bottom-left">
        <div class="rect rect-bl-1"></div>
        <div class="rect rect-bl-2"></div>
        <div class="rect rect-bl-3"></div>
        <div class="rect rect-bl-4"></div>
        <div class="rect rect-bl-5"></div>
        <div class="rect rect-bl-6"></div>
      </div>

      <!-- Top Right Rectangle Group -->
      <div class="rectangles-top-right">
        <div class="rect rect-tr-1"></div>
        <div class="rect rect-tr-2"></div>
        <div class="rect rect-tr-3"></div>
        <div class="rect rect-tr-4"></div>
      </div>
    </div>

    <!-- Foreground Layer -->
    <div class="parallax-layer layer-fg">
      <div class="glowing-orb orb-1"></div>
      <div class="glowing-orb orb-2"></div>
    </div>

    <!-- Hero Content -->
    <div class="hero-content">
      <h1 class="hero-title">
        <?php echo $heading ? esc_html($heading) : 'PARALLAX DEPTH'; ?>
      </h1>
      <p class="hero-subtitle">
        <?php echo $intro_text ? esc_html($intro_text) : 'Immersive Multi-Layer Scrolling Experience' ?></p>
      <a href="#about" class="cta-button">Explore Depths</a>
    </div>

    <!-- Navigation -->
    <a href="/about" class="nav-btn-next" title="Next Page">
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