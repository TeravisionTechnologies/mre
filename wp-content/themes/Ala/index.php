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

  $properties_list = get_posts(
    array(
      'post_type' => 'broker',
      'order' => 'ASC',
      'numberposts' => -1
    )
  );
?>
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
        <a href="#" aria-label="Previous"><span aria-hidden="true"class="pagination-previous">&laquo;</span></a>
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
<div class="col-xs-12 al-partners-section text-center">
  <div class="container">
    <p class="al-partners-title">Nuestros Aliados</p>
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

