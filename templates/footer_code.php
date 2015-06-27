<script type="text/javascript" src="<?php echo WP_PLUGIN_URL ?>/appointmind/js/jquery.ba-postmessage.min.js"></script>
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