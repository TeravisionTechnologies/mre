<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 05/09/17
 * Time: 09:10 AM
 */
get_header();
?>

<section id="about-us">
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
        <?php
        $aboutPost = get_posts(
            array(
                'post_type' => 'about_us'
            )
        );

        $entries = get_post_meta( $aboutPost[0]->ID, 'about_group_field', true );

        foreach ( (array) $entries as $key => $entry ) {


            ?>
            ?><div class="swiper-slide" style="background-image:url(<?php echo $entry['_about_image'] ?>)"><?php
            if ( isset( $entry['_about_desc'] ) ) {

                ?>
                <div class="slider-swiper-center">
                <?php echo wpautop( $entry['_about_desc'] ); ?>
                </div>
                <?php
            }
            ?></div><?php

        }
        ?>
    </div>

        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>


</section>

<section id="before-contact-us">
    <div id="offices" class="carousel slide" data-ride="carousel" data-interval="false">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#offices" data-slide-to="1" class="flag flag-usa active">
                <img class="flag-usa" src="<?php echo get_template_directory_uri(); ?>/assets/usa_flag.svg" />
            </li>
            <li data-target="#offices" data-slide-to="2" class="flag flag-spain">
                <img class="flag-spain" src="<?php echo get_template_directory_uri(); ?>/assets/spain_flag.svg" />
            </li>
        </ol>
        <h4>Puedes encontrar Nuestras Oficinas en:</h4>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
<!--            style="margin-left: 25%"-->
            <div class="item active" >
                <div class="office-detail usa-office">
                    <h5 class="center">
                        <span>Madrid:</span>
                    </h5>
                    <h5 class="center">Calle Ortega y Gasset #6</h5>
                    <h5 class="center">Primero Izquierda</h5>
                    <h5 class="center">Sample: +34 605 816 803</h5>
                </div>
                <div class="office-detail usa-office">

                </div>
            </div>

        </div>
    </div>
</section>

<section id="contact-us">
    <div class="title">
        <h1>Nos gustaría asesorarte
            <span class="first">en tu próxima inversión</span>
            <span class="last">¡Contáctanos!</span>
        </h1>
    </div>
    <div class="inner-section">
        <div class="call-us">
            <div class="content">
                <div class="centered-content">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/d-iconphone.svg" />
                    <h2>Llámenos para asesoría <span class="bold-me">Inmediata</span></h2>
                    <h2 id="contact-phone" class="bold-me">+1 786 376.22.22</h2>
                </div>
            </div>
        </div>
        <div class="the-form">
            <?php echo do_shortcode( '[contact-form-7 id="11" title="Home - Contact form"]' ); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
	</body>

</html>