<?php
$footerPost      = get_posts(
	array(
		'post_type' => 'header_footer'
	)
);
$theMeta         = get_post_meta( $footerPost[0]->ID );
$social_networks = get_post_meta( $footerPost[0]->ID, '_hf_social_networks', true );
$lang = get_locale();
wp_footer();
?>
<?php if ( ! is_404() ) { ?>
    <footer id="mre-footer" class="col-xs-12">
        <div class="mre-footer-elements">
            <a href="/">
                <img src="<?php echo $theMeta['_hf_footer_logo'][0] ?>" class="mre-footer-logo"/>
            </a>
            <h2 class="mre-footer-copyright"><?php echo $theMeta['_hf_copy'][0] ?></h2>
            <a href="#">Disclaimers</a>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/go-top-arrow.png" class="mre-footer-go-top"
             alt="Go to top button">
    </footer>
<?php } ?>
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
			<?php wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => "mre-menu c-menu__items"
			) ); ?>
            <div class="mre-menu-language">
				<?php
				$i         = 0;
				$languages = pll_the_languages( array( 'raw' => 1 ) );
				?>
                <h2 class="mre-menu-language-text"><?php echo ( $lang == "es_ES" ? 'Seleccione su idioma de preferencia:' : 'Select your preferred language:' ) ?></h2>
                <a href="<?php echo $languages['es']['url'] ?>"><img class="mre-menu-language-flag <?php echo ( $lang == "es_ES" ? 'language-flag-active' : '' ) ?>"
                                                                     src="<?php echo get_template_directory_uri(); ?>/assets/spain_flag.svg"
                                                                     alt="Spanish"></a>
                <a href="<?php echo $languages['en']['url'] ?>"><img class="mre-menu-language-flag <?php echo ( $lang == "en_US" ? 'language-flag-active' : '' ) ?>"
                                                                     src="<?php echo get_template_directory_uri(); ?>/assets/usa_flag.svg"
                                                                     alt="English"></a>
            </div>
            <div class="mre-menu-social">
				<?php if ( isset( $social_networks[0] ) ) { ?>
                    <ul class="menu-social-icons">
						<?php if ( isset( $social_networks[0]['_hf_linkedin'] ) ) { ?>
                            <li class="menu-social-icon"><a href="<?php echo $social_networks[0]['_hf_linkedin'] ?>"
                                                            target="_blank"><i class="fa fa-linkedin"
                                                                               aria-hidden="true"></i></a></li>
						<?php } ?>
						<?php if ( isset( $social_networks[0]['_hf_facebook'] ) ) { ?>
                            <li class="menu-social-icon"><a href="<?php echo $social_networks[0]['_hf_facebook'] ?>"
                                                            target="_blank"><i class="fa fa-facebook"
                                                                               aria-hidden="true"></i></a></li>
						<?php } ?>
						<?php if ( isset( $social_networks[0]['_hf_instagram'] ) ) { ?>
                            <li class="menu-social-icon"><a href="<?php echo $social_networks[0]['_hf_instagram'] ?>"
                                                            target="_blank"><i class="fa fa-instagram"
                                                                               aria-hidden="true"></i></a></li>
						<?php } ?>
						<?php if ( isset( $social_networks[0]['_hf_twitter'] ) ) { ?>
                            <li class="menu-social-icon"><a href="<?php echo $social_networks[0]['_hf_twitter'] ?>"
                                                            target="_blank"><i class="fa fa-twitter"
                                                                               aria-hidden="true"></i></a></li>
						<?php } ?>
						<?php if ( isset( $social_networks[0]['_hf_youtube'] ) ) { ?>
                            <li class="menu-social-icon"><a href="<?php echo $social_networks[0]['_hf_youtube'] ?>"
                                                            target="_blank"><i class="fa fa-youtube-play"
                                                                               aria-hidden="true"></i></a></li>
						<?php } ?>
                    </ul>
				<?php } ?>
            </div>
        </div>
    </div>
</nav>
<div id="c-mask" class="c-mask"></div>
<div class="thankyou">
    <div class="wrap">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/check.svg" alt="Thank you">
        <h6><?php echo ( $lang == "es_ES" ? '¡Gracias por descargar nuestro ebook!' : 'Thank you for downloading our ebook!' ) ?></h6>
    </div>
</div>
<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/swiper.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/menu.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.simplePagination.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/validator.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/basic.js"></script>
<script type="text/javascript">
    var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
</script>
</body>
</html>