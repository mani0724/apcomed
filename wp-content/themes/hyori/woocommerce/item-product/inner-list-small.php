<?php global $product; ?>
<div class="product-block shop-list-small flex-middle">
	<div class="content-left">
		<figure class="image">
			<?php hyori_product_image(); ?>
		</figure>
	</div>
	<div class="content-body">
		<h3 class="name">
			<a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>"><?php echo trim( $product->get_title() ); ?></a>
		</h3>
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
		<span class="price"><?php echo trim($product->get_price_html()); ?></span>
	</div>
</div>