<?php 
    $thumbsize = !isset($thumbsize) ? hyori_get_config( 'blog_item_thumbsize', 'full' ) : $thumbsize;
    $thumb = hyori_display_post_thumb($thumbsize);
?>
<article <?php post_class('post post-layout post-grid-v2'); ?>>
    <?php if($thumb) {?>
        <div class="image">
            <?php
                $thumb = hyori_display_post_thumb($thumbsize);
                echo trim($thumb);
            ?>
           <!--  <div class="top-info">
                 <?php hyori_post_categories($post); ?>
            </div>  -->
            
        </div>
        <div class="post-info">
               
                <div class="top-info">
                    <a href="<?php the_permalink(); ?> " class="blog-time">
                        <i class="fa fa-calendar"></i><?php the_time( get_option('date_format', 'd M, Y') ); ?>
                    </a>
                     <span class="comments"><i class="fa fa-comments"></i><?php comments_number( esc_html__('0 Comments', 'hyori'), esc_html__('1 Comment', 'hyori'), esc_html__('% Comments', 'hyori') ); ?>
                    </span>
                    <!-- <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="ti-user" aria-hidden="true"></i><?php echo get_the_author(); ?></a> -->
                </div> 

                <?php if (get_the_title()) { ?>
                    <h4 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                <?php } ?>
              
              <?php if (hyori_get_config('show_excerpt', false)) { ?>
                    <div class="description"><?php echo hyori_substring( get_the_excerpt(), 15, '...' ); ?></div>
                <?php } else{ ?>
                    <div class="description"><?php echo hyori_substring( get_the_content(), 15, '...' ); ?></div>
                <?php } ?>
             <?php if (hyori_get_config('show_readmore', false)) { ?>
                <a class="btn btn-theme btn-readmore radius-50" href="<?php the_permalink(); ?>">
                    <?php esc_html_e('Read More', 'hyori'); ?>
                   <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </a>
                <?php } ?> 
            </div>
        <?php }else{ ?>
         <div class="no-image">
            <div class="post-info">
              <!--   <div class="top-info">
                     <?php hyori_post_categories($post); ?>
                </div> -->
                 <div class="top-info">
                    <a href="<?php the_permalink(); ?> " class="blog-time">
                        <i class="fa fa-calendar"></i><?php the_time( get_option('date_format', 'd M, Y') ); ?>
                    </a>
                     <span class="comments"><i class="fa fa-comments"></i><?php comments_number( esc_html__('0 Comments', 'hyori'), esc_html__('1 Comment', 'hyori'), esc_html__('% Comments', 'hyori') ); ?>
                    </span>
                    <!-- <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="ti-user" aria-hidden="true"></i><?php echo get_the_author(); ?></a> -->
                </div>
                <?php if (get_the_title()) { ?>
                    <h4 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                <?php } ?>
               
              <?php if (hyori_get_config('show_excerpt', false)) { ?>
                    <div class="description"><?php echo hyori_substring( get_the_excerpt(), 15, '...' ); ?></div>
                <?php } else{ ?>
                    <div class="description"><?php echo hyori_substring( get_the_content(), 15, '...' ); ?></div>
                <?php } ?>

                <?php if (hyori_get_config('show_readmore', false)) { ?>
                <a class="btn btn-theme btn-readmore radius-50" href="<?php the_permalink(); ?>">
                    <?php esc_html_e('Read More', 'hyori'); ?>
                   <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </a>
                <?php } ?> 
            </div>
        </div>   
    <?php } ?>       
    
</article>