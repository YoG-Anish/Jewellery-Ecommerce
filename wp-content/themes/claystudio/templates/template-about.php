<?php
/*
Template Name: About Page
*/
get_header();
?>
<main>
  <section class="about-page-section">
    <div class="container">
      <div class="content-wrapper">
        <!-- Left side: Overlapping Images -->
        <div class="image-grid">
          <?php
          $about_section1_image_front = get_field('about_section1_image_front');
          $about_section1_image_back = get_field('about_section1_image_back');
          ?>
          <div class="image-bg">
            <?php
            if ($about_section1_image_back) {
              echo '<img src="' . esc_url($about_section1_image_back['url']) . '" alt="' . esc_attr($about_section1_image_back['alt']) . '" />';
            }
            ?>
          </div>
          <div class="image-fg">
            <?php
            if ($about_section1_image_front) {
              echo '<img src="' . esc_url($about_section1_image_front['url']) . '" alt="' . esc_attr($about_section1_image_front['alt']) . '" />';
            }
            ?>
          </div>
        </div>

        <!-- Right side: Text Content -->
        <div class="text-content">
          <div class="text-content-wrap">
            <?php echo get_field('about_section1_content'); ?>
            <a href="<?php echo get_field('about_section1_button_link'); ?>" class="btn-underline"><?php echo get_field('about_section1_button_text'); ?></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="about-bridal-section">
    <div class="container">
      <div class="content-wrapper">
        <div class="text-content">
          <div class="text-content-wrap">
            <?php echo get_field('about_section2_content'); ?>
            <?php
            $about_section2_image_front = get_field('about_section2_image_front');
            if ($about_section2_image_front) {
              echo '<img src="' . esc_url($about_section2_image_front['url']) . '" alt="' . esc_attr($about_section2_image_front['alt']) . '" />';
            }
            ?>
            <a href="<?php echo get_field('about_section2_button_link'); ?>" class="btn-primary margin-b-0"><?php echo get_field('about_section2_button_text'); ?></a>
          </div>
        </div>
        <div class="image-right-bride">
          <?php
          $about_section2_image_back = get_field('about_section2_image_back');
          if ($about_section2_image_back) {
            echo '<img src="' . esc_url($about_section2_image_back['url']) . '" alt="' . esc_attr($about_section2_image_back['alt']) . '" />';
          }
          ?>
        </div>
      </div>
    </div>
  </section>

  <?php get_template_part('template-parts/content', 'testimonial'); ?>

  <section class="free-delivery-section">
    <div class="container">
      <span class="sub-heading">classic or quirky</span>
      <h2>FREE DELIVERY ON ALL UK ORDERS</h2>
      <div class="delivery-slider">Comming Soon</div>
      <a href="./shop.html" class="btn-primary"> SHOP ALL</a>
    </div>
  </section>
</main>

<?php get_footer(); ?>