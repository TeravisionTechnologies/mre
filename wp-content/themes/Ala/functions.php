<?php
/**
 *  Created by PhpStorm.
 *  User: mtoledo
 *  Date: 3/8/17
 *  Time: 8:19 AM
 **/

// Loads css or js files
add_action('wp_enqueue_scripts', 'mre_enqueue_scripts');

// Register custom navigation walker
require_once('wp_bootstrap_navwalker.php');

register_nav_menus(
    array(
        'primary' => __('Primary Menu', 'mre'),
        'extra-menu' => __('Extra Menu', 'mre')
    )
);

add_theme_support('menus');

function mre_register_query_vars( $vars ) {
    $vars[] = 'location';
    $vars[] = 'status';
    $vars[] = 'section';
    $vars[] = 'orderBy';

    return $vars;
}

add_filter( 'query_vars', 'mre_register_query_vars' );
function mre_enqueue_scripts()
{
    // wp_enqueue_style( 'style', get_template_directory_uri() . 'style.css', array(), '1' );
    //wp_enqueue_script( 'script', get_template_directory_uri() . '/js/basic.css', array(), '1' );
    wp_enqueue_script( 'script' , get_template_directory_uri() . '/js/button-dynamic.js', array('jquery'),null,true );
}

add_action( 'admin_enqueue_scripts', 'mre_enqueue_scripts' );

// Directories that contain post-types
$postTypeDir = array(
    __DIR__ . '/includes/post-types/broker/',
    __DIR__ . '/includes/post-types/header-footer/',
    __DIR__ . '/includes/post-types/banner/',
    __DIR__ . '/includes/post-types/office/',
    __DIR__ . '/includes/post-types/about-us/',
);

// File names inside post-types dirs
$files = array(
    'meta-boxes.php',
    'post-type.php',
    'taxonomy.php'
);

foreach ($postTypeDir as $directory) {
    foreach ($files as $file) {
        if (file_exists($directory . $file)) {
            require_once($directory . $file);
        }
    }
}

/**
 * ┌───────────────────┐
 * │ Custom Post Types │
 * └───────────────────┘
 */

add_action('init', 'call_create_post_types');

function call_create_post_types()
{
    // Post Type for Banners/Sliders
    create_post_type_banner();
    // Post Type for Broker
    create_post_type_broker();
    // Post Type for General Settings
    create_post_type_header_footer();
    // Post Type for Offices
    create_post_type_offices();
    // Post Type for About Us
    create_post_type_about_us();
}

/* Remove text area field from header and footer */
function remove_page_editor()
{
    remove_post_type_support('header_footer', 'editor');
    remove_post_type_support('banner', 'editor');
    remove_post_type_support('about_us', 'editor');
}

add_action('init', 'remove_page_editor');


/**
 * ┌───────────────────┐
 * │ Custom Meta Boxes │
 * └───────────────────┘
 */

add_action('cmb2_admin_init', 'call_metaboxes');

function call_metaboxes()
{
    // Metaboxes for Broker
    broker_metaboxes();
    // Metaboxes for General Settings
    header_footer_metaboxes();
    banner_metaboxes();
    // Metaboxes for About  Us
    about_us_metaboxes();
}

/*function custom_form_validation_filter($result, $tag) {
  $name = $tag['name'];
  $value = $_POST[$name];
  if($name == 'your-name') {
    if (!preg_match('/[a-zA-Z]/', $value)){
      $result->invalidate( $tag, "You can only use characters." );
    }
  }
  if($name == 'your-email') {
    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
      $result->invalidate( $tag, "Invalid email format." );
    }
  }
  return $result;
}
add_filter('wpcf7_validate_text','custom_form_validation_filter', 10, 2);
add_filter('wpcf7_validate_text*', 'custom_form_validation_filter', 10, 2);
add_filter('wpcf7_validate_email', 'custom_form_validation_filter', 10, 2);*/

//SVG Hook
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

/****** Personalización del Login ******/

add_action('login_head', 'custom_login_logo');

function custom_login_logo()
{
    echo '
    <style type="text/css">
        body{
            background: #ffffff;
        }
        h1 { 
            background-image:url(' . get_bloginfo('template_directory') . '/assets/ala19.svg) !important;
            background-repeat: no-repeat;
            background-position: center;
        }
        #login h1 a{ 
            height: 130px!important; 
        }
        #wp-submit{
            background: #ffffff !important;
            border: solid 2px #000000 !important;
            color: #000000;
            -webkit-box-shadow: inset 0 0 0 rgba(120,200,230,.5),0 1px 0 rgba(0,0,0,.15) !important;
            box-shadow: inset 0 0 0 rgba(120,200,230,.5),0 1px 0 rgba(0,0,0,.15) !important;
            text-shadow: none !important;
            border-radius: 0 !important;
            font-weight:bold;
        }
        a { 
            background-image:none !important; color: #fff !important;
        }
        #nav, #backtoblog{font-size: 11px!important;text-align: center;color: #fff!important;}
        .login form{ -webkit-border-radius: 5px; background-color: rgba(255,255,255,0.4);-webkit-box-shadow: 0px 2px 12px 0px rgba(0,0,0,0.4);-moz-box-shadow: 0px 2px 12px 0px rgba(0,0,0,0.4);box-shadow: 0px 2px 12px 0px rgba(0,0,0,0.4); }
        .login label, .login form .forgetmenot label{ color:#555!important;font-weight:bold;font-size: 12px; }
        .postbox{ display:none!important; }
        #nav a{ color:#000000!important;font-weight:bold; }
        #backtoblog a{ color:#000000!important;font-weight:bold; }
    </style>';
}


