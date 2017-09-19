<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 05/09/17
 * Time: 09:10 AM
 */
get_header();
?>

<section class="slide">
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
        <?php
        $aboutPost = get_posts(
            array(
                'post_type' => 'about_us'
            )
        );

        $entries = get_post_meta( $aboutPost[2]->ID, 'about_group_field', true );

        foreach ( (array) $entries as $key => $entry ) {


            ?>
            <div class="swiper-slide" id="slide-img" style="background-image:url(<?php echo $entry['_about_image'] ?>)"><?php
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
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>
</section>

<section class="projects">
    <!-- Swiper -->
    <div class="swiper-container container-projects">
        <div class="swiper-wrapper">
            <?php
            $aboutPost = get_posts(
                array(
                    'post_type' => 'about_us'
                )
            );
            $entries = get_post_meta( $aboutPost[1]->ID, 'about_group_field', true );

            foreach ( (array) $entries as $key => $entry ) {

                ?>

                <div class="swiper-slide" style="background-image:url(<?php echo $entry['_about_image'] ?>)"><?php
                if ( isset( $entry['_about_desc'] ) ) {

                    if ($entry['_about_desc'] == $entries[1]['_about_desc']) {
                    ?>
                    <div class="slide-p-one">
                        <?php echo wpautop( $entry['_about_desc'] ); ?>
                    </div>
                    <?php
                    } else {
                        ?>
                        <div class="slide-p-two">
                            <?php echo wpautop( $entry['_about_desc'] ); ?>
                        </div>
                    <?php
                    }
                }
                ?></div><?php
            }
            ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination projects"></div>
    </div>
</section>

<section class="gallery">
    <div class="triangle">
    </div>
    <br>
    <div>
        <p class="gallery-p-left">Las Vegas</p>
<!--        <p class="line-border"></p>-->
        <p class="gallery-p-right">España</p>
    </div>
    <br><br>

    <div class="container">
        <div class="row">
            <br/>

            <?php
            $aboutPost = get_posts(
                array(
                    'post_type' => 'about_us'
                )
            );

            $entries = get_post_meta( $aboutPost[0]->ID, 'about_group_field', true );

            foreach ( (array) $entries as $key => $entry ) {

                ?>

                <div class="col-md-4">
                    <img src="<?php echo $entry['_about_image'] ?>" class="img-responsive" id="gallery-img">
                </div>
            <?php
            }
            ?>

        </div>
    </div>
</section>

<section class="col-md-12 our-partners">

        <p class="col-md-12 text-our-partners-one">Nuestros Socios</p>
        <p class="col-md-12 text-our-partners-two">Hacemos real tu inversión soñada</p>
        <!-- Wrapper for slides -->
        <div class="col-md-12 image">
            <div class="col-md-6 image-align-center-label">
                <img src="wp-content/themes/ala19/assets/e-84-b-74-f-963-option-1-002@3x.png" class="d-logo-left" />
            </div>

            <div class="col-md-6 image-align-right-label">
                <img src="wp-content/themes/ala19/assets/d-logo-1@2x.png" class="d-logo-right"/>
            </div>

        </div>

</section>

<section class="col-md-12" id="before-contact-us">
    <div id="offices" class="swiper-container">
        <div class="flags-indicators">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/usa_flag.svg" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/spain_flag.svg" />
        </div>

        <h4 class="col-md-12"> Puedes encontrar Nuestras Oficinas en:</h4>
        <!-- Wrapper for slides -->
        <div class="col-md-12 swiper-wrapper">
            <div class="col-md-6 swiper-slide">
                <div class="office-detail">
                    <h5 class="col-md-12">
                        <span>Las Vegas:</span>
                    </h5>
                    <h5 class="col-md-12">55 Merrick Way, Suite 214 Coral Gables</h5>
                    <h5 class="col-md-12">Miami, Florida</h5>
                    <h5 class="col-md-12">Teléfonos: +1 786 376.22.22 / 477.50.91</h5>
                </div>
            </div>

            <div class="col-md-12 swiper-slide">
                <div class="col-md-6 office-detail usa-office">
                    <h5 class="col-md-12">
                        <span>Madrid:</span>
                    </h5>
                    <h5 class="col-md-12">Calle Ortega y Gasset #6</h5>
                    <h5 class="col-md-12">Primero Izquierda</h5>
                    <h5 class="col-md-12">Teléfonos: +34 605 016 803</h5>
                </div>
            </div>

        </div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>

<section class="col-md-12" id="contact-us">
    <div class="spacer initial"></div>
    <p class="contact-title">Nos gustaría asesorarte
        <span class="contact-first">en tu próxima inversión</span>
        <br>
        <span class="contact-last">¡Contáctanos!</span>
    </p>
    <div class="spacer"></div>
    <div class="inner-section">
        <div class="form-errors">Uno o más campos tiene un error</div>
        <div class="call-us">
            <div class="content">
                <div class="spacer-before-image"></div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/d-iconphone.png" />
                <h2 id="advice-call">Llámenos para asesoría <span class="bold-me">Inmediata</span></h2>
                <h2 id="contact-phone" class="bold-me">+1 786 376.22.22</h2>
                <div class="spacer-end"></div>
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