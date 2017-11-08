<?php
get_header();
$home_query = get_posts(
	array(
		'post_type' => 'header_footer'
	)
);
$hero       = get_post_meta( $home_query[0]->ID, '_hf_hero', true );

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

    <div class="container property-search-wrapper">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
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
                    <div class="col-xs-12 col-sm-12 col-md-12 search-text no-padding">
                        <div class="input-group">
                            <input type="search" name="s" class="col-xs-10 col-sm-10 col-md-10"
                                   placeholder="<?php _e( 'Introduzca una dirección, ciudad, barrio o código postal', 'hr' ) ?>"
                                   value="<?php echo get_query_var( 's' ); ?>" onBlur="if (this.value == '')
                                    this.value = '<?php echo get_query_var( 's' ); ?>'"
                                   onFocus="if (this.value === '<?php echo get_query_var( 's' ); ?>')
                                           this.value = ''">
                            <input type="hidden" name="post_type[]" value="property">
                            <button type="submit" class="btn col-xs-2 col-sm-2 col-md-2"><i class="fa fa-search"></i></button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<div class="container property-list">
    <div class="row">
        <div class="col-md-12">
            <h2 class="hr19-heading"><span><?php _e( 'Propiedades HR19', 'hr' ) ?>&nbsp;&nbsp;&nbsp;</span></h2>
        </div>
    </div>
    <!--<div class="row">
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
    </div>-->
    <div class="row">
		<?php
		$propertieslist = array( 'post_type' => 'property', 'posts_per_page' => 9 );
		query_posts( $propertieslist );
		if ( have_posts() ): while ( have_posts() ): the_post();
			$address = get_post_meta( get_the_ID(), '_pr_address', true );
			$price   = get_post_meta( get_the_ID(), '_pr_current_price', true );
			$type    = get_post_meta( get_the_ID(), '_pr_type_of_property', true );
			$rooms   = get_post_meta( get_the_ID(), '_pr_room_count', true );
			$baths   = get_post_meta( get_the_ID(), '_pr_baths_total', true );
			?>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <a href="<?php the_permalink(); ?>" class="property">
                    <div class="property-image"
                         style="background: url('http://www.bestofinteriors.com/wp-content/uploads/2014/11/4e29c__architecture-Lindsay-Chambers-Professorville.jpg');"></div>
                    <div class="property-info">
                        <div class="property-price"><?php if ( ! empty( $price ) ) {
								echo '$' . $price;
							} ?></div>
                        <div class="property-highlights">
							<?php if ( ! empty( $type ) ) {
								echo $type;
							} else {
								echo 'N/A';
							} ?>
							<?php if ( ! empty( $rooms ) ) {
								echo '· ' . $rooms . ' Habitaciones';
							} ?>
							<?php if ( ! empty( $baths ) ) {
								echo '· ' . $baths . ' Baños';
							} ?>
                        </div>
                        <div class="property-address"><?php if ( ! empty( $address ) ) {
								echo $address;
							} else {
								echo 'N/A';
							} ?></div>
                        <div class="property-code">MLS: <?php the_title(); ?></div>
                    </div>
                </a>
            </div>
		<?php endwhile; endif;
		wp_reset_postdata(); ?>
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
