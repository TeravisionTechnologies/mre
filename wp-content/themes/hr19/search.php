<?php
get_header();
if ( function_exists( 'pll_current_language' ) ) {
	$current_language = pll_current_language();
	$default_language = pll_default_language();
	if ( $current_language != $default_language ) {
		$language_subdir = $current_language . '/';
	} else {
		$language_subdir = '';
	}
}
$s                  = get_query_var( 's' );
$propstatus         = get_query_var( 'property_status' );
$roomsFilter        = get_query_var( 'rooms' );
$propTypeFilter     = get_query_var( 'proptype' );
$bathsFilter        = get_query_var( 'baths' );
$max                = get_query_var( 'max' );
$min                = get_query_var( 'min' );
$max                = ( strpos( $max, ',' ) > 0 ) ? str_replace( ',', '', $max ) : $max;
$min                = ( strpos( $min, ',' ) > 0 ) ? str_replace( ',', '', $min ) : $min;
$sort               = get_query_var( 'propsort' );
$orderBy            = get_query_var( 'proporderby' );
$propOrder          = get_query_var( 'proporder' );
$showowner          = get_query_var( 'showowner' );
$url                = wp_upload_dir();
$search_string      = $s;
$lang               = get_locale();
$propTypeArray      = explode( ',', $propTypeFilter );
$args['meta_query'] = array( 'relation' => 'AND' );
if ( ( isset( $orderBy ) && $orderBy == "date" ) && ( isset( $sort ) && $sort == "ASC" ) ) {
	$orderBy = 'date';
	$sort    = 'ASC';
} elseif ( ( isset( $orderBy ) && $orderBy == "date" ) && ( isset( $sort ) && $sort == "DESC" ) ) {
	$orderBy = 'date';
	$sort    = 'DESC';
} elseif ( ( isset( $orderBy ) && $orderBy == "_pr_current_price" ) && ( isset( $sort ) && $sort == "ASC" ) ) {
	$orderBy = '_pr_current_price';
	$sort    = 'DESC';
} else {
	$orderBy = '_pr_current_price';
	$sort    = 'ASC';
}
if ( isset( $roomsFilter ) && $roomsFilter ) {
	$args['meta_query'][] = array(
		'key'     => '_pr_room_count',
		'value'   => $roomsFilter,
		'compare' => '='
	);
}
if ( isset( $propTypeFilter ) && $propTypeFilter ) {
	$args['meta_query'][] = array(
		'key'     => '_pr_type_of_property',
		'value'   => $propTypeFilter,
		'compare' => 'IN'
	);
}
if ( isset( $bathsFilter ) && $bathsFilter ) {
	$args['meta_query'][] = array(
		'key'     => '_pr_baths_total',
		'value'   => $bathsFilter,
		'compare' => '='
	);
}
if ( isset( $showowner ) && $showowner ) {
	$args['meta_query'][] = array(
		'key'     => '_pr_owner',
		'value'   => $showowner,
		'compare' => '='
	);
}

if ( isset( $propstatus ) && $propstatus ) {
	$args['meta_query'][] = array(
		'key'     => '_pr_transaction',
		'value'   => $propstatus,
		'compare' => '='
	);
}

