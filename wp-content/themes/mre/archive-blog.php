<?php
  /**
   * Template Name: Blog List
   * @package MRE
   * @subpackage Blog
   * @since MRE 1.0
   */
get_header();

$postList = get_posts(
  array(
    'post_type' => 'post',
    'numberposts' => -1,
    'post_status' => 'publish',
    'order' => 'ASC',

  )
);

$postRecommended = get_posts(
  array(
    'post_type' => 'post',
    'numberposts' => -1,
    'post_status' => 'publish',
    'order' => 'ASC',
    'tax_query' => array(
      array(
        'taxonomy' => 'post_tag',
        'field' => 'slug',
        'terms' => 'articulo-recomendado',
      )
    )
  )
);
?>

<section class="container-fluid">
  <section class="col-xs-12" id="blog-list-categories">
    <div class="container-mre center-block">
      <h3 class="blog-list-category-title">Categoría</h3>
      <h2 class="blog-list-category-text">Inversión</h2>
      <div class="swiper-container swiper-container-blog-categories">
        <div class="swiper-wrapper">
          <div class="swiper-slide" name="Todas las Categorías">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/todas.png">
            <div class="swiper-overlay"></div>
          </div>
          <div class="swiper-slide" name="Arquitectura">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/arquitectura.png">
            <div class="swiper-overlay"></div>
          </div>
          <div class="swiper-slide" name="Ecología">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/ecologia.png">
            <div class="swiper-overlay"></div>
          </div>
          <div class="swiper-slide" name="Inversión">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/inversion.png">
            <div class="swiper-overlay"></div>
          </div>
          <div class="swiper-slide" name="Migración">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/migracion.png">
            <div class="swiper-overlay"></div>
          </div>
          <div class="swiper-slide" name="Ciudades · Países">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/paises.png">
            <div class="swiper-overlay"></div>
          </div>
        </div>
        <i class="fa fa-chevron-circle-left swiper-button-prev"
           aria-hidden="true"></i>
        <i class="fa fa-chevron-circle-right swiper-button-next"
           aria-hidden="true"></i>
      </div>
    </div>
  </section>
  <img class="blog-list-triangle" src="<?php echo get_template_directory_uri(); ?>/assets/triangle.png">
  <section class="col-xs-12" id="blog-list">
    <div class="container-mre center-block">
      <div class="col-xs-12 col-sm-9 blog-search">
        <div class="input-group">
          <i class="fa fa-search" aria-hidden="true"></i>
          <input type="text" class="form-control" placeholder="Buscar...">
        </div>
      </div>
      <div class="col-xs-12 col-sm-3 blog-select">
        <select class="form-control blog-filter pull-right">
          <option>Ordenar por...</option>
          <option>Autor</option>
          <option>Categoría</option>
          <option>Título</option>
          <option>Fecha</option>
        </select>
      </div>
      <?php
      foreach($postList as $post) { ?>
        <div class="col-xs-12 col-sm-6 blog-post">
          <div class="blog-image" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID); ?>')">
            <span class="blog-category"><?php $taxonomy = get_post_taxonomies($post); $term = get_the_terms($post->ID, $taxonomy[0]); echo $term[0]->name; ?></span>
          </div>
          <div class="blog-text">
            <h1 class="blog-text-title"><?php echo $post->post_title; ?></h1>
            <h2 class="blog-text-author">Por: <?php $author = get_user_by('ID', $post->post_author); echo $author->display_name?><span
                class="blog-text-date"><?php $date = strtotime($post->post_date); echo date('d F, Y', $date)?></span><span
                class="blog-text-comments hidden-xs hidden-sm">- <?php echo $post->comment_count ?> Comments</span></h2>
            <p class="blog-text-summary"><?php echo $post->post_excerpt ?></p>
          </div>
        </div>
      <?php } ?>
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
  </section>
  <section class="col-xs-12" id="blog-recommended-posts" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/notice.jpg')">
    <div class="recommended-posts-overlay"></div>
    <div class="container-mre center-block">
      <h2 class="recommended-posts-title">Artículos Recomendados</h2>
      <div class="swiper-container swiper-container-blog-most-viewed">
        <div class="swiper-wrapper">
          <?php foreach($postRecommended as $post) { ?>
            <div class="swiper-slide">
              <div class="blog-most-viewed-image" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID); ?>');">
                <span class="blog-most-viewed-category"><?php $taxonomy = get_post_taxonomies($post); $term = get_the_terms($post->ID, $taxonomy[0]); echo $term[0]->name; ?></span>
              </div>
              <div class="blog-most-viewed-text">
                <a href="#">
                  <h1 class="blog-most-viewed-text-title"><?php echo $post->post_title; ?></h1>
                </a>
                <h2 class="blog-most-viewed-text-author">Por: <?php $author = get_user_by('ID', $post->post_author); echo $author->display_name?><span class="blog-most-viewed-text-date"><?php $date = strtotime($post->post_date); echo date('d F, Y', $date)?></span><span class="blog-most-viewed-text-comments">- <?php echo $post->comment_count ?> Comments</span></h2>
              </div>
            </div>
          <?php } ?>
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