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

  <section class="client-love-section">
    <div class="container">
      <h2>🤍Client Love🤍</h2>
      <div class="testimonial-wrapper-about">
        <div
          class="splide"
          id="testimonial-slider-about"
          aria-label="Customer Reviews">
          <div class="splide__track">
            <ul class="splide__list">
              <?php
              $args = array(
                'post_type' => 'testimonial',
                'posts_per_page' => -1,
              );
              $testimonial_query = new WP_Query($args);

              if ($testimonial_query->have_posts()) :
                while ($testimonial_query->have_posts()) : $testimonial_query->the_post();  ?>
                  <!-- Slide 1 -->
                  <li class="splide__slide">
                    <div class="review-card">

                      <h2><?php echo get_field('review_heading'); ?></h2>
                      <p>
                        <?php echo get_field('review_description'); ?>
                      </p>
                      <span class="author-name">- <?php the_title(); ?></span>
                      <span class="date">, <?php echo get_the_date(); ?></span>
                    </div>
                  </li>
              <?php
                endwhile;
              endif;
              wp_reset_postdata();
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

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