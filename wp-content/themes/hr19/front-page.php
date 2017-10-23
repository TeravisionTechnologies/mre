<?php 
    get_header();
    $home_query = get_posts(
        array(
            'post_type' => 'header_footer'
        )
    );
    $hero = get_post_meta( $home_query[0]->ID, '_hf_hero', true );
    $partners = get_post_meta( $home_query[0]->ID, '_hf_partners', true );
    $rental = get_post_meta( $home_query[0]->ID, '_hf_rental', true );
    $contact = get_post_meta( $home_query[0]->ID, '_hf_contact_form', true );
?>
  <section class="col-xs-12 hr-hero-section text-center no-padding" style="background-image: url('<?php echo $hero[0]["_hf_hero_background"] ?>');">
    <div class="hero-overlay">
    <?php
      if(isset($hero[0]["_hf_hero_text"])) {
        echo $hero[0]["_hf_hero_text"];
      }
    ?>
    </div>
  </section>
    <div class="clearfix"></div>
    <div class="container property-search-wrapper">
        <div class="row">
            <div class="col-md-12">
                <form id="property-search" class="property-search" action="./" method="post">
                    <ul class="property-status">
                        <li class="col-xs-4 col-sm-4 col-md-4 no-padding">
                            <input type="radio" id="buy" name="status">
                            <label for="buy"><?php _e('Compra', 'hr') ?></label>
                        </li>
                        <li class="col-xs-4 col-sm-4 col-md-4 no-padding">
                            <input type="radio" id="rent" name="status">
                            <label for="rent"><?php _e('Alquiler', 'hr') ?></label>
                        </li>
                        <li class="col-xs-4 col-sm-4 col-md-4 no-padding">
                            <input type="radio" id="presale" name="status">
                            <label for="presale" id="pre"><?php _e('Pre-venta', 'hr') ?></label>
                        </li>
                    </ul>

                    <div class="col-xs-12 col-sm-12 col-md-12 search-text">
                        <div class="input-group">
                            <input type="search" name="s" placeholder="<?php _e('Introduzca una dirección, ciudad, barrio o código postal', 'hr') ?>" value="<?php echo get_query_var('s'); ?>" onBlur="if (this.value == '')
                                    this.value = '<?php echo get_query_var('s'); ?>'" onFocus="if (this.value === '<?php echo get_query_var('s'); ?>')
                                    this.value = ''">
                            <i class="fa fa-search"></i>
                            <input type="hidden" name="post_type[]" value="mls">
                        </div>
                    </div>

                    <div class="col-md-12 property-filters">
                        <div class="col-xs-6 col-sm-3 col-md-3">
                            <span class="filter"><?php _e('Tipo de vivienda', 'hr') ?></span>
                            <div class="styled-select">
                                <select>
                                    <option>--</option>
                                    <option>Una sola familia</option>
                                    <option>Duplex</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-3">
                            <span class="filter"><?php _e('Rango de Precio', 'hr') ?></span>
                            <div class="styled-select">
                                <select>
                                    <option>--</option>
                                    <option>$60.000 - 120.000</option>
                                    <option>$120.000 - 180.000</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-3">
                            <span class="filter"><?php _e('Nro. de habitaciones', 'hr') ?></span>
                            <div class="styled-select">
                                <select>
                                    <option>--</option>
                                    <option>2+</option>
                                    <option>3+</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-3">
                            <span class="filter"><?php _e('Nro. de baños', 'hr') ?></span>
                            <div class="styled-select">
                                <select>
                                    <option>--</option>
                                    <option>2+</option>
                                    <option>3+</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>

    <div class="container property-list">
        <div class="row">
            <div class="property-sorting">
                <div class="col-sm-4 col-md-4">
                    <span class="state-search">Miami, FL</span>
                    <span class="results-search">Mostrando 10 de 8694 casas</span>
                </div>
                <div class="col-sm-8 col-md-8 text-center sort-select">
                    <select class="pull-right">
                        <option selected><?php _e('Ordenar por  ', 'hr') ?></option>
                        <option value="price"><?php _e('Por precio', 'hr') ?></option>
                        <option value="date"><?php _e('Ultimo agregado', 'hr') ?></option>
                    </select>
                    <div class="pull-right choose-search">
                        <div class="radio radio-inline radio-success">
                            <input type="radio" id="inlineRadio1" value="option1" name="radioInline" class="styled" checked>
                            <label for="inlineRadio1"><?php _e('Solo Hr19', 'hr') ?></label>
                        </div>
                        <div class="radio radio-inline radio-success">
                            <input type="radio" id="inlineRadio2" value="option2" name="radioInline" class="styled">
                            <label for="inlineRadio2"><?php _e('Todos', 'hr') ?></label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12"><hr></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="hr-heading"><?php _e('Propiedades Hr19', 'hr') ?></h2>
            </div>
        </div>
        <div class="row">
            <?php for ($x = 0; $x <= 8; $x++) { ?>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <a class="property">
                        <div class="property-image"
                             style="background: url('http://www.bestofinteriors.com/wp-content/uploads/2014/11/4e29c__architecture-Lindsay-Chambers-Professorville.jpg');"></div>
                        <div class="property-info">
                            <span class="property-price">$224,000</span>
                            <span class="property-highlights">Casa, 4 habitaciones</span>
                            <span class="property-address">3215 Stafford Ln</span>
                            <span class="property-code">MLS: 1258364</span>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <nav>
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li><a href="#" class="active">1</a></li>
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
    </div>
  <section class="col-xs-12 hr-partners-section text-center">
    <div class="container">
      <p class="hr-partners-title"><?php if(isset($partners[0]['_hf_partners_text'])) { echo $partners[0]['_hf_partners_text']; }?></p>
    </div>
    <div class="hr-partners-images">
      <a href="#"><img src="<?php echo $partners[0]['_hf_partner_logo_left']; ?>" alt="Logo ALA19" class="partners-images-one"/></a>
      <a href="#"><img src="<?php echo $partners[0]['_hf_partner_logo_right']; ?>" alt="Logo MRE RealEstate" class="partners-images-two"/></a>
    </div>
  </section>
  <section class="col-xs-12 hr-rentalone-section text-center no-padding" style="background-image: url('<?php echo $rental[0]["_hf_rental_background"] ?>')">
    <div class="hr-rentalone-overlay">
      <img src="<?php echo $rental[0]["_hf_rental_logo"] ?>" alt="Logo Rental One" class="rentalone-logo"/>
      <div class="rentalone-button"><a href="#">Ver más</a></div>
    </div>
  </section>
  <section id="contact-us" class="col-xs-12 hr-contact-div no-padding" style="background-image: url('<?php if(isset($contact[0]["_hf_contact_background"])) { echo $contact[0]["_hf_contact_background"]; }?>')">
    <div class="container-hr center-block">
      <div class="row">
        <p class="col-xs-12 text-center hr-contact-text"><?php if(isset($contact[0]['_hf_contact_first'])) { echo $contact[0]['_hf_contact_first']; }?></p>
        <p class="col-xs-12 text-center hr-contact-text-bold"><?php if(isset($contact[0]['_hf_contact_second'])) { echo $contact[0]['_hf_contact_second']; }?></p>
        <div class="col-xs-12 col-md-4 no-padding">
          <div class="hr-phone-box text-center center-block">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/smartphone.svg" alt="Llamanos HR19">
            <p><?php if(isset($contact[0]['_hf_contact_text'])) { echo $contact[0]['_hf_contact_text']; }?></p>
            <a href="tel:<?php echo str_replace(array(".", " ", "-", "/"), "", $contact[0]['_hf_contact_phone']); ?>" class="hr-phone-num"><?php echo $contact[0]['_hf_contact_phone']; ?></a>
          </div>
        </div>
        <div class="col-xs-12 col-md-8 hr-contact-form-div no-padding">
          <?php echo do_shortcode( '[contact-form-7 id="5" title="Home - Contact form"]' ); ?>
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
