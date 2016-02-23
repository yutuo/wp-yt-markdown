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

        editormd("mdContent", {
            width: "100%",
            height: 700,
            path: options.cmLibUrl,
            markdown: content,
            name: "post_content_filtered",
            htmlCodeName: "post_content",
            saveHTMLToTextarea: true,
            htmlDecode: true,
            theme: options.theme,
            themeinline: options.themeinline
        });
    }
};

jQuery(function () {
    if (wpYtMarkdownOptions) {
        YtMarkdown.conventToMarkdown(wpYtMarkdownOptions);
    }
});