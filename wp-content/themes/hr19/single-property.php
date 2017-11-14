<?php
get_header();
the_post();
$address = get_post_meta( get_the_ID(), '_pr_address', true );
$city = get_post_meta( get_the_ID(), '_pr_city', true );
$state = get_post_meta( get_the_ID(), '_pr_state', true );
$community = get_post_meta( get_the_ID(), '_pr_community', true );
$subdiv = get_post_meta( get_the_ID(), '_pr_subdiv', true );
$price   = get_post_meta( get_the_ID(), '_pr_current_price', true );
$type    = get_post_meta( get_the_ID(), '_pr_type_of_property', true );
$rooms   = get_post_meta( get_the_ID(), '_pr_room_count', true );
$baths   = get_post_meta( get_the_ID(), '_pr_baths_total', true );
$bathsf   = get_post_meta( get_the_ID(), '_pr_baths_full', true );
$bathsh   = get_post_meta( get_the_ID(), '_pr_baths_half', true );
$sqft   = get_post_meta( get_the_ID(), '_pr_sqft', true );
$surf  = get_post_meta( get_the_ID(), '_pr_surf', true );
$hoa  = get_post_meta( get_the_ID(), '_pr_hoa', true );
$yearbuilt  = get_post_meta( get_the_ID(), '_pr_yearbuilt', true );
$sysid   = get_post_meta( get_the_ID(), '_pr_matrixid', true );
$url = wp_upload_dir();
$directory = $url['basedir'].'/photos/'.$sysid.'/';
$images = glob($directory . "*.jpg");

$currentproperty = get_the_ID();

?>

<div class="breadcrumb-info">
    <div class="container">
        <div class="row">
            <div class="col-xs-7 col-sm-7 col-md-6">
                <div class="breadcrumbs"><i class="fa fa-chevron-left" aria-hidden="true"></i>
                    <?php if(!empty($city)){ echo $city; } ?>,
	                <?php if(!empty($state)){ echo $state; } ?> >
                    <?php if(!empty($address)){ echo $address; } else{ echo 'N/A';} ?>
                </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-6 text-right">
                <div class="published">Publicada hace: 59 días</div>
                <div class="status">Estatus: <span>Activa</span></div>
            </div>
        </div>
    </div>
</div>

<div class="property-carousel">
    <div class="swiper-container swiper-property">
        <div class="swiper-wrapper">
            <?php foreach($images as $image) { $end = end(explode('/', rtrim($image, '/'))); ?>
                <div class="swiper-slide">
                    <div style="background-image: url(<?php echo $url['baseurl'].'/photos/'.$sysid.'/'.$end; ?>)"></div>
                </div>
            <?php } ?>
        </div>
        <div class="swiper-button-next"><i class="fa fa-chevron-circle-right"></i></div>
        <div class="swiper-button-prev"><i class="fa fa-chevron-circle-left"></i></div>
        <div class="total"><i class="fa fa-camera"></i>
            <div class="fraction"></div> <?php _e( 'fotos', 'hr' ) ?></div>
    </div>
</div>

