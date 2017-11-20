<?php
/*
Template Name: About Us
*/

$about_query = get_posts(
	array(
		'post_type' => 'about_us'
	)
);
$hero        = get_post_meta( $about_query[0]->ID, '_au_hero', true );
$main_text   = get_post_meta( $about_query[0]->ID, '_au_main', true );
$values      = get_post_meta( $about_query[0]->ID, '_au_values', true );

get_header();
?>
    <section id="about-hero-section" style="background-image: url(<?php echo $hero[0]['_au_hero_background']; ?>)">
        <div class="about-hero-overlay">
			<?php echo $hero[0]['_au_hero_text']; ?>
        </div>
    </section>
    <section id="about-main-text">
		<?php echo $main_text[0]['_au_main_text']; ?>
    </section>
<?php get_footer(); ?>