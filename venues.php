<?php /* Template Name: Venues */ 

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

?>

<?php get_header(); ?>
<?php the_content(); ?>

<div id="venues" <?php Avada()->layout->add_style( 'content_style' ); ?>>
	<?php echo wp_kses_post( fusion_render_rich_snippets_for_pages() ); ?>
	<?php
		$args = array(
			'post_status' 		=> 'publish',
			'post_type' 		=> 'tribe_venue',
			'posts_per_page'	=> -1,
			'meta_key' 			=> 'order',
	        'orderby' 			=> 'meta_value_num',
	        'order' 			=> 'ASC'
		);
		// The Query
		$the_query = new WP_Query( $args );
		// The Loop
		if ( $the_query->have_posts() ) { 
			while ( $the_query->have_posts() ) {
				$the_query->the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php echo wp_kses_post( fusion_render_rich_snippets_for_pages() ); ?>
					<?php if( get_field('featured') ): ?>
						<div class="post-content venues">

				        	<div class="fusion-builder-row fusion-row ">
				        		<div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_2  fusion-one-half fusion-column-first 1_2" style="width:50%;width:calc(50% - ( ( 1% + 1% ) * 0.5 ) );margin-right: 2%;">
				        			<div class="fusion-column-wrapper">
				        				<?php include('partials/ACFfusionSlider.php'); ?>
				        				<div class="fusion-clearfix"></div>
				        			</div>
				        		</div>
				        		<div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_4  fusion-one-fourth 1_4" style="width:25%;width:calc(25% - ( ( 1% + 1% ) * 0.25 ) );">
				        			<div class="fusion-column-wrapper">
										<div class="venue-content">
											<div class="venue-title">
												<h2><?php echo get_the_title(); ?></h2>
											</div>
											<div class="venue-description">
												<?php the_content(); ?>
											</div>
										</div>
										<?php if( get_field('dimensions') ): ?>
											<div class="venue-dimensions">
												<?php the_field('dimensions'); ?>
											</div>
										<?php endif; ?>
				        				<div class="fusion-clearfix"></div>
				        			</div>
				        		</div>
				        		<div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_4  fusion-one-fourth fusion-column-last 1_4" style="width:25%;width:calc(25% - ( ( 1% + 1% ) * 0.25 ) );">
				        			<div class="fusion-column-wrapper">
				        				<div class="venue-pricing">
				        					<h3>Week Day & Weekends</h3>
				        					<ul>
				        						<?php if( get_field('pricing_week_day') ): ?>
				        							<li><?php the_field('pricing_week_day'); ?> – Week day</li>
				        						<?php endif; ?>
				        						<?php if( get_field('pricing_weekend_day') ): ?>
				        							<li><?php the_field('pricing_weekend_day'); ?> – Weekend day</li>
				        						<?php endif; ?>
				        						<?php if( get_field('pricing_weekend_day_sat_sun') ): ?>
				        							<li><?php the_field('pricing_weekend_day_sat_sun'); ?> – Weekend Sat & Sun</li>
				        						<?php endif; ?>
				        					</ul>
				        					<h3>Per Hours</h3>
				        					<ul>
				        						<?php if( get_field('pricing_week_day_hour') ): ?>
				        							<li><?php the_field('pricing_week_day_hour'); ?> – per hour weekdays</li>
				        						<?php endif; ?>
				        						<?php if( get_field('pricing_weekend_day_hour') ): ?>
				        							<li><?php the_field('pricing_weekend_day_hour'); ?> – per hour weekends</li>
				        						<?php endif; ?>
				        					</ul>
				        				</div>
				        				<div class="fusion-clearfix"></div>
				        			</div>
				        		</div>
				        	</div>

							<?php fusion_link_pages(); ?>
						</div>
					<?php endif; ?>
				</div>
			<?php }
			/* Restore original Post Data */
			wp_reset_postdata();
		} else {
			// no posts found
		}
	?>
</div>

<?php do_action( 'avada_after_content' ); ?>
<?php get_footer();