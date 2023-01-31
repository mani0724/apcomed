<?php
/**
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Hyori
 * @since Hyori 1.0
 */
?>
<?php 
    $thumbsize = !isset($thumbsize) ? hyori_get_config( 'blog_item_thumbsize', 'full' ) : $thumbsize;
    $thumb = hyori_display_post_thumb($thumbsize);
?>
<article <?php post_class('post post-layout post-grid-v1'); ?>>
    <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
        <span class="post-sticky"><?php echo esc_html__('Featured','hyori'); ?></span>
    <?php endif; ?>
    
    <?php if($thumb) {?>
        <div class="top-image">
            <?php
                echo trim($thumb);
            ?>
            <div class="post-info">
                <?php if (get_the_title()) { ?>
                    <h4 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                <?php } ?>
                 <div class="top-info">
                       
                    <a href="<?php the_permalink(); ?> " class="blog-time">
                        <i class="fa fa-calendar"></i><?php the_time( get_option('date_format', 'd M, Y') ); ?>
                    </a>
                    <span class="comments"><i class="fa fa-comments"></i><?php comments_number( esc_html__('0 Comments', 'hyori'), esc_html__('1 Comment', 'hyori'), esc_html__('% Comments', 'hyori') ); ?>
                    </span>

                      <?php hyori_post_categories($post); ?>
                </div>
                <?php if(has_excerpt()){?>
                    <div class="description"><?php echo hyori_substring( get_the_excerpt(), 45, '...' ); ?></div>
                <?php } else{ ?>
                    <div class="description"><?php echo hyori_substring( get_the_content(), 45, '...' ); ?></div>
                <?php } ?>
                <?php if (hyori_get_config('show_readmore', false)) { ?>
                <a class="readmore" href="<?php the_permalink(); ?>">
                    <?php esc_html_e('Read More', 'hyori'); ?>
                   <i class="fas fa-angle-double-right" aria-hidden="true"></i>
                </a>
                <?php } ?>
            </div>
        </div>
    <?php }else{ ?>    
    <div class="no-image">
        <div class="post-info">
            <?php if (get_the_title()) { ?>
                <h4 class="entry-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h4>
            <?php } ?>
             <div class="top-info">
                   
                <a href="<?php the_permalink(); ?> " class="blog-time">
                    <i class="fa fa-calendar"></i><?php the_time( get_option('date_format', 'd M, Y') ); ?>
                </a>
                <span class="comments"><i class="fa fa-comments"></i><?php comments_number( esc_html__('0 Comments', 'hyori'), esc_html__('1 Comment', 'hyori'), esc_html__('% Comments', 'hyori') ); ?>
                </span>

                  <?php hyori_post_categories($post); ?>
            </div>
            <?php if(has_excerpt()){?>
                <div class="description"><?php echo hyori_substring( get_the_excerpt(), 45, '...' ); ?></div>
            <?php } else{ ?>
                <div class="description"><?php echo hyori_substring( get_the_content(), 45, '...' ); ?></div>
            <?php } ?>
            <?php if (hyori_get_config('show_readmore', false)) { ?>
            <a class="readmore" href="<?php the_permalink(); ?>">
                <?php esc_html_e('Read More', 'hyori'); ?>
               <i class="fas fa-angle-double-right" aria-hidden="true"></i>
            </a>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
</article>