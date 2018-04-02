<?php
$video = get_post_meta( get_the_ID(), '_br_video_embed', true );
?>
<div class="modal fade" id="watchVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-video">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="yt_holder">
                            <div id="ytvideo2"></div>
                            <ul class="demo2">
	                            <?php foreach ( $video as $url ) {
		                            $parts = parse_url( $url );
		                            if ( $parts['path'] == "/watch" ) { ?>
                                        <li><a href="<?php echo $url ?>"></a></li>
		                            <?php } ?>
	                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>