<?php

/****** THEME SUPPORTS ******/
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );
add_theme_support( 'menus' );
remove_post_type_support( 'post', 'comments' );
remove_post_type_support( 'page', 'comments' );

load_theme_textdomain( 'hr', get_template_directory() . '/languages' );

function hr_scripts() {

	global $wpdb;
	$cities     = $wpdb->get_col( $wpdb->prepare( "SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_value ASC", '_pr_city' ) );
	$address    = $wpdb->get_col( $wpdb->prepare( "SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_value ASC", '_pr_address' ) );
	$postalcode = $wpdb->get_col( $wpdb->prepare( "SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_value ASC", '_pr_postalcode' ) );

	$jsonaddress    = wp_json_encode( $cities );
	$jsoncities     = wp_json_encode( $address );
	$jsonpostalcode = wp_json_encode( $postalcode );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css' );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/swiper.min.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );

	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', array(), '3.2.1', true );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', true );
	wp_enqueue_script( 'swiperjs', get_template_directory_uri() . '/js/swiper.min.js', array(), '3.4.2', true );
	wp_enqueue_script( 'menu', get_template_directory_uri() . '/js/menu.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'jquery-mobile', get_template_directory_uri() . '/js/jquery.mobile.custom.min.js', array(), '1.4.5', true );
	wp_enqueue_script( 'sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array(), '1.0.4', true );
	wp_enqueue_script( 'validator', get_template_directory_uri() . '/js/validator.min.js', array(), '0.11.9', true );
	wp_enqueue_script( 'autocomplete', get_template_directory_uri() . '/js/jquery.autocomplete.js', array(), '0.11.1', true );
	wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/basic.js', array(), '1.0', true );
	wp_localize_script( 'my-script', 'hr19', array(
		'root'        => get_template_directory_uri(),
		'cities'      => $jsoncities,
		'addresses'   => $jsonaddress,
		'postalcodes' => $jsonpostalcode,
	) );
}

add_action( 'wp_enqueue_scripts', 'hr_scripts' );


// Register custom navigation walker
require_once( 'wp_bootstrap_navwalker.php' );

register_nav_menus( array(
	'primary'    => __( 'Primary Menu', 'hr19' ),
	'extra-menu' => __( 'Extra Menu' )
) );

// Login customization
add_action( 'login_head', 'custom_login_logo' );

function custom_login_logo() {
	echo '
    <style type="text/css">
        body{
            background: #ffffff;
        }
        h1 { 
            background-image:url(' . get_bloginfo( 'template_directory' ) . '/assets/hr19.svg) !important;
            background-repeat: no-repeat;
            background-position: center;
        }
        #wp-submit{
            background: #ffffff !important;
            border: solid 2px #033c5a !important;
            color: #033c5a;
            -webkit-box-shadow: inset 0 0 0 rgba(120,200,230,.5),0 1px 0 rgba(0,0,0,.15) !important;
            box-shadow: inset 0 0 0 rgba(120,200,230,.5),0 1px 0 rgba(0,0,0,.15) !important;
            text-shadow: none !important;
            border-radius: 0 !important;
            font-weight:bold;
        }
        a { 
            background-image:none !important; color: #fff !important;
        }
        #nav, #backtoblog{font-size: 11px!important;text-align: center;color: #033c5a!important;}
        .login form{ -webkit-border-radius: 5px; background-color: rgba(255,255,255,0.4);-webkit-box-shadow: 0px 2px 12px 0px rgba(0,0,0,0.4);-moz-box-shadow: 0px 2px 12px 0px rgba(0,0,0,0.4);box-shadow: 0px 2px 12px 0px rgba(0,0,0,0.4); }
        .login label, .login form .forgetmenot label{ color:#555!important;font-weight:bold;font-size: 12px; }
        .postbox{ display:none!important; }
        #nav a{ color:#033c5a!important;font-weight:bold; }
        #backtoblog a{ color:#033c5a!important;font-weight:bold; }
    </style>';
}

// Admin footer customization
function remove_footer_admin() {
	echo '<span id="footer-thankyou">Desarrollado para HR19</span>';
}

add_filter( 'admin_footer_text', 'remove_footer_admin' );

add_theme_support( 'menus' );

// Directories that contain post-types
$postTypeDir = array(
	__DIR__ . '/includes/post-types/header-footer/',
	__DIR__ . '/includes/post-types/agent/',
	__DIR__ . '/includes/post-types/property/',
	__DIR__ . '/includes/post-types/about-us/',
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
	// Post Type for General Settings
	create_post_type_header_footer();
	// Post Type for Agents
	create_post_type_agent();
	// Post Type for Property
	create_post_type_property();
	// Post Type for About Us
	create_post_type_about_us();
}

/* Remove text area field from header and footer */
function remove_page_editor() {
	remove_post_type_support( 'header_footer', 'editor' );
	remove_post_type_support( 'banner', 'editor' );
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
	// Metaboxes for General Settings
	header_footer_metaboxes();
	// Metaboxes for Agents
	agent_metaboxes();
	// Metaboxes for Properties
	property_metaboxes();
	// Metaboxes for About Us
	about_us_metaboxes();
}

//SVG Hook
function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );


