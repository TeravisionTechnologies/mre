<?php
/*
Template Name: Agents
*/
get_header();
?>
  <section class="agent-hero" style="<?php if ($thumbnail_id = get_post_thumbnail_id()) {
    if ($image_src = wp_get_attachment_image_src($thumbnail_id, 'full')) printf('background-image: url(%s)"', $image_src[0]);
  } ?>">
    <h1><?php the_title(); ?></h1>
    <div class="mask"></div>
</section>

<?php
$agents = array('post_type' => 'agent');
query_posts($agents);
if (have_posts()): while (have_posts()):
    the_post();
    $phone = get_post_meta(get_the_ID(), '_ag_phone', true);
    $email = get_post_meta(get_the_ID(), '_ag_mail', true);
    $agentypes = get_the_terms( get_the_ID(), 'agent_type' );
    $agentype = $agentypes[0];
    ?>
    <section class="col-xs-12 no-padding hr-agents-section">
        <div class="agent-profile">
            <div class="agent-profile-photo col-xs-2 no-padding">
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail();
                } else {
                    echo '<img src="' . get_template_directory_uri(). '/assets/no-photo.jpg" alt="">';
                } ?>
            </div>
            <div class="agent-profile-info col-xs-10 no-padding">
                <h2 class="profile-name"><?php the_title(); ?>
                    <?php if (!empty($agentype)){ ?>
                    · <span class="profile-position"><?php echo $agentype->name; ?></span>
                    <?php } ?>
                </h2>
                <?php if (!empty($phone)) { ?><h3 class="profile-phone">Tfno. <?php echo $phone; ?></h3><?php } ?>
                <?php if (!empty($email)) { ?><h3 class="profile-email">Email: <?php echo $email; ?></h3><?php } ?>
            </div>
        </div>
        <div class="agent-bio">
            <?php the_content(); ?>
        </div>


    </section>
<?php endwhile; endif;
wp_reset_postdata(); ?>

<?php get_footer(); ?>
