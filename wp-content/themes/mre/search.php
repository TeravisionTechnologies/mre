<?php
/**
 * Template Name: Blog List
 * @package MRE
 * @subpackage Blog
 * @since MRE 1.0
 */
get_header();
$url = $_SERVER['REQUEST_URI'];
global $wp_query;
$lang = get_locale();

wp_reset_query();

$postRecommended = get_posts(
	array(
		'post_type'   => 'post',
		'numberposts' => - 1,
		'post_status' => 'publish',
		'order'       => 'ASC',
		'tax_query'   => array(
			array(
				'taxonomy' => 'post_tag',
				'field'    => 'slug',
				'terms'    => 'articulo-recomendado',
			)
		)
	)
);
$categories      = get_categories(
	array(
		'orderby'    => 'name',
		'order'      => 'ASC',
		'hide_empty' => 1
	)
);

?>
    <section class="container-fluid no-padding">
        <section class="col-xs-12" id="blog-list-categories">
            <div class="container-mre center-block">
                <h3 class="blog-list-category-title"><?php _e( 'Categoría', 'mre' ) ?></h3>
                <h2 class="blog-list-category-text"></h2>
                <div class="swiper-container swiper-container-blog-categories">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" name="Todas las categorías" data-slug="all">
                            <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/todas.png);">
                                <div class="swiper-overlay"></div>
                            </a>
                        </div>
						<?php
						foreach ( $categories as $category ) {
							$name          = $category->name;
							$slug          = $category->slug;
							$category_link = get_category_link( $category->cat_ID );
							$meta_image = get_wp_term_image($category->term_id);
							?>
                            <div class="swiper-slide" name="<?php echo $name; ?>" data-slug="<?php echo $slug; ?>">
                                <a style="background-image: url(<?php echo $meta_image; ?>)">
                                    <div class="swiper-overlay"></div>
                                </a>
                            </div>
						<?php } ?>
                    </div>
                    <i class="fa fa-chevron-circle-left swiper-button-prev"
                       aria-hidden="true"></i>
                    <i class="fa fa-chevron-circle-right swiper-button-next"
                       aria-hidden="true"></i>
                </div>
            </div>
        </section>
        <section class="col-xs-12" id="blog-list">
            <img class="blog-list-triangle" src="<?php echo get_template_directory_uri(); ?>/assets/triangle.png">
            <div class="container-mre center-block">
                <div class="col-xs-12 col-sm-9 blog-search">
                    <form action="<?php echo home_url() ?>">
                        <div class="input-group">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <input type="text" class="form-control" id="search" name="s"
                                   value="<?php echo get_query_var( 's' ); ?>"
                                   placeholder="<?php _e( 'Buscar...', 'mre' ) ?>">
                        </div>
                        <input type="hidden" name="post_type[]" value="post">
                    </form>
                </div>
                <div class="col-xs-12 col-sm-3 blog-select">
                    <form name="filters" class="post-filters" method="get">
                        <select name="orderby" id="orderby" class="form-control blog-filter pull-right">
                            <option selected="selected"><?php _e( 'Ordenar por...', 'mre' ) ?></option>
							<?php
							$orderby_options = array(
								'post_date'  => 'Order By Date',
								'post_title' => 'Order By Title',
							);
							foreach ( $orderby_options as $value => $label ) {
								echo "<option " . selected( $_GET['orderby'], $value ) . " value='$value'>$label</option>";
							}
							?>
                        </select>
                        <input type="hidden" name="order"
                               value="<?php echo( ( strpos( $url, 'DESC' ) !== false ) ? ASC : DESC ) ?>">
                    </form>
                </div>
                <div class="col-xs-12 loading-posts">
                    <i class="fa fa-spinner fa-pulse fa-fw"></i>
                </div>
                <div class="blog-post-container">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="col-xs-12 col-sm-6 blog-post">
                            <a href="<?php $link = get_permalink( $post->ID );
							echo $link; ?>">
                                <div class="blog-image"
                                     style="background-image: url('<?php echo get_the_post_thumbnail_url( $post->ID ); ?>')">
                                <span class="blog-category"><?php $taxonomy = get_post_taxonomies( $post );
	                                $term                                   = get_the_terms( $post->ID, $taxonomy[0] );
	                                echo $term[0]->name; ?></span>
                                </div>
                                <div class="blog-text">
                                    <a href="<?php $link = get_permalink( $post->ID );
									echo $link; ?>"><h1 class="blog-text-title"><?php echo $post->post_title; ?></h1>
                                    </a>
                                    <h2 class="blog-text-author"><?php _e( 'Por: ', 'mre' ) ?><?php $author = get_user_by( 'ID', $post->post_author );
										echo $author->display_name ?><span
                                                class="blog-text-date"><?php $date = strtotime( $post->post_date );
											echo date( 'd F, Y', $date ) ?></span><span
                                                class="blog-text-comments hidden-xs hidden-sm">- <?php echo $post->comment_count ?>
											<?php _e( 'Comentarios', 'mre' ) ?></span></h2>
                                    <p class="blog-text-summary"><?php echo $post->post_excerpt ?></p>
                                </div>
                            </a>
                        </div>
					<?php endwhile; ?>
					<?php endif; ?>
                </div>
				<?php if ( $wp_query->post_count == 1 ) {
					echo '<div class="col-xs-12 marginb80"></div>';
				} ?>
                <nav id="blog-pagination" class="text-center">
					<?php
					/*if (function_exists('wp_paginate')) {
						wp_paginate();
					}*/
					?>
                </nav>
            </div>
        </section>
        <section class="col-xs-12" id="blog-recommended-posts"
                 style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/notice.jpg')">
            <div class="recommended-posts-overlay">
                <div class="container-mre center-block">
                    <h2 class="recommended-posts-title"><?php _e( 'Artículos recomendados', 'mre' ) ?></h2>
                    <div class="swiper-container swiper-container-blog-most-viewed">
                        <div class="swiper-wrapper">
							<?php foreach ( $postRecommended as $post ) { ?>
                                <div class="swiper-slide">
                                    <a href="<?php $link = get_permalink( $post->ID );
									echo $link; ?>">
                                        <div class="blog-most-viewed-image"
                                             style="background-image: url('<?php echo get_the_post_thumbnail_url( $post->ID ); ?>');">
                                        <span class="blog-most-viewed-category"><?php $taxonomy = get_post_taxonomies( $post );
	                                        $term                                               = get_the_terms( $post->ID, $taxonomy[0] );
	                                        echo $term[0]->name; ?></span>
                                        </div>
                                    </a>
                                    <div class="blog-most-viewed-text">
                                        <a href="<?php $link = get_permalink( $post->ID );
										echo $link; ?>">
                                            <h1 class="blog-most-viewed-text-title"><?php echo $post->post_title; ?></h1>
                                        </a>
                                        <h2 class="blog-most-viewed-text-author">
											<?php _e( 'Por: ', 'mre' ) ?> <?php $author = get_user_by( 'ID', $post->post_author );
											echo $author->display_name ?><span
                                                    class="blog-most-viewed-text-date"><?php $date = strtotime( $post->post_date );
												echo date( 'd F, Y', $date ) ?></span><span
                                                    class="blog-most-viewed-text-comments">- <?php echo $post->comment_count ?>
												<?php _e( 'Comentarios', 'mre' ) ?></span></h2>
                                    </div>
                                </div>
							<?php } ?>
                        </div>
                        <i class="fa fa-chevron-circle-left swiper-button-prev" aria-hidden="true"></i>
                        <i class="fa fa-chevron-circle-right swiper-button-next" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </section>
        <section id="our-ebooks" class="col-xs-12 text-center"
                 style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/ebook-hero.jpg')">
            <div class="mask">
                <h3><?php _e( 'Disfruta de nuestros e-books', 'mre' ) ?></h3>
                <p><?php _e( 'la información que necesitas completamente gratis', 'mre' ) ?></p>
                <a href="<?php echo ( $lang == 'es_ES' ? home_url('e-books') : home_url('en/our-e-books') ) ?>" class="btn"><?php _e( 'Ver todos', 'mre' ) ?></a>
            </div>
        </section>
    </section>
<?php get_footer(); ?>