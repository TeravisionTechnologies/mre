<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package MRE
 * @subpackage Blog
 * @since MRE 1.0
 */

get_header();
global $post;
$author_id = $post->post_author;
if (have_posts()) : the_post(); endif;

$categories = get_the_category();
$args_form_comments = array('class_submit' => 'comments-form-button',
    'title_reply' => '',
    'title_reply_before' => '',
    'label_submit' => 'Publicar comentario',
    'class_form' => 'comments-form',
    'comment_field' => '<textarea id="comment" name="comment" class="form-control" placeholder="Tu comentario..."></textarea></div>');
?>
<section class="container-fluid no-padding">
    <!-- this is single -->
    <section class="col-xs-12" id="blog-detail-breadcrumb">
        <div class="container-mre center-block">
            <a href="<?php echo get_site_url(); ?>/blog"><i
                        class="fa fa-chevron-circle-left blog-detail-breadcrumb-prev" aria-hidden="true"></i></a>
            <?php
            foreach ($categories as $category) {
                echo '<h2 class="blog-detail-breadcrumb-category">' . $category->name . '</h2>';
            }
            ?>
            <h3 class="blog-detail-breadcrumb-title"><?php echo the_title(); ?></h3>
        </div>
    </section>
    <section class="col-xs-12" id="blog-detail-hero">
        <div class="container-mre center-block">
            <div class="blog-detail-hero-image"
                 style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')">
                <img src="<?php echo get_avatar_url($author_id); ?>" class="blog-detail-hero-author img-circle">
            </div>
        </div>
    </section>
    <section class="col-xs-12" id="blog-detail-content">
        <div class="container-mre center-block">
            <h1 class="blog-detail-content-title"><?php echo the_title(); ?></h1>
            <h3 class="blog-detail-content-author">Por: <?php echo the_author_meta('nickname', $author_id); ?><span
                        class="blog-detail-content-date"><?php echo get_the_time('j F, Y', $post->ID); ?></span></h3>
            <div class="blog-detail-content-text">
                <?php the_content(); ?>
            </div>
            <div class="blog-detail-content-share">
                <?php do_shortcode('[USM_plus_form]'); ?>
                <h2 class="blog-detail-content-share-title">Share this article</h2>
                <ul class="blog-detail-content-share-list">
                    <li><?php echo do_shortcode('[ssba]'); ?></li>
                </ul>
            </div>
        </div>
    </section>
    <span class="center-block blog-detail-divider"></span>
    <?php
    $comments = get_comments(array(
        'post_id' => $post->ID));
    $count_comments = 0;
    foreach ($comments as $comment) :
        $count_comments++;
    endforeach;
    ?>
    <section class="col-xs-12" id="blog-detail-comments">
        <div class="container-mre center-block">
            <?php
            if ($count_comments == 1) {
                echo '<h2 class="blog-detail-comments-number">' . $count_comments . ' Comentario</h2>';
            } else if ($count_comments > 0) {
                echo '<h2 class="blog-detail-comments-number">' . $count_comments . ' Comentarios</h2>';
            }
            ?>
            <?php
            if ($count_comments > 0) {
                foreach ($comments as $comment) : ?>
                    <div class="blog-detail-comments-post">
                        <h2 class="blog-detail-comments-post-author">
                            <?php echo get_comment_author(); ?>
                            <span class="blog-detail-comments-post-date"><?php printf( _x( '%s ago', '%s = human-readable time difference', 'your-text-domain' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>
                        </h2>
                        <p class="blog-detail-comments-post-text"><?php echo $comment->comment_content ?></p>
                    </div>
                <?php endforeach;
            } ?>
        </div>
    </section>
    <section class="col-xs-12" id="blog-detail-form">
        <div class="blog-detail-comments-form center-block">
            <h2 class="blog-detail-comments-form-title">Escribe un comentario</h2>
            <h3 class="blog-detail-comments-form-subtitle">Su dirección de correo electrónico no será publicada</h3>
            <?php comment_form($args_form_comments, $post_id); ?>
        </div>
    </section>

    <section class="col-xs-12" id="blog-recommended-posts"
             style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/notice.jpg')">
        <?php
        $args = array(
            'post_type' => 'post',
            'numberposts' => -1,
            'post_status' => 'publish',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'post_tag',
                    'field' => 'slug',
                    'terms' => 'articulo-recomendado',
                )
            )
        );
        $articles_most_view = get_posts($args);
        ?>
        <div class="recommended-posts-overlay">
            <div class="container-mre center-block">
                <h2 class="recommended-posts-title">Artículos recomendados</h2>
                <div class="swiper-container swiper-container-blog-most-viewed">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($articles_most_view as $post_item) {
                            ?>
                            <div class="swiper-slide">
                                <a href="<?php $link = get_permalink($post_item->ID); echo $link; ?>">
                                    <div class="blog-most-viewed-image"
                                         style="background-image: url('<?php echo get_the_post_thumbnail_url($post_item->ID); ?>');">
                                        <?php
                                        $categories = get_the_category($post_item->ID);
                                        foreach ($categories as $category) {
                                            echo '<span class="blog-most-viewed-category">' . $category->name . '</span>';
                                        }
                                        $comments = get_comments(array(
                                            'post_id' => $post_item->ID));
                                        $count_comments_list = 0;
                                        foreach ($comments as $comment) :
                                            $count_comments_list++;
                                        endforeach;
                                        ?>
                                    </div>
                                </a>
                                <div class="blog-most-viewed-text">
                                    <a href="<?php $link = get_permalink($post_item->ID); echo $link; ?>">
                                        <p class="blog-most-viewed-text-title"><?php echo $post_item->post_title ?></p>
                                    </a>
                                    <p class="blog-most-viewed-text-author">
                                        Por: <?php echo the_author_meta('nickname', $post_item->post_author) ?><span
                                                class="blog-most-viewed-text-date"><?php echo get_the_time('j F, Y', $post_item->ID); ?></span><span
                                                class="blog-most-viewed-text-comments">- <?php echo $count_comments_list; ?>
                                            Comments</span></p>
                                </div>
                            </div>

                            <?php
                        }
                        ?>
                    </div>
                    <i class="fa fa-chevron-circle-left swiper-button-prev" aria-hidden="true"></i>
                    <i class="fa fa-chevron-circle-right swiper-button-next" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </section>
</section>

<?php get_footer(); ?>

