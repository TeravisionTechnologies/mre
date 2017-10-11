<?php
  $footer_query = get_posts(
    array(
      'post_type' => 'header_footer'
    )
  );
  $footer_info = get_post_meta($footer_query[0]->ID);
?>
          
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
      </div>
    </div>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/swiper.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/basic.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBH6eKdzSWQ0bic1EiZCzkbhqMqEzYd3eQ&callback=initMap">
    </script>
    <script type="text/javascript">
      var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>
    <?php wp_enqueue_script("jquery"); ?>
  </body>
</html>