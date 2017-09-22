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
            <div class="swiper-slide" name="Todas las Categorías">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/todas.png">
              <div class="swiper-overlay"></div>
            </div>
            <div class="swiper-slide" name="Arquitectura">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/arquitectura.png">
              <div class="swiper-overlay"></div>
            </div>
            <div class="swiper-slide" name="Ecología">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/ecologia.png">
              <div class="swiper-overlay"></div>
            </div>
            <div class="swiper-slide" name="Inversión">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/inversion.png">
              <div class="swiper-overlay"></div>
            </div>
            <div class="swiper-slide" name="Migración">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/migracion.png">
              <div class="swiper-overlay"></div>
            </div>
            <div class="swiper-slide" name="Ciudades · Países">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/paises.png">
              <div class="swiper-overlay"></div>
            </div>
          </div>
          <i class="fa fa-chevron-circle-left swiper-button-prev" aria-hidden="true"></i>
          <i class="fa fa-chevron-circle-right swiper-button-next" aria-hidden="true"></i>
        </div>
      </div>
    </div>
  </section>
  <img class="blog-list-triangle" src="<?php echo get_template_directory_uri(); ?>/assets/triangle.png">
  <section class="row">
    <div class="col-md-12" id="blog-list">
      <div class="container-mre center-block">
        <div class="col-md-9 blog-search">
          <div class="input-group">
            <i class="fa fa-search" aria-hidden="true"></i>
            <input type="text" class="form-control" placeholder="Buscar ...">
          </div>
        </div>
        <div class="col-md-3 blog-select">
          <select class="form-control blog-filter pull-right">
            <option>Ordenar por...</option>
            <option>Autor</option>
            <option>Categoría</option>
            <option>Título</option>
            <option>Fecha</option>
          </select>
        </div>
        <div class="col-md-6 blog-post">
          <div class="blog-image"
               style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/blog-1.jpg')">
            <span class="blog-category">Inversión</span>
          </div>
          <div class="blog-text">
            <h1 class="blog-text-title">Visado de trabajo en Chile</h1>
            <h2 class="blog-text-author">Por: Miguel Doe<span class="blog-text-date">14 January, 2016</span><span class="blog-text-comments">- 3 Comments</span></h2>
            <p class="blog-text-summary">Lorem ipsum dolor sit amet, consectetur
              adipiscing elit. Pellentesque efficitur neque eget magna tincidunt
              condimentum. Ut quis lacus ac metus tempus dictum eget nec.</p>
          </div>
        </div>
        <div class="col-md-6 blog-post">
          <div class="blog-image"
               style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/blog-2.jpg')">
            <span class="blog-category">Inversión</span>
          </div>
          <div class="blog-text">
            <h1 class="blog-text-title">Visado de trabajo en Chile</h1>
            <h2 class="blog-text-author">Por: Miguel Doe<span class="blog-text-date">14 January, 2016</span><span class="blog-text-comments">- 3 Comments</span></h2>
            <p class="blog-text-summary">Lorem ipsum dolor sit amet, consectetur
              adipiscing elit. Pellentesque efficitur neque eget magna tincidunt
              condimentum. Ut quis lacus ac metus tempus dictum eget nec.</p>
          </div>
        </div>
        <div class="col-md-6 blog-post">
          <div class="blog-image"
               style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/blog-3.jpg')">
            <span class="blog-category">Inversión</span>
          </div>
          <div class="blog-text">
            <h1 class="blog-text-title">Visado de trabajo en Chile</h1>
            <h2 class="blog-text-author">Por: Miguel Doe<span class="blog-text-date">14 January, 2016</span><span class="blog-text-comments">- 3 Comments</span></h2>
            <p class="blog-text-summary">Lorem ipsum dolor sit amet, consectetur
              adipiscing elit. Pellentesque efficitur neque eget magna tincidunt
              condimentum. Ut quis lacus ac metus tempus dictum eget nec.</p>
          </div>
        </div>
        <div class="col-md-6 blog-post">
          <div class="blog-image"
               style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/blog-4.jpg')">
            <span class="blog-category">Inversión</span>
          </div>
          <div class="blog-text">
            <h1 class="blog-text-title">Visado de trabajo en Chile</h1>
            <h2 class="blog-text-author">Por: Miguel Doe<span class="blog-text-date">14 January, 2016</span><span class="blog-text-comments">- 3 Comments</span></h2>
            <p class="blog-text-summary">Lorem ipsum dolor sit amet, consectetur
              adipiscing elit. Pellentesque efficitur neque eget magna tincidunt
              condimentum. Ut quis lacus ac metus tempus dictum eget nec.</p>
          </div>
        </div>
        <nav id="blog-pagination">
          <ul class="pagination">
            <li>
              <a href="#" aria-label="Previous">
                <span aria-hidden="true"
                      class="pagination-previous">&laquo;</span>
              </a>
            </li>
            <li><a href="#" class="pagination-active">1</a></li>
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
  <section id="blog-recommended-posts" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/notice.jpg')">
    <div class="recommended-posts-overlay"></div>
    <div class="container-mre center-block">
      <h2 class="recommended-posts-title">Artículos Recomendados</h2>
      <div class="swiper-container swiper-container-blog-most-viewed">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="blog-most-viewed-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/blog-1.jpg');">
              <span class="blog-most-viewed-category">Inversión</span>
            </div>
            <div class="blog-most-viewed-text">
              <a href="#">
                <h1 class="blog-most-viewed-text-title">Crowdfunding, la fuente de financiamiento del Futuro</h1>
              </a>
              <h2 class="blog-most-viewed-text-author">Por: Miguel Doe<span class="blog-most-viewed-text-date">14 January, 2016</span><span class="blog-most-viewed-text-comments">- 3 Comments</span></h2>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="blog-most-viewed-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/blog-2.jpg');">
              <span class="blog-most-viewed-category">Inversión</span>
            </div>
            <div class="blog-most-viewed-text">
              <a href="#">
                <h1 class="blog-most-viewed-text-title">Crowdfunding, la fuente de financiamiento del Futuro</h1>
              </a>
              <h2 class="blog-most-viewed-text-author">Por: Miguel Doe<span class="blog-most-viewed-text-date">14 January, 2016</span><span class="blog-most-viewed-text-comments">- 3 Comments</span></h2>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="blog-most-viewed-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/blog-3.jpg');">
              <span class="blog-most-viewed-category">Inversión</span>
            </div>
            <div class="blog-most-viewed-text">
              <a href="#">
                <h1 class="blog-most-viewed-text-title">Crowdfunding, la fuente de financiamiento del Futuro</h1>
              </a>
              <h2 class="blog-most-viewed-text-author">Por: Miguel Doe<span class="blog-most-viewed-text-date">14 January, 2016</span><span class="blog-most-viewed-text-comments">- 3 Comments</span></h2>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="blog-most-viewed-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/blog-4.jpg');">
              <span class="blog-most-viewed-category">Inversión</span>
            </div>
            <div class="blog-most-viewed-text">
              <a href="#">
                <h1 class="blog-most-viewed-text-title">Crowdfunding, la fuente de financiamiento del Futuro</h1>
              </a>
              <h2 class="blog-most-viewed-text-author">Por: Miguel Doe<span class="blog-most-viewed-text-date">14 January, 2016</span><span class="blog-most-viewed-text-comments">- 3 Comments</span></h2>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="blog-most-viewed-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/blog-1.jpg');">
              <span class="blog-most-viewed-category">Inversión</span>
            </div>
            <div class="blog-most-viewed-text">
              <a href="#">
                <h1 class="blog-most-viewed-text-title">Crowdfunding, la fuente de financiamiento del Futuro</h1>
              </a>
              <h2 class="blog-most-viewed-text-author">Por: Miguel Doe<span class="blog-most-viewed-text-date">14 January, 2016</span><span class="blog-most-viewed-text-comments">- 3 Comments</span></h2>
            </div>
          </div>
        </div>
        <i class="fa fa-chevron-circle-left swiper-button-prev" aria-hidden="true"></i>
        <i class="fa fa-chevron-circle-right swiper-button-next" aria-hidden="true"></i>
      </div>
    </div>
  </section>
</section>

<?php get_footer(); ?>
</body>
</html>