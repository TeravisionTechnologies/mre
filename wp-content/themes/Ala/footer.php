    <?php
      $footer_query = get_posts(
        array(
          'post_type' => 'header_footer'
        )
      );
      $footer_info = get_post_meta($footer_query[0]->ID);

    ?>
    <div id="contact-us" class="col-xs-12 al-contact-div" style="background-image: url('<?php echo $footer_info['_hf_contact'][0] ?>')">
      <div class="container">
        <div class="row">
          <p class="col-xs-12 text-center al-contact-text">Nos gustaría asesorarte en tu próxima inversión</p>
          <p class="col-xs-12 text-center al-contact-text-bold">¡Contáctanos!</p>
          <div class="col-xs-12 col-md-4">
            <div class="al-phone-box text-center center-block">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/smartphone.png" alt="Llamanos Ala19">
              <p>Llámanos para asesoría <b>inmediata</b></p>
              <a href="tel:+17863762222" class="al-phone-num">+1786 376.22.22</a>
            </div>
          </div>
          <div class="col-xs-12 col-md-8 al-contact-form-div">
            <?php echo do_shortcode( '[contact-form-7 id="4" title="Home - Contact form"]' ); ?>
          </div>
        </div>
      </div>
    </div>
    <footer class="al-footer-container col-xs-12">
      <div class="container">
        <div class="col-xs-12 text-center">
          <img src="<?php echo $footer_info['_hf_logo'][0] ?>" alt="Logo Ala19 Footer" class="img-responsive center-block">
          <p class="al-text-white"><?php echo $footer_info['_hf_copy'][0] ?></p>
          <a href="" class="al-text-white">Disclaimers</a>
        </div>
      </div>
      <div id="go-to-top" class="al-go-top-div"><span class="fa fa-caret-up al-go-top-btn"></span></div>
    </footer>

    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/swiper.min.js"></script>
    <script type="text/javascript">
      var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/basic.js"></script>
    <?php wp_enqueue_script("jquery"); ?>
  </body>
</html>