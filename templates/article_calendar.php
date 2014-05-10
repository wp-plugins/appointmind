<?php /*
<iframe
    src="<?php echo $view->calendarUrl ?>"
    style="border:none;width:<?php echo $view->iframeWidth ?>;height:<?php echo $view->iframeHeight ?>;padding:0;margin:0;"
    frameborder="0">
</iframe>
*/?>


<div id="iframe"></div>
<script type="text/javascript">
jQuery(function(){
    var if_height,
    src = '<?php echo $appointmindUrlDomain.$appointmindUrlPath.$appointmindUrlParameters ?>#' + encodeURIComponent(document.location.href),
    iframe = jQuery('<iframe " src="' + src + '" width="<?php echo $view->iframeWidth ?>" height="<?php echo $view->iframeHeight ?>" scrolling="no" frameborder="0"><\/iframe>').appendTo('#iframe');
    jQuery.receiveMessage(function(e) {
        var h = Number(e.data.replace( /.*if_height=(\d+)(?:&|$)/, '$1'));
        if (!isNaN(h) && h > 0 && h !== if_height) {
            iframe.height(if_height = h);
        }
    }, '<?php echo $appointmindUrlDomain ?>');
});
</script>
<noscript>
<iframe
    src="<?php echo $appointmindUrlDomain.$appointmindUrlPath.$appointmindUrlParameters ?>"
    style="border:none;width:<?php echo $view->iframeWidth ?>;height:<?php echo $view->iframeHeight ?>;padding:0;margin:0;"
    frameborder="0">
</iframe>
</noscript>