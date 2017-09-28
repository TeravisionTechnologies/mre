<?php
  /**
   * Template Name: Blog Post
   * @package MRE
   * @subpackage Blog
   * @since MRE 1.0
   */

  get_header();
  global $post;
  $author_id=$post->post_author;
  if ( have_posts() ) : the_post(); endif;

  $categories = get_the_category();
?>

<section class="container-fluid">
  <section class="col-xs-12" id="blog-detail-breadcrumb">
    <div class="container-mre center-block">
      <a href="<?php echo get_site_url(); ?>/blog"><i class="fa fa-chevron-circle-left blog-detail-breadcrumb-prev" aria-hidden="true"></i></a>
      <?php
        foreach( $categories as $category ) {
          echo '<h2 class="blog-detail-breadcrumb-category">'.$category->name.'</h2>';
        }
      ?>
      <h3 class="blog-detail-breadcrumb-title"><?php echo the_title(); ?></h3>
    </div>
  </section>
  <section class="col-xs-12" id="blog-detail-hero">
    <div class="container-mre center-block">
      <div class="blog-detail-hero-image" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')">
        <img src="<?php echo get_avatar_url( $author_id ); ?>" class="blog-detail-hero-author img-circle">
      </div>
    </div>
  </section>
  <section class="col-xs-12" id="blog-detail-content">
    <div class="container-mre center-block">
      <h1 class="blog-detail-content-title"><?php echo the_title(); ?></h1>
      <h3 class="blog-detail-content-author">Por: <?php echo the_author_meta( 'nickname', $author_id ); ?><span class="blog-detail-content-date"><?php echo get_the_time('j F, Y', $post->ID); ?></span></h3>
      <div class="blog-detail-content-text">
        <?php the_content(); ?>
      </div>
      <div class="blog-detail-content-share">
        <h2 class="blog-detail-content-share-title">Share this article</h2>
        <ul class="blog-detail-content-share-list">
          <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/google.svg"></a></li>
          <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/facebook.svg"></a></li>
          <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/linkedin.svg"></a></li>
          <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/twitter.svg"></a></li>
        </ul>
      </div>
    </div>
  </section>
  <hr class="center-block blog-detail-divider">
  <?php
    $comments = get_comments(array(
      'post_id' => $post->ID ));
    $count_comments = 0;
    foreach($comments as $comment) :
      $count_comments++;
    endforeach;
  ?>
  <section class="col-xs-12" id="blog-detail-comments">
    <div class="container-mre center-block">
      <?php
        if ($count_comments == 1) {
          echo '<h2 class="blog-detail-comments-number">'.$count_comments.' Comentario</h2>';
        } else if ($count_comments > 0) {
          echo '<h2 class="blog-detail-comments-number">'.$count_comments.' Comentarios</h2>';
        }
      ?>
      <?php
        if ($count_comments > 0) {
          foreach($comments as $comment) :
            $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
            $date = human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago');
            echo '<div class="blog-detail-comments-post">';
            echo '<h2 class="blog-detail-comments-post-author">'.get_comment_author().'<span class="blog-detail-comments-post-date">'.$date.'</span></h2>';
            echo '<p class="blog-detail-comments-post-text">'.$comment->comment_content.'</p>';
            echo '</div>';
          endforeach;

        }
      ?>
    </div>
  </section>
  <section class="col-xs-12" id="blog-detail-form">
    <div class="blog-detail-comments-form center-block">
      <h2 class="blog-detail-comments-form-title">Escribe un comentario</h2>
      <h3 class="blog-detail-comments-form-subtitle">Su dirección de correo electrónico no será publicada</h3>
      <form action="" class="comments-form">
        <div class="form-group">
          <input type="text" class="form-control" id="input-fullname" placeholder="Nombre y Apellido">
          <input type="email" class="form-control" id="input-email" placeholder="Email">
          <textarea class="form-control" placeholder="Tu comentario..."></textarea>
        </div>
        <button type="submit" class="comments-form-button">Publicar comentario</button>
      </form>
    </div>
  </section>
  <section class="col-xs-12" id="blog-recommended-posts" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/notice.jpg')">
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
