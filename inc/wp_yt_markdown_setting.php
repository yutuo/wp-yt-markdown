<?php
if (!defined('ABSPATH')) exit;

if ($_POST[WpYtMarkdownConfig::CONFIG_OPTIONS_KEY]) {
    $postOptions = $_POST[WpYtMarkdownConfig::CONFIG_OPTIONS_KEY];
    $checkedOptions = array();
    $checkOptionsInfo = WpYtMarkdownConfig::getCheckInfos();
    foreach ($checkOptionsInfo as $key => $value) {
        if (array_key_exists($key, $postOptions) && in_array($postOptions[$key], $value)) {
            $checkedOptions[$key] = $postOptions[$key];
        } else {
            $checkedOptions[$key] = WpYtMarkdownConfig::$DEFAULT_OPTION[$key];
        }
    }
    $this->options = $checkedOptions;
    update_option(WpYtMarkdownConfig::CONFIG_OPTIONS_KEY, $this->options);
}
?>

<div class="wrap">
    <h2><?php echo __('Wp Yt Markdown', 'wp_ytm') ?></h2>
    <div class="narrow">
        <form method="post">
            <p><?php echo __('Wp Yt Markdown is a plugin what can edit your post as markdown, and highLight code in page.', 'wp_ytm') ?></p>
            <h3><?php echo __('System Settings', 'wp_ytm') ?></h3>
            <p><?php echo __('Please enter your system config.', 'wp_ytm') ?></p>

            <h4><?php echo __('Block Code HighLight Setting', 'wp_ytm') ?></h4>

            <table class="form-table">
                <tr>
                    <td scope="row"><?php echo __('Code theme', 'wp_ytm') ?></td>
                    <td><select name="wp_ymd_options[theme]" id="theme">
                            <?php $this->optionsHtml($this->options['theme'], WpYtMarkdownConfig::$THEMES)?>
                    </select></td>
                </tr>
                <tr>
                    <td scope="row"><?php echo __('Line height', 'wp_ytm') ?></td>
                    <td><select name="wp_ymd_options[lineheight]" id="lineheight">
                            <?php $this->optionsHtml($this->options['lineheight'], WpYtMarkdownConfig::$LINE_HEIGHT)?>
                        </select>%</td>
                </tr>
                <tr>
                    <td scope="row"><?php echo __('Font size', 'wp_ytm') ?></td>
                    <td><select name="wp_ymd_options[fontsize]" id="fontsize">
                            <?php $this->optionsHtml($this->options['fontsize'], WpYtMarkdownConfig::$FONT_SIZE)?>
                        </select>px</td>
                </tr>
            </table>

            <h4><?php echo __('Inline Code HighLight Setting', 'wp_ytm') ?></h4>

            <table class="form-table">
                <tr>
                    <td scope="row"><?php echo __('Code theme', 'wp_ytm') ?></td>
                    <td><select name="wp_ymd_options[themeinline]" id="themeinline">
                            <?php $this->optionsHtml($this->options['themeinline'], WpYtMarkdownConfig::$THEMES)?>
                        </select></td>
                </tr>
                <tr>
                    <td scope="row"><?php echo __('Line height', 'wp_ytm') ?></td>
                    <td><select name="wp_ymd_options[lineheightinline]" id="lineheightinline">
                            <?php $this->optionsHtml($this->options['lineheightinline'], WpYtMarkdownConfig::$LINE_HEIGHT)?>
                        </select>%</td>
                </tr>
                <tr>
                    <td scope="row"><?php echo __('Font size', 'wp_ytm') ?></td>
                    <td><select name="wp_ymd_options[fontsizeinline]" id="fontsizeinline">
                            <?php $this->optionsHtml($this->options['fontsizeinline'], WpYtMarkdownConfig::$FONT_SIZE)?>
                        </select>px</td>
                </tr>
            </table>

            <p class="submit">
                <input name="submit" type="submit" class="button-primary"
                    value="<?php echo __('Save Changes', 'wp_ytm') ?>" />
            </p>
        </form>
    </div>
</div>