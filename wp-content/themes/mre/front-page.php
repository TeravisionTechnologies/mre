<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 05/09/17
 * Time: 09:10 AM
 */
get_header();
?>
<section style="height: 300px; background: #00b9eb">

</section>

<section style="height: 300px; background: #f1c8c7">

</section>

<section style="height: 300px; background: #00b9eb">

</section>

<section id="before-contact-us">
    <div id="countries">
        <!-- Indicators -->
        <ul class="indicators">
            <li data-target="#offices" data-slide-to="0" class="flag">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/ven_flag.svg" />
            </li>
            <li data-target="#offices" data-slide-to="1" class="flag active">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/usa_flag.svg" />
            </li>
            <li data-target="#offices" data-slide-to="2" class="flag">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/spain_flag.svg" />
            </li>
        </ul>
        <h4>Puedes encontrar Nuestras Oficinas en:</h4>
    </div>
    <div id="offices" class="carousel slide" data-ride="carousel" data-interval="false">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item">
                <div class="offices-detail">
                    <div class="detail">
                        <h5>
                            <span>Sample:</span>
                        </h5>
                        <h5>sample sample sample sample</h5>
                        <h5>sample, sample</h5>
                        <h5>Sample: +1 111 11.11.11</h5>
                    </div>
                    <div class="detail">
                        <h5>
                            <span>Sample:</span>
                        </h5>
                        <h5>sample sample sample sample</h5>
                        <h5>sample, sample</h5>
                        <h5>Sample: +1 111 11.11.11</h5>
                    </div>
                </div>
            </div>

            <div class="item active">
                <div class="offices-detail">
                    <div class="offices-detail">
                        <div class="detail">
                            <h5>
                                <span>Orlando:</span>
                            </h5>
                            <h5>2295 S. Hiawassee Road, Suite 407E</h5>
                            <h5>Orlando, Florida</h5>
                            <h5>Teléfonos: +1 407 255.08.71</h5>
                        </div>
                        <div class="detail">
                            <h5>
                                <span>Miami:</span>
                            </h5>
                            <h5>55 Merrick Way, Suite 214 Coral Gables</h5>
                            <h5>Miami, Florida</h5>
                            <h5>Teléfonos: +1 786 376.22.22 / 477.50.91</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="offices-detail">
                <div class="detail">
                    <h5>
                        <span>Sample:</span>
                    </h5>
                    <h5>sample sample sample sample</h5>
                    <h5>sample, sample</h5>
                    <h5>Sample: +1 111 11.11.11</h5>
                </div>
                <div class="detail">
                    <h5>
                        <span>Sample:</span>
                    </h5>
                    <h5>sample sample sample sample</h5>
                    <h5>sample, sample</h5>
                    <h5>Sample: +1 111 11.11.11</h5>
                </div>
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