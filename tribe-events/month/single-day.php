<?php
/**
 * Month View Single Day
 * This file contains one day in the month grid
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month/single-day.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$day = tribe_events_get_current_month_day();
?>

<!-- Day Header -->
<div id="tribe-events-daynum-<?php echo $day['daynum'] ?>">

	<?php if ( $day['total_events'] > 0 && tribe_events_is_view_enabled( 'day' ) ) : ?>
		<a href="<?php echo esc_url( tribe_get_day_link( $day['date'] ) ); ?>"><?php echo $day['daynum'] ?></a>
	<?php else : ?>
		<?php echo $day['daynum'] ?>
	<?php endif; ?>

</div>

<!-- Events List -->
<?php while ( $day['events']->have_posts() ) : $day['events']->the_post(); ?>
	<?php $event_class = strip_tags( strtolower(get_the_term_list( get_queried_object_id(), 'tribe_events_cat' )));?>
	<div class="<?php echo $event_class ?>">
		<?php tribe_get_template_part( 'month/single', 'event' ) ?>	
	</div>
<?php endwhile; ?>

<!-- View More -->
<?php if ( $day['view_more'] ) : ?>
	<div class="tribe-events-viewmore">
		<?php $view_all_label = sprintf( _n( 'View 1 %1$s', 'View All %2$s %3$s', $day['total_events'], 'the-events-calendar' ), $events_label_singular, $day['total_events'], $events_label_plural ); ?>
		<a href="<?php echo esc_url( $day['view_more'] ); ?>" class="fusion-read-more"><?php echo $view_all_label ?></a>
	</div>
<?php
endif;
