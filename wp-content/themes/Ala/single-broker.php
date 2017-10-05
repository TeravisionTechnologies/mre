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
?>

<section class="prop-header text-center" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5) 0%,rgba(0, 0, 0, 0.5) 100%), url('<?php if(!empty($background_image)){ echo $background_image; } ?>')">
    <h1><?php the_title(); ?></h1>
    <h2>Las Vegas</h2>
    <?php if(!empty($brochure)){ ?>
        <a class="download-bro" href="<?php echo $brochure; ?>" download>Descargar folleto</a>
    <?php } ?>
</section>

<section>
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
                <div class="detail-tlt">Detalles del Interior</div>
                <p><?php echo $intdetails ?></p>
                <?php if(!empty($intimages)){ ?>
                    <div class="row gallery-images">
                        <?php foreach ( (array) $intimages as $attachment_id => $attachment_url ) { ?>
                            <div class="col-md-4">
                                <a href="#" class="amenimg" data-toggle="modal" data-target="#myModalDetails" style="background: url('<?php echo wp_get_attachment_url( $attachment_id, 'full' ); ?>')"></a>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div id="myModalDetails" class="modal fade modal-detail" role="dialog">
                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
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
                    <div class="detail-tlt">Comodidades</div>
                    <?php echo '<p>'.$amenities.'</p>';  ?>
                    <?php if(!empty($amenimages)){ ?>
                        <div class="row gallery-images">
                            <?php foreach ( (array) $amenimages as $attachment_id => $attachment_url ) { ?>
                                <div class="col-md-4">
                                    <a href="#" class="amenimg" data-toggle="modal" data-target="#myModal" style="background: url('<?php echo wp_get_attachment_url( $attachment_id, 'full' ); ?>')"></a>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <div id="myModal" class="modal fade modal-detail" role="dialog">
                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-body">
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
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="detail-tlt">Planos</div>
                <div class="swiper-container gallery-top-blueprint swiper-detail">
                    <div class="swiper-wrapper">
                        <?php foreach ((array) $plainsimages as $attachment_id => $attachment_url) { ?>
                            <div class="swiper-slide" style="background: url('<?php echo wp_get_attachment_url($attachment_id, 'full'); ?>')"></div>
                        <?php } ?>
                    </div>
                    <div class="swiper-button-next swiper-button-white"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                </div>
                <div class="swiper-container gallery-thumbs-blueprint swiper-detail-thumbs border-thumb">
                    <div class="swiper-wrapper">
                        <?php foreach ((array) $plainsimages as $attachment_id => $attachment_url) { ?>
                            <div class="swiper-slide blueprint-img" style="background: url('<?php echo wp_get_attachment_url($attachment_id, 'thumb'); ?>')"></div>
                        <?php } ?>
                    </div>
                </div>
                <?php if (!empty($pzip)) { ?> 
                    <a class="btn-planos" href="<?php echo $pzip; ?>" download><?php _e('Descargar planos', 'ala') ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="detail-tlt">Memoria de Calidad</div>
                <p><?php echo $q[0]; ?></p>
                <div class="row memory-items">
                    <div class="col-md-4 text-center">
                        <?php echo $q[1]; ?> 
                    </div>
                    <div class="col-md-4 text-center">
                        <?php echo $q[2]; ?> 
                    </div>
                    <div class="col-md-4 text-center">
                        <?php echo $q[3]; ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="detail-tlt">Ubicacion</div>
                <div id="map"></div>
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
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="detail-tlt">Lugares Cercanos</div>
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); 