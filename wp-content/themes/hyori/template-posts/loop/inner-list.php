<?php 
global $post;
$thumbsize = !isset($thumbsize) ? hyori_get_config( 'blog_item_thumbsize', 'full' ) : $thumbsize;
$thumb = hyori_display_post_thumb($thumbsize);
?>
<article <?php post_class('post post-layout post-list-item'); ?>>
    <div class="list-inner ">
        <div class="row <?php echo (!empty($thumb))?'flex-middle':''; ?>">
            <?php
                if ( !empty($thumb) ) {
                    ?>
                    <div class="image col-xs-5">
                        <?php echo trim($thumb); ?>
                    </div>
                    <?php
                }
            ?>
            <div class="<?php echo (!empty($thumb))?'col-xs-7':'col-xs-12'; ?>">
                <div class="post-info">
                    <div class="top-info">
                        <a href="<?php the_permalink(); ?>"><i class="fa fa-calendar"></i><?php the_time( get_option('date_format', 'd M, Y') ); ?></a>
                        <span class="comments"><i class="fa fa-comments"></i><?php comments_number( esc_html__('0 Comments', 'hyori'), esc_html__('1 Comment', 'hyori'), esc_html__('% Comments', 'hyori') ); ?></span>
                        <?php hyori_post_categories($post); ?>
                    </div>
                    <?php if (get_the_title()) { ?>
                        <h4 class="entry-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                    <?php } ?>

                    <?php if (hyori_get_config('show_excerpt', false)) { ?>
                        <div class="description"><?php echo hyori_substring( get_the_excerpt(), 20, '...' ); ?></div>
                    <?php } else{ ?>
                        <div class="description"><?php echo hyori_substring( get_the_content(), 20, '...' ); ?></div>
                    <?php } ?>
                    
                    <a class="btn btn-theme btn-readmore radius-50" href="<?php the_permalink(); ?>">
                        <?php esc_html_e('Read More', 'hyori'); ?>
                       <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</article>