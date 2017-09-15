
    <footer>
        <div class="container">
            <div class="footer-center">
            <?php
            $headerPost = get_posts(
                array(
                    'post_type' => 'header_footer'
                )
            );
            $theMeta = get_post_meta($headerPost[0]->ID);
            ?>
            <div class="footer-logo">
                <a href="<?php echo esc_url( home_url( '/' ) ) ?>">
                    <img src="<?php echo $theMeta['_hf_logo'][0] ?>" />
                </a>
            </div>
            <div class="footer-copy">
                <h5>
                    <?php echo $theMeta['_hf_copy'][0] ?>
                    <a href="#">Disclaimers</a>
                </h5>
            </div>
            <div class="footer-icons">
                <a href="#">
                    <i class="fa fa-facebook"></i>
                </a>
                <a href="#">
                    <i class="fa fa-twitter"></i>
                </a>
                <a href="#">
                    <i class="fa fa-instagram"></i>
                </a>
                <a href="#">
                    <i class="fa fa-youtube-play"></i>
                </a>
                <a href="#">
                    <i class="fa fa-linkedin"></i>
                </a>
            </div>
        </div>
        </div>
    </footer>

    <!-- Swiper JS -->
    <script src="./wp-content/themes/ala19/js/swiper.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            paginationClickable: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            spaceBetween: 30
        });
    </script>
  </body>
</html>