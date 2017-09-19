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
            <div class="swiper-slide">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/arquitectura.png">
              <div class="swiper-overlay"></div>
            </div>
            <div class="swiper-slide">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/ecologia.png">
              <div class="swiper-overlay"></div>
            </div>
            <div class="swiper-slide">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/inversion.png">
              <div class="swiper-overlay"></div>
            </div>
            <div class="swiper-slide">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/migracion.png">
              <div class="swiper-overlay"></div>
            </div>
            <div class="swiper-slide">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/paises.png">
              <div class="swiper-overlay"></div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
    </div>
  </section>

  <section class="row">
      <div class="col-md-12" id="blog-list">
        <div class="container-mre center-block">
          <div class="col-md-6 blog-post">
            <div class="blog-image" style="background-image: url('http://lorempixel.com/565/241/')">
              <span class="blog-category">Inversión</span>
            </div>
            <div class="blog-text">
              <h1 class="blog-text-title">Visado de trabajo en Chile</h1>
              <h2 class="blog-text-author">Por: Miguel Doe<span class="blog-text-date">14 January, 2016</span></h2>
              <p class="blog-text-summary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque efficitur neque eget magna tincidunt condimentum. Ut quis lacus ac metus tempus dictum eget nec.</p>
            </div>
          </div>
          <div class="col-md-6 blog-post">
            <div class="blog-image" style="background-image: url('http://lorempixel.com/565/241/')">
              <span class="blog-category">Inversión</span>
            </div>
            <div class="blog-text">
              <h1 class="blog-text-title">Crowdfunding, la fuente de financiamiento del Futuro</h1>
              <h2 class="blog-text-author">Por: Miguel Doe<span class="blog-text-date">14 January, 2016</span></h2>
              <p class="blog-text-summary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque efficitur neque eget magna tincidunt condimentum. Ut quis lacus ac metus tempus dictum eget nec.</p>
            </div>
          </div>
          <div class="col-md-6 blog-post">
            <div class="blog-image" style="background-image: url('http://lorempixel.com/565/241/')">
              <span class="blog-category">Inversión</span>
            </div>
            <div class="blog-text">
              <h1 class="blog-text-title">Miami: El Futuro es Hoy</h1>
              <h2 class="blog-text-author">Por: Miguel Doe<span class="blog-text-date">14 January, 2016</span></h2>
              <p class="blog-text-summary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque efficitur neque eget magna tincidunt condimentum. Ut quis lacus ac metus tempus dictum eget nec.</p>
            </div>
          </div>
          <div class="col-md-6 blog-post">
            <div class="blog-image" style="background-image: url('http://lorempixel.com/565/241/')">
              <span class="blog-category">Inversión</span>
            </div>
            <div class="blog-text">
              <h1 class="blog-text-title">Chile, un nuevo destino</h1>
              <h2 class="blog-text-author">Por: Miguel Doe<span class="blog-text-date">14 January, 2016</span></h2>
              <p class="blog-text-summary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque efficitur neque eget magna tincidunt condimentum. Ut quis lacus ac metus tempus dictum eget nec.</p>
            </div>
          </div>
          <nav id="blog-pagination">
            <ul class="pagination">
              <li>
                <a href="#" aria-label="Previous">
                  <span aria-hidden="true" class="pagination-previous">&laquo;</span>
                </a>
              </li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li>
                <a href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
  </section>


  <hr class="blog-list-divider container-mre center-block">
  <section id="blog-recommended-posts">
    <div class="container-mre center-block" style="height: 100%;">
      <h2 class="recommended-posts-title">Artículos Recomendados</h2>
      <span class="recommended-posts-subtitle">Los más vistos</span>
      <div class="swiper-container swiper-container-blog-most-viewed">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="blog-most-viewed-image" style="background-image: url('http://lorempixel.com/300/129/');">
              <span class="blog-most-viewed-category">Inversión</span>
            </div>
            <div class="blog-most-viewed-text">
              <h1 class="blog-most-viewed-text-title">Crowdfunding, la fuente de financiamiento del Futuro</h1>
              <h2 class="blog-most-viewed-text-author">Por: Miguel Doe<span class="blog-most-viewed-text-date">14 January, 2016</span></h2>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="blog-most-viewed-image" style="background-image: url('http://lorempixel.com/300/129/');">
              <span class="blog-most-viewed-category">Inversión</span>
            </div>
            <div class="blog-most-viewed-text">
              <h1 class="blog-most-viewed-text-title">Crowdfunding, la fuente de financiamiento del Futuro</h1>
              <h2 class="blog-most-viewed-text-author">Por: Miguel Doe<span class="blog-most-viewed-text-date">14 January, 2016</span></h2>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="blog-most-viewed-image" style="background-image: url('http://lorempixel.com/300/129/');">
              <span class="blog-most-viewed-category">Inversión</span>
            </div>
            <div class="blog-most-viewed-text">
              <h1 class="blog-most-viewed-text-title">Crowdfunding, la fuente de financiamiento del Futuro</h1>
              <h2 class="blog-most-viewed-text-author">Por: Miguel Doe<span class="blog-most-viewed-text-date">14 January, 2016</span></h2>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="blog-most-viewed-image" style="background-image: url('http://lorempixel.com/300/129/');">
              <span class="blog-most-viewed-category">Inversión</span>
            </div>
            <div class="blog-most-viewed-text">
              <h1 class="blog-most-viewed-text-title">Crowdfunding, la fuente de financiamiento del Futuro</h1>
              <h2 class="blog-most-viewed-text-author">Por: Miguel Doe<span class="blog-most-viewed-text-date">14 January, 2016</span></h2>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="blog-most-viewed-image" style="background-image: url('http://lorempixel.com/300/129/');">
              <span class="blog-most-viewed-category">Inversión</span>
            </div>
            <div class="blog-most-viewed-text">
              <h1 class="blog-most-viewed-text-title">Crowdfunding, la fuente de financiamiento del Futuro</h1>
              <h2 class="blog-most-viewed-text-author">Por: Miguel Doe<span class="blog-most-viewed-text-date">14 January, 2016</span></h2>
            </div>
          </div>
        </div>
        <!--<div class="swiper-pagination"></div>-->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
  </section>

</section>


<?php get_footer(); ?>
</body>
</html>