<?php
get_header();
$home_query = get_posts(
    array(
        'post_type' => 'header_footer'
    )
);
$home_info = get_post_meta($home_query[0]->ID);
$ourOffices = get_post_meta( $home_query[0]->ID, '_hf_our_offices', true );
$officesUs = get_post_meta( $home_query[0]->ID, '_hf_offices_us', true );
$officesEs = get_post_meta( $home_query[0]->ID, '_hf_offices_es', true );
?>

    <div class="swiper-container swiper-container-hero">
        <div class="swiper-wrapper">
            <?php
            $banners = array('post_type' => 'banner');
            query_posts($banners);
            if (have_posts()): while (have_posts()): the_post();
                $background_image = wp_get_attachment_url(get_post_meta(get_the_ID(), '_br_bannerimg_id', true)); ?>
                <div class="swiper-slide"
                     style="background-image: url('<?php echo $background_image; ?>');">
                    <div class="slide-overlay"></div>
                    <div class="slide-text">
                        <h2><?php the_title(); ?></h2>
                    </div>
                </div>
            <?php endwhile; endif;
            wp_reset_postdata(); ?>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/al-hero-left.png" alt="Hero Left Arrow"
             class="swiper-button-prev">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/al-hero-right.png" alt="Hero Right Arrow"
             class="swiper-button-next">
    </div>

    <div class="filters">



    <section id="al-projects" class="col-xs-12 al-projects no-padding">
        <div class="container center-block al-project-list button-group no-padding" data-filter-group="status">
            <?php
            $terms = get_terms('property_status', array(
                'orderby' => 'count',
                'hide_empty' => 0
            ));
            if (!empty($terms) && !is_wp_error($terms)) {
                $i = 0;
                foreach ($terms as $term) {
                    $clase = ($i == 1 ? "item-active" : "");
                    echo '<span id="term-' . $term->term_id . '"  data-filter=".' . $term->slug . '" class="al-project-list-item button the-status"><h2 data="'.$i.'" class="item-text '. $clase .'">' . $term->name . '</h2><img class="triangle" src="' . get_template_directory_uri() . '/assets/triangle.svg"></span>';
                    $i++;
                }
            } ?>
        </div>
    </section>
    <div class="col-xs-12 al-properties-section text-center no-padding">
        <div class="container-ala no-padding container-properties">
            <div class="center-block button-group locations" data-filter-group="country">
                <?php
                $locations = get_terms('property_location', array(
                    'orderby' => 'count',
                    'hide_empty' => 0
                ));
                if (!empty($locations) && !is_wp_error($locations)) {
                    $j = 0;
                    foreach ($locations as $location) {
                        $clase = ($j == 0 ? "filter-left" : "");
                        echo '<h2 class="properties-country-filter button the-country '. $clase .'" data-filter=".' . $location->slug . '">' . $location->name . '</h2>';
                        $j++;
                    }
                } ?>
            </div>
            <div class="col-xs-12 properties-filter-container no-padding">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle pull-right btn-filter" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <?php _e('Ordenar por...', 'ala') ?>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu sort-by-button-group" aria-labelledby="dropdownMenu1">
                        <li><a class="orderby" data-sort-value="name" data-sort-direction="asc"><?php _e('Por nombre', 'ala') ?> <i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="orderby" data-option-value=".date" data-sort-value=".date" data-sort-direction="asc"><?php _e('Ultimo agregado', 'ala') ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row properties-list">
                <div class=" grid">
                    <?php
                    $propertieslist = array('post_type' => 'broker', 'posts_per_page' => 9, 'paged' => $paged);
                    query_posts($propertieslist);
                    if (have_posts()): while (have_posts()): the_post();
                        $background_image = wp_get_attachment_url(get_post_meta(get_the_ID(), '_br_images_id', true));
                        $address = get_post_meta(get_the_ID(), '_br_address', true);
                        $price = get_post_meta(get_the_ID(), '_br_price', true);
                        $status = get_the_terms( get_the_ID(), 'property_status' );
                        $loc = get_the_terms( get_the_ID(), 'property_location' );
                        ?>
                        <div class="grid-sizer col-xs-12 col-sm-4 col-md-4"></div>
                        <div class="col-xs-12 col-sm-4 grid-item country-status <?php echo esc_html($status[0]->slug);?> <?php echo esc_html($loc[0]->slug); ?>">
                            <div class="grid-item-content property-image" style="background-image: url('<?php echo $background_image; ?>')">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="property-overlay">
                                        <h2 class="property-title"><?php the_title(); ?></h2>
                                        <?php if (!empty($address)) { ?><h3 class="property-address"><?php echo $address ?></h3><?php } ?>
                                        <?php if (!empty($price)) { ?><h3 class="property-city"><?php echo $price ?></h3><?php } ?>
                                        <?php if (!empty($status)) { ?><h4 class="property-category "><?php echo esc_html($status[0]->name); ?></h4><?php } ?>
                                        <p class="date"><?php the_date(); ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; endif;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>

    <!--<div class="col-xs-12 text-center">
        <nav id="al-pagination">
            <?php
    /*if (function_exists('wp_paginate')) {
        wp_paginate();
    }*/
    ?>
        </nav>
    </div>-->

    <div class="col-xs-12 al-partners-section text-center">
        <div class="container">
            <p class="al-partners-title"><?php echo $home_info['_hf_partners_text'][0]; ?></p>
        </div>
        <div class="partners-images">
            <img src="<?php echo $home_info['_hf_partners-one'][0]; ?>" alt="Logo HR19 Realty" class="partners-images-one"/>
            <img src="<?php echo $home_info['_hf_partners-two'][0]; ?>" alt="Logo MRE RealEstate" class="partners-images-two"/>
        </div>
    </div>
    <section class="col-xs-12" id="al-offices" style="background-image: url('<?php if(isset($ourOffices[0]['_hf_our_offices_background'])) { echo $ourOffices[0]['_hf_our_offices_background']; } ?>');">
        <div class="swiper-container swiper-container-flags">
            <?php
            if(isset($ourOffices[0]['_hf_our_offices_text'])) {
                echo $ourOffices[0]['_hf_our_offices_text'];
            }
            ?>
            <div class="flags-indicators">
                <?php
                $countries = get_terms('country', array('hide_empty' => 1, 'orderby' => 'count', 'order' => 'DESC'));
                if (!empty($countries) && !is_wp_error($countries)) {
                    $j = 1;
                    foreach ($countries as $country) {
                        $meta_image = get_wp_term_image($country->term_id);
                        $clase = ($j == 1 ? "flag-image-opacity" : "");
                        echo '<img id="flag-image-'.$j.'" class="flag-image '.$clase.'" data-pagination="'.$j.'" src="'.$meta_image.'"/>';
                        $j++;
                    }
                } ?>
            </div>
            <div class="swiper-wrapper">
                <?php
                $countries = get_terms('country', array('hide_empty' => 1, 'orderby' => 'count', 'order' => 'DESC'));
                if (!empty($countries) && !is_wp_error($countries)) {
                    foreach ($countries as $country) { ?>
                    <div class="swiper-slide">
                        <?php $offices = array('post_type' => 'office', 'tax_query' => array(array('taxonomy' => 'country', 'field' => 'id', 'terms' => $country->term_id)));
                        query_posts($offices);
                        if (have_posts()): while (have_posts()): the_post(); ?>
                            <div class="office-detail">
                                <h5><span><?php the_title(); ?></span></h5>
                                <?php the_content(); ?>
                            </div>
                        <?php endwhile; endif; wp_reset_postdata(); ?>
                    </div>
                <?php } } ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>