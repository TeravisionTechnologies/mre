<?php
  /**
   * Template Name: Blog Post
   * @package MRE
   * @subpackage Blog
   * @since MRE 1.0
   */
get_header();
?>

<section class="container-fluid">
  <section class="col-xs-12" id="blog-detail-breadcrumb">
    <div class="container-mre center-block">
      <a href="#"><i class="fa fa-chevron-circle-left blog-detail-breadcrumb-prev" aria-hidden="true"></i></a>
      <h2 class="blog-detail-breadcrumb-category">Inversión</h2>
      <h3 class="blog-detail-breadcrumb-title">Miami: el futuro es hoy</h3>
    </div>
  </section>
  <section class="col-xs-12" id="blog-detail-hero">
    <div class="container-mre center-block">
      <div class="blog-detail-hero-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/blog-3.jpg')">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/autor.jpg" class="blog-detail-hero-author img-circle">
      </div>
    </div>
  </section>
  <section class="col-xs-12" id="blog-detail-content">
    <div class="container-mre center-block">
      <h1 class="blog-detail-content-title">Miami: el futuro es hoy</h1>
      <h3 class="blog-detail-content-author">Por: John Doe<span class="blog-detail-content-date">14 January, 2016</span></h3>
      <div class="blog-detail-content-text">
        <p>Merand Real Estate y HR19 Realty invitan al evento inmobiliario “Miami: El futuro es hoy” en Chile</p>
        <p>El evento será del 7 al 10 de junio en el hotel W de Santiago de Chile.</p>
        <p>Los participantes tendrán reuniones personalizadas con los expertos en el sector inmobiliario de Miami.</p>
        <p>Merand Real Estate, una división perteneciente al Grupo Merand, con más de 13 años manejando portafolios inmobiliarios Premium y HR19 Realty, empresa líder en inversiones de lujo en el sur de Florida invitan a su evento “Miami: El futuro es hoy” del 7 al 10 de junio en el Salón Studio 54 del “Hotel W Santiago de Chile” en Santiago de Chile.</p>
        <p>“En Merand Real Estate, creemos que el 2016 es un año lleno de oportunidades para incluir activos inmobiliarios a su portafolio de inversiones, puesto que, se perfila como un año lleno de turbulencia en la economía global. En esta ocasión en particular, buscamos llegar al mercado chileno presentándoles la alternativa de invertir en inmuebles en el mercado del sur de la Florida con rendimientos superiores al 6% anual, llevando directamente a los expertos en la materia.”, comenta Hernán Rodríguez, Presidente de Merand Real Estate.</p>
        <p>Durante el primer día del evento, se presentará un análisis del mercado inmobiliario actual, los servicios de las empresas organizadoras y su portafolio de inmuebles en el Sur del estado de Florida, en el que se destaca el W Residences en Fort Lauderdale, el Downtown Doral y otras opciones de inversión. Los días siguientes, los participantes podrán realizar reuniones privadas con los expertos, con el objetivo conocer más sobre las diversas oportunidades de inversión que se ofrecerán en el evento.</p>
        <p>“Contamos con una red de aliados del más alto nivel y de reconocida trayectoria en el sector, Global Advisors en Santiago de Chile y Codina Partners e International Sales Group en Florida, por lo que es un evento de gran calidad para los asistentes”, concluyó Rodríguez.</p>
        <p>Para más información sobre el evento “Miami: el futuro es ahora” en http://grupomre.com/inscribete/, en info@grupomre.com o por +56 22 3223 937 – 9 7406 3617.</p>
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
  <section class="col-xs-12" id="blog-detail-comments">
    <div class="container-mre center-block">
      <h2 class="blog-detail-comments-number">2 Comentarios</h2>
      <div class="blog-detail-comments-post">
        <h2 class="blog-detail-comments-post-author">Jack Cooper<span class="blog-detail-comments-post-date">2 months ago</span></h2>
        <p class="blog-detail-comments-post-text">Cherish the moments we relax, especially the meal let’s go through a fascinating dish. All you have to do is to purse some blueberries in almond milk and then stir in the seeds. For extra zing a little cinnamon and honey. Let it soak overnight or for at least a couple of hours. Then top with whole blueberries and some toasted almonds to eat.</p>
      </div>
      <div class="blog-detail-comments-post">
        <h2 class="blog-detail-comments-post-author">Ismael Tooper<span class="blog-detail-comments-post-date">5 months ago</span></h2>
        <p class="blog-detail-comments-post-text">Cherish the moments we relax, especially the meal let’s go through a fascinating dish. All you have to do is to purse some blueberries in almond milk and then stir in the seeds. For extra zing a little cinnamon and honey. Let it soak overnight or for at least a couple of hours. Then top with whole blueberries and some toasted almonds to eat.</p>
      </div>
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
