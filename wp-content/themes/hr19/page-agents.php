<?php
/*
Template Name: Agents
*/
get_header();
$url = wp_upload_dir();
?>
    <section class="agent-hero" style="<?php if ( $thumbnail_id = get_post_thumbnail_id() ) {
		if ( $image_src = wp_get_attachment_image_src( $thumbnail_id, 'full' ) ) {
			printf( 'background-image: url(%s)"', $image_src[0] );
		}
	} ?>">
        <h1><?php the_title(); ?></h1>
        <div class="mask"></div>
    </section>
<?php
$agents = array( 'post_type' => 'agent' );
query_posts( $agents );
$postOrder = 0;
if ( have_posts() ): while ( have_posts() ):
	the_post();
	$phone     = get_post_meta( get_the_ID(), '_ag_phone', true );
	$email     = get_post_meta( get_the_ID(), '_ag_mail', true );
	$agentID   = get_post_meta( get_the_ID(), '_ag_mls', true );
	$agentypes = get_the_terms( get_the_ID(), 'agent_type' );
	$agentype  = $agentypes[0];

	//Agent Properties
	$args            = array(
		'post_type'      => 'property',
		'meta_key'       => '_pr_agentid',
		'posts_per_page' => - 1,
		'meta_query'     => array(
			array(
				'key'     => '_pr_agentid',
				'value'   => $agentID,
				'compare' => '=',
			)
		)
	);
	$agentProperties = new WP_Query( $args );
	$properties      = $agentProperties->get_posts();
	?>
	<?php if ( $postOrder == 0 ) { ?>
    <section class="col-xs-12 no-padding hr-agents-section">
        <div class="agent-profile">
            <div class="agent-profile-photo col-xs-3 no-padding">
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				} else {
					echo '<img src="' . get_template_directory_uri() . '/assets/no-photo.png" alt="no photo">';
				} ?>
            </div>
            <div class="agent-profile-info col-xs-9 no-padding">
                <h2 class="profile-name"><?php the_title(); ?>
					<?php if ( ! empty( $agentype ) ) { ?>
                        · <span class="profile-position"><?php echo $agentype->name; ?></span>
					<?php } ?>
                </h2>
				<?php if ( ! empty( $phone ) ) { ?><a
                    href="tel:<?php echo str_replace( array( ".", " ", "-", "/" ), "", $phone ); ?>"
                    class="profile-phone">Tfno. <?php echo $phone; ?></a><?php } ?>
				<?php if ( ! empty( $email ) ) { ?><h3 class="profile-email">Email: <?php echo $email; ?></h3><?php } ?>
            </div>
        </div>
        <div class="agent-bio">
			<?php the_content(); ?>
        </div>
        <div class="agent-properties">
            <h2 class="properties-number" data-target="<?php the_ID(); ?>">Propiedades asignadas
                (<?php echo $agentProperties->post_count; ?>)<i class="fa fa-caret-down" aria-hidden="true"></i></h2>
            <div class="properties-list" id="<?php the_ID(); ?>">
				<?php
				foreach ( $properties as $property ) {
					$address = get_post_meta( $property->ID, '_pr_address', true );
					$price   = get_post_meta( $property->ID, '_pr_current_price', true );
					$type    = get_post_meta( $property->ID, '_pr_type_of_property', true );
					$rooms   = get_post_meta( $property->ID, '_pr_room_count', true );
					$baths   = get_post_meta( $property->ID, '_pr_baths_total', true );
					$sysid   = get_post_meta( $property->ID, '_pr_matrixid', true );
					$bgimg = $url['baseurl'].'/photos/'.$sysid.'/1.jpg';
					$headers  = get_headers($bgimg, 1);
					$fsize    = $headers['Content-Length'];
					$fsize = (int)$fsize;
					$urlimage = wp_remote_head( $bgimg );
					$urlimage = $urlimage['response']['code'];
					$placeholder = get_template_directory_uri().'/assets/no-photo.jpg';
					?>
                    <div class="col-xs-12 col-sm-4 no-padding property">
                        <a href="<?php echo get_permalink( $property->ID ); ?>">
                            <div class="property-image" style="background: url(
	                        <?php if($urlimage == 404 or $fsize < 100){
		                        echo $placeholder;
	                        } else {
		                        echo $bgimg;
	                        } ?>
                                    );">
                            </div>
                            <div class="property-info">
                                <h2 class="info-price">$<?php echo $price; ?></h2>
                                <!--<h3 class="info-features">Unifamiliar · 2 Habitaciones · 2 Baños</h3>-->
                                <h3 class="info-features"><?php echo $type . " · " . $rooms . " Habitaciones · " . $baths . " Baños"; ?></h3>
                                <h3 class="info-address"><?php echo $address; ?></h3>
                                <h3 class="info-mls">MLS: <?php echo $property->post_title; ?></h3>
                            </div>
                        </a>
                    </div>
				<?php } ?>
            </div>
        </div>
    </section>
