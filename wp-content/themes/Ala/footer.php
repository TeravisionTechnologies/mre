<?php
$footer_query = get_posts(
  array(
    'post_type' => 'header_footer'
  )
);
$footer_info = get_post_meta($footer_query[0]->ID);
$social_networks = get_post_meta( $footer_query[0]->ID, '_hf_social_networks', true );
$contact = get_post_meta( $footer_query[0]->ID, '_hf_contact_form', true );
?>
          <div id="contact-us" class="col-xs-12 al-contact-div" style="background-image: url('<?php if(isset($contact[0]["_hf_contact_background"])) { echo $contact[0]["_hf_contact_background"]; }?>')">
            <div class="container">
              <div class="row">
                <p class="col-xs-12 text-center al-contact-text"><?php if(isset($contact[0]['_hf_contact_first'])) { echo $contact[0]['_hf_contact_first']; }?></p>
                <p class="col-xs-12 text-center al-contact-text-bold"><?php if(isset($contact[0]['_hf_contact_second'])) { echo $contact[0]['_hf_contact_second']; }?></p>
                <div class="col-xs-12 col-md-4">
                  <div class="al-phone-box text-center center-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/smartphone.png" alt="Llamanos Ala19">
                    <p><?php if(isset($contact[0]['_hf_contact_text'])) { echo $contact[0]['_hf_contact_text']; }?></p>
                    <a href="tel:<?php echo str_replace(array(".", " ", "-", "/"), "", $contact[0]['_hf_contact_phone']); ?>" class="al-phone-num"><?php echo $contact[0]['_hf_contact_phone']; ?></a>
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
                <a href="<?php echo home_url(); ?>"><img src="<?php echo $footer_info['_hf_logo'][0]; ?>" alt="Logo Ala19 Footer" class="img-responsive center-block"></a>
                <p class="al-text-white"><?php echo $footer_info['_hf_copy'][0]; ?></p>
                <a href="#" class="al-text-white">Disclaimers</a>
              </div>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/top.svg" class="footer-top" alt="Go to top">
          </footer>
</div>
</div>

<nav id="c-menu--slide-left" class="c-menu c-menu--slide-left">
    <!--<button class="c-menu__close" style="display: none;">&larr; Close Menu</button>-->
    <div id="c-button--slide-left" class="menu-button c-button pull-right c-menu__close c-button-close">
        <div id="nav-icon4" class="open">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="menu">
        <div class="menu-wrapper">
            <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_class' => "al-menu c-menu__items")); ?>
            <div class="al-menu-language">
                <h2 class="al-menu-language-text">Seleccione su idioma de preferencia:</h2>
                <img class="al-menu-language-flag language-flag-active"
                     src="<?php echo get_template_directory_uri(); ?>/assets/usa_flag.svg" alt="Inglés">
                <img class="al-menu-language-flag"
                     src="<?php echo get_template_directory_uri(); ?>/assets/spain_flag.svg" alt="Español">
            </div>
            <div class="al-menu-social">
                <?php if(isset($social_networks[0])) { ?>
                <ul class="menu-social-icons">
                  <?php if(isset($social_networks[0]['_hf_linkedin'])) { ?>
                    <li class="menu-social-icon"><a href="<?php echo $social_networks[0]['_hf_linkedin'] ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                  <?php } ?>
                  <?php if(isset($social_networks[0]['_hf_facebook'])) { ?>
                    <li class="menu-social-icon"><a href="<?php echo $social_networks[0]['_hf_facebook'] ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  <?php } ?>
                  <?php if(isset($social_networks[0]['_hf_instagram'])) { ?>
                    <li class="menu-social-icon"><a href="<?php echo $social_networks[0]['_hf_instagram'] ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                  <?php } ?>
                  <?php if(isset($social_networks[0]['_hf_twitter'])) { ?>
                    <li class="menu-social-icon"><a href="<?php echo $social_networks[0]['_hf_twitter'] ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  <?php } ?>
                  <?php if(isset($social_networks[0]['_hf_youtube'])) { ?>
                    <li class="menu-social-icon"><a href="<?php echo $social_networks[0]['_hf_youtube'] ?>" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                  <?php } ?>
                </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>
<div id="c-mask" class="c-mask"></div>
<?php wp_footer(); ?>
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
