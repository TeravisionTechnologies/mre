<?php
get_header();
$lang       = get_locale();
$home_query = get_posts(
	array(
		'post_type' => 'header_footer'
	)
);
wp_reset_postdata();
wp_reset_query();
$home_info   = get_post_meta( $home_query[0]->ID );
$ourOffices  = get_post_meta( $home_query[0]->ID, '_hf_our_offices', true );
$officesUs   = get_post_meta( $home_query[0]->ID, '_hf_offices_us', true );
$officesEs   = get_post_meta( $home_query[0]->ID, '_hf_offices_es', true );
$placeholder = get_template_directory_uri() . '/assets/no-photo.jpg';
?>

    <div class="swiper-container swiper-container-hero">
        <div class="swiper-wrapper">
			<?php
			$banners = array( 'post_type' => 'banner' );
			query_posts( $banners );
			if ( have_posts() ): while ( have_posts() ): the_post();
				$background_image = wp_get_attachment_url( get_post_meta( get_the_ID(), '_br_bannerimg_id', true ) ); ?>
                <div class="swiper-slide"
                     style="background-image: url('<?php echo $background_image; ?>');">
                    <div class="slide-overlay"></div>
                    <div class="slide-text">
                        <h2><?php the_title(); ?></h2>
                    </div>
                </div>
			<?php endwhile; endif;
			wp_reset_postdata();
			wp_reset_query(); ?>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/al-hero-left.png" alt="Hero Left Arrow"
             class="swiper-button-prev">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/al-hero-right.png" alt="Hero Right Arrow"
             class="swiper-button-next">
    </div>

    <form id="ala-properties" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="post" role="form">
        <section id="al-projects" class="col-xs-12 al-projects no-padding">
            <div class="container center-block al-project-list button-group no-padding" data-filter-group="status">
				<?php
				$terms = get_terms( 'property_status', array(
					'orderby'    => 'description',
					'hide_empty' => 0
				) );
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
					$i = 0;
					foreach ( $terms as $term ) {
						$clase = ( $i == 1 ? "item-active" : "" );
						echo '<span id="term-' . $term->term_id . '"  data-value="' . $term->slug . '" class="al-project-list-item button the-status"><h2 data="' . $i . '" class="item-text ' . $clase . '">' . $term->name . '</h2><img class="triangle" src="' . get_template_directory_uri() . '/assets/triangle.svg"></span>';
						$i ++;
					}
				} ?>
            </div>
        </section>
        <div class="col-xs-12 al-properties-section text-center no-padding">
            <div class="container-ala no-padding container-properties">
                <div class="center-block button-group locations" data-filter-group="country">
					<?php
					$locations = get_terms( 'property_location', array(
						'orderby'    => 'description',
						'hide_empty' => 0
					) );
					if ( ! empty( $locations ) && ! is_wp_error( $locations ) ) {
						$j = 0;
						foreach ( $locations as $location ) {
							$clase = ( $j == 0 ? "filter-left" : "" );
							echo '<h2 class="properties-country-filter button the-country ' . $clase . '" data-value="' . $location->slug . '">' . $location->name . '</h2>';
							$j ++;
						}
					} ?>
                </div>
                <div class="col-xs-12 properties-filter-container no-padding">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle pull-right btn-filter" type="button"
                                id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							<?php echo( $lang == "es_ES" ? 'Ordenar por...' : 'Sort by...' ) ?>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu sort-by-button-group" aria-labelledby="dropdownMenu1">
                            <li>
                                <a class="orderby"><?php echo( $lang == "es_ES" ? 'Por nombre &#x25B2;' : 'By name &#x25B2' ) ?></a>
                            </li>
                            <li>
                                <a class="orderby"><?php echo( $lang == "es_ES" ? 'Por nombre &#x25BC;' : 'By name &#x25BC;' ) ?></a>
                            </li>
                            <li>
                                <a class="orderby"><?php echo( $lang == "es_ES" ? '&Uacute;ltimo agregado &#x25B2;' : 'Last added &#x25B2;' ) ?></a>
                            </li>
                            <li>
                                <a class="orderby"><?php echo( $lang == "es_ES" ? '&Uacute;ltimo agregado &#x25BC;' : 'Last added &#x25BC;' ) ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <input type="hidden" name="action" value="myfilter">
                <input id="project-status" type="hidden" name="project-status" value="">
                <input id="project-location" type="hidden" name="project-location" value="">
    </form>
    <div class="clearfix"></div>
    <div id="response" class="row properties-list">
        <div class=" grid">
			<?php $query = new WP_Query( array(
				'post_type' => 'broker',
				'showposts' => 9,
				'paged'     => get_query_var( 'paged' ),
				'tax_query' => array(
					array(
						'taxonomy' => 'property_status',
						'field'    => 'slug',
						'terms'    => ( $lang == "es_ES" ? 'proyectos-actuales' : 'new-projects' ),
					),
				),
			) );
			if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post();
				$background_image = wp_get_attachment_url( get_post_meta( get_the_ID(), '_br_images_id', true ) );
				$address          = get_post_meta( get_the_ID(), '_br_address', true );
				$price            = get_post_meta( get_the_ID(), '_br_price', true );
				$status           = get_the_terms( get_the_ID(), 'property_status' );
				$loc              = get_the_terms( get_the_ID(), 'property_location' );
				?>
                <div class="col-xs-12 col-sm-4 grid-item country-status <?php echo esc_html( $status[0]->slug ); ?> <?php echo esc_html( $loc[0]->slug ); ?>">
                    <div class="grid-item-content property-image"
                         style="background-image: url(<?php echo( ! empty( $background_image ) ? $background_image : $placeholder ) ?>)">
                        <a href="<?php the_permalink(); ?>">
                            <div class="property-overlay">
                                <h2 class="property-title"><?php the_title(); ?></h2>
								<?php if ( ! empty( $address ) ) { ?><h3
                                        class="property-address"><?php echo $address ?></h3><?php } ?>
								<?php if ( ! empty( $price ) ) { ?><h3
                                        class="property-city"><?php echo $price ?></h3><?php } ?>
								<?php if ( ! empty( $status ) ) { ?><h4
                                        class="property-category "><?php echo esc_html( $status[0]->name ); ?></h4><?php } ?>
                                <p class="date"><?php the_date(); ?></p>
                            </div>
                        </a>
                    </div>
                </div>
			<?php endwhile; ?>
                <div class="col-xs-12 text-center">
                    <nav id="al-pagination">
						<?php wp_pagenavi( array( 'query' => $query ) ); ?>
                    </nav>
                </div>
			<?php else: ?>
                <div class="col-md-12">
                    <div class="no-results-info">
                        <h4><?php echo( $lang == "es_ES" ? 'No existen propiedades disponibles en estos momentos' : 'There are no properties available at this time' ) ?></h4>
                        <p><?php echo( $lang == "es_ES" ? '0 resultados' : '0 results' ) ?></p>
                    </div>
                </div>
			<?php endif;
			wp_reset_postdata(); ?>
        </div>
    </div>
    </div>
    </div>

    <div class="col-xs-12 al-partners-section text-center">
        <div class="container">
            <p class="al-partners-title"><?php echo $home_info['_hf_partners_text'][0]; ?></p>
        </div>
        <div class="partners-images">
            <a href="<?php echo $home_info['_hf_partner_link_left'][0]; ?>" target="_blank"><img
                        src="<?php echo $home_info['_hf_partners-one'][0]; ?>" alt="Logo HR19 Realty"
                        class="partners-images-one"/></a>
            <a href="<?php echo $home_info['_hf_partner_link_right'][0]; ?>" target="_blank"><img
                        src="<?php echo $home_info['_hf_partners-two'][0]; ?>" alt="Logo MRE RealEstate"
                        class="partners-images-two"/></a>
        </div>
    </div>
    <section class="col-xs-12" id="al-offices"
             style="background-image: url('<?php if ( isset( $ourOffices[0]['_hf_our_offices_background'] ) ) {
		         echo $ourOffices[0]['_hf_our_offices_background'];
	         } ?>');">
        <div class="swiper-container swiper-container-flags">
			<?php
			if ( isset( $ourOffices[0]['_hf_our_offices_text'] ) ) {
				echo $ourOffices[0]['_hf_our_offices_text'];
			}
			?>
            <div class="flags-indicators">
				<?php
				$countries = get_terms( 'country', array(
					'hide_empty' => 1,
					'orderby'    => 'count',
					'order'      => 'DESC'
				) );
				if ( ! empty( $countries ) && ! is_wp_error( $countries ) ) {
					$j = 1;
					foreach ( $countries as $country ) {
						$meta_image = get_wp_term_image( $country->term_id );
						$clase      = ( $j == 1 ? "flag-image-opacity" : "" );
						echo '<div id="flag-image-' . $j . '" class="flag-image ' . $clase . '" data-pagination="' . $j . '" style="background-image: url(' . $meta_image . ')"></div>';
						$j ++;
					}
				} ?>
            </div>
            <div class="swiper-wrapper">
				<?php
				$countries = get_terms( 'country', array(
					'hide_empty' => 1,
					'orderby'    => 'count',
					'order'      => 'DESC'
				) );
				if ( ! empty( $countries ) && ! is_wp_error( $countries ) ) {
					foreach ( $countries as $country ) { ?>
                        <div class="swiper-slide">
							<?php $offices = array(
								'post_type' => 'office',
								'tax_query' => array(
									array(
										'taxonomy' => 'country',
										'field'    => 'id',
										'terms'    => $country->term_id
									)
								)
							);
							query_posts( $offices );
							if ( have_posts() ): while ( have_posts() ): the_post(); ?>
                                <div class="office-detail">
                                    <h5><span><?php the_title(); ?></span></h5>
									<?php the_content(); ?>
                                </div>
							<?php endwhile; endif;
							wp_reset_postdata(); ?>
                        </div>
					<?php }
				} ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>