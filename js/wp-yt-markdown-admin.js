var YtMarkdown = {
    conventToMarkdown: function(options) {
        var $ = jQuery;
        var contentItem = $('#content');
        var content = contentItem.val();
        contentItem.attr("disabled", "disabled");

        var markdownContainer = $('<div id="mdContent"></div>');
        var editContainer = $('#wp-content-editor-container');
        editContainer.after(markdownContainer);
        editContainer.hide();
        markdownContainer.show();

        var mdEditorYt = MdEditorYt("mdContent", {
            width: "100%",
            height: 700,
            linkify: false,
            useEmoji: false,
            value: content,
            mdValueName: "post_content_filtered",
            htmlValueName: "post_content"
        });
        mdEditorYt.setTheme(options.highLight.cmtheme);
    }
};

jQuery(function () {
    if (typeof wpYtMarkdownOptions != 'undefined') {
        YtMarkdown.conventToMarkdown(wpYtMarkdownOptions);
    }
});