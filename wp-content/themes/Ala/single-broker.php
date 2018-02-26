<?php
get_header();
the_post();
$lang             = get_locale();

$intdetails       = get_post_meta( get_the_ID(), '_br_intdetails', true );
$intdet           = explode( '<!--more-->', $intdetails );
$intimages        = get_post_meta( get_the_ID(), '_br_intimages', true );
$background_image = wp_get_attachment_url( get_post_meta( get_the_ID(), '_br_images_id', true ) );
$amenities        = get_post_meta( get_the_ID(), '_br_amen', true );
$location         = get_post_meta( get_the_ID(), '_br_price', true );
$amenimages       = get_post_meta( get_the_ID(), '_br_amengallery', true );
$plainsimages     = get_post_meta( get_the_ID(), '_br_plainsgallery', true );
$quality          = get_post_meta( get_the_ID(), '_br_quality', true );
$q                = explode( '<!--more-->', $quality );
$lng              = get_post_meta( get_the_ID(), '_br_lng', true );
$lat              = get_post_meta( get_the_ID(), '_br_lat', true );
$brochure         = wp_get_attachment_url( get_post_meta( get_the_ID(), '_br_brochure_id', true ) );
$bbtn_es          = get_post_meta( get_the_ID(), '_br_brochure_es_id', true );
$pzip    = wp_get_attachment_url( get_post_meta( get_the_ID(), '_br_pzip_id', true ) );
$pbtn_es = get_post_meta( get_the_ID(), '_br_pbtn_es_id', true );
$terms     = get_the_terms( get_the_ID(), 'nearby_places' );
$memofiles = wp_get_attachment_url( get_post_meta( get_the_ID(), '_br_memofiles_id', true ) );
$mbtn_es   = get_post_meta( get_the_ID(), '_br_mbtn_es_id', true );
$placeholder = get_template_directory_uri() . '/assets/no-photo.jpg';
?>

    <section class="prop-header text-center"
             style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5) 0%,rgba(0, 0, 0, 0.5) 100%), url(<?php echo( ! empty( $background_image ) ? $background_image : $placeholder ) ?>)">
        <h1><?php the_title(); ?></h1>
		<?php if ( ! empty( $location ) ) { ?><h2><?php echo $location; ?></h2><?php } ?>
		<?php if ( ! empty( $brochure ) ) { ?>
            <a class="download-bro" href="<?php echo $brochure; ?>" download><?php echo $bbtn_es ?></a>
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

        <div class="container">
            <div class="row">
                <div class="col-md-12 detail-content">
					<?php if ( ! empty( $intdetails ) or ! empty( $intimages ) ) { ?>
                        <div class="detail-tlt"><?php echo( $lang == "es_ES" ? 'Detalles del Interior' : 'Interior details' ) ?></div><?php } ?>
                    <p><?php if ( ! empty( $intdetails ) ) {
							echo $intdetails;
						} ?></p>
					<?php if ( ! empty( $intimages ) ) { ?>
                        <div class="row gallery-images">
							<?php $counter = 0;
							foreach ( (array) $intimages as $attachment_id => $attachment_url ) { ?>
                                <div class="col-sm-4 col-md-4">
                                    <a href="#" class="amenimg gallery-detalles" data-number="<?php echo $counter; ?>"
                                       data-toggle="modal" data-target="#myModalDetails"
                                       style="background: url('<?php echo wp_get_attachment_url( $attachment_id, 'full' ); ?>')"></a>
                                </div>
								<?php $counter ++;
							} ?>
                        </div>
					<?php } ?>
                    <div id="myModalDetails" class="modal fade modal-detail" role="dialog">
                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        <div class="modal-dialog modal-lg">
                            <div id="interior-gallery" class="modal-content">
                                <div class="modal-body">
                                    <div class="swiper-container gallery-top-details swiper-detail">
                                        <div class="swiper-wrapper">
											<?php foreach ( (array) $intimages as $attachment_id => $attachment_url ) { ?>
                                                <div class="swiper-slide"
                                                     style="background: url('<?php echo wp_get_attachment_url( $attachment_id, 'full' ); ?>')"></div>
											<?php } ?>
                                        </div>
                                        <div class="swiper-button-next swiper-button-white"></div>
                                        <div class="swiper-button-prev swiper-button-white"></div>
                                    </div>
                                    <div class="swiper-container gallery-thumbs-details swiper-detail-thumbs">
                                        <div class="swiper-wrapper">
											<?php foreach ( (array) $intimages as $attachment_id => $attachment_url ) { ?>
                                                <div class="swiper-slide"
                                                     style="background: url('<?php echo wp_get_attachment_url( $attachment_id, 'thumb' ); ?>')"></div>
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

        <div class="container">
            <div class="row">
                <div class="col-md-12">
					<?php if ( ! empty( $amenities ) or ! empty( $amenimages ) ) { ?>
                        <div class="detail-tlt"><?php echo( $lang == "es_ES" ? 'Comodidades' : 'Amenities' ) ?></div><?php } ?>
                    <p><?php if ( ! empty( $amenities ) ) {
							echo $amenities;
						} ?></p>
					<?php if ( ! empty( $amenimages ) ) { ?>
                        <div class="row gallery-images">
							<?php $counter = 0;
							foreach ( (array) $amenimages as $attachment_id => $attachment_url ) { ?>
                                <div class="col-sm-4 col-md-4">
                                    <a href="#" class="amenimg gallery-comodidades"
                                       data-number="<?php echo $counter; ?>" data-toggle="modal" data-target="#myModal"
                                       style="background: url('<?php echo wp_get_attachment_url( $attachment_id, 'full' ); ?>')"></a>
                                </div>
								<?php $counter ++;
							} ?>
                        </div>
					<?php } ?>
                    <div id="myModal" class="modal fade modal-detail" role="dialog">
                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div id="amenities-gallery" class="modal-body">
                                    <div class="swiper-container gallery-top swiper-detail">
                                        <div class="swiper-wrapper">
											<?php foreach ( (array) $amenimages as $attachment_id => $attachment_url ) { ?>
                                                <div class="swiper-slide"
                                                     style="background: url('<?php echo wp_get_attachment_url( $attachment_id, 'full' ); ?>')"></div>
											<?php } ?>
                                        </div>
                                        <div class="swiper-button-next swiper-button-white"></div>
                                        <div class="swiper-button-prev swiper-button-white"></div>
                                    </div>
                                    <div class="swiper-container gallery-thumbs swiper-detail-thumbs">
                                        <div class="swiper-wrapper">
											<?php foreach ( (array) $amenimages as $attachment_id => $attachment_url ) { ?>
                                                <div class="swiper-slide"
                                                     style="background: url('<?php echo wp_get_attachment_url( $attachment_id, 'full' ); ?>')"></div>
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

		<?php if ( ! empty( $plainsimages ) ) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="detail-tlt"><?php echo( $lang == "es_ES" ? 'Planos' : 'Floorplans' ) ?></div>
                        <div id="gallery-top-blueprint" class="swiper-container gallery-top-blueprint swiper-detail">
                            <div class="swiper-wrapper">
								<?php foreach ( (array) $plainsimages as $attachment_id => $attachment_url ) { ?>
									<?php $filetype = wp_check_filetype( $attachment_url );
									$name           = basename( get_attached_file( $attachment_id ) ); ?>
									<?php if ( $filetype['ext'] == 'mp4' ) { ?>
                                        <div class="swiper-slide ">
                                            <div class="bp-title">
                                                <span>Video: <?php echo $attachment_title = get_the_title( $attachment_id ); ?></span>
                                            </div>
                                            <video id="<?php echo substr( $name, 0, strrpos( $name, '.' ) ); ?>"
                                                   width="100%" controls>
                                                <source src="<?php echo wp_get_attachment_url( $attachment_id, 'full' ); ?>"
                                                        type="video/mp4">
                                                Your browser does not support HTML5 video.
                                            </video>
                                        </div>
									<?php } else { ?>
                                        <div class="swiper-slide swiper-slide-bp"
                                             style="background: url('<?php echo wp_get_attachment_url( $attachment_id, 'full' ); ?>')">
                                            <div class="bp-title">
                                                <span><?php echo $attachment_title = get_the_title( $attachment_id ); ?></span>
                                            </div>
                                        </div>
									<?php } ?>
								<?php } ?>
                            </div>
                        </div>
                        <div class="al-div-border"></div>
                        <div id="gallery-thumbs-blueprint"
                             class="swiper-container gallery-thumbs-blueprint swiper-detail-thumbs border-thumb">
                            <div class="swiper-wrapper">
								<?php foreach ( (array) $plainsimages as $attachment_id => $attachment_url ) { ?>
									<?php $filetype = wp_check_filetype( $attachment_url );
									$name           = basename( get_attached_file( $attachment_id ) ); ?>
									<?php if ( $filetype['ext'] == 'mp4' ) { ?>
                                        <div class="swiper-slide blueprint-img play-video"
                                             data-id="<?php echo substr( $name, 0, strrpos( $name, '.' ) ); ?>"><i
                                                    class="fa fa-play-circle"></i></div>
									<?php } else { ?>
                                        <div class="swiper-slide blueprint-img"
                                             style="background: url('<?php echo wp_get_attachment_url( $attachment_id, 'thumb' ); ?>')"></div>
									<?php } ?>
								<?php } ?>
                            </div>
                        </div>
                        <div class="swiper-button-next swiper-button-white"></div>
                        <div class="swiper-button-prev swiper-button-white"></div>
                        <div class="text-center">
							<?php if ( ! empty( $pzip ) ) { ?>
                                <a class="btn-planos" href="<?php echo $pzip; ?>" download><?php echo $pbtn_es ?></a>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
		<?php } ?>

		<?php if ( ! empty( $quality ) ) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="detail-tlt"><?php echo( $lang == "es_ES" ? 'Memoria de Calidad' : 'Memories' ) ?></div>
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
                    <div class="col-md-12 text-center">
						<?php if ( ! empty( $memofiles ) ) { ?>
                            <a class="btn-planos" href="<?php echo $memofiles; ?>" download><?php echo $mbtn_es ?></a>
						<?php } ?>
                    </div>
                </div>
            </div>
		<?php } ?>

		<?php if ( ! empty( $lat ) && ! empty( $lng ) ) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="detail-tlt"><?php echo( $lang == "es_ES" ? 'Ubicaci&oacute;n' : 'Location' ) ?></div>
                        <div id="map"></div>
                        <div id="save-widget">
                            <strong><?php the_title() ?></strong>
                            <p>
                                <a href="https://www.google.com/maps/place/<?php echo $lat ?>,<?php echo $lng ?>"
                                   target="_blank">
									<?php echo( $lang == "es_ES" ? 'Ver en Google Maps' : 'See in Google Maps' ) ?>
                                </a>
                            </p>
                        </div>
                        <script async defer
                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBH6eKdzSWQ0bic1EiZCzkbhqMqEzYd3eQ&callback=initMap">
                        </script>
                        <script>
                            function initMap() {
                                var uluru = {lat: <?php echo $lat ?>, lng: <?php echo $lng ?>};
                                var map = new google.maps.Map(document.getElementById('map'), {
                                    zoom: 10,
                                    center: uluru
                                });
                                var widgetDiv = document.getElementById('save-widget');
                                map.controls[google.maps.ControlPosition.TOP_LEFT].push(widgetDiv);

                                // Append a Save Control to the existing save-widget div.
                                var saveWidget = new google.maps.SaveWidget(widgetDiv, {
                                    attribution: {
                                        source: 'Google Maps JavaScript API',
                                        webUrl: 'https://developers.google.com/maps/'
                                    }
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

		<?php if ( $terms != null ) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="detail-tlt"><?php echo( $lang == "es_ES" ? 'Lugares Cercanos' : 'Nearby Attractions' ) ?></div>
						<?php if ( $terms != null ) { ?>
                            <div class="row gallery-places">
								<?php $i = 1;
								$counter = 0;
								foreach ( $terms as $term ) {
									$meta_image = get_wp_term_image( $term->term_id );
									?>
                                    <div class="col-sm-4 col-md-4">
                                        <a class="amenimg places-wrapper gallery-nearby"
                                           data-number="<?php echo $counter; ?>" data-toggle="modalx"
                                           data-target="#myModalNearbyx"
                                           style="background: url('<?php echo $meta_image; ?>')">
                                            <div class="places-mask"><?php print $term->name; ?></div>
                                        </a>
                                    </div>
									<?php if ( $i ++ == 3 ) {
										break;
									} ?>
									<?php $counter ++;
								} ?>
                            </div>
						<?php } ?>
                    </div>
                </div>
            </div>
		<?php } else {
			echo '<div class="marginb80"></div>';
		} ?>

    </section>

<?php get_footer();