// if both minimum price and maximum price are specified we will use BETWEEN comparison
if ( isset( $min ) && $min && isset( $max ) && $max ) {
	$args['meta_query'][] = array(
		'key'     => '_pr_current_price',
		'value'   => array( $min, $max ),
		'type'    => 'NUMERIC',
		'compare' => 'between'
	);
} else {
	// if only min price is set
	if ( isset( $min ) && $min ) {
		$args['meta_query'][] = array(
			'key'     => '_pr_current_price',
			'value'   => $min,
			'type'    => 'NUMERIC',
			'compare' => '>='
		);
	}

	// if only max price is set
	if ( isset( $max ) && $max ) {
		$args['meta_query'][] = array(
			'key'     => '_pr_current_price',
			'value'   => $max,
			'type'    => 'NUMERIC',
			'compare' => '<='
		);
	}
}
$args['meta_query'][] = array(
	'relation' => 'OR',
	array( 'key' => '_pr_city', 'value' => $search_string, 'compare' => 'LIKE', ),
	array( 'key' => '_pr_address', 'value' => $search_string, 'compare' => 'LIKE', ),
	array( 'key' => '_pr_postalcode', 'value' => $search_string, 'compare' => 'LIKE', )
);
$total                = new WP_Query( array(
		'post_type'      => 'property',
		'showposts'      => - 1,
		'_meta_or_title' => $search_string,
		'meta_query'     => $args
	)
);
$count = $total->post_count;
wp_reset_postdata();
wp_reset_query();
?>
    <form id="property-search-top" action="<?php echo esc_url( home_url( '/' . $language_subdir ) ); ?>" method="get"
          role="form"
          data-toggle="validator">

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
                    <input type="hidden" name="post_type[]" value="property">
                    <input type="hidden" id="firstTimeLoad" name="firstTimeLoad" value="1">
                    <input type="hidden" name="property_status" value="<?php echo $propstatus; ?>">
                    <ul class="nav navbar-nav">
                        <li>
                            <div class="input-group search-wrap">
                                <input type="search" class="form-control search-box" id="s" name="s"
                                       placeholder="<?php echo( $lang == "es_ES" ? 'Buscar' : 'Search' ) ?>"
                                       value="<?php echo $s; ?>" data-value="<?php echo $s; ?>" required>
                                <i class="fa fa-search"></i>
                            </div>
                        </li>
                        <li class="dropdown">
							<?php if ( $propstatus == "Sale" ) { ?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true"
                                   aria-expanded="false"><?php echo( $lang == "es_ES" ? 'Compra' : 'Buy' ) ?> <span
                                            class="caret"></span></a>
                                <ul id="transction-dd" class="dropdown-menu clickdd">
                                    <li><a href="#"
                                           data-value="Sale"><?php echo( $lang == "es_ES" ? 'Compra' : 'Buy' ) ?></a>
                                    </li>
                                    <li><a href="#"
                                           data-value="Lease"><?php echo( $lang == "es_ES" ? 'Alquiler' : 'Rent' ) ?></a>
                                    </li>
                                    <li><a href="#"
                                           data-value="Presale"><?php echo( $lang == "es_ES" ? 'Preventa' : 'Presale' ) ?></a>
                                    </li>
                                </ul>
							<?php } ?>
							<?php if ( $propstatus == "Lease" ) { ?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true"
                                   aria-expanded="false"><?php echo( $lang == "es_ES" ? 'Alquiler' : 'Rent' ) ?> <span
                                            class="caret"></span></a>
                                <ul id="transction-dd" class="dropdown-menu clickdd">
                                    <li><a href="#"
                                           data-value="Sale"><?php echo( $lang == "es_ES" ? 'Compra' : 'Buy' ) ?></a>
                                    </li>
                                    <li><a href="#"
                                           data-value="Lease"><?php echo( $lang == "es_ES" ? 'Alquiler' : 'Rent' ) ?></a>
                                    </li>
                                    <li><a href="#"
                                           data-value="Presale"><?php echo( $lang == "es_ES" ? 'Preventa' : 'Presale' ) ?></a>
                                    </li>
                                </ul>
							<?php } ?>
							<?php if ( $propstatus == "Presale" ) { ?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true"
                                   aria-expanded="false"><?php echo( $lang == "es_ES" ? 'Preventa' : 'Presale' ) ?>
                                    <span class="caret"></span></a>
                                <ul id="transction-dd" class="dropdown-menu clickdd">
                                    <li><a href="#"
                                           data-value="Sale"><?php echo( $lang == "es_ES" ? 'Compra' : 'Buy' ) ?></a>
                                    </li>
                                    <li><a href="#"
                                           data-value="Lease"><?php echo( $lang == "es_ES" ? 'Alquiler' : 'Rent' ) ?></a>
                                    </li>
                                    <li><a href="#"
                                           data-value="Presale"><?php echo( $lang == "es_ES" ? 'Preventa' : 'Presale' ) ?></a>
                                    </li>
                                </ul>
							<?php } ?>
	                        <?php if ( $propstatus == "" ) { ?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true"
                                   aria-expanded="false"><?php echo( $lang == "es_ES" ? 'Todas' : 'All' ) ?>
                                    <span class="caret"></span></a>
                                <ul id="transction-dd" class="dropdown-menu clickdd">
                                    <li><a href="#"
                                           data-value="Sale"><?php echo( $lang == "es_ES" ? 'Compra' : 'Buy' ) ?></a>
                                    </li>
                                    <li><a href="#"
                                           data-value="Lease"><?php echo( $lang == "es_ES" ? 'Alquiler' : 'Rent' ) ?></a>
                                    </li>
                                    <li><a href="#"
                                           data-value="Presale"><?php echo( $lang == "es_ES" ? 'Preventa' : 'Presale' ) ?></a>
                                    </li>
                                </ul>
	                        <?php } ?>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false"><?php echo( $lang == "es_ES" ? 'Tipo <br>de vivienda' : 'Property <br>type' ) ?>
                                <span class="caret"></span></a>
                            <ul id="property-type-dd" class="dropdown-menu">
                                <li>
                                    <div class="checkbox">
                                        <label><input type="checkbox"
                                                      value="Single" <?php echo ( in_array( 'Single', $propTypeArray ) ) ? 'checked' : ''; ?>
                                                      class=""><?php echo( $lang == "es_ES" ? 'Unifamiliar' : 'Single' ) ?>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox"
                                                      value="Condo" <?php echo ( in_array( 'Condo', $propTypeArray ) ) ? 'checked' : ''; ?>
                                                      class=""><?php echo( $lang == "es_ES" ? 'Condominios/Townhouses' : 'Condos/Townhouses' ) ?>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox"
                                                      value="Mobile" <?php echo ( in_array( 'Mobile', $propTypeArray ) ) ? 'checked' : ''; ?>
                                                      class=""><?php echo( $lang == "es_ES" ? 'Casas móviles' : 'Mobile homes' ) ?>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="Farm" <?php echo ( in_array( 'Farm', $propTypeArray ) ) ? 'checked' : ''; ?>
                                                      class=""><?php _e( 'Granjas/Ranchos', 'hr' ) ?></label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="Land" <?php echo ( in_array( 'Land', $propTypeArray ) ) ? 'checked' : ''; ?>
                                                      class=""><?php _e( 'Terreno', 'hr' ) ?>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox"
                                                      value="Multifamily" <?php echo ( in_array( 'Multifamily', $propTypeArray ) ) ? 'checked' : ''; ?>
                                                      class=""><?php echo( $lang == "es_ES" ? 'Multifamiliar' : 'Multifamily' ) ?>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false"><?php echo( $lang == "es_ES" ? 'Rango <br>de precio' : 'Price <br>range' ) ?>
                                <span class="caret"></span></a>
                            <ul id="price-dd" class="dropdown-menu">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="input-group col-xs-6 col-sm-6 col-md-6 pull-left">
                                            <span class="input-group-addon" name="min">$</span>
                                            <input type="text" id="min" name="min" class="form-control"
                                                   placeholder="No min" value="<?php echo $min; ?>" autocomplete="off">
                                        </div>
                                        <div class="input-group col-xs-6 col-sm-6 col-md-6 pull-left">
                                            <span class="input-group-addon" name="max">$</span>
                                            <input type="text" id="max" name="max" class="form-control"
                                                   placeholder="No max" value="<?php echo $max; ?>" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row prices">
                                        <div id="min-list" class="col-md-12 no-padding">
                                            <li><a href="#" data-value="0">$0</a></li>
                                            <li><a href="#" data-value="100,000">$100k</a></li>
                                            <li><a href="#" data-value="200,000">$200k</a></li>
                                            <li><a href="#" data-value="300,000">$300k</a></li>
                                            <li><a href="#" data-value="400,000">$400k</a></li>
                                            <li><a href="#" data-value="500,000">$500k</a></li>
                                            <li><a href="#" data-value="600,000">$600k</a></li>
                                            <li><a href="#" data-value="700,000">$700k</a></li>
                                        </div>
                                        <div id="max-list" class="col-md-12 no-padding">
                                            <li><a href="#" data-value="180,000">$180</a></li>
                                            <li><a href="#" data-value="350,000">$350</a></li>
                                            <li><a href="#" data-value="500,000">$500k</a></li>
                                            <li><a href="#" data-value="700,000">$700k</a></li>
                                            <li><a href="#" data-value="900,000">$900k</a></li>
                                            <li><a href="#" data-value="1,000,000">$1m</a></li>
                                            <li><a href="#" data-value="1,200,000">$1.2k</a></li>
                                        </div>
                                    </div>
                                </div>
                                <li><a href="#" data-value="" id="any-price"
                                       class="text-center"><?php echo( $lang == "es_ES" ? 'Cualquier precio' : 'Any price' ) ?></a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
							<?php if ( ! $roomsFilter ) {
								?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true"
                                   aria-expanded="true"><?php echo( $lang == "es_ES" ? 'Nro. <br>de habitaciones' : 'Number <br>of rooms' ) ?>
                                    <span
                                            class="caret"></span></a>
							<?php } else {
								if ( $roomsFilter >= 1 ) {
									$roomInputText = $roomsFilter . '+ ' . ( $lang == "es_ES" ? 'habs.' : 'rooms.' );
								} elseif ( $roomsFilter == "studio" ) {
									$roomInputText = $lang == "es_ES" ? 'Estudio' : 'Studio';
								} else {
									$roomInputText = $lang == "es_ES" ? 'Cualquiera' : 'Any';
								}
								?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true"
                                   aria-expanded="true"><?php echo $roomInputText; ?>
                                    <span
                                            class="caret"></span></a>
							<?php } ?>

                            <ul id="rooms-dd" class="dropdown-menu clickdd">
                                <li><a role="button"
                                       data-value=""><?php echo( $lang == "es_ES" ? 'Cualquiera' : 'Any' ) ?></a></li>
                                <li><a role="button"
                                       data-value="studio"><?php echo( $lang == "es_ES" ? 'Estudio' : 'Studio' ) ?></a></li>
                                <li><a role="button"
                                       data-value="1">1+ <?php echo( $lang == "es_ES" ? 'habs.' : 'rooms' ) ?></a></li>
                                <li><a role="button"
                                       data-value="2">2+ <?php echo( $lang == "es_ES" ? 'habs.' : 'rooms' ) ?></a></li>
                                <li><a role="button"
                                       data-value="3">3+ <?php echo( $lang == "es_ES" ? 'habs.' : 'rooms' ) ?></a></li>
                                <li><a role="button"
                                       data-value="4">4+ <?php echo( $lang == "es_ES" ? 'habs.' : 'rooms' ) ?></a></li>
                                <li><a role="button"
                                       data-value="5">5+ <?php echo( $lang == "es_ES" ? 'habs.' : 'rooms' ) ?></a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
							<?php if ( ! $bathsFilter ) {
								?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true"
                                   aria-expanded="true"><?php echo( $lang == "es_ES" ? 'Nro. <br>de baños' : 'Number <br>of baths' ) ?>
                                    <span
                                            class="caret"></span></a>
							<?php } else {
								if ( $bathsFilter >= 1 ) {
									$bathsInputText = $bathsFilter . '+ ' . ( $lang == "es_ES" ? 'baños.' : 'baths.' );
								} else {
									$bathsInputText = $lang == "es_ES" ? 'Cualquiera' : 'Any';
								}
								?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true"
                                   aria-expanded="true"><?php echo $bathsInputText; ?>
                                    <span
                                            class="caret"></span></a>
							<?php } ?>
                            <ul id="baths-dd" class="dropdown-menu clickdd">
                                <li><a role="button"
                                       data-value=""><?php echo( $lang == "es_ES" ? 'Cualquiera' : 'Any' ) ?></a></li>
                                <li><a role="button"
                                       data-value="1">1+ <?php echo( $lang == "es_ES" ? 'baños' : 'baths' ) ?></a></li>
                                <li><a role="button"
                                       data-value="2">2+ <?php echo( $lang == "es_ES" ? 'baños' : 'baths' ) ?></a></li>
                                <li><a role="button"
                                       data-value="3">3+ <?php echo( $lang == "es_ES" ? 'baños' : 'baths' ) ?></a></li>
                                <li><a role="button"
                                       data-value="4">4+ <?php echo( $lang == "es_ES" ? 'baños' : 'baths' ) ?></a></li>
                                <li><a role="button"
                                       data-value="5">5+ <?php echo( $lang == "es_ES" ? 'baños' : 'baths' ) ?></a></li>
                            </ul>
                        </li>
                        <li>
                            <button class="btn btn-search"><i class="fa fa-search"></i></button>
                        </li>
                    </ul>
                    <input type="hidden" name="action" value="myfilter">
                    <input type="hidden" id="transaction" name="property_status" value="<?php echo $propstatus; ?>">
                    <input type="hidden" id="showowner" name="showowner" value="<?php echo $showowner; ?>">
                    <input type="hidden" id="price" name="price" value="">
                    <input type="hidden" id="rooms" name="rooms" value="<?php echo $roomsFilter; ?>">
                    <input type="hidden" id="baths" name="baths" value="<?php echo $bathsFilter; ?>">
                    <input type="hidden" id="proptype" name="proptype" value="<?php echo $propTypeFilter; ?>">
                    <input type="hidden" id="proporderby" name="proporderby" value="<?php echo $orderBy; ?>">
                    <input type="hidden" id="propsort" name="propsort" value="<?php echo $sort; ?>">
                    <input type="hidden" id="proporder2" name="proporder2" value="<?php echo $propOrder; ?>">
                </div>
            </div>
        </nav>

        <div id="map-wrapper">
            <section id="search-map" class="search-map"></section>
            <div id="loader"><i class="fa fa-spinner fa-pulse fa-fw"></i></div>
        </div>

		<?php
		$paged          = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$hr             = true;
		$query          = new WP_Query( array(
			'post_type'      => 'property',
			'showposts'      => 9,
			'paged'          => get_query_var( 'paged' ),
			'_meta_or_title' => $search_string,
			'meta_key'       => ( $orderBy != 'date' ) ? $orderBy : '',
			'orderby'        => ( $orderBy == 'date' ) ? $orderBy : 'meta_value_num',
			'order'          => $sort,
			'meta_query'     => $args
		) );
		$totalPostPaged = $query->post_count;
		?>
        <div class="container property-list">
            <div class="row">
                <div class="property-sorting">
                    <div class="col-sm-4 col-md-3 no-paddingr">
                        <span class="state-search"><?php echo $s; ?></span>
                        <span class="results-search">
                            <?php echo ( $lang == "es_ES" ? 'Mostrando ' : 'Showing ' ) . $totalPostPaged . ( $lang == "es_ES" ? ' de' : ' of' ) ?>
                            <span id="ptotal"><?php echo $count; ?></span> <?php echo( $lang == "es_ES" ? 'casas' : 'houses' ) ?>
                        </span>
                    </div>
                    <div class="col-sm-8 col-md-9 text-center sort-select no-paddingl">
                        <select class="pull-right" id="proporder" name="proporder">
                            <option value="" <?php echo ( $propOrder === "" ) ? 'selected' : ''; ?>> <?php echo( $lang == "es_ES" ? 'Ordenar por' : 'Order by' ) ?></option>
                            <option <?php echo ( $propOrder === "0" ) ? 'selected' : ''; ?>
                                    value="0"><?php _e( 'A &#x25B2;', 'hr' ) ?></option>
                            <option <?php echo ( $propOrder === "1" ) ? 'selected' : ''; ?>
                                    value="1"><?php _e( 'D &#x25BC;', 'hr' ) ?></option>
                            <option <?php echo ( $propOrder === "2" ) ? 'selected' : ''; ?>
                                    value="2"><?php echo( $lang == "es_ES" ? 'Precio más bajo' : 'Lower price' ) ?></option>
                            <option <?php echo ( $propOrder === "3" ) ? 'selected' : ''; ?>
                                    value="3"><?php echo( $lang == "es_ES" ? 'Precio más alto' : 'Highest price' ) ?></option>
                        </select>
                        <div class="pull-right choose-search">
                            <div class="radio radio-inline radio-success">
                                <input type="radio" id="showowner1" value="HR19" name="showowner"
                                       class="styled" <?php echo ( $showowner ) ? 'checked' : ''; ?>>
                                <label for="inlineRadio1"><?php echo( $lang == "es_ES" ? 'Solo HR19' : 'Only HR19' ) ?></label>
                            </div>
                            <div class="radio radio-inline radio-success">
                                <input type="radio" id="showowner2" value="" name="showowner" class="styled"
									<?php echo ( ! $showowner ) ? 'checked' : ''; ?>>
                                <label for="inlineRadio2"><?php echo( $lang == "es_ES" ? 'Todos' : 'All' ) ?></label>
                            </div>
                        </div>
                        <div class="pull-right switch-map">
                            <div>
                                <div class="pull-right text-map"><?php echo( $lang == "es_ES" ? 'Ocultar mapa' : 'Hide map' ) ?></div>
                                <label class="switch pull-right">
                                    <input type="checkbox" id="map-switch">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 updated-info">
	                    <?php
	                    $horas = "00:00:00";
	                    if( $lang == "es_ES" ){
		                    echo '<p><span>Listado actualizado hace <strong>'. $horas .'</strong> horas</span></p>';
	                    } else{
		                    echo '<p><span>Listing updated '. $horas .' hours ago</span></p>';
	                    } ?>
                    </div>
                </div>
            </div>
    </form>
    <div id="responsed" class="row">
        <div class="col-md-12">
            <h2 class="hr-heading"><?php echo( $lang == "es_ES" ? 'Propiedades' : 'Properties' ) ?></h2>
        </div>
		<?php

		if ( $query->have_posts() ): while ( $query->have_posts() ) : $query->the_post();
			$address     = get_post_meta( get_the_ID(), '_pr_address', true );
			$price       = get_post_meta( get_the_ID(), '_pr_current_price', true );
			$type        = get_post_meta( get_the_ID(), '_pr_type_of_property', true );
			$rooms       = get_post_meta( get_the_ID(), '_pr_room_count', true );
			$baths       = get_post_meta( get_the_ID(), '_pr_baths_total', true );
			$sysid       = get_post_meta( get_the_ID(), '_pr_matrixid', true );
			$city        = get_post_meta( get_the_ID(), '_pr_city', true );
			$state       = get_post_meta( get_the_ID(), '_pr_state', true );
			$agentid     = get_post_meta( get_the_ID(), '_pr_agentid', true );
			$gallery     = get_post_meta( get_the_ID(), '_pr_photos', true );
			$owner       = get_post_meta( get_the_ID(), '_pr_owner', true );
			$transac     = get_post_meta( get_the_ID(), '_pr_transaction', true );
			$bgimg       = $url['baseurl'] . '/photos/' . $sysid . '/1.jpg';
			$headers     = get_headers( $bgimg, 1 );
			$fsize       = ( isset( $headers['Content-Length'] ) ) ? $headers['Content-Length'] : null;
			$fsize       = (int) $fsize;
			$urlimage    = wp_remote_head( $bgimg );
			$urlimage    = $urlimage['response']['code'];
			$placeholder = get_template_directory_uri() . '/assets/no-photo.jpg';
			$csymbol     = get_post_meta( get_the_ID(), '_pr_currency_symbol', true );
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
					<?php if ( $urlimage == 404 or $fsize < 100 ) {
						echo $placeholder;
					} else {
						echo $bgimg;
					} ?>);" data-url="<?php if ( $urlimage == 404 or $fsize < 100 ) {
						echo $placeholder;
					} else {
						echo $bgimg;
					} ?>">
                        <div class="by-broker">
                            <p><?php echo( $lang == "es_ES" ? 'Por' : 'By' ) ?> <span>Marlene Goldman INC</span></p>
                        </div>
                    </div>
                    <div class="property-info">
                        <div class="property-price"><?php if ( ! empty( $price ) ) {
		                        echo $csymbol . number_format( $price, 0, '.', ',' );
	                        } else {
		                        echo "--";
	                        } ?>
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
								echo $address;
							} else if ( ! empty( $city ) and ! empty( $state ) ) {
								echo $city . ', ' . $state;
							} else {
								echo $state;
							} ?>
                        </div>
                        <div class="property-code"><?php echo ( $transac == "Presale" ? "" : "MLS: " ) ?> <?php the_title(); ?></div>
                    </div>
                </a>
            </div>
		<?php endwhile; ?>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
					<?php wp_pagenavi( array( 'query' => $query ) ); ?>
                </div>
            </div>
		<?php else: ?>
            <div class="col-md-12">
                <div class="no-results-info">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/no-properties.svg" alt="0">
                    <h4><?php echo( $lang == "es_ES" ? 'No existen propiedades disponibles en estos momentos' : 'There are no properties available at this time' ) ?></h4>
                    <p><?php echo( $lang == "es_ES" ? '0 resultados' : '0 results' ) ?></p>
                </div>
            </div>
		<?php endif;
		wp_reset_postdata(); wp_reset_query(); ?>
    </div>
    </div>

<?php get_footer(); ?>