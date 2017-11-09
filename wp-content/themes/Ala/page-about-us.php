<?php
/*
Template Name: About Us
*/

$about_query = get_posts(
  array(
    'post_type' => 'about_us'
  )
);
echo $about_query[0]->ID;
$hero = get_post_meta( $about_query[0]->ID, '_au_hero', true );
var_dump($hero);
$main_text = get_post_meta( $about_query[0]->ID, '_au_main', true );
$values = get_post_meta( $about_query[0]->ID, '_au_values', true );

get_header();
?>

<section  id="about-hero-section" style="background-image: url(<?php echo $hero[0]['_au_hero_background']; ?>)">
  <div class="about-hero-overlay">
    <?php echo $hero[0]['_au_hero_text']; ?>
  </div>
</section>
<section id="about-main-text">
  <?php echo $main_text[0]['_au_main_text']; ?>
</section>
<section id="about-secondary-text">
  <div class="vision">
    <h2>Visión</h2>
    <p><?php echo $main_text[0]['_au_vision_text']; ?></p>
  </div>
  <div class="mission">
    <h2>Misión</h2>
    <p><?php echo $main_text[0]['_au_mission_text']; ?></p>
  </div>
  <div id="about-values" class="col-xs-12 no-padding">
    <h2 class="values-title">Valores</h2>
    <?php foreach ($values as $value) { ?>
      <div class="col-xs-12 col-sm-6 value-block">
        <div class="value-image">
          <img class="img-responsive" src="<?php echo $value['_au_value_image'];?>" alt="<?php echo $value['_au_value_title']; ?>">
        </div>
        <h2><?php echo $value['_au_value_title']; ?></h2>
        <p><?php echo $value['_au_value_text']; ?></p>
      </div>
    <?php } ?>
  </div>
  <div class="our-team">
    <h2>Nuestro equipo</h2>
    <p><?php echo $main_text[0]['_au_team_text']; ?></p>
  </div>
  <div class="our-properties">
    <h2>Nuestras propiedades</h2>
    <p><?php echo $main_text[0]['_au_properties_text']; ?></p>
  </div>
</section>
<?php get_footer(); ?>