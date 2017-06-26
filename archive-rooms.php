<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
// Set global var $pagename according to static related page
global $pagename;
$pagename = 'rooms';
?>
<?php get_header(); ?>
<div class="fusion-builder-row fusion-row ">
	<div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_2  fusion-one-half fusion-column-first 1_2" style="width:50%;width:calc(50% - ( ( 1% + 1% ) * 0.5 ) );margin-right: 1%;">
		<div class="fusion-column-wrapper">
			<?php the_field('rooms_settings_content', 'option'); ?>
			<div class="fusion-clearfix"></div>
		</div>
	</div>
	<div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_2  fusion-one-half fusion-column-last 1_2" style="width:50%;width:calc(50% - ( ( 1% + 1% ) * 0.5 ) );margin-right: 1%;">
		<div class="fusion-column-wrapper">
			<?php $image = get_field('rooms_settings_side_image', 'option');
			if( !empty($image) ): ?>
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
			<?php endif; ?>
			<div class="fusion-clearfix"></div>
		</div>
	</div>
</div>

<?php while ( have_posts() ) : the_post(); ?>
	
	<div id="rooms" <?php Avada()->layout->add_style( 'content_style' ); ?>>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php echo wp_kses_post( fusion_render_rich_snippets_for_pages() ); ?>

			<div class="post-content rooms">

	        	<div class="fusion-builder-row fusion-row ">
	        		<div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_2  fusion-one-half fusion-column-first 1_2" style="width:50%;width:calc(50% - ( ( 1% + 1% ) * 0.5 ) );margin-right: 1%;">
	        			<div class="fusion-column-wrapper">
	        				<?php include('partials/ACFfusionSlider.php'); ?>
	        				<div class="fusion-clearfix"></div>
	        			</div>
	        		</div>
	        		<div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_4  fusion-one-fourth 1_4" style="width:25%;width:calc(25% - ( ( 1% + 1% ) * 0.25 ) );margin-right: 1%;">
	        			<div class="fusion-column-wrapper">
							<div class="room-content">
								<div class="room-title">
									<h2><?php the_title(); ?></h2>
								</div>
								<div class="room-description">
									<?php the_content(); ?>
								</div>
							</div>
	        				<div class="fusion-clearfix"></div>
	        			</div>
	        		</div>
	        		<div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_4  fusion-one-fourth fusion-column-last 1_4" style="width:25%;width:calc(25% - ( ( 1% + 1% ) * 0.25 ) );">
	        			<div class="fusion-column-wrapper">
	        				<div class="room-pricing">
	        					<ul>
	        						<?php if( get_field('pricing_week_day_hour') ): ?>
	        							<li><?php the_field('pricing_one_person'); ?> – 1 person</li>
	        						<?php endif; ?>
	        						<?php if( get_field('pricing_two_person') ): ?>
	        							<li><?php the_field('pricing_two_person'); ?> – 2 people</li>
	        						<?php endif; ?>
	        						<?php if( get_field('pricing_three_person') ): ?>
	        							<li><?php the_field('pricing_three_person'); ?> – 3 people</li>
	        						<?php endif; ?>
	        					</ul>
	        				</div>
	        				<div class="fusion-clearfix"></div>
	        			</div>
	        		</div>
	        	</div>

				<?php fusion_link_pages(); ?>
			</div>
		</div>
	</div>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
</div>
<?php do_action( 'avada_after_content' ); ?>
<?php get_footer();

/* Omit closing PHP tag to avoid "Headers already sent" issues. */