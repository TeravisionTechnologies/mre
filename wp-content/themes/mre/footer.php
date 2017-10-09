<?php
  $footerPost = get_posts(
    array(
      'post_type' => 'header_footer'
    )
  );
  $theMeta = get_post_meta($footerPost[0]->ID);
  wp_footer();
?>
            <footer id="mre-footer" class="col-xs-12">
              <div class="mre-footer-elements">
                <a href="/">
                  <img src="<?php echo $theMeta['_hf_logo'][0] ?>" class="mre-footer-logo"/>
                </a>
                <h2 class="mre-footer-copyright"><?php echo $theMeta['_hf_copy'][0] ?></h2>
                <a href="#">Disclaimers</a>
              </div>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/go-top-arrow.png" class="mre-footer-go-top" alt="Go to top button">
            </footer>
          </div>
        </div>
      </div>
    </div>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/swiper.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/basic.js"></script>
  </body>
</html>