<?php
get_header();
global $wpdb;

$transaccion = 'Lease';

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$country = get_query_var( 'country_page' );

$obj = new stdClass();
$obj->transaction = 'Lease';
$obj->paged = $paged;
if ( get_query_var( 'country_page' ) ){
	
	$obj->country = $country;
	
}else{

	$obj->country = 'usa';
	
}

$query = query_country($obj);

$lang       = get_locale();
$url        = wp_upload_dir();



$home_query = get_posts(
	array(
		'post_type' => 'header_footer'
	)
);

$hero = get_post_meta( $home_query[0]->ID, '_hf_hero', true );
if ( function_exists( 'pll_current_language' ) ) {

	$current_language = pll_current_language();
	$default_language = pll_default_language();
	if ( $current_language != $default_language ) {
		$language_subdir = $current_language . '/';
	} else {
		$language_subdir = '';
	}
}
?>
    <section class="col-xs-12 hr-hero-section text-center no-padding"
             style="background-image: url('<?php isset($hero[0]["_hf_hero_text"]) ? $hero[0]["_hf_hero_text"] : null; ?>');">
        <div class="hero-overlay">
			<?php
			if ( isset( $hero[0]["_hf_hero_text"] ) ) {
				echo $hero[0]["_hf_hero_text"];
			}
			?>
        </div>

        <div class="container property-search-wrapper">
            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <form id="property-search" class="property-search"
                          action="<?php echo esc_url( home_url( '/' . $language_subdir ) ); ?>" method="get" role="form"
                          data-toggle="validator" data-disable="false">
                        <ul class="property-status" >
                            <li class="col-xs-4 col-sm-4 col-md-4 no-padding">
                                <a href="<?php echo home_url() . ( $lang == "es_ES" ? '/compra' : '/buy' ); ?>"><?php echo( $lang == "es_ES" ? 'Compra' : 'Buy' ) ?></a>
                            </li>
                            <li class="col-xs-4 col-sm-4 col-md-4 no-padding">
                                <a href="<?php echo home_url() . ( $lang == "es_ES" ? '/alquileres' : '/rent' ) ?>"
                                   class="active"><?php echo( $lang == "es_ES" ? 'Alquiler' : 'Rent' ) ?></a>
                            </li>
                            <li class="col-xs-4 col-sm-4 col-md-4 no-padding">
                                <a href="<?php echo home_url() . ( $lang == "es_ES" ? '/preventa' : '/presale' ) ?>"><?php echo( $lang == "es_ES" ? 'Preventa' : 'Presale' ) ?></a>
                            </li>
                        </ul>
                        <div class="col-xs-12 col-sm-12 col-md-12 search-text no-padding">
                            <div class="input-group">
                                <input type="text" id="s" name="s" class="col-xs-10 col-sm-10 col-md-10"
                                       placeholder="<?php echo( $lang == "es_ES" ? 'Dirección, ciudad, barrio o código postal' : 'Address, city, neighborhood or zip code' ) ?>"
                                       autocomplete="off" required>
                                <!--<input type="hidden" id="property_status" name="property_status" value="Lease">-->
                                <input type="hidden" name="post_type[]" value="property">
                                <button id="btn-search-home" type="submit" class="btn col-xs-2 col-sm-2 col-md-2"><i
                                            class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
	

    <div class="container property-list">
        <div class="row">
            <div class="col-md-12">
                <h2 class="hr19-heading">
                    <span><?php echo( $lang == "es_ES" ? 'Propiedades HR19' : 'HR19 Properties' ) ?>
                        &nbsp;&nbsp;&nbsp;</span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <form id="property_lenguage" action="<?php echo esc_url( home_url( '/' . $language_subdir ) ); ?>"
				 method="get" role="form" data-toggle="validator" data-disable="false">
                    <ul class="country-selector">
						
						<?php if ( $country == 'spain'  ) : ?>

							<li><a href="#" id="usa" data-value="usa"><?php echo( $lang == "es_ES" ? 'EEUU' : 'USA' ) ?></a></li>
							<li class="divider"></li>
							<li><a href="#" id="spain" class="active" data-value="spain"><?php echo( $lang == "es_ES" ? 'España' : 'Spain' ) ?></a></li>
						
						<?php elseif( $country == 'usa' ) :  ?>

							<li><a href="#" id="usa" class="active" data-value="usa"><?php echo( $lang == "es_ES" ? 'EEUU' : 'USA' ) ?></a></li>
							<li class="divider"></li>
							<li><a href="#" id="spain"  data-value="spain"><?php echo( $lang == "es_ES" ? 'España' : 'Spain' ) ?></a></li>

						<?php else: ?>

							<li><a href="" id="usa" class="active" data-value="usa"><?php echo( $lang == "es_ES" ? 'EEUU' : 'USA' ) ?></a></li>
							<li class="divider"></li>
							<li><a href="" id="spain"  data-value="spain"><?php echo( $lang == "es_ES" ? 'España' : 'Spain' ) ?></a></li>


						<?php endif; ?>
				
                        
                    </ul>
                    <input id="country" type="hidden" name="country_page" value="<?php echo $country; ?>">

					

                </form>
            </div>
        </div>
        <div id="presponse" class="row">
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
				$gallery     = get_post_meta( get_the_ID(), '_pr_photos', true );
				$bgimg       = $url['baseurl'] . '/photos/' . $sysid . '/1.jpg';
				$headers     = get_headers( $bgimg, 1 );
				$fsize       = $headers['Content-Length'];
				$fsize       = (int) $fsize;
				//$urlimage    = wp_remote_head( $bgimg );

				//$urlimage    = $urlimage['response']['code'];
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
						<?php if ( ( /*$urlimage == 404 or*/ $fsize < 100 ) && ( empty( $gallery ) ) ) {
							echo $placeholder;
						} elseif ( ! empty( $gallery ) ) {
							echo $first_pic;
						} else {
							echo $bgimg;
						} ?>
                                );">
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
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
						<?php wp_pagenavi( [ 'query' => $query ] ); ?>
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
			wp_reset_postdata(); ?>
        </div>
    </div>



<?php get_footer(); ?>