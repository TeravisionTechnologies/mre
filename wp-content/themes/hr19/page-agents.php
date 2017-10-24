<?php
/*
Template Name: Agents
*/
get_header();
//$phone = get_post_meta( get_the_ID(), '_ag_phone', true);
//$email = get_post_meta( get_the_ID(), '_ag_mail', true);
?>
  <section class="agent-hero" style="<?php if ($thumbnail_id = get_post_thumbnail_id()) {
    if ($image_src = wp_get_attachment_image_src($thumbnail_id, 'full')) printf('background-image: url(%s)"', $image_src[0]);
  } ?>">
    <h1><?php the_title(); ?></h1>
    <div class="mask"></div>
  </section>
  <section class="col-xs-12 no-padding hr-agents-section">
    <div class="agent-profile">
      <div class="agent-profile-photo col-xs-2 no-padding">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/rentalone-background.jpg" alt="">
      </div>
      <div class="agent-profile-info col-xs-10 no-padding">
        <h2 class="profile-name">Hernan Rodriguez · <span class="profile-position">Realtor Associate</span></h2>
        <h3 class="profile-phone">Tfno. 786-222-2332</h3>
        <h3 class="profile-email">Email: hernan@hr19realty.com</h3>
      </div>
    </div>
    <div class="agent-bio">
      <p class="agent-bio-text">Mr. Tomas Hoffman is a real estate broker based in Miami, Florida. As a Venezuelan-American who moved to Miami in the early eighties he has seen the city steadily evolve into the metropolis it is today, and has proudly been directly involved in its development. Over his 25-year career Tomas has brokered over $300 million worth of commercial and residential real estate throughout Miami-Dade County. His areas of expertise include investment properties, lending, land development and pre construction. Tomas is currently involved in several ongoing projects in Brickell, Miami Beach, and Sunny Isles</p>
    </div>



  </section>


<?php get_footer(); ?>
