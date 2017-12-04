<?php
/*
Template Name: About Us
*/
get_header();
$about_query = get_posts(
	array(
		'post_type' => 'about_us'
	)
);
$hero        = get_post_meta( $about_query[0]->ID, '_au_hero', true );
$main_text   = get_post_meta( $about_query[0]->ID, '_au_main', true );
$values      = get_post_meta( $about_query[0]->ID, '_au_values', true );
$home_query = get_posts(
    array(
        'post_type' => 'header_footer'
    )
);
$home_info = get_post_meta($home_query[0]->ID);
?>
    <section id="about-hero-section" style="background-image: url(<?php echo $hero[0]['_au_hero_background']; ?>)">
        <div class="about-hero-overlay">
			<?php echo $hero[0]['_au_hero_text']; ?>
        </div>
    </section>
    <section id="about-main-text">
		<?php echo $main_text[0]['_au_main_text']; ?>
    </section>
    <div class="col-xs-12 al-partners-section text-center">
        <div class="container">
            <p class="al-partners-title"><?php echo $home_info['_hf_partners_text'][0]; ?></p>
        </div>
        <div class="partners-images">
          <a href="<?php echo $home_info['_hf_partner_link_left'][0]; ?>" target="_blank"><img src="<?php echo $home_info['_hf_partners-one'][0]; ?>" alt="Logo HR19 Realty" class="partners-images-one"/></a>
          <a href="<?php echo $home_info['_hf_partner_link_right'][0]; ?>" target="_blank"><img src="<?php echo $home_info['_hf_partners-two'][0]; ?>" alt="Logo MRE RealEstate" class="partners-images-two"/></a>
        </div>
    </div>
<?php get_footer(); ?>