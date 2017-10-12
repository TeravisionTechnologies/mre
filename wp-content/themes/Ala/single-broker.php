<?php
    get_header();
    the_post();
    $intdetails = get_post_meta( get_the_ID(), '_br_intdetails', true);
    $intdet = explode( '<!--more-->', $intdetails );
    $intimages = get_post_meta( get_the_ID(), '_br_intimages', true);
    $background_image = wp_get_attachment_url( get_post_meta( get_the_ID(), '_br_images_id', true ));
    $amenities = get_post_meta( get_the_ID(), '_br_amen', true);
    $amenimages = get_post_meta( get_the_ID(), '_br_amengallery', true);
    $plainsimages = get_post_meta( get_the_ID(), '_br_plainsgallery', true);
    $quality = get_post_meta( get_the_ID(), '_br_quality', true);
    $q = explode( '<!--more-->', $quality );
    $lng = get_post_meta( get_the_ID(), '_br_lng', true);
    $lat = get_post_meta( get_the_ID(), '_br_lat', true);
    $brochure = wp_get_attachment_url( get_post_meta( get_the_ID(), '_br_brochure_id', true ));
    $pzip = wp_get_attachment_url( get_post_meta( get_the_ID(), '_br_pzip_id', true ));
    $terms = get_the_terms(get_the_ID(), 'nearby_places');
?>

<section class="prop-header text-center" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5) 0%,rgba(0, 0, 0, 0.5) 100%), url('<?php if(!empty($background_image)){ echo $background_image; } ?>')">
    <h1><?php the_title(); ?></h1>
    <h2>Las Vegas</h2>
    <?php if(!empty($brochure)){ ?>
        <a class="download-bro" href="<?php echo $brochure; ?>" download><?php _e('Descargar PDF', 'ala') ?></a>
    <?php } ?>
</section>

