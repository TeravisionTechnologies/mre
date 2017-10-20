<?php get_header(); ?>

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
                            <label for="presale"><?php _e('Pre-venta', 'hr') ?></label>
                        </li>
                    </ul>

                    <div class="col-md-12">
                        <div class="input-group">
                            <input type="search" name="search"
                                   placeholder="<?php _e('Introduzca una dirección, ciudad, barrio o código postal', 'hr') ?>">
                            <span class="icon-search icon-search-input"></span>
                        </div>
                    </div>


                    <div class="col-md-12 property-filters">
                        <div class="col-xs-6 col-sm-6 col-md-3">
                            <span class="filter"><?php _e('Tipo de vivienda', 'hr') ?></span>
                            <div class="styled-select">
                                <select>
                                    <option>Here is the first option</option>
                                    <option>The second option</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-3">
                            <span class="filter"><?php _e('Rango de Precio', 'hr') ?></span>
                            <div class="styled-select">
                                <select>
                                    <option>Here is the first option</option>
                                    <option>The second option</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-3">
                            <span class="filter"><?php _e('Nro. de habitaciones', 'hr') ?></span>
                            <div class="styled-select">
                                <select>
                                    <option>Here is the first option</option>
                                    <option>The second option</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-3">
                            <span class="filter"> Nro. de baños </span>
                            <div class="styled-select">
                                <select>
                                    <option>Here is the first option</option>
                                    <option>The second option</option>
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
            <div class="col-md-7">

            </div>
            <div class="col-md-5">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2></h2>
            </div>
        </div>
        <div class="row">
            <?php for ($x = 0; $x <= 8; $x++) { ?>
                <div class="col-md-4">
                    <a class="property">
                        <div class="property-image"
                             style="background: url('http://via.placeholder.com/350x150');"></div>
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
    </div>
  <section class="col-xs-12" style="height: 200px; background-color: red;">
  </section>
  <section class="col-xs-12 hr-partners-section text-center">
    <div class="container">
      <p class="hr-partners-title">La nueva forma de <span>invertir en propiedades</span></p>
    </div>
    <div class="hr-partners-images">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/ala19.svg" alt="Logo ALA19" class="partners-images-one"/>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/mre.svg" alt="Logo MRE RealEstate" class="partners-images-two"/>
    </div>
  </section>
  <section class="col-xs-12 hr-rentalone-section text-center" style="background: blue;">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/ala19.svg" alt="Logo Rental One" class="rentalone-logo"/>
    <div class="rentalone-button"><a href="#">Ver más</a></div>
  </section>

<?php get_footer(); ?>