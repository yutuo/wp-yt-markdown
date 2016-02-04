<?php
if ($_POST[WpAceeditorConfig::CONFIG_OPTIONS_KEY]) {
    $postOptions = $_POST[WpAceeditorConfig::CONFIG_OPTIONS_KEY];

    $int_items = array ('lineheight', 'fontsize', 'tabsize', 'wrap', 'maxsavecnt');
    $boolean_items = array ('readonly', 'tabtospace', 'indent', 'gutter', 'fold', 'active');
    $array_items = array ('convtag', 'convtype');
    foreach ($postOptions as $key => $value) {
        if (in_array($key, $int_items)) {
            $postOptions[$key] = intval($value);
        } else if (in_array($key, $boolean_items)) {
            $postOptions[$key] = ($value === 'true');
        } else if (in_array($key, $array_items)) {
            $postOptions[$key] = (array) $value;
        }
    }

    $this->options = array_merge($this->options, $postOptions);
    update_option(WpAceeditorConfig::CONFIG_OPTIONS_KEY, $this->options);
}
?>

<div class="wrap">
    <h2><?php echo __('Wp-AceEditor', 'wp_ae') ?></h2>
    <div class="narrow">
        <form method="post">
            <p><?php echo __('Ace Editor is a fully functional self-contained code syntax highlighter developed in JavaScript.', 'wp_ae') ?></p>
            <h3><?php echo __('System Settings', 'wp_ae') ?></h3>
            <p><?php echo __('Please enter your system config.', 'wp_ae') ?></p>

            <table class="form-table">
                <tr>
                    <th scope="row"><?php echo __('Convert tags', 'wp_ae') ?></th>
                    <td>
                        <?php $this->checkboxsHtml("wp_ae_options[convtag]", $this->options['convtag'], WpAceeditorConfig::$TAGS)?>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Convert types', 'wp_ae') ?></th>
                    <td>
                        <?php $this->checkboxsHtml("wp_ae_options[convtype]", $this->options['convtype'], WpAceeditorConfig::$TYPES)?>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Insert tag', 'wp_ae') ?></th>
                    <td><select name="wp_ae_options[inserttag]" id="inserttag">
                        <?php $this->optionsHtml($this->options['inserttag'], WpAceeditorConfig::$TAGS)?>
                    </select></td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Insert type', 'wp_ae') ?></th>
                    <td><select name="wp_ae_options[inserttype]" id="inserttype">
                        <?php $this->optionsHtml($this->options['inserttype'], WpAceeditorConfig::$TYPES)?>
                    </select></td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Display width', 'wp_ae') ?></th>
                    <td>
                        <input name="wp_ae_options[width]" id="width" value="<?php echo $this->options['width']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Background color', 'wp_ae') ?></th>
                    <td>
                        <input name="wp_ae_options[background]" id="background" value="<?php echo $this->options['background']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Max save lang count', 'wp_ae') ?></th>
                    <td>
                        <input type="number" min="1" max="99" name="wp_ae_options[maxsavecnt]" id="maxsavecnt" value="<?php echo $this->options['maxsavecnt']; ?>"/>
                    </td>
                </tr>
            </table>

            <h3><?php echo __('Settings', 'wp_ae') ?></h3>
            <p><?php echo __('Please enter your default config.', 'wp_ae') ?></p>
            <p
                style="font-family: Monaco, Menlo, Ubuntu Mono, Consolas, source-code-pro, monospace">
                &lt;pre lang="?"[ theme="?"][ fontsize="?"][
                tabsize="?"]&gt;<br />
