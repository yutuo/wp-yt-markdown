var YtMarkdown = {
    highlightCode: function (items, options) {
        var $ = jQuery;

        function getModeFromClass(className) {
            var regexp = /lang(?:uage)?-(\w+)/i;
            var match = regexp.exec(className);
            var mode = null;
            if (match) {
                mode = CodeMirror.findModeByName(match[1]) || CodeMirror.findModeByExtension(match[1]);
            }
            if (!mode) {
                mode = CodeMirror.findModeByName("Plain Text");
            }
            return mode;
        }

        items.each(function (index, item) {
            var hideItem = $(item);
            var langMode = getModeFromClass(hideItem.attr("class"));
            var code = hideItem.text();
            var divItem;

            if (hideItem.eq(0).parent().get(0).tagName === "PRE") {
                hideItem = hideItem.eq(0).parent();
                divItem = $("<div></div>");
                hideItem.after(divItem);
                hideItem.hide();
                divItem.show();

                var editor = new CodeMirror(divItem.get(0), {
                    value: code,
                    mode: langMode.mode,
                    theme: options.theme,
                    lineNumbers: true,
                    readOnly: true,
                    autofocus: false
                });
                if (options.autoLoadMode) {
                    CodeMirror.autoLoadMode(editor, langMode.mode);
                }
            } else {
                divItem = $("<div class=\"CodeMirror cm-inline cm-s-" + options.themeinline + "\"></div>");
                hideItem.after(divItem);
                if (options.autoLoadMode) {
                    CodeMirror.requireMode(langMode.mode, function () {
                        hideItem.hide();
                        divItem.show();
                        CodeMirror.runMode(code, langMode.mode, divItem.get(0));
                    });
                }
                else {
                    hideItem.hide();
                    divItem.show();
                    CodeMirror.runMode(code, langMode.mode, divItem.get(0));
                }
            }
        });
    }
}

jQuery(function () {
    if (typeof wpYtMarkdownOptions != 'undefined') {
        CodeMirror.modeURL = wpYtMarkdownOptions.cmModeUrl;
        var options = wpYtMarkdownOptions.highLight;
        options.autoLoadMode = true;
        YtMarkdown.highlightCode(jQuery('code'), options);
    }
});