<?php echo $before_widget; ?>
<?php echo $before_title . $title . $after_title; ?>

<p><?php echo $this->__('Schedule an appointment with us online.') ?></p>

<div id="<?php echo $view->settingOptionName ?>CalendarLink">
	<a
		href="<?php echo $view->calendarUrl ?>"
		style="display:block; text-align:center; width:140px;border-radius:8px; background-color:#fff; background-image:url(<?php echo WP_CONTENT_URL ?>/plugins/appointmind/images/calendar.png); background-repeat:no-repeat; background-position:center 10px;padding:90px 0px 10px 0px;margin:10px auto;"
		target="<?php echo $view->settingOptionName ?>Calendar"
		onclick="window.open('', '<?php echo $view->settingOptionName ?>Calendar', 'width=<?php echo $view->popupWidth ?>,height=<?php echo $view->popupHeight ?>, status, resizable, scrollbars');"
		><?php echo $this->__('Show Calendar') ?></a>
</div>

<?php echo $after_widget; ?>