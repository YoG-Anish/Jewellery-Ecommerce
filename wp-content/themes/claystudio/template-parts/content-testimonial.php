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