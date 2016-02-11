<link rel="stylesheet" href="<?php echo $this->pluginUrl ?>/editormd/css/editormd.min.css"/>
<script type="text/javascript"
        src="<?php echo $this->pluginUrl ?>/editormd/editormd.min.js"></script>
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
            path: "<?php echo $this->pluginUrl ?>/editormd/lib/",
            markdown: content,
            name: "post_content_filtered",
            htmlCodeName: "post_content",
            saveHTMLToTextarea: true,
			htmlDecode: true
        });
    });
</script>