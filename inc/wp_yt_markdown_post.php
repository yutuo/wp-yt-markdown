<link rel="stylesheet" href="<?php echo $this->pluginUrl ?>/css/editormd.css"/>
<script type="text/javascript"
        src="<?php echo $this->pluginUrl ?>/js/editormd.js"></script>
<script type="text/javascript">
    jQuery(function () {
        var $ = jQuery;
        var contentItem = $('#content');
        var content = contentItem.val();
        contentItem.attr("disabled", "disabled");

        var markdownContainer = $('<div id="mdContent"></div>');
        var editContainer = $('#wp-content-editor-container');
        editContainer.after(markdownContainer);
        editContainer.hide();
        markdownContainer.show();

        editormd("mdContent", {
            width: "100%",
            height: 700,
            path: "<?php echo $this->pluginUrl ?>/lib/",
            markdown: content,
            saveHTMLToTextarea: true
        });
    });
</script>