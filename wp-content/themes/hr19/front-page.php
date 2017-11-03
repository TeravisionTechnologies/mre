<?php
get_header();
$home_query = get_posts(
	array(
		'post_type' => 'header_footer'
	)
);
$hero  = get_post_meta( $home_query[0]->ID, '_hf_hero', true );


// Begin RETS

date_default_timezone_set( 'America/New_York' );

require_once( "vendor/autoload.php" );

$config = new \PHRETS\Configuration;
$config->setLoginUrl( 'http://rets.sef.mlsmatrix.com/Rets/Login.ashx' )
       ->setUsername( 'lesAERfue' )
       ->setPassword( '8050' )
       ->setRetsVersion( '1.7.2' );

$rets = new \PHRETS\Session( $config );

$connect = $rets->Login();

if($connect) {
	$results = $rets->Search( 'Property', 'Listing', ' (Status = A)', [ 'Limit' => '9' ] );
} else {
	$error = $rets->Error();
	print_r($error);
}

?>
<section class="col-xs-12 hr-hero-section text-center no-padding"
         style="background-image: url('<?php echo $hero[0]["_hf_hero_background"] ?>');">
    <div class="hero-overlay">
		<?php
		if ( isset( $hero[0]["_hf_hero_text"] ) ) {
			echo $hero[0]["_hf_hero_text"];
		}
		?>
    </div>
</section>
<div class="clearfix"></div>
<div class="container property-search-wrapper">
    <div class="row">
        <div class="col-md-12">
            <form id="property-search" class="property-search" action="./" method="post">
                <ul class="property-status">
                    <li class="col-xs-4 col-sm-4 col-md-4 no-padding">
                        <input type="radio" id="buy" name="status">
                        <label for="buy"><?php _e( 'Compra', 'hr' ) ?></label>
                    </li>
                    <li class="col-xs-4 col-sm-4 col-md-4 no-padding">
                        <input type="radio" id="rent" name="status">
                        <label for="rent"><?php _e( 'Alquiler', 'hr' ) ?></label>
                    </li>
                    <li class="col-xs-4 col-sm-4 col-md-4 no-padding">
                        <input type="radio" id="presale" name="status">
                        <label for="presale" id="pre"><?php _e( 'Preventa', 'hr' ) ?></label>
                    </li>
                </ul>

                <div class="col-xs-12 col-sm-12 col-md-12 search-text">
                    <div class="input-group">
                        <input type="search" name="s"
                               placeholder="<?php _e( 'Introduzca una dirección, ciudad, barrio o código postal', 'hr' ) ?>"
                               value="<?php echo get_query_var( 's' ); ?>" onBlur="if (this.value == '')
                                this.value = '<?php echo get_query_var( 's' ); ?>'"
                               onFocus="if (this.value === '<?php echo get_query_var( 's' ); ?>')
                                       this.value = ''">
                        <i class="fa fa-search"></i>
                        <input type="hidden" name="post_type[]" value="mls">
                    </div>
                </div>

                <div class="col-md-12 property-filters">
                    <div class="col-xs-6 col-sm-3 col-md-3">
                        <span class="filter"><?php _e( 'Tipo de vivienda', 'hr' ) ?></span>
                        <div class="styled-select">
                            <select>
                                <option>--</option>
                                <option>Una sola familia</option>
                                <option>Duplex</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-3">
                        <span class="filter"><?php _e( 'Rango de precio', 'hr' ) ?></span>
                        <div class="styled-select">
                            <select>
                                <option>--</option>
                                <option>$60.000 - 120.000</option>
                                <option>$120.000 - 180.000</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-3">
                        <span class="filter"><?php _e( 'Nro. de habitaciones', 'hr' ) ?></span>
                        <div class="styled-select">
                            <select>
                                <option>--</option>
                                <option>2+</option>
                                <option>3+</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-3">
                        <span class="filter"><?php _e( 'Nro. de baños', 'hr' ) ?></span>
                        <div class="styled-select">
                            <select>
                                <option>--</option>
                                <option>2+</option>
                                <option>3+</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
</div>

<div class="container property-list">
    <div class="row">
        <div class="property-sorting">
            <div class="col-sm-4 col-md-4">
                <span class="state-search">Miami, FL</span>
                <span class="results-search">Mostrando 9 de 8694 casas</span>
            </div>
            <div class="col-sm-8 col-md-8 text-center sort-select">
                <select class="pull-right">
                    <option selected><?php _e( 'Ordenar por  ', 'hr' ) ?></option>
                    <option value="newer"><?php _e( 'Último agregado', 'hr' ) ?></option>
                    <option value="lower"><?php _e( 'Precio más bajo', 'hr' ) ?></option>
                    <option value="higher"><?php _e( 'Precio más alto', 'hr' ) ?></option>
                </select>
                <div class="pull-right choose-search">
                    <div class="radio radio-inline radio-success">
                        <input type="radio" id="inlineRadio1" value="option1" name="radioInline" class="styled">
                        <label for="inlineRadio1"><?php _e( 'Solo Hr19', 'hr' ) ?></label>
                    </div>
                    <div class="radio radio-inline radio-success">
                        <input type="radio" id="inlineRadio2" value="option2" name="radioInline" class="styled" checked>
                        <label for="inlineRadio2"><?php _e( 'Todos', 'hr' ) ?></label>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <hr>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2 class="hr-heading"><?php _e( 'Propiedades HR19', 'hr' ) ?></h2>
        </div>
    </div>
    <div class="row">
		<?php foreach ($results as $record) {
			$sysid = $record['Matrix_Unique_ID'];
			//$n = 1;
			//$rootdir = $_SERVER['DOCUMENT_ROOT'];
			//var_dump($rootdir);
			//$dir = 'C:/xampp/htdocs/mre/wp-content/themes/hr19/photos/'.$sysid;
			//if(!is_dir($dir)) mkdir($dir);
			//$objects = $rets->GetObject('Property', 'Photo', $sysid);
			//$objects = $objects->first();
			?>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <a href="#" class="property">
                    <?php //foreach ($objects as $object) {
	                    //file_put_contents( $dir . '/' . $n . '.jpg', $object->getContent() );
	                    //$n ++;
                   // } ?>
                    <!--<div class="property-image" style="<?php //echo 'background: url(' .get_template_directory_uri(). '/photos/' . $sysid . '/1.jpg)';?>"></div>-->
                    <div class="property-image" style="background: url('http://www.bestofinteriors.com/wp-content/uploads/2014/11/4e29c__architecture-Lindsay-Chambers-Professorville.jpg');"></div>
                    <div class="property-info">
                        <div class="property-price">$<?php echo number_format(round($record['CurrentPrice'])) ?></div>
                        <div class="property-highlights"><?php echo $record['TypeofProperty'] ?>, <?php echo $record['BedsTotal'] ?> habitaciones</div>
                        <div class="property-address"><?php echo $record['AddressInternetDisplay'] ?></div>
                        <div class="property-code">MLS: <?php echo $record['MLSNumber'] ?></div>
                    </div>
                </a>
            </div>
		<?php } ?>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <nav>
                <ul class="pagination">
                    <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li><a href="#" class="active">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>


<?php get_footer(); ?>
