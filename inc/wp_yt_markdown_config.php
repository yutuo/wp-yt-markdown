<?php
if (!defined('ABSPATH')) exit;

class WpYtMarkdownConfig
{
    /**
     * 保存的KEY
     */
    const CONFIG_OPTIONS_KEY = 'wp_ymd_options';

    /**
     * 显示样式HTML定义
     */
    public static $THEMES = array(
        'default' => 'default',
        '3024-day' => '3024-day',
        '3024-night' => '3024-night',
        'abcdef' => 'abcdef',
        'ambiance' => 'ambiance',
        'base16-dark' => 'base16-dark',
        'base16-light' => 'base16-light',
        'bespin' => 'bespin',
        'blackboard' => 'blackboard',
        'cobalt' => 'cobalt',
        'colorforth' => 'colorforth',
        'dracula' => 'dracula',
        'eclipse' => 'eclipse',
        'elegant' => 'elegant',
        'erlang-dark' => 'erlang-dark',
        'hopscotch' => 'hopscotch',
        'icecoder' => 'icecoder',
        'isotope' => 'isotope',
        'lesser-dark' => 'lesser-dark',
        'liquibyte' => 'liquibyte',
        'material' => 'material',
        'mbo' => 'mbo',
        'mdn-like' => 'mdn-like',
        'midnight' => 'midnight',
        'monokai' => 'monokai',
        'neat' => 'neat',
        'neo' => 'neo',
        'night' => 'night',
        'paraiso-dark' => 'paraiso-dark',
        'paraiso-light' => 'paraiso-light',
        'pastel-on-dark' => 'pastel-on-dark',
        'railscasts' => 'railscasts',
        'rubyblue' => 'rubyblue',
        'seti' => 'seti',
        'solarized dark' => 'solarized dark',
        'solarized light' => 'solarized light',
        'the-matrix' => 'the-matrix',
        'tomorrow-night-bright' => 'tomorrow-night-bright',
        'tomorrow-night-eighties' => 'tomorrow-night-eighties',
        'ttcn' => 'ttcn',
        'twilight' => 'twilight',
        'vibrant-ink' => 'vibrant-ink',
        'xq-dark' => 'xq-dark',
        'xq-light' => 'xq-light',
        'yeti' => 'yeti',
        'zenburn' => 'zenburn',
    );

    /**
     * 字体数组
     */
    public static $FONT_SIZE = array(
        '8' => '8',
        '9' => '9',
        '10' => '10',
        '11' => '11',
        '12' => '12',
        '13' => '13',
        '14' => '14',
        '15' => '15',
        '16' => '16',
    );

    public static $LINE_HEIGHT = array(
        '80' => '80',
        '90' => '90',
        '100' => '100',
        '110' => '110',
        '120' => '120',
        '130' => '130',
        '140' => '140',
        '150' => '150',
        '160' => '160'
    );

    /**
     * 默认设置
     */
    public static $DEFAULT_OPTION = array(
        'theme' => 'monokai', // 显示样式
        'lineheight' => '130', // 行高 %
        'fontsize' => '13', // 文字大小
        'themeinline' => 'monokai', // 显示样式
        'lineheightinline' => '140', // 显示样式
        'fontsizeinline' => '13', // 显示样式
    );

    /**
     * 设置值验证用
     * @return array
     */
    public static function getCheckInfos() {
        return array(
            'theme' => array_keys(self::$THEMES),
            'lineheight' => array_keys(self::$LINE_HEIGHT),
            'fontsize' => array_keys(self::$FONT_SIZE),
            'themeinline' => array_keys(self::$THEMES),
            'lineheightinline' => array_keys(self::$LINE_HEIGHT),
            'fontsizeinline' => array_keys(self::$FONT_SIZE)
        );
    }
}