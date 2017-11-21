<?php
get_header();
$s   = get_query_var( 's' );
$url = wp_upload_dir();
$referer = wp_get_referer();
$homepage = home_url();
var_dump($referer);
?>
<?php $meta_query=array();$args=array();$search_string=$s;$meta_query[]=array('key'=> '_pr_city','value'=> $search_string,'compare'=> '=');$meta_query[]=array('key'=> '_pr_address','value'=> $search_string, 'compare'=> '=');$meta_query[]=array('key'=> '_pr_postalcode','value'=> $search_string,'compare'=> '=');if ( count( $meta_query ) > 1 ){$meta_query['relation']='OR';}$args['post_type']="property";$args['_meta_or_title']=$search_string;$args['meta_query']=$meta_query;$the_query=new WP_Query( $args );$count=$the_query->post_count;?>
<form id="property-search-top" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="post" role="form" data-toggle="validator">

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
                        <ul id="transction-dd" class="dropdown-menu clickdd">
                            <li><a href="#" data-value="Sale"><?php _e( 'Compra', 'hr' ) ?></a></li>
                            <li><a href="#" data-value="Lease"><?php _e( 'Alquiler', 'hr' ) ?></a></li>
                            <li><a href="#" data-value="Presale"><?php _e( 'Preventa', 'hr' ) ?></a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"><?php _e( 'Tipo <br>de vivienda', 'hr' ) ?> <span class="caret"></span></a>
                        <ul id="property-type-dd" class="dropdown-menu">
                            <li>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Single"
                                                  class=""><?php _e( 'Unifamiliar', 'hr' ) ?></label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Condo"
                                                  class=""><?php _e( 'Condominios/Townhouses', 'hr' ) ?></label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Mobile"
                                                  class=""><?php _e( 'Casas móviles', 'hr' ) ?></label>
                                </div>
                                <!--<div class="checkbox">
                                    <label><input type="checkbox" value="farm"
                                                  class=""><?php //_e( 'Granjas/Ranchos', 'hr' ) ?></label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="land" class=""><?php //_e( 'Terreno', 'hr' ) ?>
                                    </label>
                                </div>-->
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Multifamily"
                                                  class=""><?php _e( 'Multifamiliar', 'hr' ) ?></label>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"><?php _e( 'Rango <br>de precio', 'hr' ) ?> <span class="caret"></span></a>
                        <ul id="price-dd" class="dropdown-menu">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="input-group col-xs-6 col-sm-6 col-md-6 pull-left">
                                        <span class="input-group-addon" name="min">$</span>
                                        <input type="text" id="min" name="min" class="form-control" placeholder="No min">
                                    </div>
                                    <div class="input-group col-xs-6 col-sm-6 col-md-6 pull-left">
                                        <span class="input-group-addon" name="max">$</span>
                                        <input type="text" id="max" name="max" class="form-control" placeholder="No max">
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
                            <li><a href="#" data-value="" class="text-center"><?php _e( 'Cualquier precio', 'hr' ) ?></a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="true"><?php _e( 'Nro. <br>de habitaciones', 'hr' ) ?> <span
                                    class="caret"></span></a>
                        <ul id="rooms-dd" class="dropdown-menu clickdd">
                            <li><a role="button" data-value=""><?php _e( 'Cualquiera', 'hr' ) ?></a></li>
                            <li><a role="button" data-value="1"><?php _e( 'Estudio', 'hr' ) ?></a></li>
                            <li><a role="button" data-value="1">1+ hab.</a></li>
                            <li><a role="button" data-value="2">2+ hab.</a></li>
                            <li><a role="button" data-value="3">3+ hab.</a></li>
                            <li><a role="button" data-value="4">4+ hab.</a></li>
                            <li><a role="button" data-value="5">5+ hab.</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"><?php _e( 'Nro. <br>de baños', 'hr' ) ?> <span
                                    class="caret"></span></a>
                        <ul id="baths-dd" class="dropdown-menu clickdd">
                            <li><a role="button" data-value=""><?php _e( 'Cualquiera', 'hr' ) ?></a></li>
                            <li><a role="button" data-value="1">1+ baños</a></li>
                            <li><a role="button" data-value="2">2+ baños</a></li>
                            <li><a role="button" data-value="3">3+ baños</a></li>
                            <li><a role="button" data-value="4">4+ baños</a></li>
                            <li><a role="button" data-value="5">5+ baños</a></li>
                        </ul>
                    </li>
                    <li>
                        <button class="btn btn-search"><i class="fa fa-search"></i></button>
                    </li>
                </ul>
                <input type="hidden" name="action" value="myfilter">
                <input type="hidden" id="transaction" name="transaction" value="">
                <input type="hidden" id="price" name="price" value="">
                <input type="hidden" id="rooms" name="rooms" value="">
                <input type="hidden" id="baths" name="baths" value="">
                <input type="hidden" id="proptype" name="proptype" value="">
                <input type="hidden" id="proporderby" name="proporderby" value="">
                <input type="hidden" id="propsort" name="propsort" value="">
        </div>
    </div>
