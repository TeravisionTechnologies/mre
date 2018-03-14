<?php
$lang             = get_locale();
$intdetails       = get_post_meta( get_the_ID(), '_pr_intdetails', true );
$intdet           = explode( '<!--more-->', $intdetails );
$intimages        = get_post_meta( get_the_ID(), '_pr_intimages', true );
$background_image = wp_get_attachment_url( get_post_meta( get_the_ID(), '_pr_images_id', true ) );
$amenities        = get_post_meta( get_the_ID(), '_pr_amen', true );
$location         = get_post_meta( get_the_ID(), '_pr_price', true );
$amenimages       = get_post_meta( get_the_ID(), '_pr_amengallery', true );
$plainsimages     = get_post_meta( get_the_ID(), '_pr_plainsgallery', true );
$quality          = get_post_meta( get_the_ID(), '_pr_quality', true );
$q                = explode( '<!--more-->', $quality );
$lng              = get_post_meta( get_the_ID(), '_pr_lng', true );
$lat              = get_post_meta( get_the_ID(), '_pr_lat', true );
$brochure         = wp_get_attachment_url( get_post_meta( get_the_ID(), '_pr_brochure_id', true ) );
$bbtn_es          = get_post_meta( get_the_ID(), '_pr_brochure_es_id', true );
$pzip             = wp_get_attachment_url( get_post_meta( get_the_ID(), '_pr_pzip_id', true ) );
$pbtn_es          = get_post_meta( get_the_ID(), '_pr_pbtn_es_id', true );
$terms            = get_the_terms( get_the_ID(), 'nearby_places' );
$memofiles        = wp_get_attachment_url( get_post_meta( get_the_ID(), '_pr_memofiles_id', true ) );
$mbtn_es          = get_post_meta( get_the_ID(), '_pr_mbtn_es_id', true );
$placeholder      = get_template_directory_uri() . '/assets/no-photo.jpg';
?>
<div class="breadcrumb-info">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>"><i id="go-back" class="fa fa-chevron-left"
                                                                        aria-hidden="true"></i></a>
                    <span>
						<?php if ( ! empty( $location ) ) {
							echo $location;
						} ?> >
						<?php the_title(); ?>
                        </span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="prop-header text-center"
         style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5) 0%,rgba(0, 0, 0, 0.5) 100%), url(<?php echo( ! empty( $background_image ) ? $background_image : $placeholder ) ?>)">
    <h1><?php the_title(); ?></h1>
	<?php if ( ! empty( $location ) ) { ?><h2><?php echo $location; ?></h2><?php } ?>
    <div class="hero-buttons">
		<?php if ( ! empty( $brochure ) ) { ?>
            <a class="download-bro" href="<?php echo $brochure; ?>" download><?php echo $bbtn_es ?></a>
		<?php } ?>
        <a class="download-bro" href="#">Ver videos</a>
    </div>
</section>

