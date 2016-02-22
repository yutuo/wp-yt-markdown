<?php
if (!defined('ABSPATH')) exit;

if ($_POST[WpYtMarkdownConfig::CONFIG_OPTIONS_KEY]) {
    $postOptions = $_POST[WpYtMarkdownConfig::CONFIG_OPTIONS_KEY];

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
    update_option(WpYtMarkdownConfig::CONFIG_OPTIONS_KEY, $this->options);
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
                    <th scope="row"><?php echo __('Code theme inline', 'wp_ae') ?>(theme)</th>
                    <td><select name="wp_ymd_options[themeinline]" id="themeinline">
                            <?php $this->optionsHtml($this->options['themeinline'], WpYtMarkdownConfig::$THEMES)?>
                        </select></td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Code theme', 'wp_ae') ?>(theme)</th>
                    <td><select name="wp_ymd_options[theme]" id="theme">
                            <?php $this->optionsHtml($this->options['theme'], WpYtMarkdownConfig::$THEMES)?>
                    </select></td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Line height', 'wp_ae') ?>(lineheight)</th>
                    <td><select name="wp_ymd_options[lineheight]" id="lineheight">
                            <?php $this->optionsHtml($this->options['lineheight'], WpYtMarkdownConfig::$LINE_HEIGHT)?>
                        </select>%</td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Font size', 'wp_ae') ?>(fontsize)</th>
                    <td><select name="wp_ymd_options[fontsize]" id="fontsize">
                            <?php $this->optionsHtml($this->options['fontsize'], WpYtMarkdownConfig::$FONT_SIZE)?>
                        </select>px</td>
                </tr>
            </table>
            <p class="submit">
                <input name="submit" type="submit" class="button-primary"
                    value="<?php echo __('Save Changes', 'wp_ae') ?>" />
            </p>
        </form>
    </div>
</div>