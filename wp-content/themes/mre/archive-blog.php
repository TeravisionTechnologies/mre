<?php
  /**
   * Template Name: Blog List
   * @package MRE
   * @subpackage Blog
   * @since MRE 1.0
   */
get_header();
?>

<section class="container-fluid">

  <section class="row">
    <div class="col-md-12" id="blog-list-categories">
      <div class="container-mre center-block">
        <h3 class="blog-list-category-title">Categoría</h3>
        <h2 class="blog-list-category-text">Inversión</h2>
        <div class="swiper-container swiper-container-blog-categories">
          <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/arquitectura.png"></div>
            <div class="swiper-slide">Slide 2</div>
            <div class="swiper-slide">Slide 3</div>
            <div class="swiper-slide">Slide 4</div>
            <div class="swiper-slide">Slide 5</div>
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
    </div>

  </section>
  <section id="blog-list">

  </section>
  <hr class="blog-list-divider container-mre center-block">
  <section id="blog-recommended-posts">
    <div class="container-mre center-block" style="height: 100%;">
      <h2 class="recommended-posts-title">Artículos Recomendados</h2>
      <span class="recommended-posts-subtitle">Los más vistos</span>
    </div>
  </section>

</section>


<?php get_footer(); ?>
</body>
</html>