<!--<div id="contact-us" class="col-xs-12 al-contact-div" style="background-image: url('<?php /*if(isset($contact[0]["_hf_contact_background"])) { echo $contact[0]["_hf_contact_background"]; }*/?>')">
  <div class="container">
    <div class="row">
      <p class="col-xs-12 text-center al-contact-text"><?php /*if(isset($contact[0]['_hf_contact_first'])) { echo $contact[0]['_hf_contact_first']; }*/?></p>
      <p class="col-xs-12 text-center al-contact-text-bold"><?php /*if(isset($contact[0]['_hf_contact_second'])) { echo $contact[0]['_hf_contact_second']; }*/?></p>
      <div class="col-xs-12 col-md-4">
        <div class="al-phone-box text-center center-block">
          <img src="<?php /*echo get_template_directory_uri(); */?>/assets/smartphone.png" alt="Llamanos Ala19">
          <p><?php /*if(isset($contact[0]['_hf_contact_text'])) { echo $contact[0]['_hf_contact_text']; }*/?></p>
          <a href="tel:<?php /*echo str_replace(array(".", " ", "-", "/"), "", $contact[0]['_hf_contact_phone']); */?>" class="al-phone-num"><?php /*echo $contact[0]['_hf_contact_phone']; */?></a>
        </div>
      </div>
      <div class="col-xs-12 col-md-8 al-contact-form-div">
        <?php /*echo do_shortcode('[contact-form-7 id="4" title="Home - Contact form"]'); */?>
      </div>
    </div>
  </div>
</div>-->
    <footer class="col-xs-12 hr-footer-section text-center">
      <div class="container">
        <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/hr19.svg" alt="Logo HR19 Footer"></a>
        <p class="hr-footer-text">Todos los derechos reservados, Hr19 realty C.A</p>
        <a href="#" class="hr-footer-link">Disclaimers</a>
      </div>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/top.svg" class="footer-top" alt="Go to top">
    </footer>

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