<?php echo __('Your codes', 'wp_ae') ?><br /> &lt;/pre&gt;
            </p>

            <table class="form-table">
                <tr>
                    <th scope="row"><?php echo __('Code theme', 'wp_ae') ?>(theme)</th>
                    <td><select name="wp_ae_options[theme]" id="theme">
                            <optgroup label="Bright">
                                <?php $this->optionsHtml($this->options['theme'], WpAceeditorConfig::$THEMES_BRIGHT)?>
                            </optgroup>
                            <optgroup label="Dark">
                                <?php $this->optionsHtml($this->options['theme'], WpAceeditorConfig::$THEMES_DARK)?>
                            </optgroup>
                    </select></td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Read only', 'wp_ae') ?>(readonly)</th>
                    <td><select name="wp_ae_options[readonly]" id="readonly">
                            <?php $this->optionsHtml($this->options['readonly'], WpAceeditorConfig::$BOOLEAN)?>
                        </select></td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Line height', 'wp_ae') ?>(lineheight)</th>
                    <td><select name="wp_ae_options[lineheight]" id="lineheight">
                            <?php $this->optionsHtml($this->options['lineheight'], WpAceeditorConfig::$LINE_HEIGHT)?>
                        </select>%</td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Font size', 'wp_ae') ?>(fontsize)</th>
                    <td><select name="wp_ae_options[fontsize]" id="fontsize">
                            <?php $this->optionsHtml($this->options['fontsize'], WpAceeditorConfig::$FONT_SIZE)?>
                        </select>px</td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Tab size', 'wp_ae') ?>(tabsize)</th>
                    <td><select name="wp_ae_options[tabsize]" id="tabsize">
                            <?php $this->optionsHtml($this->options['tabsize'], WpAceeditorConfig::$TAB_SIZE)?>
                        </select></td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Tab to space', 'wp_ae') ?>(tabtospace)</th>
                    <td><select name="wp_ae_options[tabtospace]" id="tabtospace">
                            <?php $this->optionsHtml($this->options['tabtospace'], WpAceeditorConfig::$BOOLEAN)?>
                        </select></td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Auto wrap', 'wp_ae') ?>(wrap)</th>
                    <td><select name="wp_ae_options[wrap]" id="wrap">
                            <?php $this->optionsHtml($this->options['wrap'], WpAceeditorConfig::$BOOLEAN)?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Print margin Column', 'wp_ae') ?>(print)</th>
                    <td><select name="wp_ae_options[print]" id="print">
                            <?php $this->optionsHtml($this->options['print'], WpAceeditorConfig::$PRINT)?>
                        </select><?php echo __('Chars', 'wp_ae')?>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Show Indent Guides', 'wp_ae') ?>(indent)</th>
                    <td><select name="wp_ae_options[indent]" id="indent">
                            <?php $this->optionsHtml($this->options['indent'], WpAceeditorConfig::$BOOLEAN)?>
                        </select></td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Show Gutter', 'wp_ae') ?>(gutter)</th>
                    <td><select name="wp_ae_options[gutter]" id="gutter">
                            <?php $this->optionsHtml($this->options['gutter'], WpAceeditorConfig::$BOOLEAN)?>
                        </select></td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Folding Style', 'wp_ae') ?>(foldstyle)</th>
                    <td><select name="wp_ae_options[foldstyle]" id="foldstyle">
                            <?php $this->optionsHtml($this->options['foldstyle'], WpAceeditorConfig::$FOLD_STYLE)?>
                        </select></td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Code fold on load', 'wp_ae') ?>(fold)</th>
                    <td><select name="wp_ae_options[fold]" id="fold">
                            <?php $this->optionsHtml($this->options['fold'], WpAceeditorConfig::$BOOLEAN)?>
                        </select></td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Highlight Active Line', 'wp_ae') ?>(active)</th>
                    <td><select name="wp_ae_options[active]" id="active">
                            <?php $this->optionsHtml($this->options['active'], WpAceeditorConfig::$BOOLEAN)?>
                        </select></td>
                </tr>
            </table>
            <p class="submit">
                <input name="submit" type="submit" class="button-primary"
                    value="<?php echo __('Save Changes', 'wp_ae') ?>" />
            </p>
        </form>
        <h3><?php echo __('Preview', 'wp_ae') ?></h3>
        <p><?php echo __('You can input source to preview the result.', 'wp_ae') ?></p>
        <table class="form-table">
            <tr>
                <th scope="row"><?php echo __('Language', 'wp_ae') ?>(lang)</th>
                <td><select id="lang">
                        <?php $this->optionsHtml($this->options['lang'], WpAceeditorConfig::$LANGUAGES)?>
                    </select></td>
            </tr>
        </table>
        <pre id="testAceEditor" style="width: 98%">var func = function() {
    console.log("Hello, world!");
}
func();
</pre>
    </div>
</div>

<script type="text/javascript"
    src="<?php echo $this->currentUrl ?>/js/ace/ace.js"></script>
<script type="text/javascript"
    src="<?php echo $this->currentUrl ?>/js/wpaceeditor.js"></script>
<script type="text/javascript">
    var editor = null;
    var wpAceEditor = null;
    function setEditorHighLight() {
        var $ = jQuery;
        var options = {};
        options['readonly'] = false;
        options['width'] = '99%';
        if (wpAceEditor == null) {
            wpAceEditor = new WpAceEditor(options);
        }

        var htmloptions = $('select[name^=wp_ae_options]');
        for (var i = 0; i < htmloptions.length; i++) {
            var id = htmloptions.eq(i).attr('id');
            if (typeof(wpAceEditor.changeOptions[id]) !== 'undefined') {
                var convtentValue = wpAceEditor.changeOptions[id](htmloptions.eq(i).val());
                if (convtentValue !== null) {
                    options[id] = convtentValue;
                }
            }
        }
        options['lang'] = $('#lang').val();
        if (editor) {
            wpAceEditor.setOptions(editor, options);
        } else {
            editor = wpAceEditor.convertItem($('#testAceEditor'), options);
        }
    }
    (function(){
        var $ = jQuery;
        $(document).ready(function(){
            $('select[name^=wp_ae_options]').change(function() {
                setEditorHighLight();
            });
            $('#lang').change(function() {
                setEditorHighLight();
            });

            setEditorHighLight();
        });
    })();
</script>