<?php

get_header();
$url = $_SERVER['REQUEST_URI'];
global $wp_query;
$lang = get_locale();
if ( function_exists( 'pll_current_language' ) ) {
	$current_language = pll_current_language();
	$default_language = pll_default_language();
	if ( $current_language != $default_language ) {
		$language_subdir = $current_language . '/';
	} else {
		$language_subdir = '';
	}
}
$headerPost = get_posts(
	array(
		'post_type'   => 'header_footer',
		'numberposts' => 1
	)
);
$bgebook    = get_post_meta( $headerPost[0]->ID, '_hf_ebookbg', true );
wp_reset_query();
/*query_posts( array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => - 1,
	'orderby'        => 'date',
	'order'          => 'DESC',
) );*/


$recomendedbylang = ( $lang == "es_ES" ? 'articulo-recomendado' : 'recommended-article' );

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
				'terms'    => $recomendedbylang,
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
wp_reset_query();
wp_reset_postdata();
$s               = get_query_var( 's' );

$search_string   = $s;
var_dump($search_string);
$orderByFilter = get_query_var( 'orderBy' );
$filter        = [
	//'project-status' => $statusFilter,
	//'project-location' => $locationFilter,
	'order-by' => $orderByFilter
];

$args  = processQuery( $filter );
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

//if ( ! count( $args ) ) {
	//$statusFilter = ($lang == "es_ES" ? 'proyectos-actuales' : 'new-projects');
	$args = array(
		'post_type' => 'post',
		'showposts' => 4,
		'paged'     => $paged,
		'_meta_or_title' => $search_string,
		/*'tax_query' => array(
			array(
				'taxonomy' => 'property_status',
				'field' => 'slug',
				'terms' => $statusFilter,
			),
		),*/
	);
//}

/*$args = array(
	'post_type' => 'post',
	'showposts' => 4,
	'paged' => $paged,
	/*'tax_query' => array(
		array(
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => $statusFilter,
		),
	),
);*/

