<?php 
global $product;
$product_id = $product->get_id();
$image_size = isset($image_size) ? $image_size : 'woocommerce_thumbnail';
?>
<div class="product-block product-block-list" data-product-id="<?php echo esc_attr($product_id); ?>">
	<?php 
        do_action( 'hyori_woocommerce_loop_sale_flash' );
    ?>
	<div class="row flex-middle-sm">
		<div class="col-xs-5 col-sm-3 col-lg-3">	
			<div class="wrapper-image">
 				<?php
		            if ( class_exists( 'YITH_WCWL' ) ) {
		                echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
		            }
		        ?>
				<?php if (hyori_get_config('show_quickview', false)) { ?>
		            <a href="#" class="quickview" data-product_id="<?php echo esc_attr($product_id); ?>" data-toggle="modal" data-target="#goal-quickview-modal">
		                <?php echo esc_html('quick view','hyori'); ?>
		            </a>
		        <?php } ?> 
			    <figure class="image">
			        <?php
                        hyori_product_image($image_size); do_action( 'woocommerce_before_shop_loop_item_title' );
                    ?>
			        <?php do_action('hyori_woocommerce_before_shop_loop_item'); ?>
			    </figure>
				<?php Hyori_Woo_Swatches::swatches_list( $image_size ); ?>
			</div>
		</div>
		<div class="col-xs-7 col-sm-5 col-lg-6">
		    <div class="wrapper-info">
		    	<div class="top-list-info">
			    	<?php if (hyori_get_config('show_shop_cat_title', false)) { ?>
                        <?php hyori_woo_display_product_cat($product_id); ?>
                    <?php } ?>
			    	<h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			    	<?php
			            /**
			            * woocommerce_after_shop_loop_item_title hook
			            *
			            * @hooked woocommerce_template_loop_rating - 5
			            * @hooked woocommerce_template_loop_price - 10
			            */
			            remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating', 5);
			            remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price', 10);
			            do_action( 'woocommerce_after_shop_loop_item_title');
			        ?>
		            <?php if (hyori_get_config('show_rating', false)) { ?>
                        <div class="rating clearfix">
                            <?php
                                $rating_html = wc_get_rating_html( $product->get_average_rating() );
                                $count = $product->get_rating_count();
                                if ( $rating_html ) {
                                    echo trim( $rating_html );
                                } else {
                                    echo '<div class="star-rating"></div>';
                                }
                                echo '<span class="counts">('.$count.')</span>';
                            ?>
                        </div>
                    <?php } ?>
		           
		        </div>
	            <div class="product-excerpt">
		           <?php echo hyori_substring( get_the_excerpt(), 30, '...' ); ?>
		        </div>
			</div>
		</div> 
		<div class="col-xs-12 col-sm-4 col-lg-3">
			<div class="left-infor">
				<?php 
					do_action('hyori_list_shipping_info');
					add_action( 'hyori_list_price', 'woocommerce_template_loop_price', 10 );
					do_action('hyori_list_price');
				?>

				<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
	                    
		        <?php if( class_exists( 'YITH_Woocompare_Frontend' ) ) { ?>
		            <?php
		                $obj = new YITH_Woocompare_Frontend();
		                $url = $obj->add_product_url($product_id);
		                $compare_class = '';
		                if ( isset($_COOKIE['yith_woocompare_list']) ) {
		                    $compare_ids = json_decode( $_COOKIE['yith_woocompare_list'] );
		                    if ( in_array($product_id, $compare_ids) ) {
		                        $compare_class = 'added';
		                        $url = $obj->view_table_url($product_id);
		                    }
		                }
		            ?>
		            <div class="yith-compare">
		                <a title="<?php esc_attr_e('compare','hyori') ?>" href="<?php echo esc_url( $url ); ?>" class="compare <?php echo esc_attr($compare_class); ?>" data-product_id="<?php echo esc_attr($product_id); ?>">
		                    <?php echo esc_html__('ADD to Compare','hyori'); ?>
		                </a>
		            </div>
		        <?php } ?>
	        </div>
		</div> 
	</div>
</div>