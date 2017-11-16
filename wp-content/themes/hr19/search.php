<?php
get_header();
$s   = get_query_var( 's' );
$url = wp_upload_dir();
?>

<nav id="search-filters" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-filter"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form id="property-search-top" action="./" method="get" role="form" data-toggle="validator">
                <input type="hidden" name="post_type[]" value="property">
                <ul class="nav navbar-nav">
                    <li>
                        <div class="input-group">
                            <input type="search" class="form-control search-box" id="s" name="s"
                                   placeholder="<?php _e( 'Buscar', 'hr' ) ?>" value="<?php echo $s; ?>" required>
                            <i class="fa fa-search"></i>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"><?php _e( 'Compra', 'hr' ) ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><?php _e( 'Compra', 'hr' ) ?></a></li>
                            <li><a href="#"><?php _e( 'Alquiler', 'hr' ) ?></a></li>
                            <li><a href="#"><?php _e( 'Preventa', 'hr' ) ?></a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"><?php _e( 'Tipo <br>de vivienda', 'hr' ) ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="single_family"
                                                  class=""><?php _e( 'Unifamiliar', 'hr' ) ?></label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="condo"
                                                  class=""><?php _e( 'Condominios/Townhouses', 'hr' ) ?></label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="mobile"
                                                  class=""><?php _e( 'Casas móviles', 'hr' ) ?></label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="farm"
                                                  class=""><?php _e( 'Granjas/Ranchos', 'hr' ) ?></label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="land" class=""><?php _e( 'Terreno', 'hr' ) ?>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="multi_family"
                                                  class=""><?php _e( 'Multifamiliar', 'hr' ) ?></label>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"><?php _e( 'Rango <br>de precio', 'hr' ) ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" data-value="any"><?php _e( 'Todos', 'hr' ) ?></a></li>
                            <li><a href="#">$0</a></li>
                            <li><a href="#">$100k</a></li>
                            <li><a href="#">$200k</a></li>
                            <li><a href="#">$300k</a></li>
                            <li><a href="#">$400k</a></li>
                            <li><a href="#">$500k</a></li>
                            <li><a href="#">$600k</a></li>
                            <li><a href="#">$700k</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="true"><?php _e( 'Nro. <br>de habitaciones', 'hr' ) ?> <span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" data-value="any"><?php _e( 'Cualquiera', 'hr' ) ?></a></li>
                            <li><a href="#" data-value="estudio"><?php _e( 'Estudio', 'hr' ) ?></a></li>
                            <li><a href="#" data-value="1">1+</a></li>
                            <li><a href="#" data-value="2">2+</a></li>
                            <li><a href="#" data-value="3">3+</a></li>
                            <li><a href="#" data-value="4">4+</a></li>
                            <li><a href="#" data-value="5">5+</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"><?php _e( 'Nro. <br>de baños', 'hr' ) ?> <span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><?php _e( 'Cualquiera', 'hr' ) ?></a></li>
                            <li><a href="#" data-value="1">1+</a></li>
                            <li><a href="#" data-value="2">2+</a></li>
                            <li><a href="#" data-value="3">3+</a></li>
                            <li><a href="#" data-value="4">4+</a></li>
                            <li><a href="#" data-value="5">5+</a></li>
                        </ul>
                    </li>
                    <li>
                        <button class="btn btn-search"><i class="fa fa-search"></i></button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</nav>

<section id="search-map" class="search-map"></section>

<div class="container property-list">
    <div class="row">
        <div class="property-sorting">
            <div class="col-sm-4 col-md-3">
                <span class="state-search"><?php echo $s; ?></span>
                <span class="results-search"><?php _e( 'Mostrando', 'hr' ) ?> 9 <?php _e( 'de', 'hr' ) ?>
                    8694 <?php _e( 'casas', 'hr' ) ?></span>
            </div>
            <div class="col-sm-8 col-md-9 text-center sort-select">
                <select class="pull-right">
                    <option selected><?php _e( 'Ordenar por  ', 'hr' ) ?></option>
                    <option value="newer"><?php _e( 'Último agregado', 'hr' ) ?></option>
                    <option value="lower"><?php _e( 'Precio más bajo', 'hr' ) ?></option>
                    <option value="higher"><?php _e( 'Precio más alto', 'hr' ) ?></option>
                </select>
                <div class="pull-right choose-search">
                    <div class="radio radio-inline radio-success">
                        <input type="radio" id="inlineRadio1" value="option1" name="radioInline" class="styled">
                        <label for="inlineRadio1"><?php _e( 'Solo Hr19', 'hr' ) ?></label>
                    </div>
                    <div class="radio radio-inline radio-success">
                        <input type="radio" id="inlineRadio2" value="option2" name="radioInline" class="styled" checked>
                        <label for="inlineRadio2"><?php _e( 'Todos', 'hr' ) ?></label>
                    </div>
                </div>
                <div class="pull-right switch-map">
                    <div>
                        <div class="pull-right text-map"><?php _e( 'Ver mapa', 'hr' ) ?></div>
                        <label class="switch pull-right">
                            <input type="checkbox" id="map-switch">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <hr>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2 class="hr-heading"><?php _e( 'Propiedades HR19', 'hr' ) ?></h2>
        </div>
    </div>
    <div class="row">
		<?php
		$meta_query    = array();
		$args          = array();
		$search_string = $s;
		$meta_query[]  = array(
			'key'     => '_pr_city',
			'value'   => $search_string,
			'compare' => '='
		);
		$meta_query[]  = array(
			'key'     => '_pr_address',
			'value'   => $search_string,
                'compare' => 'LIKE'
		);
		$meta_query[]  = array(
			'key'     => '_pr_postalcode',
			'value'   => $search_string,
			'compare' => 'LIKE'
		);

		if ( count( $meta_query ) > 1 ) {
			$meta_query['relation'] = 'OR';
		}
		$args['post_type']      = "property";
		$args['_meta_or_title'] = $search_string;
		$args['meta_query']     = $meta_query;
		$the_query              = new WP_Query( $args );

		if ( $the_query->have_posts() ): while ( $the_query->have_posts() ): $the_query->the_post();
			$address = get_post_meta( get_the_ID(), '_pr_address', true );
			$price   = get_post_meta( get_the_ID(), '_pr_current_price', true );
			$type    = get_post_meta( get_the_ID(), '_pr_type_of_property', true );
			$rooms   = get_post_meta( get_the_ID(), '_pr_room_count', true );
			$baths   = get_post_meta( get_the_ID(), '_pr_baths_total', true );
			$sysid   = get_post_meta( get_the_ID(), '_pr_matrixid', true );
			$city    = get_post_meta( get_the_ID(), '_pr_city', true );
			$state   = get_post_meta( get_the_ID(), '_pr_state', true );
			?>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <a href="<?php the_permalink(); ?>" class="property">
                    <div class="property-image" data-url="<?php echo $url['baseurl']; ?>/photos/<?php echo $sysid ?>1.jpg"
                         style="background: url(<?php echo $url['baseurl']; ?>/photos/<?php echo $sysid ?>/1.jpg"></div>
                    <div class="property-info">
                        <div class="property-price"><?php if ( ! empty( $price ) ) {
								echo '$' . $price;
							} ?></div>
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
								echo $address;
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
		<?php endwhile; endif;
		wp_reset_postdata(); ?>
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

<?php get_footer(); ?>
