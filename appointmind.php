<?php
/**
* @package Appointmind
*/
/*
Plugin Name: Appointmind
Plugin URI: http://www.gentlesource.com/
Description: Include your Appointmind or Schedule Organizer online appointment scheduling calender in any article or in the sidebar. This plugin requires that you have purchased either a monthly subscription or the downloadable version of the software. This plugin does not include the appointmind scheduling software. You can get the subscription or the software at <a href="http://www.schedule-organizer.de/en/?tracking=wordpress" target="_blank">Schedule Organizer</a>.
Version: 2.0
Author: GentleSource
Author URI: http://www.gentlesource.com/
Text Domain: appointmind
Domain Path: /languages
*/
require_once dirname(__FILE__) . '/settings.php';
require_once dirname(__FILE__) . '/widget.php';

/**
 *
 */
class Appointmind
{
    /**
     * View object
     */
    private $view = null;

    /**
     * Settings
     */
    private $settings = null;

    /**
     * Register Hooks and do other constructing stuff
     */
    public function __construct()
    {
	    add_shortcode('appointmind_calendar', array(&$this, 'displayArticleCalendarShortCode'));
	    add_filter('the_content', array(&$this, 'displayArticleCalendar'));
	    add_action('widgets_init', array(&$this, 'registerSidebarWidget'));
	    add_action('init', array(&$this, 'defineLocale'));

	    $this->settings = new AppointmindSettings;
        add_action('admin_menu', array(&$this->settings, 'settingsMenu'));


        $this->view = new stdClass;
        $this->view->placeHolder = $this->settings->placeHolder;
        $this->view->settingOptionName = $this->settings->settingOptionName;
    }

    /**
     * Define locale stuff
     */
    public function defineLocale()
    {
	    load_plugin_textdomain($this->settings->settingOptionName, dirname(__FILE__) . '/languages', basename(dirname(__FILE__)) . '/languages');
    }


    /**
     * Display calendar in article
     */
    public function displayArticleCalendar($content)
    {
        if (strpos($content, '{' . $this->settings->placeHolder . '}') === false) {
            return $content;
        }

        $settings = $this->settings->readSettings();

        $this->view = (object) array_merge((array) $this->view, $settings);

        if (empty($this->view->calendarUrl) or $this->view->calendarUrl == 'http://') {
            return str_replace('{' . $this->settings->placeHolder . '}', '', $content);
        }

        $calendarContent = '';
        $view = $this->view;

    	ob_start();
        include dirname(__FILE__) . '/templates/article_calendar.php';
        $calendarContent = ob_get_contents();
        ob_end_clean();

        $content = str_replace('{' . $this->settings->placeHolder . '}', $calendarContent, $content);

        return $content;
    }


    /**
     * Display calendar in article
     */
    public function displayArticleCalendarShortCode()
    {
        $settings = $this->settings->readSettings();

        $this->view = (object) array_merge((array) $this->view, $settings);

        if (empty($this->view->calendarUrl) or $this->view->calendarUrl == 'http://') {
            return '';
        }

        $calendarContent = '';
        $view = $this->view;

    	ob_start();
        include dirname(__FILE__) . '/templates/article_calendar.php';
        $calendarContent = ob_get_contents();
        ob_end_clean();

        return $calendarContent;
    }

    /**
     * Register sidebar widget
     */
    public function registerSidebarWidget()
    {
        register_widget('AppointmindWidget');
    }

    /**
     * Translate
     */
    public function __($string)
    {
        return __($string, $this->settings->settingOptionName);
    }
}

new Appointmind;