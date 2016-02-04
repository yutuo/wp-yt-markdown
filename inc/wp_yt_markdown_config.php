<?php
class WpYtMarkdownConfig {
    /**
     * 保存的KEY
     */
    const CONFIG_OPTIONS_KEY = 'wp_ymd_options';

    /**
     * 显示样式HTML定义
     */
    static $THEMES_BRIGHT = array (
            'chrome' => 'Chrome',
            'clouds' => 'Clouds',
            'crimson_editor' => 'Crimson Editor',
            'dawn' => 'Dawn',
            'dreamweaver' => 'Dreamweaver',
            'eclipse' => 'Eclipse',
            'github' => 'GitHub',
            'solarized_light' => 'Solarized Light',
            'textmate' => 'TextMate',
            'tomorrow' => 'Tomorrow',
            'xcode' => 'XCode',
            'kuroir' => 'Kuroir',
            'katzenmilch' => 'KatzenMilch',
            'ambiance' => 'Ambiance',
            'chaos' => 'Chaos',
            'clouds_midnight' => 'Clouds Midnight',
            'cobalt' => 'Cobalt',
            'idle_fingers' => 'idle Fingers',
            'kr_theme' => 'krTheme',
            'merbivore' => 'Merbivore',
            'merbivore_soft' => 'Merbivore Soft',
            'mono_industrial' => 'Mono Industrial',
            'monokai' => 'Monokai',
            'pastel_on_dark' => 'Pastel on dark',
            'solarized_dark' => 'Solarized Dark',
            'terminal' => 'Terminal',
            'tomorrow_night' => 'Tomorrow Night',
            'tomorrow_night_blue' => 'Tomorrow Night Blue',
            'tomorrow_night_bright' => 'Tomorrow Night Bright',
            'tomorrow_night_eighties' => 'Tomorrow Night 80s',
            'twilight' => 'Twilight',
            'vibrant_ink' => 'Vibrant Ink'
    );
    /**
     * 默认设置
     */
    static $DEFAULT_OPTION = array (
            'readonly' => true, // 代码只读
            'theme' => 'monokai', // 显示样式
            'tabsize' => 4, // Tab宽度
            'lineheight' => 120, // 行高 %
            'fontsize' => 12, // 文字大小
            'wrap' => false, // 自动换行
            'print' => 80, // 打印边界大小
            'width' => '99%', // 显示宽度
            'tabtospace' => true, // Tab转换成空格显示
            'fold' => false, // 默认收缩
            'indent' => true, // 缩进边界显示
            'gutter' => true, // 显示行号
            'active' => true, // 活动行高亮显示
            'foldstyle' => 'markbegin' // 代码收缩样式
    );

    /**
     * 字体数组
     */
    static $FONT_SIZE = array (
            '8' => '8',
            '9' => '9',
            '10' => '10',
            '12' => '12',
            '14' => '14',
            '16' => '16',
    );
    /**
     * Yes或者No
     */
    static $BOOLEAN = array (
            'true' => 'Yes',
            'false' => 'No'
    );
    /**
     * Tab宽度
     */
    static $TAB_SIZE = array (
            '2' => '2',
            '4' => '4',
            '6' => '6',
            '8' => '8'
    );
    static $PRINT = array (
            '-1' => 'No display',
            '80' => '80',
            '100' => '100',
            '120' => '120',
            '160' => '160'
    );
    static $LINE_HEIGHT = array (
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
    static $FOLD_STYLE = array (
            'none' => 'none',
            'markbegin' => 'begin',
            'beginend' => 'begin And End'
    );
}