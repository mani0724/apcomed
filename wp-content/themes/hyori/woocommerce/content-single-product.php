<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
	$layout = hyori_get_config('product_single_version', 'v2');

    $thumbs_pos = hyori_get_config('product_thumbs_position', 'thumbnails-left');
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'details-product layout-'.$layout, $product ); ?>>
	<?php if ( $layout == 'v1' ) { ?>
		<div class="row top-content">
			<div class="col-lg-5 col-md-5 col-xs-12">
				<div class="image-mains clearfix <?php echo esc_attr( $thumbs_pos ); ?>">
					<?php
						/**
						 * woocommerce_before_single_product_summary hook
						 *
						 * @hooked woocommerce_show_product_sale_flash - 10
						 * @hooked woocommerce_show_product_images - 20
						 */
						remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_sale_flash',10);
						do_action( 'woocommerce_before_single_product_summary' );
					?>
				</div>
			</div>
			<div class="col-lg-7 col-md-7 col-xs-12">
				<div class="information">
					<div class="row flex-top-sm">
						<div class="summary-left <?php echo esc_attr($product->is_type( 'grouped' )?'col-md-6':'col-lg-8 col-sm-7 col-xs-12'); ?>">
							<div class="summary entry-summary">
							<?php
								add_action( 'hyori_woocommerce_single_product_summary', 'hyori_woocommerce_single_title_wrapper_open', 1 );
								add_action( 'hyori_woocommerce_single_product_summary', 'hyori_woocommerce_single_title_wrapper_close', 7 );

								add_action( 'hyori_woocommerce_single_product_summary', 'hyori_woo_display_product_cat', 4 );
								add_action( 'hyori_woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
								add_action( 'hyori_woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );
								add_action( 'hyori_woocommerce_single_product_summary', 'woocommerce_template_single_meta', 20 );
								add_filter( 'hyori_woocommerce_single_product_summary', 'hyori_woocommerce_share_box', 30 );

								do_action( 'hyori_woocommerce_single_product_summary' );
							?>
							</div>
						</div>
						<div class="summary-right <?php echo esc_attr($product->is_type( 'grouped' )?'col-md-6':'col-lg-4 col-sm-5 col-xs-12'); ?>">
							<div class="summary entry-summary">
								<?php
									/**
									 * woocommerce_single_product_summary hook
									 *
									 * @hooked woocommerce_template_single_title - 5
									 * @hooked woocommerce_template_single_rating - 10
									 * @hooked woocommerce_template_single_price - 10
									 * @hooked woocommerce_template_single_excerpt - 20
									 * @hooked woocommerce_template_single_add_to_cart - 30
									 * @hooked woocommerce_template_single_meta - 40
									 * @hooked woocommerce_template_single_sharing - 50
									 */

									remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
									remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
									remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
									remove_action( 'woocommerce_single_product_summary', 'hyori_woocommerce_share_box', 100 );
									remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

									if ( hyori_get_config('show_product_review_tab', true) ) {
										add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 11 );
									}
									do_action( 'woocommerce_single_product_summary' );
								?>
							</div>
						</div><!-- .summary -->
					</div>
					<?php do_action( 'hyori_after_woocommerce_single_product_summary' ); ?>
				</div>
			</div>
		</div>
	<?php } else { ?>
		<div class="row top-content">
			<div class="col-md-7 col-xs-12">
				<div class="image-mains <?php echo esc_attr( $thumbs_pos ); ?>">
					<?php
						/**
						 * woocommerce_before_single_product_summary hook
						 *
						 * @hooked woocommerce_show_product_sale_flash - 10
						 * @hooked woocommerce_show_product_images - 20
						 */
						remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_sale_flash',10);
						do_action( 'woocommerce_before_single_product_summary' );
					?>
				</div>
			</div>
			<div class="col-md-5 col-xs-12">
				<div class="information">
					<div class="summary entry-summary ">

						<?php
							/**
							 * woocommerce_single_product_summary hook
							 *
							 * @hooked woocommerce_template_single_title - 5
							 * @hooked woocommerce_template_single_rating - 10
							 * @hooked woocommerce_template_single_price - 10
							 * @hooked woocommerce_template_single_excerpt - 20
							 * @hooked woocommerce_template_single_add_to_cart - 30
							 * @hooked woocommerce_template_single_meta - 40
							 * @hooked woocommerce_template_single_sharing - 50
							 */

							remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating',10);
							//remove_action('woocommerce_single_product_summary','hyori_woocommerce_share_box',100);
							remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);
							//remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);

							add_action( 'woocommerce_single_product_summary', 'hyori_woocommerce_single_title_wrapper_open', 1 );
							add_action( 'woocommerce_single_product_summary', 'hyori_woocommerce_single_title_wrapper_close', 7 );

							add_action( 'woocommerce_single_product_summary', 'hyori_woo_display_product_cat', 4 );
							add_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt', 7.5);
							
							if ( hyori_get_config('show_product_review_tab', true) ) {
								add_action('woocommerce_single_product_summary','woocommerce_template_single_rating', 11);
							}
							
							do_action( 'woocommerce_single_product_summary' );
						?>
					</div><!-- .summary -->
					
					<?php do_action( 'hyori_after_woocommerce_single_product_summary' ); ?>
				</div>
			</div>
		</div>
	<?php } ?>

	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
		do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>