<?php } else { ?>
    <section class="col-xs-12 no-padding hr-agents-section">
        <div class="agent-profile">
            <div class="agent-profile-info agent-profile-info-right col-xs-9 no-padding">
                <h2 class="profile-name"><?php the_title(); ?>
					<?php if ( ! empty( $agentype ) ) { ?>
                        · <span class="profile-position"><?php echo $agentype->name; ?></span>
					<?php } ?>
                </h2>
				<?php if ( ! empty( $phone ) ) { ?><a
                    href="tel:<?php echo str_replace( array( ".", " ", "-", "/" ), "", $phone ); ?>"
                    class="profile-phone">Tfno. <?php echo $phone; ?></a><?php } ?>
				<?php if ( ! empty( $email ) ) { ?><h3 class="profile-email">Email: <?php echo $email; ?></h3><?php } ?>
            </div>
            <div class="agent-profile-photo-right col-xs-3 no-padding">
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				} else {
					echo '<img src="' . get_template_directory_uri() . '/assets/no-photo.png" alt="no photo">';
				} ?>
            </div>
        </div>
        <div class="agent-bio agent-bio-right">
			<?php the_content(); ?>
        </div>
        <div class="agent-properties">
            <h2 class="properties-number properties-number-right" data-target="<?php the_ID(); ?>">Propiedades asignadas
                (<?php echo $agentProperties->post_count; ?>)<i class="fa fa-caret-down" aria-hidden="true"></i></h2>
            <div class="properties-list" id="<?php the_ID(); ?>">
				<?php
				foreach ( $properties as $property ) {
					$address = get_post_meta( $property->ID, '_pr_address', true );
					$price   = get_post_meta( $property->ID, '_pr_current_price', true );
					$type    = get_post_meta( $property->ID, '_pr_type_of_property', true );
					$rooms   = get_post_meta( $property->ID, '_pr_room_count', true );
					$baths   = get_post_meta( $property->ID, '_pr_baths_total', true );
					$sysid   = get_post_meta( $property->ID, '_pr_matrixid', true );
					$bgimg = $url['baseurl'].'/photos/'.$sysid.'/1.jpg';
					$urlimage = wp_remote_head( $bgimg );
					$urlimage = $urlimage['response']['code'];
					$placeholder = get_template_directory_uri().'/assets/no-photo.jpg';
					?>
                    <div class="col-xs-12 col-sm-4 no-padding property">
                        <a href="<?php echo get_permalink( $property->ID ); ?>">
                            <div class="property-image"
                                 style="background: url(<?php echo ( $urlimage != 404 ? $bgimg : $placeholder ) ?>);"></div>
                            <div class="property-info">
                                <h2 class="info-price"><?php echo $price; ?></h2>
                                <h3 class="info-features"><?php echo $type . " · " . $rooms . " Habitaciones · " . $baths . " Baños"; ?></h3>
                                <h3 class="info-address"><?php echo $address; ?></h3>
                                <h3 class="info-mls">MLS: <?php echo $property->post_title; ?></h3>
                            </div>
                        </a>
                    </div>
				<?php } ?>
            </div>
        </div>
    </section>
<?php } ?>
	<?php
	if ( $postOrder == 1 ) {
		$postOrder = 0;
	} else {
		$postOrder ++;
	}
endwhile; endif;
get_footer();
?>