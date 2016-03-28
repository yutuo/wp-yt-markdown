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

            <table class="form-table">
                <tr>
                    <td scope="row"><?php echo __('MdEditor.yt(CodeMirror) theme', 'wp_ymd') ?></td>
                    <td><select name="wp_ymd_options[cmtheme]" id="cmtheme">
                            <?php $this->optionsHtml($this->options['cmtheme'], WpYtMarkdownConfig::$CM_THEMES)?>
                    </select></td>
                </tr>
                <tr>
                    <td scope="row"><?php echo __('HighLight Code theme', 'wp_ymd') ?></td>
                    <td><select name="wp_ymd_options[hltheme]" id="hltheme">
                            <?php $this->optionsHtml($this->options['hltheme'], WpYtMarkdownConfig::$HL_THEMES)?>
                        </select></td>
                </tr>
            </table>

            <p class="submit">
                <input name="submit" type="submit" class="button-primary"
                    value="<?php echo __('Save Changes', 'wp_ymd') ?>" />
            </p>
        </form>
    </div>
</div>