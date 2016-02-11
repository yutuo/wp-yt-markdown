var YtMarkdown = {
    highLightAll: function (options) {
        var $ = jQuery;

        function getLangFromClass(className) {
            var regexp = /lang(?:uage)?-(\w+)/i;
            var match = regexp.exec(className);
            var lang = 'Plain Text';
            if (match != null) {
                lang = match[1];
            }
            var langInfo = CodeMirror.findModeByName(lang) || CodeMirror.findModeByExtension(lang);
            if (langInfo != null) {
                return langInfo.mime;
            } else {
                return lang;
            }
        }

        $('code').each(function () {
            var hideItem = $(this);
            var language =　getLangFromClass(hideItem.attr('class'));

            var code = hideItem.text();

            if (hideItem.eq(0).parent().get(0).tagName === 'PRE') {
                hideItem = hideItem.eq(0).parent();
                var divItem = $('<div></div>');
                hideItem.after(divItem);
                hideItem.hide();
                divItem.show();

                var myCodeMirror = CodeMirror(divItem.get(0), {
                    value: code,
                    mode: language,
                    theme: options.theme,
                    lineNumbers: true,
                    readOnly: true
                });

            } else {
                var divItem = $('<div class="CodeMirror cm-inline cm-s-' + options.themeinline + '"></div>');
                hideItem.after(divItem);
                hideItem.hide();
                divItem.show();
                CodeMirror.runMode(code, language, divItem.get(0));
            }
        });
    }
}