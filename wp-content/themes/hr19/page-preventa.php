<?php
/*
Template Name: Presale
*/
get_header();
$url = wp_upload_dir();
$home_query = get_posts(
    array(
        'post_type' => 'header_footer'
    )
);
$hero = get_post_meta($home_query[0]->ID, '_hf_hero', true);

?>
<section class="col-xs-12 hr-hero-section text-center no-padding"
         style="background-image: url('<?php echo $hero[0]["_hf_hero_background"] ?>');">
    <div class="hero-overlay">
        <?php
        if (isset($hero[0]["_hf_hero_text"])) {
            echo $hero[0]["_hf_hero_text"];
        }
        ?>
    </div>

    <div class="container property-search-wrapper">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <form id="property-search" class="property-search" action="<?php echo home_url(); ?>" method="get" role="form"
                      data-toggle="validator">
                    <ul class="property-status">
                        <li class="col-xs-4 col-sm-4 col-md-4 no-padding">
                            <a href="<?php echo home_url(); ?>"><?php _e('Compra', 'hr') ?></a>
                        </li>
                        <li class="col-xs-4 col-sm-4 col-md-4 no-padding">
                            <a href="<?php echo home_url(); ?>/alquileres"><?php _e('Alquiler', 'hr') ?></a>
                        </li>
                        <li class="col-xs-4 col-sm-4 col-md-4 no-padding">
                            <a href="<?php echo home_url(); ?>/preventa" class="active"><?php _e('Preventa', 'hr') ?></a>
                        </li>
                    </ul>
                    <div class="col-xs-12 col-sm-12 col-md-12 search-text no-padding">
                        <div class="input-group">
                            <input type="text" id="s" name="s" class="col-xs-10 col-sm-10 col-md-10"
                                   placeholder="<?php _e('Dirección, ciudad, barrio o código postal', 'hr') ?>"
                                   autocomplete="off" required>
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
<div id="presale-list" class="container property-list">
    <div class="row">
        <div class="col-md-12">
            <h2 class="hr19-heading"><span><?php _e('Propiedades HR19', 'hr') ?>&nbsp;&nbsp;&nbsp;</span></h2>
        </div>
    </div>
    <div class="row">
        <?php
        $propertieslist = array(
            'post_type' => 'property',
            'posts_per_page' => 9,
            'meta_query' => array(
                array(
                    'key' => '_pr_transaction',
                    'value' => 'Presale',
                    'compare' => '=',
                )
            )
        );
        query_posts($propertieslist);
        if (have_posts()): while (have_posts()): the_post();
            $address = get_post_meta(get_the_ID(), '_pr_address', true);
            $price = get_post_meta(get_the_ID(), '_pr_current_price', true);
            $type = get_post_meta(get_the_ID(), '_pr_type_of_property', true);
            $rooms = get_post_meta(get_the_ID(), '_pr_room_count', true);
            $baths = get_post_meta(get_the_ID(), '_pr_baths_total', true);
            $sysid = get_post_meta(get_the_ID(), '_pr_matrixid', true);
            $city = get_post_meta(get_the_ID(), '_pr_city', true);
            $state = get_post_meta(get_the_ID(), '_pr_state', true);
            ?>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <a href="<?php the_permalink(); ?>" class="property">
                    <div class="property-image"
                         style="background: url(<?php echo $url['baseurl']; ?>/photos/<?php echo $sysid ?>/1.jpg"></div>
                    <div class="property-info">
                        <div class="property-price"><?php if (!empty($price)) {
                                echo '$' . $price;
                            } ?></div>
                        <div class="property-highlights">
                            <?php if (!empty($type)) {
                                echo $type;
                            } else {
                                echo 'N/A';
                            } ?>
                            <?php if (!empty($rooms)) {
                                echo '· ' . $rooms . ' Habitaciones';
                            } ?>
                            <?php if (!empty($baths)) {
                                echo '· ' . $baths . ' Baños';
                            } ?>
                        </div>
                        <div class="property-address">
                            <?php if (!empty($address)) {
                                echo $address;
                            } else if (!empty($city) and !empty($state)) {
                                echo $city . ', ' . $state;
                            } else {
                                echo $state;
                            } ?>
                        </div>
                        <div class="property-code">MLS: <?php the_title(); ?></div>
                    </div>
                </a>
            </div>
        <?php endwhile; else: ?>
            <div class="col-md-12">
                <div class="no-results-info">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/no-properties.svg" alt="0">
                    <h4><?php _e('No existen propiedades disponibles en estos momentos', 'hr') ?></h4>
                    <p><?php _e('0 resultados', 'hr') ?></p>
                </div>
            </div>
        <?php endif; wp_reset_postdata(); ?>
    </div>
    <!--<div class="row">
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
    </div>-->
</div>

<?php get_footer(); ?>
