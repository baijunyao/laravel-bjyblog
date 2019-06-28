
editormd = {};

// Emoji graphics files url path
editormd.emoji     = {
    path  : "/images/emojis/",
    ext   : ".png"
};

// Twitter Emoji (Twemoji)  graphics files url path
editormd.twemoji = {
    path : "http://twemoji.maxcdn.com/36x36/",
    ext  : ".png"
};

/**
 * emoji randerer
 */
editormd.regexs = {
    emoji         : /:([\w\+-]+):/g,
    emojiDatetime : /(\d{2}:\d{2}:\d{2})/g,
    twemoji       : /:(tw-([\w]+)-?(\w+)?):/g,
    fontAwesome   : /:(fa-([\w]+)(-(\w+)){0,}):/g,
    editormdLogo  : /:(editormd-logo-?(\w+)?):/g,
};

var regexs          = editormd.regexs;
var emojiReg        = regexs.emoji;
var twemojiReg      = regexs.twemoji;
var faIconReg       = regexs.fontAwesome;
var editormdLogoReg = regexs.editormdLogo;

editormd.emojiRenderer = function(text) {
    if (text === undefined) {
        return '';
    }

    text = text.replace(editormd.regexs.emojiDatetime, function($1) {
        return $1.replace(/:/g, "&#58;");
    });

    var matchs = text.match(emojiReg);

    if (!matchs) {
        return text;
    }

    for (var i = 0, len = matchs.length; i < len; i++)
    {
        if (matchs[i] === ":+1:") {
            matchs[i] = ":\\+1:";
        }

        text = text.replace(new RegExp(matchs[i]), function($1, $2){
            var faMatchs = $1.match(faIconReg);
            var name     = $1.replace(/:/g, "");

            if (faMatchs)
            {
                for (var fa = 0, len1 = faMatchs.length; fa < len1; fa++)
                {
                    var faName = faMatchs[fa].replace(/:/g, "");

                    return "<i class=\"fa " + faName + " fa-emoji\" title=\"" + faName.replace("fa-", "") + "\"></i>";
                }
            }
            else
            {
                var emdlogoMathcs = $1.match(editormdLogoReg);
                var twemojiMatchs = $1.match(twemojiReg);

                if (emdlogoMathcs)
                {
                    for (var x = 0, len2 = emdlogoMathcs.length; x < len2; x++)
                    {
                        var logoName = emdlogoMathcs[x].replace(/:/g, "");
                        return "<i class=\"" + logoName + "\" title=\"Editor.md logo (" + logoName + ")\"></i>";
                    }
                }
                else if (twemojiMatchs)
                {
                    for (var t = 0, len3 = twemojiMatchs.length; t < len3; t++)
                    {
                        var twe = twemojiMatchs[t].replace(/:/g, "").replace("tw-", "");
                        return "<img src=\"" + editormd.twemoji.path + twe + editormd.twemoji.ext + "\" title=\"twemoji-" + twe + "\" alt=\"twemoji-" + twe + "\" class=\"emoji twemoji\" />";
                    }
                }
                else
                {
                    var src = (name === "+1") ? "plus1" : name;
                    src     = (src === "black_large_square") ? "black_square" : src;
                    src     = (src === "moon") ? "waxing_gibbous_moon" : src;

                    return "<img src=\"" + editormd.emoji.path + src + editormd.emoji.ext + "\" class=\"emoji\" title=\"&#58;" + name + "&#58;\" alt=\"&#58;" + name + "&#58;\" />";
                }
            }
        });
    }

    return text;
};
