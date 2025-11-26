<?php
/* Template Name: Contact Page */
get_header();
$page_id = get_the_ID();

$heading = get_post_meta($page_id, '_contact_heading', true);
$form_heading = get_post_meta($page_id, '_contact_form_heading', true);
$email = get_post_meta($page_id, '_contact_email', true);
$phone = get_post_meta($page_id, '_contact_phone', true);
$address = get_post_meta($page_id, '_contact_address', true);
$website = get_post_meta($page_id, '_contact_website', true);

$heading = $heading ?: 'Get In Touch';
$form_heading = $form_heading ?: 'Connect With Us';
$email = $email ?: 'hello@parallaxdepth.com';
$phone = $phone ?: '+1 (555) 123-4567';
$address = $address ?: '123 Design Street, Creative City, DC 12345';
$website = $website ?: 'www.parallaxdepth.com';
?>

<main>
  <!-- Contact Section -->
  <section class="content-section contact-section-bg" id="contact">
    <div class="container">
      <h1 class="section-title"><?php echo esc_html($heading) ?></h1>
      <div class="contact-content">
        <div class="contact-form">
          <div class="form-group">
            <input type="text" class="form-input" placeholder="Your Name" required />
          </div>
          <div class="form-group">
            <input type="email" class="form-input" placeholder="Your Email" required />
          </div>
          <div class="form-group">
            <input type="text" class="form-input" placeholder="Subject" required />
          </div>
          <div class="form-group">
            <textarea class="form-input form-textarea" placeholder="Your Message" required></textarea>
          </div>
          <button type="submit" class="submit-btn">Send Message</button>
        </div>
        <div class="contact-info">
          <h2><?php echo esc_html($form_heading) ?></h2>
          <div class="info-item">
            <div class="info-icon">📧</div>
            <span class="info-text"><?php echo esc_html($email) ?></span>
          </div>
          <div class="info-item">
            <div class="info-icon">📱</div>
            <span class="info-text"><?php echo esc_html($phone) ?></span>
          </div>
          <div class="info-item">
            <div class="info-icon">📍</div>
            <span class="info-text"><?php echo esc_html($address) ?></span>
          </div>
          <div class="info-item">
            <div class="info-icon">🌐</div>
            <span class="info-text"><?php echo esc_html($website) ?></span>
          </div>
        </div>
      </div>
    </div>

    <!-- Navigation -->
    <a href="/gallery" class="nav-btn-prev" title="Previous Page">
      <div class="hexagon">
        <span class="hex-content">▲</span>
      </div>
    </a>
  </section>
</main>

<?php get_footer() ?>