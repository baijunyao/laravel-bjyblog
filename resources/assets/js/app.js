
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('prismjs/prism')
require('prismjs/components/prism-markup-templating')
require('prismjs/components/prism-markup')
require('prismjs/components/prism-css')
require('prismjs/components/prism-clike')
require('prismjs/components/prism-javascript')
require('prismjs/components/prism-docker')
require('prismjs/components/prism-git')
require('prismjs/components/prism-json')
require('prismjs/components/prism-less')
require('prismjs/components/prism-markdown')
require('prismjs/components/prism-nginx')
require('prismjs/components/prism-php')
require('prismjs/components/prism-php-extras')
require('prismjs/components/prism-scss')
require('prismjs/components/prism-sql')
require('prismjs/components/prism-typescript')
require('prismjs/components/prism-yaml')
require('prismjs/components/prism-bash')
require('prismjs/components/prism-diff')

require('prismjs/plugins/line-numbers/prism-line-numbers')
require('prismjs/plugins/toolbar/prism-toolbar')
require('prismjs/plugins/previewers/prism-previewers')
require('prismjs/plugins/autoloader/prism-autoloader')
require('prismjs/plugins/command-line/prism-command-line')
require('prismjs/plugins/normalize-whitespace/prism-normalize-whitespace')
require('prismjs/plugins/keep-markup/prism-keep-markup')
require('prismjs/plugins/show-language/prism-show-language')
require('prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard')

require('pace/pace');

require('fluidbox/dist/js/jquery.fluidbox.min');

require('./home/index');

require('./home/comment');

require('./home/site');

// JsSocials : recompile with "npm run dev" or yarn...
require('jssocials/dist/jssocials.min');

require('social-share.js/dist/js/jquery.share.min');
