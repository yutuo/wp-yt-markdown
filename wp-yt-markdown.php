<?php
/**
 * Plugin Name: WP Yt Markdown
 * Plugin URI: https://yutuo.net/archives/4435fbf59f6928c5.html
 * Description: This plugin is Markdown editor based on <a href="https://pandao.github.io/editor.md/">editor.md</a>.
 * Version: 0.0.3
 * Author: yutuo
 * Author URI: http://yutuo.net
 * Text Domain: wp_ymd
 * Domain Path: /wp_ymd
 * License: GPL v3 - http://www.gnu.org/licenses/gpl.html
 */

if (!defined('ABSPATH')) exit;

require_once(dirname(__FILE__) . '/inc/wp_yt_markdown_config.php');

class WpYtMarkdown
{
    /** 本Plugin文件夹实际目录 */
    var $pluginPath;
    /** 本Plugin的URL路径 */
    var $pluginUrl;
    /** 设置 */
    var $options;
    var $options_json;

    /** 构造函数 */
    function __construct()
    {
        $this->pluginPath = dirname(__FILE__);
        $this->pluginUrl = plugins_url('', __FILE__);
        $this->options = get_option(WpYtMarkdownConfig::CONFIG_OPTIONS_KEY);
        $this->options_json = json_encode($this->options);
    }

    /** 启用 */
    function activate()
    {
        update_option(WpYtMarkdownConfig::CONFIG_OPTIONS_KEY, WpYtMarkdownConfig::$DEFAULT_OPTION);
    }

    /** 停用 */
    function deActivate()
    {
        delete_option(WpYtMarkdownConfig::CONFIG_OPTIONS_KEY);
    }

    /** 初始化 */
    function init()
    {
        load_plugin_textdomain('wp_ytm', false, $this->pluginPath . '/lang');
        wp_enqueue_script('jquery');
        if (is_admin()) {
            wp_enqueue_script('editor.md', $this->pluginUrl . '/editormd/editormd.min.js', array('jquery'));
            wp_enqueue_script('wp-yt-markdown-admin', $this->pluginUrl . '/js/wp-yt-markdown-admin.js', array('jquery', 'editor.md'));

            wp_enqueue_style('editor.md', $this->pluginUrl . '/editormd/css/editormd.min.css');
        } else {
            wp_enqueue_script('codemirror', $this->pluginUrl . '/editormd/lib/codemirror/codemirror.min.js', array('jquery'));
            wp_enqueue_script('wp-yt-markdown', $this->pluginUrl . '/js/wp-yt-markdown.js', array('jquery', 'codemirror'));

            wp_enqueue_style('codemirror', $this->pluginUrl . '/editormd/lib/codemirror/codemirror.min.css');
            if ($this->options['theme'] !== 'default') {
                wp_enqueue_style('codemirror-theme', $this->pluginUrl . '/editormd/lib/codemirror/theme/' . $this->options['theme'] . '.css');
            }
            if ($this->options['themeinline'] !== 'default' && $this->options['themeinline'] !== $this->options['theme']) {
                wp_enqueue_style('codemirror-inline', $this->pluginUrl . '/editormd/lib/codemirror/theme/' . $this->options['themeinline'] . '.css');
            }
            wp_enqueue_style('wp-yt-markdown', $this->pluginUrl . '/css/wp-yt-markdown.css');
        }
    }

    /** 在Wordpress头部添加CSS */
    function insertHeadHtml()
    {
        $html = <<<HTML
<style type="text/css">
.CodeMirror {
  font-size: {$this->options[fontsize]}px;
  line-height: {$this->options[lineheight]}%;
}
.CodeMirror.cm-inline {
  font-size: {$this->options[fontsizeinline]}px;
  line-height: {$this->options[lineheightinline]}%;
}
</style>
HTML;
        echo $html;
    }

    /** 在Wordpress尾部添加JavaScript */
    function insertFootHtml()
    {
        $html = <<<HTML
<script type="text/javascript">
var wpYtMarkdownOptions = {
    cmModeUrl: "{$this->pluginUrl}/editormd/lib/codemirror/mode/%N/%N.js",
    highLight: {$this->options_json}
}
</script>
HTML;
        echo $html;
    }

    /** 在设置菜单添加链接 */
    function menuLink()
    {
        add_options_page('Wp Yt Markdown Settings', __('Wp Yt Markdown', 'wp_ymd'), 'manage_options', 'wpYtMarkdown',
            array($this, 'optionPage'));
    }

    /** 插件设置链接 */
    function actionLink($links, $file)
    {
        if ($file !== plugin_basename(__FILE__)) {
            return $links;
        }
        $settings_link = '<a href="options-general.php?page=wpYtMarkdown">' . __('Settings') . '</a>';
        array_unshift($links, $settings_link);
        return $links;
    }

    /** 插件设置页面 */
    function optionPage()
    {
        $current_path = $this->pluginPath . '/inc/wp_yt_markdown_setting.php';
        include $current_path;
    }

    /** 添加按钮的处理方法 */
    function addAdminFooter()
    {
        global $pagenow;
        if ($pagenow == 'post.php' || $pagenow == 'post-new.php') {
            $html = <<<HTML
<script type="text/javascript">
var wpYtMarkdownOptions = {
    cmLibUrl: "{$this->pluginUrl}/editormd/lib/",
    highLight: {$this->options_json}
}
</script>
HTML;
            echo $html;
        }
    }

    /**
     * 修改处理
     * @param $content
     * @param $id
     * @return string
     */
    function editPostContent($content, $id)
    {
        $post = get_post($id);
        if ($post && !empty($post->post_content_filtered)) {
            return $post->post_content_filtered;
        } else {
            return $content;
        }
    }

    function optionsHtml($selectValue, $list, $default = false)
    {
        $default_txt = __('Default', 'wp_ae');
        if ($default) {
            echo "<option value=\"\" selected>{$default_txt}</option>";
        }
        foreach ($list as $key => $value) {
            $selected = '';
            if (is_bool($selectValue)) {
                $selectValue = $selectValue ? 'true' : 'false';
            }
            if (!$default && $key == $selectValue) {
                $selected = ' selected';
            }
            echo "<option value=\"{$key}\"{$selected}>{$value}</option>";
        }
    }
}

// 禁用富文本
add_filter('user_can_richedit', '__return_false');

$wpYtMarkdown = new WpYtMarkdown();
// 启用
register_activation_hook(__FILE__, array($wpYtMarkdown, 'activate'));
// 停用
register_deactivation_hook(__FILE__, array($wpYtMarkdown, 'deActivate'));
// 初始化
add_action('init', array($wpYtMarkdown, 'init'));
// 在Wordpress头部添加CSS
add_action('wp_head', array($wpYtMarkdown, 'insertHeadHtml'));
// 在Wordpress尾部添加JavaScript
add_action('wp_footer', array($wpYtMarkdown, 'insertFootHtml'));
// 管理页面
add_action('admin_menu', array($wpYtMarkdown, 'menuLink'));
// 插件链接
add_action('plugin_action_links', array($wpYtMarkdown, 'actionLink'), 10, 2);
// 提交画面添加按钮
add_action('admin_footer', array($wpYtMarkdown, 'addAdminFooter'));
// 修改处理
add_filter('edit_post_content', array($wpYtMarkdown, 'editPostContent'), 10, 2);


