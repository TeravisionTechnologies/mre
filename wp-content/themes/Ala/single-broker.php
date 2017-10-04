<?php 
    get_header();
    the_post();
    $background_image = wp_get_attachment_url( get_post_meta( get_the_ID(), '_br_images_id', true ));
    $amenities = get_post_meta( get_the_ID(), '_br_amen', true);
    $amenimages = get_post_meta( get_the_ID(), '_br_amengallery', true);
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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="detail-tlt">Detalles del Interior</div>
                <?php the_content(); ?>
                
            </div>
        </div>
    </div>
    
    <?php if(!empty($amenities)){ ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail-tlt">Comodidades</div>
                    <?php echo '<p>'.$amenities.'</p>';  ?>
                    <?php if(!empty($amenimages)){ ?>
                        <?php foreach ( (array) $amenimages as $attachment_id => $attachment_url ) { ?>
                            <div class="col-md-4">
                                <div class="amenimg">
                                    <?php echo wp_get_attachment_image( $attachment_id, 'full' ); ?>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="detail-tlt">Planos</div>
                <?php if(!empty($pzip)){ ?> 
                    <a class="btn" href="<?php echo $pzip; ?>" download><?php _e('Descargar planos', 'ala') ?></a>
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
                    var marker = new google.maps.Marker({
                      position: uluru,
                      map: map
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