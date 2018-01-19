<?php
/**
 *  Created by PhpStorm.
 *  User: mtoledo
 *  Date: 3/8/17
 *  Time: 8:19 AM
 **/
# THEME SUPPORTS
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );
add_theme_support( 'menus' );
remove_post_type_support( 'post', 'comments' );
remove_post_type_support( 'page', 'comments' );


// Loads css or js files
add_action( 'wp_enqueue_scripts', 'mre_enqueue_scripts' );

// Register custom navigation walker
require_once( 'wp_bootstrap_navwalker.php' );

register_nav_menus(
	array(
		'primary'    => __( 'Primary Menu', 'mre' ),
		'extra-menu' => __( 'Extra Menu', 'mre' )
	)
);



function mre_enqueue_scripts() {
	//wp_enqueue_script( 'ajax-blog_cats', get_template_directory_uri() . '/js/ajax-blog-categories.js', array(), '1' );
	global $wp_query;
	wp_localize_script( 'ajax-blog_cats', 'ajaxblog', array(
		'ajaxurl'    => admin_url( 'admin-ajax.php' ),
		'query_vars' => json_encode( $wp_query->query )
	) );
}

// Directories that contain post-types
$postTypeDir = array(
	__DIR__ . '/includes/post-types/about-us/',
	__DIR__ . '/includes/post-types/header-footer/',
	__DIR__ . '/includes/post-types/services/',
	__DIR__ . '/includes/post-types/office/',
	__DIR__ . '/includes/post-types/ebook/',
	__DIR__ . '/includes/post-types/suscribers/',
);

// File names inside post-types dirs
$files = array(
	'meta-boxes.php',
	'post-type.php',
	'taxonomy.php'
);

foreach ( $postTypeDir as $directory ) {
	foreach ( $files as $file ) {
		if ( file_exists( $directory . $file ) ) {
			require_once( $directory . $file );
		}
	}
}

/**
 * ┌───────────────────┐
 * │ Custom Post Types │
 * └───────────────────┘
 */

add_action( 'init', 'call_create_post_types' );

function call_create_post_types() {

	// Post Type for About Us
	create_post_type_about_us();
	// Post Type for Suscribers
	create_post_type_suscribers();
	// Post Type for Ebooks
	create_post_type_ebook();
	// Post Type for Header and Footer
	create_post_type_header_footer();
	// Post Type for Services
	create_post_type_services();
	// Post Type for Offices
	create_post_type_offices();
}

/* Remove text area field from header and footer */
function remove_page_editor() {
	remove_post_type_support( 'header_footer', 'editor' );
	remove_post_type_support( 'about_us', 'editor' );
}

add_action( 'init', 'remove_page_editor' );


/**
 * ┌───────────────────┐
 * │ Custom Meta Boxes │
 * └───────────────────┘
 */

add_action( 'cmb2_admin_init', 'call_metaboxes' );

function call_metaboxes() {

	// Metaboxes for About Us
	about_us_metaboxes();
	// Metaboxes for Header and Footer
	header_footer_metaboxes();
	// Metaboxes for Services
	services_metaboxes();
	// Metaboxes for Ebook
	ebook_metaboxes();
}

function custom_form_validation_filter( $result, $tag ) {
	$name  = $tag['name'];
	$value = $_POST[ $name ];
	if ( $name == 'your-name' ) {
		if ( ! preg_match( '/[a-zA-Z]/', $value ) ) {
			$result->invalidate( $tag, "You can only use characters." );
		}
	}
	if ( $name == 'your-email' ) {
		if ( ! filter_var( $value, FILTER_VALIDATE_EMAIL ) ) {
			$result->invalidate( $tag, "Invalid email format." );
		}
	}

	return $result;
}

add_filter( 'wpcf7_validate_text', 'custom_form_validation_filter', 10, 2 );
add_filter( 'wpcf7_validate_text*', 'custom_form_validation_filter', 10, 2 );
add_filter( 'wpcf7_validate_email', 'custom_form_validation_filter', 10, 2 );

//Featured images theme support
add_theme_support( 'post-thumbnails' );

// Unset URL from comment form
function crunchify_move_comment_form_below( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;

	return $fields;
}

add_filter( 'comment_form_fields', 'crunchify_move_comment_form_below' );

