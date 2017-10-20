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