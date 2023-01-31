<?php
$post_format = get_post_format();
global $post;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="top-info-detail post-layout">

        <?php if( $post_format == 'link' ) {
            $format = hyori_post_format_link_helper( get_the_content(), get_the_title() );
            $title = $format['title'];
            $link = hyori_get_link_attributes( $title );
            $thumb = hyori_post_thumbnail('', $link);
            echo trim($thumb);
        } else { ?>
            <div class="entry-thumb <?php echo  (!has_post_thumbnail() ? 'no-thumb' : ''); ?>">
                <?php
                    $thumb = hyori_post_thumbnail();
                    echo trim($thumb);
                ?>
                
            </div>
        <?php } ?>
        <div class="top-info">
            <a href="<?php the_permalink(); ?> " class="blog-time"><i class="far fa-calendar-alt"></i><?php the_time( get_option('date_format', 'd M, Y') ); ?></a>
                <span class="comments"><i class="fas fa-comments"></i><?php comments_number( esc_html__('0 Comments', 'hyori'), esc_html__('1 Comment', 'hyori'), esc_html__('% Comments', 'hyori') ); ?>
            </span>
            <?php hyori_post_categories($post); ?>
           
        </div>
         <!-- <?php if (get_the_title()) { ?>
            <h1 class="entry-title-detail">
                <?php the_title(); ?>
            </h1>
        <?php } ?> -->
    </div>
	<div class="entry-content-detail">
        
    	<div class="single-info info-bottom">
            <div class="entry-description">
                <?php
                    the_content();
                ?>
            </div><!-- /entry-content -->
    		<?php
    		wp_link_pages( array(
    			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'hyori' ) . '</span>',
    			'after'       => '</div>',
    			'link_before' => '<span>',
    			'link_after'  => '</span>',
    			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'hyori' ) . ' </span>%',
    			'separator'   => '',
    		) );
    		?>
            <?php  
                $posttags = get_the_tags();
            ?>
            <?php if( !empty($posttags) || hyori_get_config('show_blog_social_share', false) ){ ?>
        		<div class="tag-social">
                    <?php hyori_post_tags(); ?>
        			<?php if( hyori_get_config('show_blog_social_share', false) ) {
        				get_template_part( 'template-parts/sharebox' );
        			} ?>
        		</div>
            <?php } ?>
    	</div>
    </div>
     <?php
        //Previous/next post navigation.
        hyori_post_nav();
        // the_post_navigation( array(
        //     'next_text' => '<span class="meta-nav"><i class="ti-angle-right"></i></span> ' .
        //         '<div class="inner">'.
        //         '<div class="navi">' . esc_html__( 'Next', 'hyori' ) . '</div>'.
        //         '<span class="title-direct">%title</span></div>',
        //     'prev_text' => '<span class="meta-nav"><i class="ti-angle-left"></i></span> ' .
        //         '<div class="inner">'.
        //         '<div class="navi"> ' . esc_html__( 'Prev', 'hyori' ) . '</div>'.
        //         '<span class="title-direct">%title</span></div>',
        // ) );
    ?>
</article>