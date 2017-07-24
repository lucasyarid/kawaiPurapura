<?php 
$organizer_ids = tribe_get_organizer_ids();
$multiple_organizers = count( $organizer_ids ) > 1;
?>
<div id="sidebar" role="complementary" class="sidebar fusion-widget-area fusion-content-widget-area fusion-" style="float: right;">
	<div class="tribe-events-single-section tribe-events-event-meta primary tribe-clearfix">
		<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>
		<?php if( ! is_singular( 'tribe_organizer' )) : ?>
		<div class="tribe-events-meta-group tribe-events-meta-group-details">
			<h3 class="tribe-events-single-section-title">Details</h3>
			<?php if( get_field('calendar_additional_info') ): ?>
				<p><?php the_field('calendar_additional_info'); ?></p>
			<?php endif; ?>
			<br>
			<dl>
				<?php if( tribe_get_start_date($event_id ) ): ?>
					<dt> Date: </dt>
					<dd>
						<abbr class="tribe-events-abbr tribe-events-start-date published dtstart">
							<?php echo tribe_get_start_date($event_id, false ); ?>
						</abbr>
					</dd>
				<?php endif; ?>

				<?php if( tribe_get_start_date($event_id) ): ?>
					<dt> Time: </dt>
					<dd>
						<div class="tribe-events-abbr tribe-events-start-time published dtstart">
							<?php echo tribe_get_start_date($event_id, false, $format = 'g:i A' ) . ' — ' . tribe_get_end_date($post, false, $format = 'g:i A'); ?>
						</div>
					</dd>
				<?php endif; ?>

				<?php if( tribe_get_cost() ): ?>
					<dt> Cost: </dt>
					<dd class="tribe-events-event-cost">
						<?php echo tribe_get_event_meta( $postId, '_EventCurrencySymbol', true ); echo tribe_get_cost(); ?>
					</dd>
				<?php endif; ?>
			</dl>
		</div>
		<?php endif; ?>

		<?php if( tribe_get_venue() ): ?>
			<div class="tribe-events-meta-group tribe-events-meta-group-venue">
				<h3 class="tribe-events-single-section-title" data-fontsize="16" data-lineheight="16">Venue</h3>
				<dl>

					<dd class="tribe-venue">
						<a href="
							<?php // echo tribe_get_venue_permalink(); ?>
							/venues
							">
							<?php echo tribe_get_venue();?>
						</a>
					</dd>

					<?php if( tribe_get_address() ): ?>
						<dd class="tribe-venue-location">
							<address class="tribe-events-address">
								<span class="tribe-address">
									<span class="tribe-street-address">
										<?php echo tribe_get_address(); ?>
									</span>
									<br>
									<?php if( tribe_get_city() ): ?>
										<span class="tribe-locality">
											<?php echo tribe_get_city(); ?>
										</span><span class="tribe-delimiter">,</span>
									<?php endif; ?>
									<?php if( tribe_get_zip() ): ?>
										<span class="tribe-postal-code">
											<?php echo tribe_get_zip(); ?>
										</span>
									<?php endif; ?>
									<?php if( tribe_get_country() ): ?>
										<span class="tribe-country-name">
											<?php echo tribe_get_country(); ?>
										</span>
									<?php endif; ?>
								</span>
							</address>
						</dd>
					<?php endif; ?>

					<?php if( tribe_get_phone() ): ?>
						<dt> Phone: </dt>
						<dd class="tribe-venue-tel">
							<?php echo tribe_get_phone(); ?>
						</dd>
					<?php endif; ?>

				</dl>
			</div>
		<?php endif; ?>

		<?php if( tribe_get_organizer() ): ?>
			<div class="tribe-events-meta-group tribe-events-meta-group-organizer">
				<h3 class="tribe-events-single-section-title" data-fontsize="16" data-lineheight="16">Organizer</h3><br>
				<dl>
					<dd class="tribe-organizer">
						<?php
						$organizer_links = array();
						foreach ( $organizer_ids as $organizer_id ) {
							if ( ! $organizer_id ) {
								continue;
							}

							$organizer_link = tribe_get_organizer_link( $organizer_id, true );

							$organizer_links[] = $organizer_link;
						}// end foreach

						$and = _x( 'and', 'list separator for final two elements', 'tribe-events-calendar-pro' );
						if ( 1 == count( $organizer_links ) ) {
							echo $organizer_links[0];
						} elseif ( 2 == count( $organizer_links ) ) {
							echo $organizer_links[0] . ' ' . esc_html( $and ) . ' ' . $organizer_links[1];
						} else {
							$last_organizer = array_pop( $organizer_links );

							echo implode( ', ', $organizer_links );
							echo esc_html( ', ' . $and . ' ' );
							echo $last_organizer;
						}// end else
						?>
					</dd>

					<?php if( sp_get_organizer_email() ): ?>
						<dt>
							Email:				
						</dt>
						<dd class="tribe-organizer-email">
							<a href="<?php echo sp_get_organizer_email(); ?>">
								<?php echo sp_get_organizer_email(); ?>
							</a>			
						</dd>
					<?php endif; ?>

					<?php if( tribe_get_organizer_website_link() ): ?>
						<dt>
							Website:				
						</dt>
						<dd class="tribe-organizer-url">
							<?php echo tribe_get_organizer_website_link(); ?>
						</dd>
					<?php endif; ?>
				</dl>
			</div>
		<?php endif; ?>

		<?php if( get_field('button_link') ): ?>
			<form action="<?php the_field('button_link'); ?>">
			    <input class="button default-button" type="submit" value="Book Here">
			</form>
		<?php endif; ?>
	</div>
</div>