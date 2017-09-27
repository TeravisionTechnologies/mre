<?php
    /**
     *  Created by PhpStorm.
     *  User: mtoledo
     *  Date: 3/8/17
     *  Time: 8:19 AM
     **/

    get_header();
?>

<?php
  $footer_query = get_posts(
    array(
      'post_type' => 'header_footer'
    )
  );
  $footer_info = get_post_meta($footer_query[0]->ID);
?>
<div class="col-xs-12 al-partners-section text-center">
  <div class="container">
    <p class="al-partners-title">Nuestros Socios</p>
    <p class="al-partners-subtitle">Hacemos real tu Inversión soñada</p>
  </div>
  <div class="partners-images">
    <img src="<?php echo $footer_info['_hf_partners-one'][0]; ?>" alt="Logo Partner One" class="partners-images-one"/>
    <img src="<?php echo $footer_info['_hf_partners-two'][0]; ?>" alt="Logo Partner Two" class="partners-images-two"/>
  </div>
</div>
<div class="col-xs-12 text-center al-swiper-contact" style="background-image: url('<?php echo $footer_info['_hf_contact-swiper'][0] ?>')">
<!--  SWIPER CONTACT INFO-->
</div>

<?php get_footer(); ?>

