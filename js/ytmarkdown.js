var YtMarkdown = {
    highLightAll: function(options) {
        var $ = jQuery;
        $('code').each(function() {           
            var $hideItem = $(this);
            var $code = $hideItem.html();
            
            if ($hideItem.eq(0).parent().get(0).tagName === 'PRE') {
                $hideItem = $hideItem.eq(0).parent();
                var $divItem = $('<div></div>');
                $hideItem.after($divItem);
                $hideItem.hide();
                $divItem.show();
                
                var myCodeMirror = CodeMirror($divItem.get(0), {
                    value: $code,
                    mode: 'javascript',
                    theme: 'monokai',
                    lineNumbers: true,
                    readOnly: true
                });
                
            } else {
                var $spanItem = $('<span>ddddddddd</span>');
                $hideItem.after($spanItem);
                $hideItem.hide();
                $spanItem.show();
                
                
            }

            
        });
    }
}