// Begin RETS

date_default_timezone_set( 'America/New_York' );

require_once( "vendor/autoload.php" );

function get_mls() {
	global $wpdb;
	$agentids = $wpdb->get_col( $wpdb->prepare( "SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_value ASC", '_ag_mls' ) );
	$config   = new \PHRETS\Configuration;
	$config->setLoginUrl( 'http://rets.sef.mlsmatrix.com/Rets/Login.ashx' )
	       ->setUsername( 'lesAERfue' )
	       ->setPassword( '8050' )
	       ->setRetsVersion( '1.7.2' );

	$rets = new \PHRETS\Session( $config );

	$connect = $rets->Login();

	if ( $connect ) {
		$results = $rets->Search(
			'Property',
			'Listing',
			'(AgentLicenseNum = 3196679)',
			[
				'Format' => 'COMPACT-DECODED',
				'Limit'  => 30,
			]
		);
	} else {
		$error = $rets->Error();
		print_r( $error );
	}

	foreach ( $results as $property ) {

		$transaction = "";
		$rooms       = "";
		$owner       = "";
		if ( $property['ForSaleYN'] == "0" ) {
			$transaction = 'Lease';
		} else {
			$transaction = 'Sale';
		}
		if ( $property['BedsTotal'] == "" ) {
			$rooms = '0';
		} else {
			$rooms = $property['BedsTotal'];
		}
		if ( in_array( $property['ListAgentMLSID'], $agentids ) ) {
			$owner = "HR19";
		} else {
			$owner = "Other";
		}


		$propid = get_page_by_title( $property['MLSNumber'], 'OBJECT', 'property' ); //Check if already exists

		if ( ! $propid ) {
			$post_args       = array(
				'post_title'   => $property['MLSNumber'],
				'post_content' => $property['Remarks'],
				'post_status'  => 'publish',
				'post_type'    => 'property',
				'meta_input'   => array(
					'_pr_address'          => $property['AddressInternetDisplay'] . ' ' . $property['City'] . ', ' . $property['StateOrProvince'],
					'_pr_state'            => $property['StateOrProvince'],
					'_pr_city'             => $property['City'] . ', ' . $property['StateOrProvince'],
					'_pr_community'        => $property['CountyOrParish'],
					'_pr_subdiv'           => $property['SubdivisionName'],
					'_pr_current_price'    => number_format( round( $property['CurrentPrice'] ) ),
					'_pr_type_of_property' => $property['TypeofProperty'],
					'_pr_room_count'       => $property['BedsTotal'],
					'_pr_baths_total'      => number_format( round( $property['BathsTotal'] ) ),
					'_pr_baths_full'       => number_format( round( $property['BathsFull'] ) ),
					'_pr_baths_half'       => number_format( round( $property['BathsHalf'] ) ),
					'_pr_sqft'             => number_format( round( $property['SqFtTotal'] ) ),
					'_pr_surf'             => number_format( round( $property['TotalAcreage'] ) ),
					'_pr_hoa'              => number_format( round( $property['AssociationFee'] ) ),
					'_pr_yearbuilt'        => number_format( round( $property['YearBuilt'] ) ),
					'_pr_agentid'          => $property['ListAgentMLSID'],
					'_pr_matrixid'         => $property['Matrix_Unique_ID'],
					'_pr_status'           => $property['Status'],
					'_pr_forsale'          => $property['ForSaleYN'],
					'_pr_forlease'         => $property['ForLeaseYN'],
					'_pr_postalcode'       => $property['PostalCode'] . ', ' . $property['City'] . ', ' . $property['StateOrProvince'],
					'_pr_transaction'      => $transaction,
					'_pr_owner'            => $owner,
				)
			);
			$posted_property = wp_insert_post( $post_args );

			$sysid  = $property['Matrix_Unique_ID'];
			$n      = 1;
			$url    = wp_upload_dir();
			$upload = $url['basedir'];
			$dir    = $upload . '/photos/' . $sysid;
			if ( ! file_exists( $dir ) ) {
				wp_mkdir_p( $dir );
			}
			$objects = $rets->GetObject( 'Property', 'HighRes', $sysid );
			foreach ( $objects as $object ) {
				file_put_contents( $dir . '/' . $n . '.jpg', $object->getContent() );
				$n ++;
			}

		} else {

			$post_args       = array(
				'ID'           => $propid->ID,
				'post_title'   => $property['MLSNumber'],
				'post_content' => $property['Remarks'],
				'post_status'  => 'publish',
				'post_type'    => 'property',
				'meta_input'   => array(
					'_pr_address'          => $property['AddressInternetDisplay'] . ' ' . $property['City'] . ', ' . $property['StateOrProvince'],
					'_pr_state'            => $property['StateOrProvince'],
					'_pr_city'             => $property['City'] . ', ' . $property['StateOrProvince'],
					'_pr_community'        => $property['CountyOrParish'],
					'_pr_subdiv'           => $property['SubdivisionName'],
					'_pr_current_price'    => number_format( round( $property['CurrentPrice'] ) ),
					'_pr_type_of_property' => $property['TypeofProperty'],
					'_pr_room_count'       => $rooms,
					'_pr_baths_total'      => number_format( round( $property['BathsTotal'] ) ),
					'_pr_baths_full'       => number_format( round( $property['BathsFull'] ) ),
					'_pr_baths_half'       => number_format( round( $property['BathsHalf'] ) ),
					'_pr_sqft'             => number_format( round( $property['SqFtTotal'] ) ),
					'_pr_surf'             => number_format( round( $property['TotalAcreage'] ) ),
					'_pr_hoa'              => number_format( round( $property['AssociationFee'] ) ),
					'_pr_yearbuilt'        => number_format( round( $property['YearBuilt'] ) ),
					'_pr_agentid'          => $property['ListAgentMLSID'],
					'_pr_matrixid'         => $property['Matrix_Unique_ID'],
					'_pr_status'           => $property['Status'],
					'_pr_forsale'          => $property['ForSaleYN'],
					'_pr_forlease'         => $property['ForLeaseYN'],
					'_pr_postalcode'       => $property['PostalCode'] . ', ' . $property['City'] . ', ' . $property['StateOrProvince'],
					'_pr_transaction'      => $transaction,
					'_pr_owner'            => $owner,
				),
			);
			$posted_property = wp_update_post( $post_args );

			$sysid  = $property['Matrix_Unique_ID'];
			$n      = 1;
			$url    = wp_upload_dir();
			$upload = $url['basedir'];
			$dir    = $upload . '/photos/' . $sysid;
			if ( ! file_exists( $dir ) ) {
				wp_mkdir_p( $dir );
			}
			$objects = $rets->GetObject( 'Property', 'HighRes', $sysid );
			foreach ( $objects as $object ) {
				file_put_contents( $dir . '/' . $n . '.jpg', $object->getContent() );
				$n ++;
			}
		}
	}

	$rets->Disconnect();
}

