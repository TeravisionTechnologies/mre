<?php
$footer_query = get_posts(
  array(
    'post_type' => 'header_footer'
  )
);
$footer_info = get_post_meta($footer_query[0]->ID);
?>
<div id="contact-us" class="col-xs-12 al-contact-div"
     style="background-image: url('<?php echo $footer_info['_hf_contact'][0] ?>')">
    <div class="container">
        <div class="row">
            <p class="col-xs-12 text-center al-contact-text">Nos gustaría asesorarte en tu próxima inversión</p>
            <p class="col-xs-12 text-center al-contact-text-bold">¡Contáctanos!</p>
            <div class="col-xs-12 col-md-4">
                <div class="al-phone-box text-center center-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/smartphone.png"
                         alt="Llamanos Ala19">
                    <p>Llámanos para asesoría <b>inmediata</b></p>
                    <a href="tel:+17864775091" class="al-phone-num">+1 786 477.5091</a>
                </div>
            </div>
            <div class="col-xs-12 col-md-8 al-contact-form-div">
                <?php echo do_shortcode('[contact-form-7 id="4" title="Home - Contact form"]'); ?>
            </div>
        </div>
    </div>
</div>
          <footer class="al-footer-container col-xs-12">
            <div class="container">
              <div class="col-xs-12 text-center">
                <!--<img src="<?php echo $footer_info['_hf_logo'][0]; ?>" alt="Logo Ala19 Footer" class="img-responsive center-block">-->
                <img src="<?php echo get_template_directory_uri(); ?>/assets/ala19.svg" alt="Logo Ala19 Footer" class="img-responsive center-block">
                <p class="al-text-white"><?php echo $footer_info['_hf_copy'][0]; ?></p>
                <a href="#" class="al-text-white">Disclaimers</a>
              </div>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/top.svg" class="footer-top" alt="Go to top">
          </footer>
</div>
</div>

<nav id="c-menu--slide-left" class="c-menu c-menu--slide-left">
    <button class="c-menu__close" style="display: none;">&larr; Close Menu</button>
    <div class="menu">
        <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_class' => "al-menu c-menu__items")); ?>
        <div class="al-menu-language">
            <h2 class="al-menu-language-text">Seleccione su idioma de preferencia:</h2>
            <img class="al-menu-language-flag language-flag-active"
                 src="<?php echo get_template_directory_uri(); ?>/assets/usa_flag.svg" alt="Inglés">
            <img class="al-menu-language-flag"
                 src="<?php echo get_template_directory_uri(); ?>/assets/spain_flag.svg" alt="Español">
        </div>
        <div class="al-menu-social">
            <ul class="menu-social-icons">
                <li class="menu-social-icon"><a href="https://www.linkedin.com/company/11285534/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li class="menu-social-icon"><a href="https://www.facebook.com/MerandRealEstate/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li class="menu-social-icon"><a href="https://www.instagram.com/grupomre/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li class="menu-social-icon"><a href="https://twitter.com/grupomre" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li class="menu-social-icon"><a href="https://www.youtube.com/channel/UCj1GOp1JCfAaSmBdQn5uU9w?view_as=subscriber" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</nav>
<div id="c-mask" class="c-mask"></div>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/swiper.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/isotope.pkgd.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/menu.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/basic.js"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBH6eKdzSWQ0bic1EiZCzkbhqMqEzYd3eQ&callback=initMap">
</script>
<script type="text/javascript">
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>
<?php wp_enqueue_script("jquery"); ?>
</body>
</html>