// Add placeholder for Name and Email
function modify_comment_form_fields( $fields ) {

	$lang = get_locale();
	$name = ( $lang == "es_ES" ? '* Nombre y Apellido' : '* Fullname' );
	$commenter        = wp_get_current_commenter();
	$fields['author'] = '<div class="form-group">' .
	                    '<input id="author" name="author" type="text" class="form-control" placeholder="'. $name .'" value=""/>';
	$fields['email']  =
		'<input id="email" name="email" type="email" class="form-control" placeholder="* Email" value=""/>';
	$fields['url']    = '';
	return $fields;

}

add_filter( 'comment_form_default_fields', 'modify_comment_form_fields' );



function my_update_comment_field( $comment_field ) {
	$lang = get_locale();
	$comment = ( $lang == "es_ES" ? 'Tu Comentario...' : 'Your comment...' );
	$comment_field ='<textarea id="comment" name="comment" class="form-control" placeholder="'. $comment .'"></textarea>';
	return $comment_field;

}
add_filter( 'comment_form_field_comment', 'my_update_comment_field' );




/*function wpbeginner_comment_text( $arg ) {

	$arg['comment_notes_before'] = "";

	return $arg;
}

add_filter( 'comment_form_defaults', 'wpbeginner_comment_text' );*/

add_filter( 'show_admin_bar', '__return_false' );


//SVG Hook
function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );

//Ajax blog categories

add_action( 'wp_ajax_nopriv_ajax_blog_cat', 'trv_ajax_blog_cats' );
add_action( 'wp_ajax_ajax_blog_cat', 'trv_ajax_blog_cats' );

function trv_ajax_blog_cats() {
	$query_vars                   = json_decode( stripslashes( $_POST['query_vars'] ), true );
	$cat                          = $_POST['category'];
	$query_vars['post_type']      = 'post';
	$query_vars['post_status']    = 'publish';
	$query_vars['posts_per_page'] = - 1;
	$query_vars['orderby']        = $_POST['filter'];
	$query_vars['order']          = $_POST['order'];

	if ( $cat != "all" ):
		$query_vars['tax_query'] = array(
			array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => $cat,
			)
		);
	endif;

	$posts = new WP_Query( $query_vars );

	if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post();

		$link     = get_permalink( $posts->post->ID );
		$taxonomy = get_post_taxonomies( $posts->post );
		$term     = get_the_terms( $posts->post->ID, $taxonomy[0] );
		$author   = get_user_by( 'ID', $posts->post->post_author );
		$date     = strtotime( $posts->post->post_date );
		$url      = "background-image: url('" . get_the_post_thumbnail_url( $posts->post->ID ) . "')";
		echo '<div class="col-xs-12 col-sm-6 blog-post">
			<a href="' . $link . '">
			<div class="blog-image" style="' . $url . '">
									<span class="blog-category">' . $term[0]->name . '</span>
			</div>
			<div class="blog-text">
				<a href="' . $link . '"><h1 class="blog-text-title">' . $posts->post->post_title . '</h1></a>
				<h2 class="blog-text-author">Por: ' . $author->display_name . '<span
						class="blog-text-date">' . date( 'd F, Y', $date ) . '</span><span
						class="blog-text-comments hidden-xs hidden-sm">- ' . $posts->post->comment_count . '
						Comments</span></h2>
				<p class="blog-text-summary">' . $posts->post->post_excerpt . '</p>
			</div>
		</a>
	</div>';
	endwhile;
	else:
		echo '<div class="col-md-12 no-results text-center">
                            <p>' . ( $lang == "es_ES" ? 'No existen publicaciones disponibles en estos momentos' : 'There are no publications available at this time' ) . '</p>
                            <p>' .( $lang == "es_ES" ? '0 resultados' : '0 results' ) . '</p>
                        </div>';

	endif;
	die();
}

/****** Personalización del Login ******/

add_action( 'login_head', 'custom_login_logo' );

