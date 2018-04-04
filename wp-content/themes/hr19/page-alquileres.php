<?php
/*
Template Name: For lease
*/
global $wpdb;
get_header();
$transaccion      = 'Lease';
$paged            = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$country          = get_query_var( 'country_page' );
$city             = get_query_var( 'city_page' );
$obj              = new stdClass();
$obj->transaction = 'Lease';
$obj->paged       = $paged;
if ( get_query_var( 'country_page' ) ) {
	$obj->country = $country;
}
if ( get_query_var( 'city_page' ) ) {
	$obj->city = $city;
}
$query      = query_country( $obj );
$lang       = get_locale();
$url        = wp_upload_dir();
$home_query = get_posts(
	array(
		'post_type' => 'header_footer'
	)
);
$usaadded   = array();
$usacities  = new WP_Query( array(
	'post_type'      => 'property',
	'posts_per_page' => - 1,
	'meta_query'     => array(
		'relation' => 'AND',
		array(
			'key'     => '_pr_transaction',
			'value'   => 'Lease',
			'compare' => '=',
		),
		array(
			'key'     => '_pr_owner',
			'value'   => 'HR19',
			'compare' => '=',
		),
		array(
			'key'     => '_pr_country',
			'value'   => $country,
			'compare' => '=',
		),
		array(
			'key'     => '_pr_city',
			'value'   => array( '' ),
			'compare' => 'NOT IN'
		)
	)
) );
$hero       = get_post_meta( $home_query[0]->ID, '_hf_hero', true );
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
             style="background-image: url('<?php echo ! empty( $hero[0]["_hf_hero_background"] ) ? $hero[0]["_hf_hero_background"] : null; ?>');">
        <div class="hero-overlay">
			<?php
			if ( ! empty( $hero[0]["_hf_hero_text"] ) ) {
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
                        <ul class="property-status">
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
<?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>
    <div id="lease-list" class="container property-list pl">
        <div class="row">
            <div class="col-md-12">
                <h2 class="hr19-heading">
                    <span><?php echo( $lang == "es_ES" ? 'Propiedades HR19' : 'HR19 Properties' ) ?>
                        &nbsp;&nbsp;&nbsp;</span></h2>
                <div class="pull-right margint7">
                    <form id="property_lenguage"
                          action="<?php echo home_url() . ( $lang == "es_ES" ? '/alquileres' : '/rent' ); ?>"
                          method="get" role="form" data-toggle="validator" data-disable="false">
                        <select id="country-select">
                            <option><?php echo( $lang == "es_ES" ? 'Pa&iacute;s' : 'Country' ) ?></option>
                            <option value="usa"
                                    data-value="usa" <?php echo( $country == "usa" ? 'selected' : '' ); ?> ><?php echo( $lang == "es_ES" ? 'EEUU' : 'USA' ) ?></option>
                            <option value="spain"
                                    data-value="spain" <?php echo( $country == "spain" ? 'selected' : '' ); ?>><?php echo( $lang == "es_ES" ? 'España' : 'Spain' ) ?></option>
                        </select>
                        <input id="country" type="hidden" name="country_page" value="<?php echo $country; ?>">
                    </form>
                    <form id="property_lenguage"
                          action="<?php echo home_url() . ( $lang == "es_ES" ? '/alquileres' : '/rent' ); ?>"
                          method="get" role="form" data-toggle="validator" data-disable="false">
                        <select id="city-select" <?php echo( ! empty( $country ) ? '' : 'disabled' ) ?>>
							<?php if ( ! empty( $city ) ) { ?>
                                <option selected><?php echo $city; ?></option>
							<?php } else { ?>
                                <option><?php echo( $lang == "es_ES" ? 'Ciudad' : 'City' ) ?></option>
							<?php } ?>

							<?php if ( $usacities->have_posts() ): while ( $usacities->have_posts() ) : $usacities->the_post();
								$city = get_post_meta( get_the_ID(), '_pr_city', true );
								if ( in_array( $city, $usaadded ) ) {
									continue;
								}
								$usaadded[] = $city
								?>
                                <option value="<?php echo $city ?>"
                                        data-value="<?php echo $city ?>"><?php echo $city ?></option>
							<?php endwhile; ?>
							<?php endif;
							wp_reset_postdata(); ?>
                        </select>
                        <input id="country" type="hidden" name="country_page" value="<?php echo $country; ?>">
                        <input id="city" type="hidden" name="city_page" value="<?php echo $city; ?>">
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-right updated-info">
				<?php
				$horas = "00:00:00";
				if ( $lang == "es_ES" ) {
					echo '<p><span>Listado actualizado hace <strong>' . $horas . ' horas</strong></span></p>';
				} else {
					echo '<p><span>Listing updated ' . $horas . ' hours ago</strong></span></p>';
				} ?>
            </div>
        </div>
        <div class="row">
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
				$broker      = get_post_meta( get_the_ID(), '_pr_brokerby', true );
				$gallery     = get_post_meta( get_the_ID(), '_pr_photos', true );
				$bgimg       = $url['baseurl'] . '/photos/' . $sysid . '/1.jpg';
				$headers     = get_headers( $bgimg, 1 );
				$fsize       = $headers['Content-Length'];
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
						<?php if ( ( $urlimage == 404 or $fsize < 100 ) && ( empty( $gallery ) ) ) {
							echo $placeholder;
						} elseif ( ! empty( $gallery ) ) {
							echo $first_pic;
						} else {
							echo $bgimg;
						} ?>
                                );">
	                        <?php if ( ! empty( $broker ) ) { ?>
                                <div class="by-broker">
                                    <p><?php echo( $lang == "es_ES" ? 'Por' : 'By' ) ?>
                                        <span><?php echo $broker ?></span></p>
                                </div>
	                        <?php } ?>
                        </div>
                        <div class="property-info">
                            <div class="property-price"><?php if ( ! empty( $price ) ) {
									echo $csymbol . number_format( $price, 0, '.', ',' );
								} else {
									echo "--";
								}
								?></div>
                            <div class="property-highlights">
								<?php if ( ! empty( $type ) ) {
									echo $type;
								} else {
									echo '--';
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
								} else if ( ! empty( $state ) ) {
									echo $state;
								} else {
									echo "--";
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