/*add_action( 'get_mls_properties', 'get_mls' );


function custom_js_to_head() {
	?>
	<script>
        jQuery(function(){
            jQuery("body.post-type-property .wrap h1").append('<a href="index.php?param=get_mls" class="page-title-action">Importar datos desde MLS</a>');
        });
	</script>
	<?php
}
add_action('admin_head', 'custom_js_to_head');*/


// Register custom query vars

function pr_register_query_vars( $vars ) {
	$vars[] = 'city';
	$vars[] = 'type';
	$vars[] = 'price';
	$vars[] = 'beds';
	$vars[] = 'baths';
	$vars[] = 'property_status';

	return $vars;
}

add_filter( 'query_vars', 'pr_register_query_vars' );


add_action( 'pre_get_posts', function ( $q ) {
	if ( $title = $q->get( '_meta_or_title' ) ) {
		add_filter( 'get_meta_sql', function ( $sql ) use ( $title ) {
			global $wpdb;

			// Only run once:
			static $nr = 0;
			if ( 0 != $nr ++ ) {
				return $sql;
			}

			// Modified WHERE
			$sql['where'] = sprintf(
				" AND ( %s OR %s ) ",
				$wpdb->prepare( "{$wpdb->posts}.post_title like '%%%s%%'", $title ),
				mb_substr( $sql['where'], 5, mb_strlen( $sql['where'] ) )
			);

			return $sql;
		} );
	}
} );


