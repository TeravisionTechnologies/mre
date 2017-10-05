<?php
    get_header();

  $footer_query = get_posts(
    array(
      'post_type' => 'header_footer'
    )
  );
  $footer_info = get_post_meta($footer_query[0]->ID);

  $properties_list = get_posts(
    array(
      'post_type' => 'broker',
      'order' => 'ASC',
      'numberposts' => -1
    )
  );
?>
  <div class="swiper-container swiper-container-hero">
    <div class="swiper-wrapper">
      <div class="swiper-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/spain-1.jpg');">
        <div class="slide-overlay"></div>
        <div class="slide-text">
          <h2>Madrid</h2>
        </div>
      </div>
      <div class="swiper-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/spain-2.jpg');">
        <div class="slide-overlay"></div>
        <div class="slide-text">
          <h2>Madrid</h2>
        </div>
      </div>
      <div class="swiper-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/spain-3.jpg');">
        <div class="slide-overlay"></div>
        <div class="slide-text">
          <h2>Madrid</h2>
        </div>
      </div>
      <div class="swiper-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/vegas-1.jpg');">
        <div class="slide-overlay"></div>
        <div class="slide-text">
          <h2>Las Vegas</h2>
        </div>
      </div>
    </div>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/al-hero-left.png" alt="Hero Left Arrow" class="swiper-button-prev">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/al-hero-right.png" alt="Hero Right Arrow" class="swiper-button-next">
  </div>
<section class="col-xs-12 al-projects">
  <div class="container center-block al-project-list">
    <span class="al-project-list-item"><h2 class="item-text">Proyectos pasados</h2><img class="triangle" src="<?php echo get_template_directory_uri(); ?>/assets/triangle.svg"></span>
    <span class="al-project-list-item"><h2 class="item-text item-active">Proyectos actuales</h2><img class="triangle" src="<?php echo get_template_directory_uri(); ?>/assets/triangle.svg"></span>
    <span class="al-project-list-item"><h2 class="item-text">Muy pronto</h2><img class="triangle" src="<?php echo get_template_directory_uri(); ?>/assets/triangle.svg"></span>
  </div>
</section>
<div class="col-xs-12 al-properties-section text-center">
  <div class="container no-padding container-properties">
    <div class="center-block">
      <h2 class="properties-country-filter filter-left">España</h2><h2 class="properties-country-filter">Las Vegas</h2>
    </div>
    <div class="col-xs-12 properties-filter-container no-padding">
      <select class="form-control properties-filter pull-right">
        <option>Ordenar por...</option>
        <option>Opcion 1</option>
        <option>Opcion 2</option>
        <option>Opcion 3</option>
        <option>Opcion 4</option>
      </select>
    </div>
    <div class="col-xs-12 properties-list no-padding">
      <?php foreach($properties_list as $property){
      	$property_info = get_post_meta($property->ID);
      	$background_image = array_pop(unserialize($property_info["_br_images"][0]));
      ?>
      <div class="col-xs-12 col-sm-4 property-image no-padding" style="background-image: url('<?php echo $background_image; ?>')">
        <div class="property-overlay">
          <h2 class="property-title"><?php echo $property->post_title ?></h2>
          <h3 class="property-address"><?php echo $property_info['_br_address'][0]; ?></h3>
          <h3 class="property-city"><?php echo $property_info['_br_price'][0]; ?></h3>
          <h4 class="property-category"><?php $taxonomy = get_post_taxonomies($property); $term = get_the_terms($property->ID, $taxonomy[0]); echo $term[0]->name; ?></h4>
        </div>
      </div>	
      <?php } ?>
    </div>
  </div>
</div>
<div class="col-xs-12 text-center">
  <nav id="al-pagination">
    <ul class="pagination">
      <li>
        <a aria-label="Previous"><span aria-hidden="true"class="pagination-previous">&laquo;</span></a>
      </li>
      <li><a class="pagination-active">1</a></li>
      <li><a>2</a></li>
      <li><a>3</a></li>
      <li><a>4</a></li>
      <li><a>5</a></li>
      <li>
        <a aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
</div>
<div class="col-xs-12 al-partners-section text-center">
  <div class="container">
    <p class="al-partners-title">Nuestros aliados</p>
    <p class="al-partners-subtitle">Hacemos real tu Inversión soñada</p>
  </div>
  <div class="partners-images">
    <img src="<?php echo $footer_info['_hf_partners-one'][0]; ?>" alt="Logo Partner One" class="partners-images-one"/>
    <img src="<?php echo $footer_info['_hf_partners-two'][0]; ?>" alt="Logo Partner Two" class="partners-images-two"/>
  </div>
</div>
<div class="col-xs-12 al-swiper-contact text-center " style="background-image: url('<?php echo $footer_info['_hf_contact-swiper'][0] ?>')">
  <div class="container">
    <div id="offices" class="swiper-container swiper-container-flags">
      <div class="flags-indicators">
        <img id="flag-image-2" class="flag-image" data-pagination="1" src="<?php echo get_template_directory_uri(); ?>/assets/spain_flag.svg" />
        <img id="flag-image-1" class="flag-image flag-image-opacity" data-pagination="2" src="<?php echo get_template_directory_uri(); ?>/assets/usa_flag.svg" />
      </div>
      <h4>Puedes encontrar Nuestras Oficinas en:</h4>
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="office-detail">
            <h5>
              <span>Madrid:</span>
            </h5>
            <h5>Calle Ortega y Gasset #6</h5>
            <h5>Primero Izquierda</h5>
            <h5>Sample: +34 605 816 803</h5>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="office-detail usa-office">
            <h5>
              <span>Las Vegas:</span>
            </h5>
            <h5>55 Merrick Way, Suite 214 Coral Gables</h5>
            <h5>Miami, Florida</h5>
            <h5>Teléfonos: +1 786 376.22.22 / 477.50.91</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <div id="contact-us" class="col-xs-12 al-contact-div" style="background-image: url('<?php echo $footer_info['_hf_contact'][0] ?>')">
    <div class="container">
      <div class="row">
        <p class="col-xs-12 text-center al-contact-text">Nos gustaría asesorarte en tu próxima inversión</p>
        <p class="col-xs-12 text-center al-contact-text-bold">¡Contáctanos!</p>
        <div class="col-xs-12 col-md-4">
          <div class="al-phone-box text-center center-block">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/smartphone.png" alt="Llamanos Ala19">
            <p>Llámanos para asesoría <b>inmediata</b></p>
            <a href="tel:+17863762222" class="al-phone-num">+1786 376.22.22</a>
          </div>
        </div>
        <div class="col-xs-12 col-md-8 al-contact-form-div">
          <?php echo do_shortcode( '[contact-form-7 id="4" title="Home - Contact form"]' ); ?>
        </div>
      </div>
    </div>
  </div>

<?php get_footer(); ?>