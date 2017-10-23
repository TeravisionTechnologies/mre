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