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

<section style="height: 300px; background: #b78b66">

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