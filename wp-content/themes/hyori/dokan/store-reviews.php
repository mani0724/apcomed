<?php
/**
 * The Template for displaying all reviews.
 *
 * @package dokan
 * @package dokan - 2014 1.0
 */


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$store_user = get_userdata( get_query_var( 'author' ) );
$store_info = dokan_get_store_info( $store_user->ID );
$map_location = isset( $store_info['location'] ) ? esc_attr( $store_info['location'] ) : '';



get_header();
$sidebar_configs = hyori_get_dokan_layout_configs();

?>

<?php do_action( 'hyori_woo_template_main_before' ); ?>

<section id="main-container" class="main-container <?php echo apply_filters('hyori_dokan_content_class', 'container');?>">
    
    <div class="row">
        <?php
        $main_class = '';
        if ( isset($sidebar_configs['left']) ) {
            $main_class = 'pull-right';
        }
        ?>

        <div id="main-content" class="archive-shop col-xs-12 <?php echo esc_attr($sidebar_configs['main']['class']. ' '. $main_class); ?>">
            <div id="dokan-primary" class="dokan-single-store">
                <div id="dokan-content" class="store-page-wrap woocommerce site-content" role="main">
            
                    <div id="dokan-content" class="store-review-wrap woocommerce" role="main">

                        <?php dokan_get_template_part( 'store-header' ); ?>

                        <?php
                        $dokan_template_reviews = Dokan_Pro_Reviews::init();
                        $id                     = $store_user->ID;
                        $post_type              = 'product';
                        $limit                  = 20;
                        $status                 = '1';
                        $comments               = $dokan_template_reviews->comment_query( $id, $post_type, $limit, $status );
                        ?>

                        <div id="reviews">
                            <div id="comments">

                                <h2 class="headline"><?php esc_html_e( 'Seller Review', 'hyori' ); ?></h2>

                                <ol class="commentlist">
                                    <?php
                                    if ( count( $comments ) == 0 ) {
                                        echo '<span colspan="5">' . esc_html__( 'No Results Found', 'hyori' ) . '</span>';
                                    } else {
                                        foreach ( $comments as $single_comment ) {
                                            if ( $single_comment->comment_approved ) {
                                                $GLOBALS['comment'] = $single_comment;
                                                $comment_date       = get_comment_date( 'l, F jS, Y \a\t g:i a', $single_comment->comment_ID );
                                                $comment_author_img = get_avatar( $single_comment->comment_author_email, 60 );
                                                $permalink          = get_comment_link( $single_comment );
                                                ?>

                                                <li <?php comment_class(); ?>>
                                                    <div class="review_comment_container">
                                                        <div class="dokan-review-author-img"><?php echo trim($comment_author_img); ?></div>
                                                        <div class="comment-text">
                                                            <a href="<?php echo esc_url($permalink); ?>">
                                                                <?php
                                                                if ( get_option('woocommerce_enable_review_rating') == 'yes' ) :
                                                                    $rating =  intval( get_comment_meta( $single_comment->comment_ID, 'rating', true ) ); ?>
                                                                    <div class="dokan-rating">
                                                                        <div class="star-rating" title="<?php echo sprintf(__( 'Rated %d out of 5', 'hyori' ), $rating) ?>">
                                                                            <span style="width:<?php echo ( intval( get_comment_meta( $single_comment->comment_ID, 'rating', true ) ) / 5 ) * 100; ?>%"><strong><?php echo trim($rating); ?></strong> <?php esc_html_e( 'out of 5', 'hyori' ); ?></span>
                                                                        </div>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </a>
                                                            <p>
                                                                <strong><?php echo trim($single_comment->comment_author); ?></strong>
                                                                <em class="verified"><?php echo trim($single_comment->user_id == 0 ? '(Guest)' : ''); ?></em>
                                                                -
                                                                <a href="<?php echo esc_url($permalink); ?>">
                                                                    <time datetime="<?php echo date( 'c', strtotime( $comment_date ) ); ?>"><?php echo trim($comment_date); ?></time>
                                                                </a>
                                                            </p>
                                                            <div class="description">
                                                                <p><?php echo trim($single_comment->comment_content); ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                            <?php
                                            }
                                        }
                                    }
                                    ?>
                                </ol>
                            </div>
                        </div>

                        <?php
                        echo trim($dokan_template_reviews->review_pagination( $id, $post_type, $limit, $status ));
                        ?>

                    </div><!-- #content .site-content -->
                </div><!-- #content -->
            </div><!-- #primary -->
        </div><!-- #main-content -->

        <?php if ( isset($sidebar_configs['left']) ) : ?>
            <div class="dokan-store-sidebar <?php echo esc_attr($sidebar_configs['left']['class']) ;?>">
                
                <?php if ( dokan_get_option( 'enable_theme_store_sidebar', 'dokan_general', 'off' ) == 'off' ) { ?>
                    <div class="dokan-clearfix dokan-store-sidebar" role="complementary">
                        <div class="dokan-widget-area widget-collapse">
                            <?php do_action( 'dokan_sidebar_store_before', $store_user, $store_info ); ?>
                            <?php
                            if ( ! dynamic_sidebar( 'sidebar-store' ) ) {

                                $args = array(
                                    'before_widget' => '<aside class="widget">',
                                    'after_widget'  => '</aside>',
                                    'before_title'  => '<h3 class="widget-title">',
                                    'after_title'   => '</h3>',
                                );

                                if ( class_exists( 'Dokan_Store_Location' ) ) {
                                    the_widget( 'Dokan_Store_Category_Menu', array( 'title' => esc_html__( 'Store Category', 'hyori' ) ), $args );

                                    if ( dokan_get_option( 'store_map', 'dokan_general', 'on' ) == 'on'  && !empty( $map_location ) ) {
                                        the_widget( 'Dokan_Store_Location', array( 'title' => esc_html__( 'Store Location', 'hyori' ) ), $args );
                                    }

                                    if ( dokan_get_option( 'contact_seller', 'dokan_general', 'on' ) == 'on' ) {
                                        the_widget( 'Dokan_Store_Contact_Form', array( 'title' => esc_html__( 'Contact Vendor', 'hyori' ) ), $args );
                                    }
                                }

                            }
                            ?>

                            <?php do_action( 'dokan_sidebar_store_after', $store_user, $store_info ); ?>
                        </div>
                    </div><!-- #secondary .widget-area -->
                <?php
                } else {
                    if ( is_active_sidebar( $sidebar_configs['left']['sidebar'] ) ) {
                        dynamic_sidebar( $sidebar_configs['left']['sidebar'] );
                    }
                }
                ?>

            </div>
        <?php endif; ?>

        <?php if ( isset($sidebar_configs['right']) ) : ?>
            <div class="dokan-store-sidebar <?php echo esc_attr($sidebar_configs['right']['class']) ;?>">
                

                <?php if ( dokan_get_option( 'enable_theme_store_sidebar', 'dokan_general', 'off' ) == 'off' ) { ?>
                    <div class="dokan-clearfix dokan-store-sidebar" role="complementary">
                        <div class="dokan-widget-area widget-collapse">
                             <?php do_action( 'dokan_sidebar_store_before', $store_user, $store_info ); ?>
                            <?php
                            if ( ! dynamic_sidebar( 'sidebar-store' ) ) {

                                $args = array(
                                    'before_widget' => '<aside class="widget">',
                                    'after_widget'  => '</aside>',
                                    'before_title'  => '<h3 class="widget-title">',
                                    'after_title'   => '</h3>',
                                );

                                if ( class_exists( 'Dokan_Store_Location' ) ) {
                                    the_widget( 'Dokan_Store_Category_Menu', array( 'title' => esc_html__( 'Store Category', 'hyori' ) ), $args );

                                    if ( dokan_get_option( 'store_map', 'dokan_general', 'on' ) == 'on'  && !empty( $map_location ) ) {
                                        the_widget( 'Dokan_Store_Location', array( 'title' => esc_html__( 'Store Location', 'hyori' ) ), $args );
                                    }

                                    if ( dokan_get_option( 'contact_seller', 'dokan_general', 'on' ) == 'on' ) {
                                        the_widget( 'Dokan_Store_Contact_Form', array( 'title' => esc_html__( 'Contact Vendor', 'hyori' ) ), $args );
                                    }
                                }

                            }
                            ?>

                            <?php do_action( 'dokan_sidebar_store_after', $store_user, $store_info ); ?>
                        </div>
                    </div><!-- #secondary .widget-area -->
                <?php
                } else {
                    if ( is_active_sidebar( $sidebar_configs['right']['sidebar'] ) ) {
                        dynamic_sidebar( $sidebar_configs['right']['sidebar'] );
                    }
                }
                ?>

            </div>
        <?php endif; ?>
        
    </div>
</section>
<?php

get_footer();