/****** Personalización del Footer en el Admin ******/

function remove_footer_admin()
{
    echo '<span id="footer-thankyou">Desarrollado para ALA19</span>';
}

add_filter('admin_footer_text', 'remove_footer_admin');

// Filtering data

function property_filter_function()
{

    if (isset($_POST['project-status']) && $_POST['project-status']) {
        $pstatus = $_POST['project-status'];
    }

    if (isset($_POST['project-location']) && $_POST['project-location']) {
        $plocation = $_POST['project-location'];
    }
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $lang = get_locale();
    $args = array(
        'post_type' => 'broker',
        'posts_per_page' => 9,
        'paged' => $paged,
        'tax_query' => array(
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
        ),
    );

    if (isset($_POST['project-status']) && $_POST['project-status'] ||
        isset($_POST['project-status']) && $_POST['project-status']) {
        $args['tax_query'] = array('relation' => 'AND');
    }

    if (isset($_POST['project-status']) && $_POST['project-status']) {
        $args['tax_query'][] = array(
            'taxonomy' => 'property_status',
            'field' => 'slug',
            'terms' => $_POST['project-status'],
        );
    }

    if (isset($_POST['project-location']) && $_POST['project-location']) {
        $args['tax_query'][] = array(
            'taxonomy' => 'property_location',
            'field' => 'slug',
            'terms' => $_POST['project-location'],
        );
    };

    $query = new WP_Query($args);

    if ($query->have_posts()): while ($query->have_posts()): $query->the_post();
        $background_image = wp_get_attachment_url(get_post_meta(get_the_ID(), '_br_images_id', true));
        $placeholder = get_template_directory_uri() . '/assets/no-photo.jpg';
        $address = get_post_meta(get_the_ID(), '_br_address', true);
        $price = get_post_meta(get_the_ID(), '_br_price', true);
        $status = get_the_terms(get_the_ID(), 'property_status');
        $loc = get_the_terms(get_the_ID(), 'property_location');
        ?>
        <div class="col-xs-12 col-sm-4 grid-item country-status">
            <div class="grid-item-content property-image"
                 style="background-image: url(<?php echo(!empty($background_image) ? $background_image : $placeholder) ?>)">
                <a href="<?php the_permalink(); ?>">
                    <div class="property-overlay">
                        <h2 class="property-title"><?php the_title(); ?></h2>
                        <?php if (!empty($address)) { ?><h3
                                class="property-address"><?php echo $address ?></h3><?php } ?>
                        <?php if (!empty($price)) { ?><h3
                                class="property-city"><?php echo $price ?></h3><?php } ?>
                        <?php if (!empty($status)) { ?><h4
                                class="property-category "><?php echo esc_html($status[0]->name); ?></h4><?php } ?>
                        <p class="date"><?php the_date(); ?></p>
                    </div>
                </a>
            </div>
        </div>
    <?php endwhile; ?>
        <div class="col-xs-12 text-center">
            <nav id="al-pagination">
                <?php wp_pagenavi(array('query' => $query)); ?>
            </nav>
        </div>
    <?php else: ?>
        <div class="col-md-12">
            <div class="no-results-info">
                <h4><?php echo($lang == "es_ES" ? 'No existen propiedades disponibles en estos momentos' : 'There are no properties available at this time') ?></h4>
                <p><?php echo($lang == "es_ES" ? '0 resultados' : '0 results') ?></p>
            </div>
        </div>
    <?php endif;
    wp_reset_postdata(); ?>
    <?php die();
}

add_action('wp_ajax_myfilter', 'property_filter_function');
add_action('wp_ajax_nopriv_myfilter', 'property_filter_function');

function processQuery($filters)
{
    $args = array();
    $pstatus = '';
    $plocation = '';
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
    if (isset($filters['project-status']) && $filters['project-status']) {
        $pstatus = $filters['project-status'];
    }

    if (isset($filters['project-location']) && $filters['project-location']) {
        $plocation = $filters['project-location'];
    }
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    if ($pstatus != '' or $plocation != '') {
        $args = array(
            'post_type' => 'broker',
            'showposts' => 9,
            'paged' => $paged,
			'orderby' => $orderBy,
			'order' => $sort,
            'tax_query' => array(
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
            ),
        );

        if (isset($filters['project-status']) && $filters['project-status'] ||
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
        };
    }

    return $args;
}
