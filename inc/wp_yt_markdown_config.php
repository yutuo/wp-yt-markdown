<?php

class WpYtMarkdownConfig
{
    /**
     * 保存的KEY
     */
    const CONFIG_OPTIONS_KEY = 'wp_ymd_options';

    /**
     * 显示样式HTML定义
     */
    static $THEMES = array(
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
     * 默认设置
     */
    static $DEFAULT_OPTION = array(
        //'readonly' => true, // 代码只读
        'theme' => 'monokai', // 显示样式
        'themeinline' => 'monokai', // 显示样式
        //'tabsize' => 4, // Tab宽度
        'lineheight' => 120, // 行高 %
        'fontsize' => 12, // 文字大小
        //'wrap' => false, // 自动换行
        //'print' => 80, // 打印边界大小
        //'width' => '99%', // 显示宽度
        //'tabtospace' => true, // Tab转换成空格显示
        //'fold' => false, // 默认收缩
        //'indent' => true, // 缩进边界显示
        //'gutter' => true, // 显示行号
        //'active' => true, // 活动行高亮显示
        //'foldstyle' => 'markbegin' // 代码收缩样式
    );

    /**
     * 字体数组
     */
    static $FONT_SIZE = array(
        '8' => '8',
        '9' => '9',
        '10' => '10',
        '12' => '12',
        '14' => '14',
        '16' => '16',
    );

    static $LINE_HEIGHT = array(
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
}