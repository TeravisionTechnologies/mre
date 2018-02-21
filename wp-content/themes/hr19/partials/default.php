<?php
//Campos Basicos
$address   = get_post_meta( get_the_ID(), '_pr_address', true );
$city      = get_post_meta( get_the_ID(), '_pr_city', true );
$state     = get_post_meta( get_the_ID(), '_pr_state', true );
$community = get_post_meta( get_the_ID(), '_pr_community', true );
$subdiv    = get_post_meta( get_the_ID(), '_pr_subdiv', true );
$price     = get_post_meta( get_the_ID(), '_pr_current_price', true );
$type      = get_post_meta( get_the_ID(), '_pr_type_of_property', true );
$rooms     = get_post_meta( get_the_ID(), '_pr_room_count', true );
$baths     = get_post_meta( get_the_ID(), '_pr_baths_total', true );
$bathsf    = get_post_meta( get_the_ID(), '_pr_baths_full', true );
$bathsh    = get_post_meta( get_the_ID(), '_pr_baths_half', true );
$sqft      = get_post_meta( get_the_ID(), '_pr_sqft', true );
$surf      = get_post_meta( get_the_ID(), '_pr_surf', true );
$hoa       = get_post_meta( get_the_ID(), '_pr_hoa', true );
$yearbuilt = get_post_meta( get_the_ID(), '_pr_yearbuilt', true );
$status    = get_post_meta( get_the_ID(), '_pr_status', true );
$sysid     = get_post_meta( get_the_ID(), '_pr_matrixid', true );
$taxes     = get_post_meta( get_the_ID(), '_pr_TaxAmount', true );
$mortgage  = get_post_meta( get_the_ID(), '_pr_TotalMortgage', true );
//Nuevos campos
$pets         = get_post_meta( get_the_ID(), '_pr_PetsAllowedYN', true );
$cooling      = get_post_meta( get_the_ID(), '_pr_CoolingDescription', true );
$constructype = get_post_meta( get_the_ID(), '_pr_ConstructionType', true );
$floordesc    = get_post_meta( get_the_ID(), '_pr_FloorDescription', true );
$heating      = get_post_meta( get_the_ID(), '_pr_HeatingDescription', true );
$restrictions = get_post_meta( get_the_ID(), '_pr_Restrictions', true );
$includes     = get_post_meta( get_the_ID(), '_pr_MaintenanceIncludes', true );
$internet     = get_post_meta( get_the_ID(), '_pr_InternetYN', true );
$parking      = get_post_meta( get_the_ID(), '_pr_ParkingDescription', true );
$view         = get_post_meta( get_the_ID(), '_pr_UnitView', true );
$balcony      = get_post_meta( get_the_ID(), '_pr_BalconyPorchandorPatioYN', true );
$amenities    = get_post_meta( get_the_ID(), '_pr_Amenities', true );
$security     = get_post_meta( get_the_ID(), '_pr_SecurityInformation', true );
$appliances   = get_post_meta( get_the_ID(), '_pr_EquipmentAppliances', true );
$interior     = get_post_meta( get_the_ID(), '_pr_InteriorFeatures', true );
$cableinfo    = get_post_meta( get_the_ID(), '_pr_CableAvailableYN', true );
$poolinfo     = get_post_meta( get_the_ID(), '_pr_PoolYN', true );
$boatdock     = get_post_meta( get_the_ID(), '_pr_BoatDockAccommodates', true );
$locationprop = get_post_meta( get_the_ID(), '_pr_LocationofProperty', true );
$parcelnumber = get_post_meta( get_the_ID(), '_pr_ParcelNumber', true );
$postalcode   = get_post_meta( get_the_ID(), '_pr_postalcode', true );
$unitnumb     = get_post_meta( get_the_ID(), '_pr_UnitNumber', true );
$unitview     = get_post_meta( get_the_ID(), '_pr_UnitView', true );
$csymbol      = get_post_meta( get_the_ID(), '_pr_currency_symbol', true );
$gallery      = get_post_meta( get_the_ID(), '_pr_photos', true );
if ( ! empty( $csymbol ) ) {
	$csymbol = $csymbol;
} else {
	$csymbol = "$";
}
if ( $pets == "1" ) {
	$petsinfo = 'Pets allowed';
} else {
	$petsinfo = 'No Pets allowed';
}
if ( $internet == "1" ) {
	$interinfo = "Internet";
}
if ( $balcony == "1" ) {
	$balcon = "Balcony Porchandor Patio";
}
if ( $cableinfo == "1" ) {
	$cable = 'Cable';
}
if ( $poolinfo == "1" ) {
	$pool = 'Pool';
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
if ( $bathsh == "1" ) {
	if ( $lang == "es_ES" ) {
		$bathm = " Medio baño";
	} else {
		$bathm = " Half bath";
	}
} else {
	if ( $lang == "es_ES" ) {
		$bathm = " Medios baños";
	} else {
		$bathm = " Half baths";
	}
}

$url             = wp_upload_dir();
$directory       = $url['basedir'] . '/photos/' . $sysid . '/';
$images          = glob( $directory . "*.jpg" );
$currentproperty = get_the_ID();
$placeholder     = get_template_directory_uri() . '/assets/no-photo.jpg';
$bgimg           = $url['baseurl'] . '/photos/' . $sysid . '/1.jpg';
$headers         = get_headers( $bgimg, 1 );
$bgimg           = $headers['Content-Length'];
$bgimg           = (int) $bgimg;
?>
    <div class="breadcrumb-info">
        <div class="container">
            <div class="row">
                <div class="col-xs-9 col-sm-7 col-md-6">
                    <div class="breadcrumbs">
                        <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>"><i id="go-back" class="fa fa-chevron-left"
                                                                            aria-hidden="true"></i></a>
						<?php if ( ! empty( $city ) ) {
							echo $city;
						} ?> >
						<?php if ( ! empty( $address ) ) {
							echo $address;
						} else {
							echo '--';
						} ?>
                    </div>
                </div>
                <div class="col-xs-3 col-sm-5 col-md-6 text-right">
                    <!--<div class="published">Publicada hace: 59 días</div>-->
					<?php if ( ! empty( $status ) ) { ?>
                        <div class="status"><?php echo( $lang == "es_ES" ? 'Estatus: ' : 'Status: ' ) ?>
                        <span><?php echo $status; ?></span></div><?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="property-carousel">
        <div class="swiper-container swiper-property">
            <div class="swiper-wrapper">
				<?php if ( ( empty( $images ) or $bgimg < 100 ) && ( empty( $gallery ) ) ) { ?>
                    <div class="swiper-slide">
                        <div style="background-image: url(<?php echo $placeholder; ?>)"></div>
                    </div>
				<?php } elseif ( ! empty( $images ) && ( empty( $gallery ) ) ) { ?>
					<?php foreach ( $images as $image ) {
						$end = end( explode( '/', rtrim( $image, '/' ) ) ); ?>
                        <div class="swiper-slide">
                            <div style="background-image: url(<?php echo $url['baseurl'] . '/photos/' . $sysid . '/' . $end; ?>)"></div>
                        </div>
					<?php } ?>
				<?php } else { ?>
					<?php foreach ( $gallery as $gal ) { ?>
                        <div class="swiper-slide">
                            <div style="background-image: url(<?php echo $gal; ?>)"></div>
                        </div>
					<?php } ?>
				<?php } ?>
            </div>
            <div class="swiper-button-next"><i class="fa fa-chevron-circle-right"></i></div>
            <div class="swiper-button-prev"><i class="fa fa-chevron-circle-left"></i></div>
            <div class="total"><i class="fa fa-camera"></i>
                <div class="fraction"></div> <?php echo( $lang == "es_ES" ? 'fotos' : 'photos' ) ?></div>
        </div>
    </div>

    <div class="property-info-heading">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-offset-1 col-md-3 price borderl">
                    <div><?php echo( $lang == "es_ES" ? 'Precio: ' : 'Price: ' ) ?></div>
                    <div class="price-txt"><?php if ( ! empty( $price ) ) {
							echo $csymbol . number_format( $price, 0, '.', ',' );
						} ?></div>
                    <div class="sm-text">
						<?php echo( $lang == "es_ES" ? 'Estimado de hipoteca' : 'Mortgage estimate' ) ?>
						<?php echo $mortgage ?>
						<?php echo( $lang == "es_ES" ? '/mes' : '/month' ) ?>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4 paddingl30 borderl">
                    <div class="md-text">
						<?php if ( ! empty( $address ) ) {
							echo '<div class="addr">' . $address . '</div>';
						} else if ( ! empty( $city ) and ! empty( $state ) ) {
							echo $city . ', ' . $state;
						} else {
							echo $state;
						} ?>
                    </div>
                    <div class="single-property-highlights">
						<?php if ( ! empty( $type ) ) {
							echo $type;
						} ?>
						<?php if ( ! empty( $rooms ) ) {
							echo '· ' . $rooms . $rm;
						} ?>
						<?php if ( ! empty( $baths ) ) {
							echo '· ' . $baths . $bth;
						} ?>
						<?php if ( ! empty( $bathsh ) ) {
							echo '· ' . $bathsh . $bathm;
						} ?>
                    </div>
                    <div class="sm-text"><?php echo( $lang == "es_ES" ? ' Número de MLS: ' : ' MLS Number: ' ) ?><?php the_title(); ?></div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3">
                    <div class="row surface">
                        <div class="col-xs-6 col-sm-6 col-md-6 paddingl30">
                            <div class="sm-text"><?php echo( $lang == "es_ES" ? 'Superficie:' : 'Surface:' ) ?></div>
                            <div class="md-text"><?php if ( ! empty( $surf ) ) {
									echo $surf;
								} else {
									echo '--';
								} ?> </div>
                        </div>
                        <div class="<?php ( empty( $surf ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xs-6 col-sm-6 col-md-6' ) ?>">
                            <div class="sm-text"><?php echo( $lang == "es_ES" ? 'Pies cuadrados:' : 'Square feet:' ) ?></div>
                            <div class="md-text"><?php if ( ! empty( $sqft ) ) {
									echo $sqft . ' ft²';
								} else {
									echo '--';
								} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="property-features">
        <div class="container">
            <div class="row">
                <div class="col-md-12 oh-wrap">
                    <div class="open-house">
                        <spam class="open-blue">Open House</spam>
                        Saturday October 28, 11:00 am - 3:00 pm
                    </div>
                </div>
            </div>
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
                                    <div class="row main-features">
                                        <div class="col-xs-4 col-sm-3 col-md-3 feature">
                                            <div><i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top"
                                                    title="<?php echo( $lang == "es_ES" ? 'La tarifa de asociación de propietarios (HOA) es una cantidad de dinero que deben pagar mensualmente los propietarios de ciertos tipos de propiedades residenciales para ayudar a mantener y mejorar las propiedades en la asociación.' : 'The HOA is an amount of money that owners of certain types of residential properties must pay monthly to help maintain and improve properties in the association.' ) ?>"></i> <?php echo( $lang == "es_ES" ? 'Cuotas de HOA:' : 'HOA Fees' ) ?>
                                            </div>
                                            <div class="info">
												<?php
												echo $csymbol . $hoa . ( $lang == "es_ES" ? '/mes' : '/month' );
												?>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-2 col-md-2 feature">
                                            <div><?php echo( $lang == "es_ES" ? 'Impuestos' : 'Taxes' ) ?></div>
                                            <div class="info"><?php if ( ! empty( $taxes ) ) {
													echo $csymbol . number_format( $taxes, 0, '.', ',' );
												} else {
													echo '0';
												} ?></div>
                                        </div>
                                        <div class="col-xs-4 col-sm-3 col-md-2 feature">
                                            <div><?php echo( $lang == "es_ES" ? 'Año de construcción:' : 'Year of construction:' ) ?></div>
                                            <div class="info"><?php if ( ! empty( $yearbuilt ) ) {
													echo $yearbuilt;
												} else {
													echo '--';
												} ?></div>
                                        </div>
                                        <div class="col-xs-4 col-sm-2 col-md-2 feature">
                                            <div><?php echo( $lang == "es_ES" ? 'Comunidad:' : 'Community:' ) ?></div>
                                            <div class="info"><?php if ( ! empty( $community ) ) {
													echo $community;
												} else {
													echo '--';
												} ?></div>
                                        </div>
                                        <div class="col-xs-4 col-sm-2 col-md-3 feature">
                                            <div><?php echo( $lang == "es_ES" ? 'Subdivision:' : 'Subdivision:' ) ?></div>
                                            <div class="info"><?php if ( ! empty( $subdiv ) ) {
													echo $subdiv;
												} else {
													echo '--';
												} ?></div>
                                        </div>
                                    </div>
                                    <h6><?php echo( $lang == "es_ES" ? 'Otras características:' : 'Additional features:' ) ?></h6>
                                    <ul>

										<?php if ( ! empty( $locationprop ) ) { ?>
                                            <li><?php echo( $lang == "es_ES" ? 'Ubicación de la propiedad:' : 'Location of Property:' ) ?>
												<?php echo preg_replace( '/(?<!\d),|,(?!\d{3})/', ', ', $locationprop ); ?>
                                            </li>
										<?php } ?>

										<?php if ( ! empty( $constructype ) ) { ?>
                                            <li>
												<?php echo( $lang == "es_ES" ? 'Construcción:' : 'Construction:' ) ?>
												<?php echo preg_replace( '/(?<!\d),|,(?!\d{3})/', ', ', $constructype ); ?>
												<?php echo $floordesc ?>
                                            </li>
										<?php } ?>

										<?php if ( ! empty( $interior ) ) { ?>
                                            <li>Interior:
												<?php echo preg_replace( '/(?<!\d),|,(?!\d{3})/', ', ', $interior ); ?>
                                            </li>
										<?php } ?>

										<?php if ( ! empty( $view ) or ! empty( $balcon ) ) { ?>
                                            <li>
                                                Exterior:
												<?php echo $view ?>
												<?php echo $balcon ?>
                                            </li>
										<?php } ?>

										<?php if ( ! empty( $petsinfo ) ) { ?>
                                            <li>
                                                General: <?php echo $petsinfo ?>
                                            </li>
										<?php } ?>

										<?php if ( ! empty( $cooling ) or ! empty( $heating ) ) { ?>
                                            <li>
												<?php echo( $lang == "es_ES" ? 'Calor / Frío:' : 'Heating / Cooling:' ) ?>
												<?php echo $cooling . ' ' ?>
												<?php echo $heating ?>
                                            </li>
										<?php } ?>

										<?php if ( ! empty( $amenities ) ) { ?>
                                            <li>
												<?php echo( $lang == "es_ES" ? 'Comodidades:' : 'Amenities:' ) ?>
												<?php echo preg_replace( '/(?<!\d),|,(?!\d{3})/', ', ', $amenities ); ?>
                                            </li>
										<?php } ?>

										<?php if ( ! empty( $appliances ) ) { ?>
                                            <li>
												<?php echo( $lang == "es_ES" ? 'Incluye:' : 'Appliances:' ) ?>
												<?php echo preg_replace( '/(?<!\d),|,(?!\d{3})/', ', ', $appliances ); ?>
                                            </li>
										<?php } ?>

										<?php if ( ! empty( $parking ) ) { ?>
                                            <li>
												<?php echo( $lang == "es_ES" ? 'Estacionamiento:' : 'Parking:' ) ?>
												<?php echo preg_replace( '/(?<!\d),|,(?!\d{3})/', ', ', $parking ); ?>
                                            </li>
										<?php } ?>

										<?php if ( ! empty( $boatdock ) ) { ?>
                                            <li>
												<?php echo( $lang == "es_ES" ? 'Muelle de botes:' : 'Boat Dock:' ) ?>
												<?php echo $boatdock ?>
                                            </li>
										<?php } ?>

										<?php if ( ! empty( $pool ) ) { ?>
                                            <li>
												<?php echo( $lang == "es_ES" ? 'Recreación:' : 'Recreation:' ) ?>
												<?php echo $pool ?>
                                            </li>
										<?php } ?>

										<?php if ( ! empty( $interinfo ) or ! empty( $cable ) ) { ?>
                                            <li>
												<?php echo( $lang == "es_ES" ? 'Servicios:' : 'Services:' ) ?>
												<?php echo $interinfo ?>
												<?php echo $cable ?>
                                            </li>
										<?php } ?>

										<?php if ( ! empty( $security ) ) { ?>
                                            <li>
												<?php echo( $lang == "es_ES" ? 'Seguridad:' : 'Security:' ) ?>
												<?php echo preg_replace( '/(?<!\d),|,(?!\d{3})/', ', ', $security ); ?>
                                            </li>
										<?php } ?>

										<?php if ( ! empty( $includes ) or ! empty( $restrictions ) ) { ?>
                                            <li>
												<?php echo( $lang == "es_ES" ? 'Asociación de Propietarios:' : 'Homeowners Association:' ) ?>

												<?php if ( ! empty( $includes ) ) {
													echo ( $lang == "es_ES" ? 'El mantenimiento incluye : ' : 'Maintenance includes : ' ) . preg_replace( '/(?<!\d),|,(?!\d{3})/', ', ', $includes );
												} ?>

												<?php if ( ! empty( $restrictions ) ) {
													echo ( $lang == "es_ES" ? 'Restricciones: ' : 'Restrictions: ' ) . $restrictions;
												} ?>

                                            </li>
										<?php } ?>

										<?php if ( ! empty( $parcelnumber ) or ! empty( $postalcode ) or ! empty( $unitnumb ) or ! empty( $unitview ) ) { ?>
                                            <li>
												<?php echo( $lang == "es_ES" ? 'Otra información de la propiedad:' : 'Other Property Info:' ) ?>

												<?php if ( ! empty( $parcelnumber ) ) {
													echo ( $lang == "es_ES" ? 'Número de parcela : ' : 'Parcel Number : ' ) . $parcelnumber;
												} ?>

												<?php if ( ! empty( $postalcode ) ) {
													echo ( $lang == "es_ES" ? 'Ciudad / Codigo Postal: ' : 'City / Postal Code : ' ) . $postalcode;
												} ?>

												<?php if ( ! empty( $unitnumb ) ) {
													echo ( $lang == "es_ES" ? 'Nro de unidad: ' : 'Unit number : ' ) . $unitnumb;
												} ?>

												<?php if ( ! empty( $unitview ) ) {
													echo ( $lang == "es_ES" ? 'Vista desde la unidad: ' : 'Unit view : ' ) . $unitview;
												} ?>

                                            </li>
										<?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default prlocation">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse3"><span
                                                class="number">3</span>
										<?php echo( $lang == "es_ES" ? 'Ubicación de la propiedad' : 'Property location' ) ?>
                                    </a>
                                    <i class="fa fa-minus" aria-hidden="true" data-toggle="collapse"
                                       href="#collapse3" aria-expanded="true"></i>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div id="map-detail"></div>
                                    <script>
                                        codeAddress("<?php if ( ! empty( $address ) ) {
											echo $address;
										} ?> ");

                                        var geocoder, map;

                                        function codeAddress(address) {
                                            geocoder = new google.maps.Geocoder();
                                            geocoder.geocode({
                                                'address': address
                                            }, function (results, status) {
                                                if (status == google.maps.GeocoderStatus.OK) {
                                                    var myOptions = {
                                                        zoom: 18,
                                                        center: results[0].geometry.location,
                                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                                    }
                                                    map = new google.maps.Map(document.getElementById("map-detail"), myOptions);

                                                    var marker = new google.maps.Marker({
                                                        map: map,
                                                        position: results[0].geometry.location
                                                    });

                                                }
                                            });
                                        }
                                    </script>
                                </div>
                            </div>
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
<?php endif; ?>