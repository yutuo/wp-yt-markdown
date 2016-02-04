<?php
/**
 * Plugin Name: WP Yt Markdown
 * Plugin URI: http://yutuo.net/archives/f685d2dbbb176e86.html
 * Description: This plugin is code syntax highlighter based on <a href="http://ace.ajax.org/">Ace Editor</a> V1.0.3. Supported languages: Bash, C++, CSS, Delphi, Java, JavaScript, Perl, PHP, Python, Ruby, SQL, VB, XML, XHTML and HTML etc.
 * Version: 0.0.1
 * Author: yutuo
 * Author URI: http://yutuo.net
 * Text Domain: wp_ymd
 * Domain Path: /wp_ymd
 * License: GPL v3 - http://www.gnu.org/licenses/gpl.html
 */

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
        wp_enqueue_script("jquery");
    }

    /** 在Wordpress头部添加CSS */
    function insertHeadCss()
    {
        $html = <<<HTML
HTML;
        echo $html;
    }

    /** 在Wordpress尾部添加JavaScript */
    function insertFootJs()
    {
        $html = <<<HTML
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
            include(dirname(__FILE__) . '/inc/wp_yt_markdown_post.php');
        }
    }

    /**
     * 保存处理
     * @param $post_data
     * @param $post_arr
     */
    function insertPostData($post_data, $post_arr)
    {
        if (isset($_POST['mdContent-html-code'])) {
            $post_data['post_content'] = $_POST['mdContent-html-code'];
            $post_data['post_content_filtered'] = $_POST['mdContent-markdown-doc'];
        }
        return $post_data;
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
add_action('wp_head', array($wpYtMarkdown, 'insertHeadCss'));
// 在Wordpress尾部添加JavaScript
add_action('wp_footer', array($wpYtMarkdown, 'insertFootJs'));
// 管理页面
add_action('admin_menu', array($wpYtMarkdown, 'menuLink'));
// 插件链接
add_action('plugin_action_links', array($wpYtMarkdown, 'actionLink'), 10, 2);
// 提交画面添加按钮
add_action('admin_footer', array($wpYtMarkdown, 'addAdminFooter'));
// 保存数据的处理
add_filter('wp_insert_post_data', array($wpYtMarkdown, 'insertPostData'), 10, 2);
// 修改处理
add_filter('edit_post_content', array($wpYtMarkdown, 'editPostContent'), 10, 2);


