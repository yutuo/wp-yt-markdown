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
    public static $CM_THEMES = array(
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
     * 显示样式HTML定义
     */
    public static $HL_THEMES = array(
        'default' => 'Default',
        'agate' => 'Agate',
        'androidstudio' => 'Androidstudio',
        'arduino-light' => 'Arduino Light',
        'arta' => 'Arta',
        'ascetic' => 'Ascetic',
        'atelier-cave-dark' => 'Atelier Cave Dark',
        'atelier-cave-light' => 'Atelier Cave Light',
        'atelier-dune-dark' => 'Atelier Dune Dark',
        'atelier-dune-light' => 'Atelier Dune Light',
        'atelier-estuary-dark' => 'Atelier Estuary Dark',
        'atelier-estuary-light' => 'Atelier Estuary Light',
        'atelier-forest-dark' => 'Atelier Forest Dark',
        'atelier-forest-light' => 'Atelier Forest Light',
        'atelier-heath-dark' => 'Atelier Heath Dark',
        'atelier-heath-light' => 'Atelier Heath Light',
        'atelier-lakeside-dark' => 'Atelier Lakeside Dark',
        'atelier-lakeside-light' => 'Atelier Lakeside Light',
        'atelier-plateau-dark' => 'Atelier Plateau Dark',
        'atelier-plateau-light' => 'Atelier Plateau Light',
        'atelier-savanna-dark' => 'Atelier Savanna Dark',
        'atelier-savanna-light' => 'Atelier Savanna Light',
        'atelier-seaside-dark' => 'Atelier Seaside Dark',
        'atelier-seaside-light' => 'Atelier Seaside Light',
        'atelier-sulphurpool-dark' => 'Atelier Sulphurpool Dark',
        'atelier-sulphurpool-light' => 'Atelier Sulphurpool Light',
        'brown-paper' => 'Brown Paper',
        'codepen-embed' => 'Codepen Embed',
        'color-brewer' => 'Color Brewer',
        'dark' => 'Dark',
        'darkula' => 'Darkula',
        'docco' => 'Docco',
        'dracula' => 'Dracula',
        'far' => 'Far',
        'foundation' => 'Foundation',
        'github-gist' => 'Github Gist',
        'github' => 'Github',
        'googlecode' => 'Googlecode',
        'grayscale' => 'Grayscale',
        'gruvbox-dark' => 'Gruvbox Dark',
        'gruvbox-light' => 'Gruvbox Light',
        'hopscotch' => 'Hopscotch',
        'hybrid' => 'Hybrid',
        'idea' => 'Idea',
        'ir-black' => 'Ir Black',
        'kimbie.dark' => 'Kimbie Dark',
        'kimbie.light' => 'Kimbie Light',
        'magula' => 'Magula',
        'mono-blue' => 'Mono Blue',
        'monokai-sublime' => 'Monokai Sublime',
        'monokai' => 'Monokai',
        'obsidian' => 'Obsidian',
        'paraiso-dark' => 'Paraiso Dark',
        'paraiso-light' => 'Paraiso Light',
        'pojoaque' => 'Pojoaque',
        'qtcreator_dark' => 'Qtcreator Dark',
        'qtcreator_light' => 'Qtcreator Light',
        'railscasts' => 'Railscasts',
        'rainbow' => 'Rainbow',
        'school-book' => 'School Book',
        'solarized-dark' => 'Solarized Dark',
        'solarized-light' => 'Solarized Light',
        'sunburst' => 'Sunburst',
        'tomorrow-night-blue' => 'Tomorrow Night Blue',
        'tomorrow-night-bright' => 'Tomorrow Night Bright',
        'tomorrow-night-eighties' => 'Tomorrow Night Eighties',
        'tomorrow-night' => 'Tomorrow Night',
        'tomorrow' => 'Tomorrow',
        'vs' => 'Vs',
        'xcode' => 'Xcode',
        'zenburn' => 'Zenburn',
    );

    // /**
    //  * 字体数组
    //  */
    // public static $FONT_SIZE = array(
    //     '8' => '8',
    //     '9' => '9',
    //     '10' => '10',
    //     '11' => '11',
    //     '12' => '12',
    //     '13' => '13',
    //     '14' => '14',
    //     '15' => '15',
    //     '16' => '16',
    // );

    // public static $LINE_HEIGHT = array(
    //     '80' => '80',
    //     '90' => '90',
    //     '100' => '100',
    //     '110' => '110',
    //     '120' => '120',
    //     '130' => '130',
    //     '140' => '140',
    //     '150' => '150',
    //     '160' => '160'
    // );

    /**
     * 默认设置
     */
    public static $DEFAULT_OPTION = array(
        'cmtheme' => 'defualt', // 显示样式
        'hltheme' => 'defualt', // 显示样式
        // 'lineheight' => '130', // 行高 %
        // 'fontsize' => '13', // 文字大小
        // 'themeinline' => 'monokai', // 显示样式
        // 'lineheightinline' => '140', // 显示样式
        // 'fontsizeinline' => '13', // 显示样式
    );

    /**
     * 设置值验证用
     * @return array
     */
    public static function getCheckInfos() {
        return array(
            'cmtheme' => array_keys(self::$CM_THEMES),
            'hltheme' => array_keys(self::$HL_THEMES),
            // 'lineheight' => array_keys(self::$LINE_HEIGHT),
            // 'fontsize' => array_keys(self::$FONT_SIZE),
            // 'themeinline' => array_keys(self::$THEMES),
            // 'lineheightinline' => array_keys(self::$LINE_HEIGHT),
            // 'fontsizeinline' => array_keys(self::$FONT_SIZE)
        );
    }
}