<?php
    /**
     *  Created by PhpStorm.
     *  User: mtoledo
     *  Date: 3/8/17
     *  Time: 8:19 AM
     **/

    get_header();
?>

<?php
  $footer_query = get_posts(
    array(
      'post_type' => 'header_footer'
    )
  );
  $footer_info = get_post_meta($footer_query[0]->ID);
?>
<div class="col-xs-12 al-partners-section text-center">
  <div class="container">
    <p class="al-partners-title">Nuestros Socios</p>
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
        <img class="flag-image" data-pagination="1" src="<?php echo get_template_directory_uri(); ?>/assets/usa_flag.svg" />
        <img class="flag-image" data-pagination="2" src="<?php echo get_template_directory_uri(); ?>/assets/spain_flag.svg" />
      </div>
      <h4>Puedes encontrar Nuestras Oficinas en:</h4>
      <div class="swiper-wrapper">
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
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>

