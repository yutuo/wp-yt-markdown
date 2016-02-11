@echo off

node bin\compress codemirror simple overlay runmode --local C:\Tools\ProCore\NodeJS\uglifyjs.cmd > codemirror.min.js

node bin\compress meta --local C:\Tools\ProCore\nodejs\uglifyjs.cmd > modes.min.js
node bin\compress apl asciiarmor asn.1 asterisk brainfuck clike clojure cmake cobol coffeescript commonlisp crystal css cypher d dart diff django dockerfile dtd dylan ebnf ecl eiffel elm erlang factor forth fortran gas gfm gherkin go groovy haml handlebars haskell haskell-literate haxe htmlembedded htmlmixed http idl jade javascript jinja2 jsx julia livescript lua markdown mathematica mirc mllike modelica mscgen mumps nginx nsis ntriples octave oz pascal pegjs perl php pig properties puppet python q r rpm rst ruby rust sass scheme shell sieve slim smalltalk smarty solr soy sparql spreadsheet sql stex stylus swift tcl textile tiddlywiki tiki toml tornado troff ttcn ttcn-cfg turtle twig vb vbscript velocity verilog vhdl vue xml xquery yaml yaml-frontmatter z80 --local C:\Tools\ProCore\NodeJS\uglifyjs.cmd >> modes.min.js

rem node bin\compress comment continuecomment dialog autorefresh fullscreen panel placeholder rulers closebrackets closetag continuelist matchbrackets matchtags trailingspace brace-fold comment-fold foldcode foldgutter indent-fold markdown-fold xml-fold anyword-hint css-hint html-hint javascript-hint show-hint sql-hint xml-hint coffeescript-lint css-lint html-lint javascript-lint json-lint lint yaml-lint loadmode multiplex colorize runmode-standalone runmode annotatescrollbar scrollpastend simplescrollbars jump-to-line match-highlighter matchesonscrollbar search searchcursor active-line mark-selection selection-pointer tern worker hardwrap --local C:\XiangQf\Tools\ProCore\nodejs\uglifyjs.cmd > addons.min.js

node bin\compress dialog fullscreen placeholder closebrackets closetag trailingspace brace-fold comment-fold foldcode foldgutter indent-fold markdown-fold xml-fold simplescrollbars  annotatescrollbar jump-to-line matchesonscrollbar match-highlighter search searchcursor active-line --local C:\Tools\ProCore\NodeJS\uglifyjs.cmd > addons.min.js