<section id="property-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php the_content(); ?>
            </div>
        </div>
    </div>

    <?php if(!empty($intdetails)){ ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 detail-content">
                <div class="detail-tlt"><?php _e('Detalles del Interior', 'ala') ?></div>
                <p><?php echo $intdetails ?></p>
                <?php if(!empty($intimages)){ ?>
                    <div class="row gallery-images">
                        <?php $counter = 0; foreach ( (array) $intimages as $attachment_id => $attachment_url ) { ?>
                            <div class="col-sm-4 col-md-4">
                                <a href="#" class="amenimg gallery-detalles" data-number="<?php echo $counter; ?>" data-toggle="modal" data-target="#myModalDetails" style="background: url('<?php echo wp_get_attachment_url( $attachment_id, 'full' ); ?>')"></a>
                            </div>
                        <?php $counter++; } ?>
                    </div>
                <?php } ?>
                <div id="myModalDetails" class="modal fade modal-detail" role="dialog">
                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        <div class="modal-dialog modal-lg">
                            <div id="interior-gallery" class="modal-content">
                                <div class="modal-body">
                                    <div class="swiper-container gallery-top-details swiper-detail">
                                        <div class="swiper-wrapper">
                                            <?php foreach ((array) $intimages as $attachment_id => $attachment_url) { ?>
                                                <div class="swiper-slide" style="background: url('<?php echo wp_get_attachment_url($attachment_id, 'full'); ?>')"></div>
                                            <?php } ?>
                                        </div>
                                        <div class="swiper-button-next swiper-button-white"></div>
                                        <div class="swiper-button-prev swiper-button-white"></div>
                                    </div>
                                    <div class="swiper-container gallery-thumbs-details swiper-detail-thumbs">
                                        <div class="swiper-wrapper">
                                            <?php foreach ((array) $intimages as $attachment_id => $attachment_url) { ?>
                                                <div class="swiper-slide" style="background: url('<?php echo wp_get_attachment_url($attachment_id, 'thumb'); ?>')"></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <?php if(!empty($amenities)){ ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail-tlt"><?php _e('Comodidades', 'ala') ?></div>
                    <?php echo '<p>'.$amenities.'</p>';  ?>
                    <?php if(!empty($amenimages)){ ?>
                        <div class="row gallery-images">
                            <?php $counter = 0; foreach ( (array) $amenimages as $attachment_id => $attachment_url ) { ?>
                                <div class="col-sm-4 col-md-4">
                                    <a href="#" class="amenimg gallery-comodidades" data-number="<?php echo $counter; ?>" data-toggle="modal" data-target="#myModal" style="background: url('<?php echo wp_get_attachment_url( $attachment_id, 'full' ); ?>')"></a>
                                </div>
                            <?php $counter++; } ?>
                        </div>
                    <?php } ?>
                    <div id="myModal" class="modal fade modal-detail" role="dialog">
                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div id="amenities-gallery" class="modal-body">
                                        <div class="swiper-container gallery-top swiper-detail">
                                            <div class="swiper-wrapper">
                                                <?php foreach ((array) $amenimages as $attachment_id => $attachment_url) { ?>
                                                    <div class="swiper-slide" style="background: url('<?php echo wp_get_attachment_url($attachment_id, 'full'); ?>')"></div>
                                                <?php } ?>
                                            </div>
                                            <div class="swiper-button-next swiper-button-white"></div>
                                            <div class="swiper-button-prev swiper-button-white"></div>
                                        </div>
                                        <div class="swiper-container gallery-thumbs swiper-detail-thumbs">
                                            <div class="swiper-wrapper">
                                                <?php foreach ((array) $amenimages as $attachment_id => $attachment_url) { ?>
                                                    <div class="swiper-slide" style="background: url('<?php echo wp_get_attachment_url($attachment_id, 'full'); ?>')"></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if(!empty($plainsimages)){ ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail-tlt"><?php _e('Planos', 'ala') ?></div>
                    <div id="gallery-top-blueprint" class="swiper-container gallery-top-blueprint swiper-detail">
                        <div class="swiper-wrapper">
                            <?php foreach ((array) $plainsimages as $attachment_id => $attachment_url) { ?>
                                <div class="swiper-slide swiper-slide-bp" style="background: url('<?php echo wp_get_attachment_url($attachment_id, 'full'); ?>')">
                                    <div class="bp-title"><span><?php echo $attachment_title = get_the_title($attachment_id); ?></span></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="al-div-border"></div>
                    <div id="gallery-thumbs-blueprint" class="swiper-container gallery-thumbs-blueprint swiper-detail-thumbs border-thumb">
                        <div class="swiper-wrapper">
                            <?php foreach ((array) $plainsimages as $attachment_id => $attachment_url) { ?>
                                <div class="swiper-slide blueprint-img" style="background: url('<?php echo wp_get_attachment_url($attachment_id, 'thumb'); ?>')"></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="swiper-button-next swiper-button-white"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                    <?php if (!empty($pzip)) { ?>
                        <a class="btn-planos" href="<?php echo $pzip; ?>" download><?php _e('Descargar planos', 'ala') ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if(!empty($quality)){ ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail-tlt"><?php _e('Memoria de Calidad', 'ala') ?></div>
                    <p><?php echo $q[0]; ?></p>
                    <div class="row memory-items">
                        <div class="col-sm-4 col-md-4 text-center">
                            <?php echo $q[1]; ?>
                        </div>
                        <div class="col-sm-4 col-md-4 text-center">
                            <?php echo $q[2]; ?>
                        </div>
                        <div class="col-sm-4 col-md-4 text-center">
                            <?php echo $q[3]; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if(!empty($lat) && !empty($lng)){ ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail-tlt"><?php _e('Ubicaci&oacute;n', 'ala') ?></div>
                    <div id="map"></div>
                    <div id="save-widget">
                        <strong><?php the_title() ?></strong>
                        <p><a href="https://www.google.com/maps/place/<?php echo $lat ?>,<?php echo $lng ?>" target="_blank">Ver en Google Maps</a></p>
                    </div>
                    <script>
                      function initMap() {
                        var uluru = {lat: <?php echo $lat ?>, lng: <?php echo $lng ?>};
                        var map = new google.maps.Map(document.getElementById('map'), {
                          zoom: 10,
                          center: uluru
                        });
                        var alamarker = '<?php echo get_template_directory_uri(); ?>/assets/marker.png';
                        var marker = new google.maps.Marker({
                          position: uluru,
                          map: map,
                          icon: alamarker,
                          animation: google.maps.Animation.BOUNCE
                        });
                      }
                    </script>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if ($terms != null) { ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail-tlt"><?php _e('Lugares Cercanos', 'ala') ?></div>
                    <?php if ($terms != null) { ?>
                        <div class="row gallery-places">
                            <?php $i = 1; $counter = 0; foreach ($terms as $term) {
                                $meta_image = get_wp_term_image($term->term_id);
                                ?>
                                <div class="col-sm-4 col-md-4">
                                    <a href="#" class="amenimg places-wrapper gallery-nearby" data-number="<?php echo $counter; ?>" data-toggle="modal" data-target="#myModalNearby" style="background: url('<?php echo $meta_image; ?>')">
                                        <div class="places-mask"><?php print $term->name; ?></div>
                                    </a>
                                </div>
                                <?php  if ($i++ == 3) break; ?>
                            <?php $counter++; } ?>
                        </div>
                    <?php } ?>
                    <div id="myModalNearby" class="modal fade modal-detail" role="dialog">
                      <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div id="amenities-gallery" class="modal-body">
                            <div class="swiper-container gallery-top-nearby swiper-detail">
                              <div class="swiper-wrapper">
                                <?php foreach ($terms as $term) {  $meta_image = get_wp_term_image($term->term_id); ?>
                                  <div class="swiper-slide" style="background: url('<?php echo $meta_image; ?>')"></div>
                                <?php } ?>
                              </div>
                              <div class="swiper-button-next swiper-button-white"></div>
                              <div class="swiper-button-prev swiper-button-white"></div>
                            </div>
                            <div class="swiper-container gallery-thumbs-nearby swiper-detail-thumbs">
                              <div class="swiper-wrapper">
                                <?php foreach ($terms as $term) {  $meta_image = get_wp_term_image($term->term_id); ?>
                                  <div class="swiper-slide" style="background: url('<?php echo $meta_image; ?>')"></div>
                                <?php } ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

</section>

<?php get_footer();