<div class="property-features presale-features">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse1"
                                   class="aa"><span
                                            class="number">1</span><?php echo( $lang == "es_ES" ? 'Descripción de la propiedad' : 'Property description' ) ?>
                                </a>
                                <i class="fa fa-minus" aria-hidden="true" data-toggle="collapse"
                                   href="#collapse1" aria-expanded="true"></i>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                            <div class="panel-body">
								<?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse2"><span
                                            class="number">2</span>
									<?php echo( $lang == "es_ES" ? 'Características de la propiedad' : 'Property features' ) ?>
                                </a>
                                <i class="fa fa-minus" aria-hidden="true" data-toggle="collapse"
                                   href="#collapse2" aria-expanded="true"></i>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p><?php if ( ! empty( $intdetails ) ) {
										echo $intdetails;
									} ?>
                                </p>
								<?php if ( ! empty( $intimages ) ) { ?>
                                    <div class="row gallery-images">
										<?php $counter = 0;
										foreach ( (array) $intimages as $attachment_id => $attachment_url ) { ?>
                                            <div class="col-sm-4 col-md-4">
                                                <a href="#" class="amenimg gallery-detalles"
                                                   data-number="<?php echo $counter; ?>"
                                                   data-toggle="modal" data-target="#myModalDetails"
                                                   style="background: url('<?php echo wp_get_attachment_url( $attachment_id, 'full' ); ?>')"></a>
                                            </div>
											<?php $counter ++;
										} ?>
                                    </div>
								<?php } ?>
                                <div id="myModalDetails" class="modal fade modal-detail" role="dialog">
                                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i>
                                    </button>
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse3"><span
                                            class="number">3</span>
									<?php echo( $lang == "es_ES" ? 'Comodidades' : 'Amenities' ) ?>
                                </a>
                                <i class="fa fa-minus" aria-hidden="true" data-toggle="collapse"
                                   href="#collapse2" aria-expanded="true"></i>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p><?php if ( ! empty( $amenities ) ) {
										echo $amenities;
									} ?></p>
								<?php if ( ! empty( $amenimages ) ) { ?>
                                    <div class="row gallery-images">
										<?php $counter = 0;
										foreach ( (array) $amenimages as $attachment_id => $attachment_url ) { ?>
                                            <div class="col-sm-4 col-md-4">
                                                <a href="#" class="amenimg gallery-comodidades"
                                                   data-number="<?php echo $counter; ?>" data-toggle="modal"
                                                   data-target="#myModal"
                                                   style="background: url('<?php echo wp_get_attachment_url( $attachment_id, 'full' ); ?>')"></a>
                                            </div>
											<?php $counter ++;
										} ?>
                                    </div>
								<?php } ?>
                                <div id="myModal" class="modal fade modal-detail" role="dialog">
                                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i>
                                    </button>
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
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse4"
                                       class="aa"><span
                                                class="number">4</span><?php echo( $lang == "es_ES" ? 'Planos' : 'Floorplans' ) ?>
                                    </a>
                                    <i class="fa fa-minus" aria-hidden="true" data-toggle="collapse"
                                       href="#collapse1" aria-expanded="true"></i>
                                </h4>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div id="gallery-top-blueprint"
                                         class="swiper-container gallery-top-blueprint swiper-detail">
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
                                                         data-id="<?php echo substr( $name, 0, strrpos( $name, '.' ) ); ?>">
                                                        <i
                                                                class="fa fa-play-circle"></i></div>
												<?php } else { ?>
                                                    <div class="swiper-slide blueprint-img"
                                                         style="background: url('<?php echo wp_get_attachment_url( $attachment_id, 'thumb' ); ?>')"></div>
												<?php } ?>
											<?php } ?>
                                        </div>
                                    </div>
                                    <div class="swiper-button-next swiper-button-white"><i
                                                class="fa fa-chevron-circle-right"></i></div>
                                    <div class="swiper-button-prev swiper-button-white"><i
                                                class="fa fa-chevron-circle-left"></i></div>
                                    <div class="text-center">
										<?php if ( ! empty( $pzip ) ) { ?>
                                            <a class="btn-planos" href="<?php echo $pzip; ?>"
                                               download><?php echo $pbtn_es ?></a>
										<?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php } ?>
					<?php if ( ! empty( $quality ) ) { ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse5"
                                   class="aa"><span
                                            class="number">5</span><?php echo( $lang == "es_ES" ? 'Memoria de Calidad' : 'Memories' ) ?>
                                </a>
                                <i class="fa fa-minus" aria-hidden="true" data-toggle="collapse"
                                   href="#collapse1" aria-expanded="true"></i>
                            </h4>
                        </div>
                        <div id="collapse5" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="col-md-12">
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
                                        <a class="btn-planos" href="<?php echo $memofiles; ?>"
                                           download><?php echo $mbtn_es ?></a>
									<?php } ?>
                                </div>
                            </div>
                        </div>
						<?php } ?>

                        <div class="panel panel-default prlocation">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse6"><span
                                                class="number">6</span>
										<?php echo( $lang == "es_ES" ? 'Ubicación de la propiedad' : 'Property location' ) ?>
                                    </a>
                                    <i class="fa fa-minus" aria-hidden="true" data-toggle="collapse"
                                       href="#collapse3" aria-expanded="true"></i>
                                </h4>
                            </div>
                            <div id="collapse6" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div id="map-detail"></div>
                                    <script>
                                        function initMap() {
                                            var uluru = {lat: <?php echo $lat ?>, lng: <?php echo $lng ?>};
                                            var map = new google.maps.Map(document.getElementById('map-detail'), {
                                                zoom: 10,
                                                center: uluru
                                            });

                                            var marker = new google.maps.Marker({
                                                position: uluru,
                                                map: map,
                                                animation: google.maps.Animation.BOUNCE
                                            });
                                        }

                                        google.maps.event.addDomListener(window, 'load', initMap);
                                    </script>
                                </div>
                            </div>
                        </div>

	                    <?php if ( $terms != null ) { ?>
                        <div class="panel panel-default prlocation">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse6"><span
                                                class="number">6</span>
					                    <?php echo( $lang == "es_ES" ? 'Lugares cercanos' : 'Nearby Attractions' ) ?>
                                    </a>
                                    <i class="fa fa-minus" aria-hidden="true" data-toggle="collapse"
                                       href="#collapse3" aria-expanded="true"></i>
                                </h4>
                            </div>
                            <div id="collapse6" class="panel-collapse collapse in">
                                <div class="panel-body">
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
	                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$similarproperties = array(
	'post_type'      => 'property',
	'post__not_in'   => array( $currentproperty ),
	'posts_per_page' => 3,
	'meta_query'     => array(
		'relation' => 'AND',
		array(
			'key'     => '_pr_city',
			'value'   => $city,
			'compare' => '='
		),
		array(
			'key'     => '_pr_type_of_property',
			'value'   => $type,
			'compare' => '='
		),
		array(
			'key'     => '_pr_room_count',
			'value'   => $rooms,
			'compare' => '='
		)
	)
);
query_posts( $similarproperties );
if ( have_posts() ): ?>
    <div class="property-similar">
        <div class="container property-list">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="hr-heading"><?php echo( $lang == "es_ES" ? 'Propiedades similares' : 'Similar homes' ) ?></h2>
                </div>
            </div>
            <div class="row">
				<?php while ( have_posts() ): the_post();
					$address     = get_post_meta( get_the_ID(), '_pr_address', true );
					$price       = get_post_meta( get_the_ID(), '_pr_current_price', true );
					$type        = get_post_meta( get_the_ID(), '_pr_type_of_property', true );
					$rooms       = get_post_meta( get_the_ID(), '_pr_room_count', true );
					$baths       = get_post_meta( get_the_ID(), '_pr_baths_total', true );
					$sysid       = get_post_meta( get_the_ID(), '_pr_matrixid', true );
					$city        = get_post_meta( get_the_ID(), '_pr_city', true );
					$state       = get_post_meta( get_the_ID(), '_pr_state', true );
					$csymbol     = get_post_meta( get_the_ID(), '_pr_currency_symbol', true );
					$gallery     = get_post_meta( get_the_ID(), '_pr_photos', true );
					$bgimg       = $url['baseurl'] . '/photos/' . $sysid . '/1.jpg';
					$headers     = get_headers( $bgimg, 1 );
					$fsize       = $headers['Content-Length'];
					$fsize       = (int) $fsize;
					$urlimage    = wp_remote_head( $bgimg );
					$urlimage    = $urlimage['response']['code'];
					$placeholder = get_template_directory_uri() . '/assets/no-photo.jpg';
					if ( ! empty( $csymbol ) ) {
						$csymbol = $csymbol;
					} else {
						$csymbol = "$";
					}
					if ( ! empty( $gallery ) ) {
						$first_pic = reset( $gallery );
					}
					if ( $rooms == "1" ) {
						if ( $lang == "es_ES" ) {
							$rm = " Habitaci&oacute;n";
						} else {
							$rm = " Room";
						}
					} else {
						if ( $lang == "es_ES" ) {
							$rm = " Habitaciones";
						} else {
							$rm = " Rooms";
						}
					}
					if ( $baths == "1" ) {
						if ( $lang == "es_ES" ) {
							$bth = " Baño";
						} else {
							$bth = " Bath";
						}
					} else {
						if ( $lang == "es_ES" ) {
							$bth = " Baños";
						} else {
							$bth = " Baths";
						}
					}
					?>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <a href="<?php the_permalink(); ?>" class="property">
                            <div class="property-image" style="background: url(
							<?php if ( ( $urlimage == 404 or $fsize < 100 ) && ( empty( $gallery ) ) ) {
								echo $placeholder;
							} elseif ( ! empty( $gallery ) ) {
								echo $first_pic;
							} else {
								echo $bgimg;
							} ?>);">
                                <div class="by-broker">
                                    <p><?php echo( $lang == "es_ES" ? 'Por' : 'By' ) ?> <span>Marlene Goldman INC</span>
                                    </p>
                                </div>
                            </div>
                            <div class="property-info">
                                <div class="property-price">
									<?php
									if ( ! empty( $price ) ) {
										echo $csymbol . number_format( $price, 0, '.', ',' );
									}
									?>
                                </div>
                                <div class="property-highlights">
									<?php if ( ! empty( $type ) ) {
										echo $type;
									} else {
										echo 'N/A';
									} ?>
									<?php if ( ! empty( $rooms ) ) {
										echo '· ' . $rooms . $rm;
									} ?>
									<?php if ( ! empty( $baths ) ) {
										echo '· ' . $baths . $bth;
									} ?>
                                </div>
                                <div class="property-address">
									<?php if ( ! empty( $address ) ) {
										echo $city;
									} else if ( ! empty( $city ) and ! empty( $state ) ) {
										echo $city . ', ' . $state;
									} else {
										echo $state;
									} ?>
                                </div>
                                <div class="property-code">MLS: <?php the_title(); ?></div>
                            </div>
                        </a>
                    </div>
				<?php endwhile;
				wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="margint50"></div>
<?php endif; ?>