function custom_login_logo() {
	echo '
    <style type="text/css">
        body{
            background: #ffffff;
        }
        h1 { 
            background-image:url(' . get_bloginfo( 'template_directory' ) . '/assets/logo.png) !important;
            background-repeat: no-repeat;
            background-position: center;
        }
        #login h1 a{ 
            height: 130px!important; 
        }
        #wp-submit{
            background: #0976d1 !important;
            border: solid 1px #0976d1 !important;
            color: #ffffff;
            -webkit-box-shadow: inset 0 0 0 rgba(120,200,230,.5),0 1px 0 rgba(0,0,0,.15) !important;
            box-shadow: inset 0 0 0 rgba(120,200,230,.5),0 1px 0 rgba(0,0,0,.15) !important;
            text-shadow: none !important;
            border-radius: 0 !important;
        }
        a { 
            background-image:none !important; color: #fff !important;
        }
        #nav, #backtoblog{font-size: 11px!important;text-align: center;color: #fff!important;}
        .login form{ -webkit-border-radius: 10px; background-color: rgba(255,255,255,0.4);-webkit-box-shadow: 0px 2px 12px 0px rgba(0,0,0,0.4);-moz-box-shadow: 0px 2px 12px 0px rgba(0,0,0,0.4);box-shadow: 0px 2px 12px 0px rgba(0,0,0,0.4); }
        .login label, .login form .forgetmenot label{ color:#555!important;font-weight:bold;font-size: 11px; }
        .postbox{ display:none!important; }
        #nav a{ color:#0976d1!important;font-weight:bold; }
        #backtoblog a{ color:#0976d1!important;font-weight:bold; }
    </style>';
}


/****** Personalización del Footer en el Admin ******/

function remove_footer_admin() {
	echo '<span id="footer-thankyou">Desarrollado para Merand Real Estate</span>';
}

add_filter( 'admin_footer_text', 'remove_footer_admin' );


function mre_register_query_vars( $vars ) {

	$vars[] = 'orderBy';
	$vars[] = 's';

	return $vars;
}

add_filter( 'query_vars', 'mre_register_query_vars' );


function processQuery($filters)
{
	$args = array();
	//$pstatus = '';
	//$plocation = '';
	$orderBy = '';
	$sort = '';
	if (isset($filters['order-by']) && $filters['order-by']) {
		$orderBy = $filters['order-by'];
		switch ($orderBy) {
			case 'name_asc' :
				$orderBy = 'title';
				$sort = 'ASC';
				break;
			case 'name_desc' :
				$orderBy = 'title';
				$sort = 'DESC';
				break;
			case 'date_asc' :
				$orderBy = 'date';
				$sort = 'ASC';
				break;
			case 'date_desc' :
				$orderBy = 'date';
				$sort = 'DESC';
				break;
		}
	}
	/*if (isset($filters['project-status']) && $filters['project-status']) {
		$pstatus = $filters['project-status'];
	}

	if (isset($filters['project-location']) && $filters['project-location']) {
		$plocation = $filters['project-location'];
	}*/
	$s               = get_query_var( 's' );

	$search_string   = $s;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	//if ($pstatus != '' or $plocation != '') {
		$args = array(
			'post_type' => 'post',
			'showposts' => 4,
			'paged' => $paged,
			'orderby' => $orderBy,
			'order' => $sort,
			'_meta_or_title' => $search_string,
			/*'tax_query' => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'property_status',
					'field' => 'slug',
					'terms' => $pstatus,
				),
				array(
					'taxonomy' => 'property_location',
					'field' => 'slug',
					'terms' => array($plocation),
				),
			),*/
		);

		/*if (isset($filters['project-status']) && $filters['project-status'] ||
		    isset($filters['project-status']) && $filters['project-status']) {
			$args['tax_query'] = array('relation' => 'AND');
		}

		if (isset($filters['project-status']) && $filters['project-status']) {
			$args['tax_query'][] = array(
				'taxonomy' => 'property_status',
				'field' => 'slug',
				'terms' => $filters['project-status'],
			);
		}

		if (isset($filters['project-location']) && $filters['project-location']) {
			$args['tax_query'][] = array(
				'taxonomy' => 'property_location',
				'field' => 'slug',
				'terms' => $filters['project-location'],
			);
		};*/
	//}

	return $args;
}

# MODIFY DEFAULT WP SEARCH FUNCTION
add_action( 'pre_get_posts', function ( $q ) {
	if ( $title = $q->get( '_meta_or_title' ) ) {
		add_filter( 'get_meta_sql', function ( $sql ) use ( $title ) {
			global $wpdb;
			static $nr = 0;
			if ( 0 != $nr ++ ) {
				return $sql;
			}
			$sql['where'] = sprintf(
				" AND ( %s OR %s ) ",
				$wpdb->prepare( "{$wpdb->posts}.post_title like '%%%s%%'", $title ),
				mb_substr( $sql['where'], 5, mb_strlen( $sql['where'] ) )
			);

			return $sql;
		} );
	}
} );


?>