<div id="icon-themes" class="icon32"><br></div>
<h2 class="nav-tab-wrapper">
	<a class="nav-tab <?php echo $tab == 'general' ? 'nav-tab-active' : '' ?>" href="?page=<?php echo $view->settingOptionName ?>-settings&tab=general"><?php echo $this->__('General Settings') ?></a>
</h2>

<p><?php echo sprintf($this->__('In order to display the calendar, put the placeholder <strong>%s</strong> at the position in your article where you want the calendar to appear.'), '{' . $view->placeHolder . '}')?></p>

<form method="post" action="./options-general.php?page=<?php echo $view->settingOptionName ?>-settings&tab=general" id="<?php echo $view->settingOptionName ?>_settings" style="margin-top:2em;margin-left:1em;">

<table class="form-table">


  <tr valign="top">
    <th scope="row">
        <label for="calendarUrl" style="font-weight:bold;"><?php echo $this->__('Calendar URL') ?></label>
        <p><?php echo $this->__('Enter here the location of your calendar installation, either on your server or on Appointmind.') ?></p>
    </th>
  </tr>
  <tr>
    <td>
        <input type="text" name="calendarUrl" id="calendarUrl" style="width:550px;" value="<?php echo $option['calendarUrl'] ?>" />
    </td>
  <tr>


  <tr valign="top">
    <th scope="row">
        <label for="iframeWidth" style="font-weight:bold;"><?php echo $this->__('Iframe Dimensions') ?></label>
        <p><?php echo $this->__('Enter here the width and height of the iframe that is being displayed in your article(s). Valid units are px and %.') ?></p>
    </th>
  </tr>
  <tr>
    <td>
    	<?php echo $this->__('Width') ?>
        <input type="text" name="iframeWidth" id="iframeWidth" style="width:50px;" value="<?php echo $option['iframeWidth'] ?>" />
        <?php echo $this->__('Height') ?>
        <input type="text" name="iframeHeight" id="iframeHeight" style="width:50px;" value="<?php echo $option['iframeHeight'] ?>" />
    </td>
  <tr>


  <tr valign="top">
    <th scope="row">
        <label for="popupWidth" style="font-weight:bold;"><?php echo $this->__('Popup Dimensions') ?></label>
        <p><?php echo $this->__('Enter here the width and height of the popup window that is being opened by a link in your sidebar if a visitor clicks on it. Valid units are px and %.') ?></p>
    </th>
  </tr>
  <tr>
    <td>
    	<?php echo $this->__('Width') ?>
        <input type="text" name="popupWidth" id="popupWidth" style="width:50px;" value="<?php echo $option['popupWidth'] ?>" />
        <?php echo $this->__('Height') ?>
        <input type="text" name="popupHeight" id="popupHeight" style="width:50px;" value="<?php echo $option['popupHeight'] ?>" />
    </td>
  <tr>


  <tr valign="top">
    <th scope="row">
        <input type="submit" name="save" value="<?php echo $this->__('Save') ?>" />
    </th>
    <td>

    </td>
  <tr>

</table>


</form>
