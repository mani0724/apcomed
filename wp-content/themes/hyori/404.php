<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Hyori
 * @since Hyori 1.0
 */
/*
*Template Name: 404 Page
*/
get_header();
hyori_render_breadcrumbs();
$icon = hyori_get_config('icon-img');
?>
<section class="page-404">
	<div id="main-container" class="inner">
		<div id="main-content" class="main-page">
			<section class="error-404 not-found clearfix">
				<div class="container">
					<div class="row flex-middle-sm">
						<div class="col-sm-5">
							<div class="slogan">
								<?php if(!empty(hyori_get_config('404_title', '404')) ) { ?>
									<h4 class="title-big"><?php echo hyori_get_config('404_title', 'Oops! This page Could Not Be Found!'); ?></h4>
								<?php } ?>
							</div>
							<div class="page-content">
								<div class="description">
									<?php echo hyori_get_config('404_description', 'Sorry bit the page you are looking for does not exist, have been removed or name changed '); ?>
								</div>
								<div class="return">
									<a class="btn btn-theme radius-50" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__('Go to homepage','hyori') ?></a>
								</div>
							</div><!-- .page-content -->
						</div>
						<div class="col-sm-7 hidden-xs">
							<?php if( !empty($icon) && !empty($icon['url'])) { ?>
								<img src="<?php echo esc_url( $icon['url']); ?>" alt="<?php bloginfo( 'name' ); ?>">
							<?php }else{ ?>
								<img src="<?php echo esc_url_raw( get_template_directory_uri().'/images/error.png'); ?>" alt="<?php bloginfo( 'name' ); ?>">
							<?php } ?>
						</div>
					</div>
				</div>
			</section><!-- .error-404 -->
		</div><!-- .content-area -->
	</div>
</section>
<?php get_footer(); ?>