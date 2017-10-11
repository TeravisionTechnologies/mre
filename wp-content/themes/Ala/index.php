<?php
get_header();
$footer_query = get_posts(
    array(
        'post_type' => 'header_footer'
    )
);
$footer_info = get_post_meta($footer_query[0]->ID);
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
    <section id="al-projects" class="col-xs-12 al-projects">
        <div class="container center-block al-project-list button-group" data-filter-group="status">
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

    <div class="col-xs-12 al-properties-section text-center">
        <div class="container no-padding container-properties">
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
                        <li><a class="orderby" data-sort-value="date" data-sort-direction="asc"><?php _e('Ultimo agregado', 'ala') ?></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-xs-12 properties-list no-padding">
                <?php
                $propertieslist = array('post_type' => 'broker');
                query_posts($propertieslist);
                if (have_posts()): while (have_posts()): the_post();
                    $background_image = wp_get_attachment_url(get_post_meta(get_the_ID(), '_br_images_id', true));
                    $address = get_post_meta(get_the_ID(), '_br_address', true);
                    $price = get_post_meta(get_the_ID(), '_br_price', true);
                    $status = get_the_terms( get_the_ID(), 'property_status' );
                    $loc = get_the_terms( get_the_ID(), 'property_location' );
                    ?>
                    <div class="col-xs-12 col-sm-4 property-image no-padding country-status <?php echo esc_html($status[0]->slug);?> <?php echo esc_html($loc[0]->slug); ?>"
                         style="background-image: url('<?php echo $background_image; ?>')">
                        <a href="<?php the_permalink(); ?>">
                            <div class="property-overlay">
                                <h2 class="property-title"><?php the_title(); ?></h2>
                                <?php if (!empty($address)) { ?><h3
                                        class="property-address"><?php echo $address ?></h3><?php } ?>
                                <?php if (!empty($price)) { ?><h3
                                        class="property-city"><?php echo $price ?></h3><?php } ?>
                                <?php if (!empty($status)) { ?><h4
                                        class="property-category "><?php echo esc_html($status[0]->name); ?></h4><?php } ?>
                            </div>
                        </a>
                    </div>
                <?php endwhile; endif;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
    <div class="col-xs-12 text-center">
        <!--<nav id="al-pagination">
            <ul class="pagination">
                <li>
                    <a aria-label="Previous"><span aria-hidden="true" class="pagination-previous">&laquo;</span></a>
                </li>
                <li><a class="pagination-active">1</a></li>
                <li><a>2</a></li>
                <li><a>3</a></li>
                <li><a>4</a></li>
                <li><a>5</a></li>
                <li>
                    <a aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>-->
    </div>

    <div class="col-xs-12 al-partners-section text-center">
        <div class="container">
            <p class="al-partners-title">Nuestros aliados</p>
            <p class="al-partners-subtitle">La nueva forma de invertir en propiedades</p>
        </div>
        <div class="partners-images">
            <img src="<?php echo $footer_info['_hf_partners-one'][0]; ?>" alt="Logo Partner One"
                 class="partners-images-one"/>
            <img src="<?php echo $footer_info['_hf_partners-two'][0]; ?>" alt="Logo Partner Two"
                 class="partners-images-two"/>
        </div>
    </div>

    <section class="col-xs-12" id="al-offices"
             style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/offices.jpg');">
        <div class="swiper-container swiper-container-flags">
            <h4>Puedes <strong>encontrarnos</strong> en</h4>
            <div class="flags-indicators">
                <img id="flag-image-1" class="flag-image" data-pagination="1"
                     src="<?php echo get_template_directory_uri(); ?>/assets/usa_flag.svg"/>
                <img id="flag-image-2" class="flag-image flag-image-opacity" data-pagination="2"
                     src="<?php echo get_template_directory_uri(); ?>/assets/spain_flag.svg"/>
            </div>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="office-detail">
                        <h5>
                            <span>Miami · Sede principal:</span>
                        </h5>
                        <h5>55 Merrick Way, Suite 214 Coral Gables</h5>
                        <h5>USA</h5>
                        <h5>Teléfonos: +1 786 376.22.22 / 477.50.91</h5>
                    </div>
                    <div class="office-detail">
                        <h5>
                            <span>Orlando:</span>
                        </h5>
                        <h5>2295 S. Hiawassee Road, Suite 407E</h5>
                        <h5>USA</h5>
                        <h5>Teléfonos: +1 407 255.08.71</h5>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="office-detail">
                        <h5>
                            <span>Madrid:</span>
                        </h5>
                        <h5>C/ Velázquez 78, 2º Dcha. 28001</h5>
                        <h5>España</h5>
                        <h5>Teléfonos: +34 605 816 803</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php get_footer(); ?>