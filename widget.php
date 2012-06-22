<?php
/**
 * Appointmind sidebar widget
 */
class AppointmindWidget extends WP_Widget
{
    /**
     * Settings
     */
    private $settings = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->view = new stdClass;
	    $this->settings = new AppointmindSettings;

        parent::__construct(false, $this->__('Appointmind Calendar'), array('description' => $this->__('Displays a link to your calendar in the sidebar. A click on that link opens a popup window.')));
    }

    /**
     * Widget output
     */
    public function widget($args, $instance)
    {
        $settings = $this->settings->readSettings();

        $this->view = (object) array_merge((array) $this->view, $settings);

        if (empty($this->view->calendarUrl) or $this->view->calendarUrl == 'http://') {
            return false;
        }

        extract($args);

        $view = $this->view;

        $title = apply_filters('widget_title', $this->__('Schedule an Appointment'), $instance);
        include dirname(__FILE__) . '/templates/widget.php';
    }

    public function update( $new_instance, $old_instance )
    {
        // Save widget options
    }

    public function form( $instance )
    {
        // Output admin widget options form
    }

    /**
     * Read general settings
     */
    private function readSettings()
    {
        foreach ($this->options AS $key => $val)
        {
            $this->view->{$key} = $option[$key] = stripslashes(get_option($this->settingOptionName . '-' . $key, $this->options[$key]));
        }

        return $option;
    }

    /**
     * Translate
     */
    public function __($string)
    {
        return __($string, $this->settings->settingOptionName);
    }
}