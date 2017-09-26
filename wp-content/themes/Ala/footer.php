    <?php
      $footer_query = get_posts(
        array(
          'post_type' => 'header_footer'
        )
      );
      $footer_info = get_post_meta($footer_query[0]->ID);

    ?>
    <footer class="al-footer-container">
      <div class="container">
        <div class="col-xs-12 text-center">
          <img src="<?php echo $footer_info['_hf_logo'][0] ?>" alt="Logo Ala19 Footer" class="img-responsive center-block">
          <p class="al-text-white"><?php echo $footer_info['_hf_copy'][0] ?></p>
          <a href="" class="al-text-white">Disclaimers</a>
        </div>
      </div>
    </footer>
  </body>
</html>