?>
    <form id="mre-posts" action="<?php echo home_url(); ?>" method="get" role="form">
        <section class="container-fluid no-padding">
            <section class="col-xs-12" id="blog-list-categories">
                <div class="container-mre center-block">
                    <h3 class="blog-list-category-title"><?php echo( $lang == "es_ES" ? 'Categoría' : 'Category' ) ?></h3>
                    <h2 class="blog-list-category-text"></h2>
                    <div class="swiper-container swiper-container-blog-categories">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"
                                 name="<?php echo( $lang == "es_ES" ? 'Todas las categorías' : 'All categories' ) ?>"
                                 data-slug="all">
                                <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"
                                   style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/todas.png);">
                                    <div class="swiper-overlay"></div>
                                </a>
                            </div>
							<?php
							foreach ( $categories as $category ) {
								$name          = $category->name;
								$slug          = $category->slug;
								$category_link = get_category_link( $category->cat_ID );
								$meta_image    = get_wp_term_image( $category->term_id );
								?>
                                <div class="swiper-slide" name="<?php echo $name; ?>" data-slug="<?php echo $slug; ?>">
                                    <a href="<?php echo $category_link; ?>"
                                       style="background-image: url(<?php echo $meta_image; ?>)">
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
                        <!--<form action="<?php //echo esc_url( home_url( '/' . $language_subdir ) ); ?>">-->
                        <div class="input-group">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <input type="text" class="form-control" id="search" name="s"
                                   value="<?php echo get_query_var( 's' ); ?>"
                                   placeholder="<?php echo( $lang == "es_ES" ? 'Buscar...' : 'Search...' ) ?>">
                        </div>
                        <!--<input type="hidden" name="post_type[]" value="post">-->
                        <!--</form>-->
                    </div>
                    <div class="col-xs-12 col-sm-3 blog-select">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle pull-right btn-filter blog-filter pull-right"
                                    type="button"
                                    id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
								<?php
								switch ( $orderByFilter ) {
									case 'name_asc' :
										$orderByNameFilter = ( $lang == "es_ES" ? 'Por nombre &#x25B2;' : 'By name &#x25B2' );
										break;
									case 'name_desc' :
										$orderByNameFilter = ( $lang == "es_ES" ? 'Por nombre &#x25BC;' : 'By name &#x25BC;' );
										break;
									case 'date_asc' :
										$orderByNameFilter = ( $lang == "es_ES" ? '&Uacute;ltimo agregado &#x25B2;' : 'Last added &#x25B2;' );
										break;
									case 'date_desc' :
										$orderByNameFilter = ( $lang == "es_ES" ? '&Uacute;ltimo agregado &#x25BC;' : 'Last added &#x25BC;' );
										break;
									default :
										$orderByNameFilter = ( $lang == "es_ES" ? 'Ordenar por...' : 'Sort by...' );
										break;

								} ?>
								<?php echo( $orderByNameFilter ) ?>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu sort-by-button-group" id="sortList"
                                aria-labelledby="dropdownMenu1">
                                <li>
                                    <a href="#" class="orderby"
                                       data-value="name_asc"><?php echo( $lang == "es_ES" ? 'Por nombre &#x25B2;' : 'By name &#x25B2' ) ?></a>
                                </li>
                                <li>
                                    <a href="#" class="orderby"
                                       data-value="name_desc"><?php echo( $lang == "es_ES" ? 'Por nombre &#x25BC;' : 'By name &#x25BC;' ) ?></a>
                                </li>
                                <li>
                                    <a href="#" class="orderby"
                                       data-value="date_asc"><?php echo( $lang == "es_ES" ? '&Uacute;ltimo agregado &#x25B2;' : 'Last added &#x25B2;' ) ?></a>
                                </li>
                                <li>
                                    <a href="#" class="orderby"
                                       data-value="date_desc"><?php echo( $lang == "es_ES" ? '&Uacute;ltimo agregado &#x25BC;' : 'Last added &#x25BC;' ) ?></a>
                                </li>
                            </ul>
                        </div>
						<?php
						/*if ( $lang == "es_ES" ) {
							if ( function_exists( 'wpsp_orderby_posts_form' ) ):
								wpsp_orderby_posts_form();
							endif;
						} else {
							if ( function_exists( 'wpsp_orderby_posts_form2' ) ):
								wpsp_orderby_posts_form2();
							endif;
						}*/
						?>
                        <input type="hidden" name="post_type[]" value="post">
                        <input type="hidden" id="orderBy" name="orderBy">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-xs-12 loading-posts">
                        <i class="fa fa-spinner fa-pulse fa-fw"></i>
                    </div>
                    <div class="blog-post-container">
						<?php $query = new WP_Query( $args );
						if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post();
							?>
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
										echo $link; ?>"><h1
                                                    class="blog-text-title"><?php echo $post->post_title; ?></h1>
                                        </a>
                                        <h2 class="blog-text-author"><?php echo( $lang == "es_ES" ? 'Por:' : 'By:' ) ?><?php $author = get_user_by( 'ID', $post->post_author );
											echo $author->display_name ?><span
                                                    class="blog-text-date"><?php $date = strtotime( $post->post_date );
												echo date( 'd F, Y', $date ) ?></span><span
                                                    class="blog-text-comments hidden-xs hidden-sm">- <?php echo $post->comment_count ?>
												<?php echo( $lang == "es_ES" ? 'Comentarios' : 'Comments' ) ?></span>
                                        </h2>
                                        <p class="blog-text-summary"><?php echo $post->post_excerpt ?></p>
                                    </div>
                                </a>
                            </div>
						<?php endwhile; ?>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
									<?php wp_pagenavi( array( 'query' => $query ) ); ?>
                                </div>
                            </div>
						<?php endif;
						wp_reset_postdata(); ?>
                    </div>
					<?php if ( $wp_query->post_count == 1 ) {
						echo '<div class="col-xs-12 marginb80"></div>';
					} ?>
                    <!--<nav id="blog-pagination" class="text-center"></nav>-->
                </div>

            </section>
			<?php if ( ! empty( $postRecommended ) ) { ?>
                <section class="col-xs-12" id="blog-recommended-posts"
                         style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/notice.jpg')">
                    <div class="recommended-posts-overlay">
                        <div class="container-mre center-block">
                            <h2 class="recommended-posts-title"><?php echo( $lang == "es_ES" ? 'Artículos recomendados' : 'Recommended articles' ) ?></h2>
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
													<?php echo( $lang == "es_ES" ? 'Por:' : 'By:' ) ?> <?php $author = get_user_by( 'ID', $post->post_author );
													echo $author->display_name ?><span
                                                            class="blog-most-viewed-text-date"><?php $date = strtotime( $post->post_date );
														echo date( 'd F, Y', $date ) ?></span><span
                                                            class="blog-most-viewed-text-comments">- <?php echo $post->comment_count ?>
														<?php echo( $lang == "es_ES" ? 'Comentarios' : 'Comments' ) ?></span>
                                                </h2>
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
			<?php } ?>
            <section id="our-ebooks" class="col-xs-12 text-center"
                     style="background-image: url(
			         <?php if ( ! empty( $bgebook ) ) {
				         echo $bgebook;
			         } ?>)">
                <div class="mask">
                    <h3><?php echo( $lang == "es_ES" ? 'Disfruta de nuestros e-books' : 'Enjoy our ebooks' ) ?></h3>
                    <p><?php echo( $lang == "es_ES" ? 'la información que necesitas completamente gratis' : 'the information you need completely free' ) ?></p>
                    <a href="<?php echo( $lang == 'es_ES' ? home_url( 'e-books' ) : home_url( 'en/our-e-books' ) ) ?>"
                       class="btn"><?php echo( $lang == "es_ES" ? 'Ver todos' : 'View all' ) ?></a>
                </div>
            </section>
        </section>
    </form>
<?php get_footer(); ?>