</nav>

<section id="search-map" class="search-map"></section>

<div class="container property-list">
    <div class="row">
        <div class="property-sorting">
            <div class="col-sm-4 col-md-3">
                <span class="state-search"><?php echo $s; ?></span>
                <span class="results-search"><?php _e( 'Mostrando', 'hr' ) ?> <span id="counter"></span> <?php _e( 'de', 'hr' ) ?>
	                <span id="total"><?php echo $count; ?></span> <?php _e( 'casas', 'hr' ) ?></span>
            </div>
            <div class="col-sm-8 col-md-9 text-center sort-select">
                <select class="pull-right" id="proporder" name="proporder">
                    <option selected><?php _e( 'Ordenar por  ', 'hr' ) ?></option>
                    <option value="0"><?php _e( 'Último agregado ASC', 'hr' ) ?></option>
                    <option value="1"><?php _e( 'Último agregado DESC', 'hr' ) ?></option>
                    <option value="2"><?php _e( 'Precio más bajo', 'hr' ) ?></option>
                    <option value="3"><?php _e( 'Precio más alto', 'hr' ) ?></option>
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
                        <div class="pull-right text-map">Ocultar mapa</div>
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
    <div id="response" class="row">
		<?php
		$search_string = $s;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$propertieslist = array(
			'post_type' => 'property',
			'posts_per_page' => 9,
			'_meta_or_title' => $search_string,
			'paged' => $paged,
			'meta_query' => array(
                'relation' => 'OR',
				array(
					'key' => '_pr_city',
					'value' => $search_string,
					'compare' => '=',
				),
				array(
					'key' => '_pr_address',
					'value' => $search_string,
					'compare' => '=',
				),
				array(
					'key' => '_pr_postalcode',
					'value' => $search_string,
					'compare' => '=',
				)
			)
		);
		query_posts($propertieslist);

		//$meta_query    = array();
		//$args          = array();

		/*$meta_query[]  = array(
			'key'     => '_pr_city',
			'value'   => $search_string,
			'compare' => '='
		);
		$meta_query[]  = array(
			'key'     => '_pr_address',
			'value'   => $search_string,
            'compare' => '='
		);
		$meta_query[]  = array(
			'key'     => '_pr_postalcode',
			'value'   => $search_string,
			'compare' => '='
		);*/

		/*if ( count( $meta_query ) > 1 ) {
			$meta_query['relation'] = 'OR';
		}*/

		//$args['post_type']      = "property";
		//$args['_meta_or_title'] = $search_string;
		//$args['meta_query']     = $meta_query;
		//$args['posts_per_page'] = 3;
		//$args['paged'] =  $paged;
		//$the_query = new WP_Query( $args );


		if ( have_posts() ): while ( have_posts() ): the_post();
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
                    <div class="property-image" data-url="<?php echo $url['baseurl']; ?>/photos/<?php echo $sysid ?>/1.jpg"
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
		<?php endwhile; ?>
            <div class="row">
                <div class="col-md-12 text-center">
					<?php wp_pagenavi(); ?>
                </div>
            </div>
		<?php else: ?>
            <div class="col-md-12">
                <div class="no-results-info">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/no-properties.svg" alt="0">
                    <h4><?php _e( 'No pudimos encontrar ninguna propiedad', 'hr' ) ?></h4>
                    <p><?php _e( 'Por favor verifique sus criterios de b&uacute;squeda', 'hr' ) ?></p>
                </div>
            </div>
		<?php endif; wp_reset_postdata(); ?>
    </div>
</div>
</form>

<?php get_footer(); ?>
