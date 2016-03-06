<?php
if (!defined('ABSPATH')) exit;

if ($_POST[WpYtMarkdownConfig::CONFIG_OPTIONS_KEY]) {
    $postOptions = $_POST[WpYtMarkdownConfig::CONFIG_OPTIONS_KEY];
    $safePostOptions = array();;
    foreach ($postOptions as $key => $value) {
        $safePostOptions[sanitize_text_field($key)] = sanitize_text_field($value);
    }

    $checkedOptions = array();
    $checkOptionsInfo = WpYtMarkdownConfig::getCheckInfos();
    foreach ($checkOptionsInfo as $key => $value) {
        if (array_key_exists($key, $safePostOptions) && in_array($safePostOptions[$key], $value)) {
            $checkedOptions[$key] = sanitize_text_field($safePostOptions[$key]);
        } else {
            $checkedOptions[$key] = WpYtMarkdownConfig::$DEFAULT_OPTION[$key];
        }
    }
    $this->options = $checkedOptions;
    update_option(WpYtMarkdownConfig::CONFIG_OPTIONS_KEY, $this->options);
}
?>

<div class="wrap">
    <h2><?php echo __('Wp Yt Markdown', 'wp_ymd') ?></h2>
    <div class="narrow">
        <form method="post">
            <p><?php echo __('Wp Yt Markdown is a plugin what can edit your post as markdown, and highLight code in page.', 'wp_ymd') ?></p>
            <h3><?php echo __('System Settings', 'wp_ymd') ?></h3>
            <p><?php echo __('Please enter your system config.', 'wp_ymd') ?></p>

            <h4><?php echo __('Block Code HighLight Setting', 'wp_ymd') ?></h4>

            <table class="form-table">
                <tr>
                    <td scope="row"><?php echo __('Code theme', 'wp_ymd') ?></td>
                    <td><select name="wp_ymd_options[theme]" id="theme">
                            <?php $this->optionsHtml($this->options['theme'], WpYtMarkdownConfig::$THEMES)?>
                    </select></td>
                </tr>
                <tr>
                    <td scope="row"><?php echo __('Line height', 'wp_ymd') ?></td>
                    <td><select name="wp_ymd_options[lineheight]" id="lineheight">
                            <?php $this->optionsHtml($this->options['lineheight'], WpYtMarkdownConfig::$LINE_HEIGHT)?>
                        </select>%</td>
                </tr>
                <tr>
                    <td scope="row"><?php echo __('Font size', 'wp_ymd') ?></td>
                    <td><select name="wp_ymd_options[fontsize]" id="fontsize">
                            <?php $this->optionsHtml($this->options['fontsize'], WpYtMarkdownConfig::$FONT_SIZE)?>
                        </select>px</td>
                </tr>
            </table>

            <h4><?php echo __('Inline Code HighLight Setting', 'wp_ymd') ?></h4>

            <table class="form-table">
                <tr>
                    <td scope="row"><?php echo __('Code theme', 'wp_ymd') ?></td>
                    <td><select name="wp_ymd_options[themeinline]" id="themeinline">
                            <?php $this->optionsHtml($this->options['themeinline'], WpYtMarkdownConfig::$THEMES)?>
                        </select></td>
                </tr>
                <tr>
                    <td scope="row"><?php echo __('Line height', 'wp_ymd') ?></td>
                    <td><select name="wp_ymd_options[lineheightinline]" id="lineheightinline">
                            <?php $this->optionsHtml($this->options['lineheightinline'], WpYtMarkdownConfig::$LINE_HEIGHT)?>
                        </select>%</td>
                </tr>
                <tr>
                    <td scope="row"><?php echo __('Font size', 'wp_ymd') ?></td>
                    <td><select name="wp_ymd_options[fontsizeinline]" id="fontsizeinline">
                            <?php $this->optionsHtml($this->options['fontsizeinline'], WpYtMarkdownConfig::$FONT_SIZE)?>
                        </select>px</td>
                </tr>
            </table>

            <p class="submit">
                <input name="submit" type="submit" class="button-primary"
                    value="<?php echo __('Save Changes', 'wp_ymd') ?>" />
            </p>
        </form>
    </div>
</div>