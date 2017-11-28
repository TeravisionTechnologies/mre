<?php
/*
Template Name: Ebooks
*/
get_header();
$placeholder = get_template_directory_uri().'/assets/no-cover.jpg';
?>
    <section id="about-hero-section" <?php
	if ( $thumbnail_id = get_post_thumbnail_id() ) {
		if ( $image_src = wp_get_attachment_image_src( $thumbnail_id, 'full' ) ) {
			printf( 'style="background-image: url(%s)"', $image_src[0] );
		}
	}
	?>>
        <div class="about-hero-overlay">
            <h2><?php the_title(); ?></h2>
        </div>
    </section>

<?php
$dates = get_terms(
	'years',
	array(
		'orderby' => 'name',
		'order'   => 'DESC'
	)
);
?>

<section id="ebook-list">
    <div class="container">
        <div class="row">
	        <?php
	        foreach ( $dates as $date ) {
		        $ebooks = new WP_Query( array(
			        'post_type' => 'ebook',
			        'orderby' => 'date',
			        'order' => 'ASC',
			        'tax_query' => array(
				        array(
					        'taxonomy' => 'years',
					        'field'    => 'slug',
					        'terms'    => array( $date->slug ),
					        'operator' => 'IN'
				        )
			        )
		        ) );
		        ?>
                <h2 class="heading-date col-xs-12 col-sm-12 col-md-12"><?php echo $date->name; ?></h2>
		        <?php
		        if ( $ebooks->have_posts() ) : while ( $ebooks->have_posts() ) : $ebooks->the_post();
			        $period = get_post_meta(get_the_ID(), '_eb_ebook_period', true);
		        ?>
			        <div class="col-xs-6 col-sm-3 col-md-3">
                        <a href="#" class="the-ebook" data-toggle="modal" data-target="#<?php echo get_the_ID(); ?>">
                            <div class="months">
                                <?php echo ( !empty($period) ? $period : '&nbsp;' ) ?>
                            </div>
                            <div class="cover" <?php
                            if ( $thumbnail_id = get_post_thumbnail_id() ) {
	                            if ( $image_src = wp_get_attachment_image_src( $thumbnail_id, 'full' ) ) {
		                            printf( 'style="background-image: url(%s)"', $image_src[0] );
	                            }
                            } else{
	                            printf( 'style="background-image: url('. $placeholder. ')"');
                            }
                            ?>>
                                <div class="mask"><div class="ebook-title"><?php the_title(); ?></div></div>
                            </div>
                            <div class="ebook-link"><?php _e('Descargar', 'mre') ?></div>
                        </a>
                    </div>
                    <div id="<?php echo get_the_ID(); ?>" class="modal fade modal-ebook" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-xs-offset-3 col-xs-6 col-xs-12 col-sm-offset-0 col-sm-5 col-md-offset-1 col-md-4 text-right">
	                                        <?php
	                                        if (has_post_thumbnail()) {
		                                        the_post_thumbnail('full', array('class' => "img-responsive anim ebook-img"));
	                                        } else {
		                                        echo '<img src="'. $placeholder. '" class="img-responsive anim ebook-img">';
	                                        }
	                                        ?>
                                        </div>
                                        <div class="col-xs-12 col-sm-7 col-md-6 ebook-content">
                                            <div class="ebook-dates">E-books <?php echo $date->slug ?> <?php echo ( !empty($period) ? '// '. $period : '&nbsp;' ) ?></div>
                                            <h3><?php the_title(); ?></h3>
	                                        <?php the_content(); ?>
                                            <form class="ebook-form" method="post" action="<?php echo home_url(); ?>" method="post" role="form"
                                                  data-toggle="validator" data-disable="false">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="eb_name" name="eb_name" placeholder="<?php _e('Nombre y Apellido', 'mre') ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="eb_mail" name="eb_mail" placeholder="<?php _e('Email', 'mre') ?>" required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}">
                                                </div>
                                                <button type="submit" class="btn ebook-btn"><?php _e('Descargar', 'mre') ?></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
		        <?php endwhile; endif; ?>
		        <?php
		        wp_reset_postdata();
	        }
	        ?>
        </div>
    </div>
</section>


<?php get_footer(); ?>