<div class="property-info-heading">
    <div class="container">
        <div class="col-xs-12 col-sm-3 col-md-3 price borderl">
            <div><?php _e( 'Precio:', 'hr' ) ?></div>
            <div class="price-txt"><?php if(!empty($price)){ echo '$'.$price; } ?></div>
            <div class="sm-text"><?php _e( 'Estimado de hipoteca:', 'hr' ) ?> $603/mes</div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 paddingl40 borderl">
            <div class="md-text">
                <?php if ( ! empty( $address ) ) {
		            echo $address;
	            } else if ( ! empty( $city ) and !empty( $state ) ) {
		            echo $city .', '. $state;
	            } else{
		            echo $state;
	            } ?>
            </div>
            <div>
                <?php if(!empty($type)){ echo $type; } ?>
	            <?php if(!empty($rooms)){ echo '· '. $rooms . ' Habitaciones' ; } ?>
	            <?php if(!empty($bathsf)){ echo '· '. $bathsf . ' Baños' ; } ?>
                <?php if(!empty($bathsh)){ echo '· '. $bathsh . ' Medios baños' ; } ?>
            </div>
            <div class="sm-text"><?php _e( 'Número de MLS:', 'hr' ) ?> <?php the_title(); ?></div>
        </div>
        <div class="col-xs-6 col-sm-3 col-md-3 text-center">
            <div class="row surface">
	            <?php if(!empty( $surf )){ ?>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="sm-text"><?php _e( 'Superficie:', 'hr' ) ?></div>
                        <div class="md-text"><?php echo $surf . ' ft'; ?></div>
                    </div>
                <?php } ?>
	            <?php if(!empty( $sqft )){ ?>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="sm-text"><?php _e( 'Pies cuadrados:', 'hr' ) ?></div>
                        <div class="md-text"><?php if(!empty( $sqft )){ echo $sqft . ' ft²'; } else { echo 'N/A'; } ?> </div>
                    </div>
	            <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="property-features">
    <div class="container">
        <div class="row">
            <div class="col-md-12 oh-wrap">
                <div class="open-house">Open House: Saturday October 28, 11:00 am - 3:00 pm</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="aa"><span
                                            class="number">1</span><?php _e( 'Descripción de la propiedad', 'hr' ) ?>
                                </a>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">
								<?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><span
                                            class="number">2</span>
									<?php _e( 'Características de la propiedad', 'hr' ) ?></a>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row main-features">
                                    <div class="col-xs-4 col-sm-3 col-md-3 feature">
                                        <div><i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top"
                                                title="<?php _e( 'La tarifa de asociación de propietarios (HOA) es una cantidad de dinero que deben pagar mensualmente los propietarios de ciertos tipos de propiedades residenciales para ayudar a mantener y mejorar las propiedades en la asociación.', 'hr' ) ?>"></i> <?php _e( 'Cuotas de HOA:', 'hr' ) ?>
                                        </div>
                                        <div class="info"><?php if(!empty($hoa)){ echo $hoa . '/mes'; } else { echo 'N/A'; } ?></div>
                                    </div>
                                    <div class="col-xs-4 col-sm-2 col-md-2 feature">
                                        <div><?php _e( 'Impuestos', 'hr' ) ?></div>
                                        <div class="info">$ 42,735</div>
                                    </div>
                                    <div class="col-xs-4 col-sm-3 col-md-3 feature">
                                        <div><?php _e( 'Año de construcción:', 'hr' ) ?></div>
                                        <div class="info"><?php if(!empty($yearbuilt)){ echo $yearbuilt; } else { echo 'N/A'; } ?></div>
                                    </div>
                                    <div class="col-xs-4 col-sm-2 col-md-2 feature">
                                        <div><?php _e( 'Comunidad:', 'hr' ) ?></div>
                                        <div class="info"><?php if(!empty($community)){ echo $community; } else { echo 'N/A'; } ?></div>
                                    </div>
                                    <div class="col-xs-4 col-sm-2 col-md-2 feature">
                                        <div><?php _e( 'Subdivision:', 'hr' ) ?></div>
                                        <div class="info"><?php if(!empty($subdiv)){ echo $subdiv; } else { echo 'N/A'; } ?></div>
                                    </div>
                                </div>
                                <h6><?php _e( 'Otras características:', 'hr' ) ?></h6>
                                <ul>
                                    <li>Condición: nueva construcción</li>
                                    <li>Construcción: estuco de bloque de hormigón</li>
                                    <li>Energía: tormenta de windows</li>
                                    <li>Exterior: luces al aire libre</li>
                                    <li>General: se permiten mascotas</li>
                                    <li>Calor / Frío: aire acondicionado central, calefacción central, agua caliente,
                                        calefacción eléctrica
                                    </li>
                                    <li>Incluye: cocina y horno a gas, horno microondas, lavavajillas, frigorífico,
                                        lavadora, secadora de ropa
                                    </li>
                                    <li>Interior: despensa, isla de cocina, sistema de intercomunicación, closet(s)
                                        donde se puede caminar
                                    </li>
                                    <li>Estacionamiento: unido, de visitas, puerta automática de garaje</li>
                                    <li>Recreación: piscina, piscina climatizada, piscina enterrada, área de piscina
                                        vallada, barbacoa
                                    </li>
                                    <li>Habitaciones: habitación familiar, comedor formal, dormitorio principal arriba,
                                        gran salón, vestíbulo, servicio de mucama o suite de invitados
                                    </li>
                                    <li>Servicios: sistema de alcantarillado séptico, abastecimiento de agua público,
                                        cable de tv disponible
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><span
                                            class="number">3</span>
									<?php _e( 'Ubicación de la propiedad', 'hr' ) ?></a>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div id="map-detail"></div>
                                <script>
                                    function initMap() {
                                      codeAddress("<?php if(!empty($address)){ echo $address; } ?> <?php if(!empty($city)){ echo $city; } ?> <?php if(!empty($state)){ echo $state; } ?>");
                                    }

                                    var geocoder, map;

                                    function codeAddress(address) {
                                        geocoder = new google.maps.Geocoder();
                                        geocoder.geocode({
                                            'address': address
                                        }, function(results, status) {
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

<div class="property-similar">
    <div class="container property-list">
        <div class="row">
            <div class="col-md-12">
                <h2 class="hr-heading"><?php _e( 'Propiedades similares', 'hr' ) ?></h2>
            </div>
        </div>
        <div class="row">
	        <?php
	        $similarproperties = array(
		        'post_type'      => 'property',
		        'post__not_in' => array( $currentproperty ),
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
	        if ( have_posts() ): while ( have_posts() ): the_post();
	        $address = get_post_meta( get_the_ID(), '_pr_address', true );
	        $price   = get_post_meta( get_the_ID(), '_pr_current_price', true );
	        $type    = get_post_meta( get_the_ID(), '_pr_type_of_property', true );
	        $rooms   = get_post_meta( get_the_ID(), '_pr_room_count', true );
	        $baths   = get_post_meta( get_the_ID(), '_pr_baths_total', true );
	        $sysid   = get_post_meta( get_the_ID(), '_pr_matrixid', true );
	        $city   = get_post_meta( get_the_ID(), '_pr_city', true );
	        $state  = get_post_meta( get_the_ID(), '_pr_state', true );
	        ?>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <a href="<?php the_permalink(); ?>" class="property">
                        <div class="property-image"
                             style="background: url(<?php echo $url['baseurl']; ?>/photos/<?php echo $sysid ?>/1.jpg"></div>
                        <div class="property-info">
                            <div class="property-price"><?php if ( ! empty( $price ) ) {
				                    echo '$' . $price;
			                    } ?>
                            </div>
                            <div class="property-highlights">
			                    <?php if ( ! empty( $type ) ) {
				                    echo $type;
			                    } else {
				                    echo 'N/A';
			                    } ?>
			                    <?php if ( ! empty( $rooms ) ) {
				                    echo '· ' . $rooms . ' Habitaciones';
			                    } ?>
			                    <?php if ( ! empty( $baths ) ) {
				                    echo '· ' . $baths . ' Baños';
			                    } ?>
                            </div>
                            <div class="property-address">
                                <?php if ( ! empty( $address ) ) {
				                    echo $city;
			                    } else if ( ! empty( $city ) and !empty( $state ) ) {
				                    echo $city .', '. $state;
			                    } else{
                                    echo $state;
                                } ?>
                            </div>
                            <div class="property-code">MLS: <?php the_title(); ?></div>
                        </div>
                    </a>
                </div>
	        <?php endwhile; endif;
	        wp_reset_postdata(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
