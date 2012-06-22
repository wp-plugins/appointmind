<?php
/**
 * Settings class
 */
class AppointmindSettings
{
    /**
    * Placeholder name for including the calendar
    */
    public $placeHolder = 'appointmind_calendar';

        /**
    * Setting option name
    */
    public $settingOptionName = 'appointmind';

    /**
    * General settings options
    */
    private $options =  array(
        'calendarUrl' => 'http://',
        'iframeWidth' => '100%',
        'iframeHeight' => '1300px',
        'popupWidth' => '700px',
        'popupHeight' => '600px',
        );

    /**
     * Register Hooks and do other constructing stuff
     */
    public function __construct()
    {
        $this->view = new stdClass;
        $this->view->placeHolder = $this->placeHolder;
        $this->view->settingOptionName = $this->settingOptionName;
    }

    /**
     * Load settings
     */
    public function settingsMenu()
    {
        add_options_page($this->__('Appointmind Calendar'), $this->__('Appointmind Calendar'), 10, $this->settingOptionName . '-settings', array(&$this, 'settings'));
    }

    public function settings()
    {
        $option = array();
        $message = array();
        $tab = $this->settingsTab();
        $this->editGeneralSettings();
        $option = $this->readSettings();

        $view = $this->view;

        include dirname(__FILE__) . '/templates/' . $tab . '_settings.php';
    }

    /**
     * Edit general settings
     */
    private function editGeneralSettings()
    {
        if (!empty($_POST)) {
            foreach ($this->options AS $key => $val)
            {
                if (!isset($_POST[$key])) {
                    continue;
                }
                update_option($this->settingOptionName . '-' . $key, $_POST[$key]);
            }
        }
    }

    /**
     * Check wich tab is seelcted
     */
    private function settingsTab()
    {
        $availableTabs = array('general');
        $tab = 'general';
        if (isset($_GET['tab']) and in_array($_GET['tab'], $availableTabs)) {
            $tab = $_GET['tab'];
        }
        return $tab;
    }

    /**
     * Read general settings
     */
    public function readSettings()
    {
        foreach ($this->options AS $key => $val)
        {
            $option[$key] = stripslashes(get_option($this->settingOptionName . '-' . $key, $this->options[$key]));
        }

        return $option;
    }

    /**
     * Translate
     */
    public function __($string)
    {
        return __($string, $this->settingOptionName);
    }
}