// Filtering data

function property_filter_function() {
	global $wpdb;
	$owner = $wpdb->get_col( $wpdb->prepare( "SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_value ASC", '_pr_owner' ) );


	if ( ( isset( $_POST['proporderby'] ) && $_POST['proporderby'] == "date" ) && ( isset( $_POST['propsort'] ) && $_POST['propsort'] == "ASC" ) ) {
		$orderby = 'date';
		$sort    = 'ASC';
	} elseif ( ( isset( $_POST['proporderby'] ) && $_POST['proporderby'] == "date" ) && ( isset( $_POST['propsort'] ) && $_POST['propsort'] == "DESC" ) ) {
		$orderby = 'date';
		$sort    = 'DESC';
	} elseif ( ( isset( $_POST['proporderby'] ) && $_POST['proporderby'] == "_pr_current_price" ) && ( isset( $_POST['propsort'] ) && $_POST['propsort'] == "ASC" ) ) {
		$orderby = '_pr_current_price';
		$sort    = 'ASC';
	} else {
		$orderby = '_pr_current_price';
		$sort    = 'DESC';
	} ?>

	<?php foreach ( $owner as $ow ) { ?>
        <div class="col-md-12">
            <h2 class="hr-heading"><?php echo( $ow == "HR19" ? "Propiedades HR19" : "Otras propiedades · MLS" ); ?></h2>
        </div>

		<?php
		$url  = wp_upload_dir();
		$args = array(
			'post_type' => 'property',
			'showposts' => 9,
			'paged'     => get_query_var( 'paged' ),
			'orderby'        => $orderby,
			'order'          => $sort,
		);

		// create $args['meta_query'] array if one of the following fields is filled
		if ( isset( $_POST['s'] ) && $_POST['s'] ||
		     isset( $_POST['rooms'] ) && $_POST['rooms'] ||
		     isset( $_POST['baths'] ) && $_POST['baths'] ||
		     isset( $_POST['transaction'] ) && $_POST['transaction'] ||
		     isset( $_POST['proptype'] ) && $_POST['proptype'] ||
		     isset( $_POST['min'] ) && $_POST['min'] || isset( $_POST['max'] ) && $_POST['max'] ) {
			$args['meta_query'] = array( 'relation' => 'AND' );
		}

		if ( isset( $_POST['rooms'] ) && $_POST['rooms'] ) {
			$args['meta_query'][] = array(
				'key'     => '_pr_room_count',
				'value'   => $_POST['rooms'],
				'compare' => '='
			);
		}

		if ( isset( $_POST['baths'] ) && $_POST['baths'] ) {
			$args['meta_query'][] = array(
				'key'     => '_pr_baths_total',
				'value'   => $_POST['baths'],
				'compare' => '='
			);
		}

		if ( isset( $_POST['proptype'] ) && $_POST['proptype'] ) {
			$args['meta_query'][] = array(
				'key'     => '_pr_type_of_property',
				'value'   => $_POST['proptype'],
				'compare' => 'IN'
			);
		}

		if ( isset( $_POST['transaction'] ) && $_POST['transaction'] ) {
			$args['meta_query'][] = array(
				'key'     => '_pr_transaction',
				'value'   => $_POST['transaction'],
				'compare' => '='
			);
		}

		$args['meta_query'][] = array(
			'key'     => '_pr_owner',
			'value'   => $ow,
			'compare' => '='
		);

		if ( isset( $_POST['showowner'] ) && $_POST['showowner'] ) {
			$args['meta_query'][] = array(
				'key'     => '_pr_owner',
				'value'   => $_POST['showowner'],
				'compare' => '='
			);
        }

		if ( isset( $_POST['s'] ) && $_POST['s'] ) {
			$args['meta_query'][] = array(
				'relation' => 'OR',
				array(
					'key'     => '_pr_city',
					'value'   => $_POST['s'],
					'compare' => '='
				),
				array(
					'key'     => '_pr_address',
					'value'   => $_POST['s'],
					'compare' => '='
				),
				array(
					'key'     => '_pr_postalcode',
					'value'   => $_POST['s'],
					'compare' => '='
				)
			);
		}

		// if both minimum price and maximum price are specified we will use BETWEEN comparison
		if ( isset( $_POST['min'] ) && $_POST['min'] && isset( $_POST['max'] ) && $_POST['max'] ) {
			$args['meta_query'][] = array(
				'key'     => '_pr_current_price',
				'value'   => array( $_POST['min'], $_POST['max'] ),
				'type'    => 'NUMERIC',
				'compare' => 'between'
			);
		} else {
			// if only min price is set
			if ( isset( $_POST['min'] ) && $_POST['min'] ) {
				$args['meta_query'][] = array(
					'key'     => '_pr_current_price',
					'value'   => $_POST['min'],
					'type'    => 'NUMERIC',
					'compare' => '>='
				);
			}

			// if only max price is set
			if ( isset( $_POST['max'] ) && $_POST['max'] ) {
				$args['meta_query'][] = array(
					'key'     => '_pr_current_price',
					'value'   => $_POST['max'],
					'type'    => 'NUMERIC',
					'compare' => '<='
				);
			}
		}

		$query = new WP_Query( $args );

		if ( $query->have_posts() ): while ( $query->have_posts() ) : $query->the_post();
			$address     = get_post_meta( get_the_ID(), '_pr_address', true );
			$price       = get_post_meta( get_the_ID(), '_pr_current_price', true );
			$type        = get_post_meta( get_the_ID(), '_pr_type_of_property', true );
			$rooms       = get_post_meta( get_the_ID(), '_pr_room_count', true );
			$baths       = get_post_meta( get_the_ID(), '_pr_baths_total', true );
			$sysid       = get_post_meta( get_the_ID(), '_pr_matrixid', true );
			$city        = get_post_meta( get_the_ID(), '_pr_city', true );
			$state       = get_post_meta( get_the_ID(), '_pr_state', true );
			$agentid     = get_post_meta( get_the_ID(), '_pr_agentid', true );
			$bgimg       = $url['baseurl'] . '/photos/' . $sysid . '/1.jpg';
			$headers     = get_headers( $bgimg, 1 );
			$fsize       = $headers['Content-Length'];
			$fsize       = (int) $fsize;
			$urlimage    = wp_remote_head( $bgimg );
			$urlimage    = $urlimage['response']['code'];
			$placeholder = get_template_directory_uri() . '/assets/no-photo.jpg';

			echo '<div class="col-xs-12 col-sm-4 col-md-4">
                <a href="' . get_permalink( $query->post->ID ) . '" class="property">
                    <div class="property-image" data-url="" style="background: url(' . $url['baseurl'] . '/photos/' . $sysid . '/1.jpg"></div>
                    <div class="property-info">
                        <div class="property-price">$' . $price . '</div>
						<div class="property-highlights">' . $type . ' ' . $rooms . ' habitaciones ' . $baths . ' baños</div>
						<div class="property-address">' . $address . '</div>
						<div class="property-code">MLS: ' . $query->post->post_title . '</div>
						</div>
						</a>
						</div>';
		endwhile; ?>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center nn">
					<?php wp_pagenavi( array( 'query' => $query ) ); ?>
                </div>
            </div>
		<?php else: ?>
            <div class="col-md-12">
                <div class="no-results-info">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/no-properties.svg" alt="0">
                    <h4><?php _e( 'No existen propiedades disponibles en estos momentos', 'hr' ) ?></h4>
                    <p><?php _e( '0 resultados', 'hr' ) ?></p>
                </div>
            </div>
		<?php endif;
		wp_reset_postdata(); ?>
	<?php }

	die();
}

add_action( 'wp_ajax_myfilter', 'property_filter_function' );
add_action( 'wp_ajax_nopriv_myfilter', 'property_filter_function' );


function my_post_count_queries( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		if ( is_search() ) {
			$query->set( 'posts_per_page', 1 );
		}
	}
}

add_action( 'pre_get_posts', 'my_post_count_queries' );