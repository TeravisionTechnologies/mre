<?php
  $footer_query = get_posts(
    array(
      'post_type' => 'header_footer'
    )
  );
  $partners = get_post_meta( $footer_query[0]->ID, '_hf_partners', true );
  $rental = get_post_meta( $footer_query[0]->ID, '_hf_rental', true );
  $contact = get_post_meta( $footer_query[0]->ID, '_hf_contact_form', true );
  $footer_info = get_post_meta($footer_query[0]->ID);
  $social_networks = get_post_meta( $footer_query[0]->ID, '_hf_social_networks', true );
?>

        <section class="col-xs-12 hr-partners-section text-center">
          <div class="container">
            <p class="hr-partners-title"><?php if(isset($partners[0]['_hf_partners_text'])) { echo $partners[0]['_hf_partners_text']; }?></p>
          </div>
          <div class="hr-partners-images">
            <a href="<?php echo $partners[0]['_hf_partner_link_left']; ?>" target="_blank"><img src="<?php echo $partners[0]['_hf_partner_logo_left']; ?>" alt="Logo ALA19" class="partners-images-one"/></a>
            <a href="<?php echo $partners[0]['_hf_partner_link_right']; ?>" target="_blank"><img src="<?php echo $partners[0]['_hf_partner_logo_right']; ?>" alt="Logo MRE RealEstate" class="partners-images-two"/></a>
          </div>
        </section>
        <section class="col-xs-12 hr-rentalone-section text-center no-padding" style="background-image: url('<?php echo $rental[0]["_hf_rental_background"] ?>')">
          <div class="hr-rentalone-overlay">
            <img src="<?php echo $rental[0]["_hf_rental_logo"] ?>" alt="Logo Rental One" class="rentalone-logo"/>
            <div class="rentalone-button"><a href="<?php echo $rental[0]["_hf_rental_link"] ?>" target="_blank">Ver más</a></div>
          </div>
        </section>
        <section id="contact-us" class="col-xs-12 hr-contact-div no-padding" style="background-image: url('<?php if(isset($contact[0]["_hf_contact_background"])) { echo $contact[0]["_hf_contact_background"]; }?>')">
          <div class="container-hr center-block">
            <div class="row">
              <p class="col-xs-12 text-center hr-contact-text"><?php if(isset($contact[0]['_hf_contact_first'])) { echo $contact[0]['_hf_contact_first']; }?></p>
              <p class="col-xs-12 text-center hr-contact-text-bold"><?php if(isset($contact[0]['_hf_contact_second'])) { echo $contact[0]['_hf_contact_second']; }?></p>
              <div class="col-xs-12 col-md-4 no-padding">
                <div class="hr-phone-box text-center center-block">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/smartphone.svg" alt="Llamanos HR19">
                  <p><?php if(isset($contact[0]['_hf_contact_text'])) { echo $contact[0]['_hf_contact_text']; }?></p>
                  <a href="tel:<?php echo str_replace(array(".", " ", "-", "/"), "", $contact[0]['_hf_contact_phone']); ?>" class="hr-phone-num"><?php echo $contact[0]['_hf_contact_phone']; ?></a>
                </div>
              </div>
              <div class="col-xs-12 col-md-8 hr-contact-form-div no-padding">
                <?php echo do_shortcode( '[contact-form-7 id="5" title="Home - Contact form"]' ); ?>
              </div>
            </div>
          </div>
        </section>
        <footer class="col-xs-12 hr-footer-section text-center">
          <div class="container">
            <a href="<?php echo home_url(); ?>"><img src="<?php echo $footer_info['_hf_logo'][0]; ?>" alt="Logo HR19 Footer"></a>
            <p class="hr-footer-text"><?php echo $footer_info['_hf_copy'][0]; ?></p>
            <a href="#" class="hr-footer-link">Disclaimers</a>
          </div>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/top.svg" class="footer-top" alt="Go to top">
        </footer>
      </div>
    </div>
    <nav id="c-menu--slide-left" class="c-menu c-menu--slide-left">
      <div id="c-button--slide-left" class="menu-button c-button pull-right c-menu__close c-button-close">
        <div id="nav-icon4" class="open">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="menu">
          <div class="menu-wrapper">
            <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_class' => "hr-menu c-menu__items")); ?>
            <div class="hr-menu-language">
              <h2 class="hr-menu-language-text">Seleccione su idioma de preferencia:</h2>
              <img class="hr-menu-language-flag " src="<?php echo get_template_directory_uri(); ?>/assets/spain_flag.svg" alt="Spanish">
              <img class="hr-menu-language-flag language-flag-active" src="<?php echo get_template_directory_uri(); ?>/assets/usa_flag.svg" alt="English">
            </div>
            <div class="hr-menu-social">
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
    <script src="<?php echo get_template_directory_uri(); ?>/js/swiper.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/menu.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/basic.js"></script>
    <script type="text/javascript">
      var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>
  </body>
</html>