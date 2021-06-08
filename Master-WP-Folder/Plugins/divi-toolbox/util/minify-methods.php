<?php
define('DTB_MINIFY_STRING', '"(?:[^"\\\]|\\\.)*"|\'(?:[^\'\\\]|\\\.)*\'|`(?:[^`\\\]|\\\.)*`');
define('DTB_MINIFY_COMMENT_CSS', '/\*[\s\S]*?\*/');
define('DTB_MINIFY_COMMENT_HTML', '<!\-{2}[\s\S]*?\-{2}>');
define('DTB_MINIFY_COMMENT_JS', '//[^\n]*');
define('DTB_MINIFY_PATTERN_JS', '/[^\n]+?/[gimuy]*');
define('DTB_MINIFY_HTML', '<[!/]?[a-zA-Z\d:.-]+[\s\S]*?>');
define('DTB_MINIFY_HTML_ENT', '&(?:[a-zA-Z\d]+|\#\d+|\#x[a-fA-F\d]+);');
define('DTB_MINIFY_HTML_KEEP', '<pre(?:\s[^<>]*?)?>[\s\S]*?</pre>|<code(?:\s[^<>]*?)?>[\s\S]*?</code>|<script(?:\s[^<>]*?)?>[\s\S]*?</script>|<style(?:\s[^<>]*?)?>[\s\S]*?</style>|<textarea(?:\s[^<>]*?)?>[\s\S]*?</textarea>');
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'  ? 'https' : 'http') . '://';
$host = isset($_SERVER['HTTP_HOST']) ? sanitize_text_field( wp_unslash($_SERVER['HTTP_HOST']) ) : (isset($_SERVER['SERVER_NAME']) ? sanitize_text_field( wp_unslash($_SERVER['SERVER_NAME']) ) : "");
$url = $protocol . $host;
define('X', "\x1A");
function dtb_n($s) {
    return str_replace(["\r\n", "\r"], "\n", $s);
}
function dtb_t($a, $b) {
    if ($a && strpos($a, $b) === 0 && substr($a, -strlen($b)) === $b) {
        return substr(substr($a, strlen($b)), 0, -strlen($b));
    }
    return $a;
}
function fn_dtb_minify($pattern, $input) {
    return preg_split('#(' . implode('|', $pattern) . ')#', $input, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
}
function fn_dtb_minify_css($input, $comment = 2, $quote = 2) {
    if (!is_string($input) || !$input = dtb_n(trim($input))) return $input;
    $output = $prev = "";
    foreach (fn_dtb_minify([DTB_MINIFY_COMMENT_CSS, DTB_MINIFY_STRING], $input) as $part) {
        if (trim($part) === "") continue;
        if ($comment !== 1 && strpos($part, '/*') === 0 && substr($part, -2) === '*/') {
            if (
                $comment === 2 && (
                    strpos('*!', $part[2]) !== false ||
                    stripos($part, '@licence') !== false || // noun
                    stripos($part, '@license') !== false || // verb
                    stripos($part, '@preserve') !== false
                )
            ) {
                $output .= $part;
            }
            continue;
        }
        if ($part[0] === '"' && substr($part, -1) === '"' || $part[0] === "'" && substr($part, -1) === "'") {
            $q = $part[0];
            $clean = dtb_t($part, $q); // Trim quote(s)
            $ok = strcspn($clean, " \n\t\"'") === strlen($clean);
            if (
                $quote !== 1 && (
                    substr($prev, -4) === 'url(' && preg_match('#\burl\($#', $prev) && $ok ||
                    substr($prev, -1) === '=' && preg_match('#^' . $q . '[a-zA-Z_][\w-]*?' . $q . '$#', $part)
                )
            ) {
                $part = $clean;
            }
            $output .= $part;
        } else {
            $output .= fn_dtb_minify_css_union($part);
        }
        $prev = $part;
    }
    return trim($output);
}
function fn_dtb_minify_css_union($input) {
    if (stripos($input, 'calc(') !== false) {
        $input = preg_replace_callback('#\b(calc\()\s*(.*?)\s*\)#i', function($m) {
            return $m[1] . preg_replace('#\s+#', X, $m[2]) . ')';
        }, $input);
    }
    $input = preg_replace([
        '#(?<=[\w])\s+(\*|\[|:[\w-]+)#',
        '#([*\]\)])\s+(?=[\w\#.])#', '#\b\s+\(#', '#\)\s+\b#',
        '#\#([a-f\d])\1([a-f\d])\2([a-f\d])\3\b#i',
        '#\s*([~!@*\(\)+=\{\}\[\]:;,>\/])\s*#',
        '#\b(?<!\d\.)(?:0+\.)?0+(?:(?:cm|em|ex|in|mm|pc|pt|px|rem|vh|vmax|vmin|vw)\b)#',
        '#\b0+\.(\d+)#',
        '#:(0\s+){0,3}0(?=[!,;\)\}]|$)#',
        '#\b(background(?:-position)?):(?:0|none)([;,\}])#i',
        '#\b(border(?:-radius)?|outline):none\b#i',
        '#(^|[\{\}])(?:[^\{\}]+)\{\}#',
        '#;+([;\}])#',
        '#\s+#'
    ], [
        X . '$1',
        '$1' . X, X . '(', ')' . X,
        '#$1$2$3',
        '$1',
        '0',
        '.$1',
        ':0',
        '$1:0 0$2',
        '$1:0',
        '$1',
        '$1',
        ' '
    ], $input);
    return trim(str_replace(X, ' ', $input));
}
function fn_dtb_minify_html($input, $comment = 2, $quote = 1) {
    if (!is_string($input) || !$input = dtb_n(trim($input))) return $input;
    $output = $prev = "";
    foreach (fn_dtb_minify([DTB_MINIFY_COMMENT_HTML, DTB_MINIFY_HTML_KEEP, DTB_MINIFY_HTML, DTB_MINIFY_HTML_ENT], $input) as $part) {
        if ($part === "\n") continue;
        if ($part !== ' ' && trim($part) === "" || $comment !== 1 && strpos($part, '<!--') === 0) {
            if ($comment === 2 && substr($part, -12) === '<![endif]-->') {
                $output .= $part;
            }
            continue;
        }
        if ($part[0] === '<' && substr($part, -1) === '>') {
            $output .= fn_dtb_minify_html_union($part, $quote);
        } else if ($part[0] === '&' && substr($part, -1) === ';' && $part !== '&lt;' && $part !== '&gt;' && $part !== '&amp;') {
            $output .= html_entity_decode($part); 
        } else {
            $output .= preg_replace('#\s+#', ' ', $part);
        }
        $prev = $part;
    }
    $output = str_replace(' </', '</', $output);
    return str_ireplace(['&#x0020;', '&#x20;', '&#x000A;', '&#xA;'], [' ', ' ', "\n", "\n"], trim($output));
}
function fn_dtb_minify_html_union($input, $quote) {
    if (
        strpos($input, ' ') === false &&
        strpos($input, "\n") === false &&
        strpos($input, "\t") === false
    ) return $input;
    global $url;
    return preg_replace_callback('#<\s*([^\/\s]+)\s*(?:>|(\s[^<>]+?)\s*>)#', function($m) use($quote, $url) {
        if (isset($m[2])) {
            if (stripos($m[2], ' style=') !== false) {
                $m[2] = preg_replace_callback('#( style=)([\'"]?)(.*?)\2#i', function($m) {
                    return $m[1] . $m[2] . fn_dtb_minify_css($m[3]) . $m[2];
                }, $m[2]);
            }
            if (strpos($m[2], '://') !== false) {
                $m[2] = str_replace([
                    $url . '/',
                    $url . '?',
                    $url . '&',
                    $url . '#',
                    $url . '"',
                    $url . "'"
                ], [
                    '/',
                    '?',
                    '&',
                    '#',
                    '/"',
                    "/'"
                ], $m[2]);
            }
            $a = 'a(sync|uto(focus|play))|c(hecked|ontrols)|d(efer|isabled)|hidden|ismap|loop|multiple|open|re(adonly|quired)|s((cop|elect)ed|pellcheck)';
            $a = '<' . $m[1] . preg_replace([
                '#\s(' . $a . ')(?:=([\'"]?)(?:true|\1)?\2)#i',
                '#\s*([^\s=]+?)(=(?:\S+|([\'"]?).*?\3)|$)#',
                '#\s+\/$#'
            ], [
                ' $1',
                ' $1$2',
                '/'
            ], str_replace("\n", ' ', $m[2])) . '>';
            return $quote !== 1 ? fn_dtb_minify_html_union_attr($a) : $a;
        }
        return '<' . $m[1] . '>';
    }, $input);
}
function fn_dtb_minify_html_union_attr($input) {
    if (strpos($input, '=') === false) return $input;
    return preg_replace_callback('#=(' . DTB_MINIFY_STRING . ')#', function($m) {
        $q = $m[1][0];
        if (strpos($m[1], ' ') === false && preg_match('#^' . $q . '[a-zA-Z_][\w-]*?' . $q . '$#', $m[1])) {
            return '=' . dtb_t($m[1], $q);
        }
        return $m[0];
    }, $input);
}
function fn_dtb_minify_js($input, $comment = 2, $quote = 2) {
    if (!is_string($input) || !$input = dtb_n(trim($input))) return $input;
    $output = $prev = "";
    foreach (fn_dtb_minify([DTB_MINIFY_COMMENT_CSS, DTB_MINIFY_STRING, DTB_MINIFY_COMMENT_JS, DTB_MINIFY_PATTERN_JS], $input) as $part) {
        if (trim($part) === "") continue;
        if ($comment !== 1 && (
            strpos($part, '//') === 0 || // Remove inline comment(s)
            strpos($part, '/*') === 0 && substr($part, -2) === '*/'
        )) {
            if (
                $comment === 2 && (
                    strpos('*!', $part[2]) !== false ||
                    stripos($part, '@licence') !== false || // noun
                    stripos($part, '@license') !== false || // verb
                    stripos($part, '@preserve') !== false
                )
            ) {
                $output .= $part;
            }
            continue;
        }
        if ($part[0] === '/' && (substr($part, -1) === '/' || preg_match('#\/[gimuy]*$#', $part))) {
            $output .= $part;
        } else if (
            $part[0] === '"' && substr($part, -1) === '"' ||
            $part[0] === "'" && substr($part, -1) === "'" ||
            $part[0] === '`' && substr($part, -1) === '`' // ES6
        ) {
            $output .= $part;
        } else {
            $output .= fn_dtb_minify_js_union($part);
        }
        $prev = $part;
    }
    return $output;
}
function fn_dtb_minify_js_union($input) {
    return preg_replace([
        '#\s*([!%&*\(\)\-=+\[\]\{\}|;:,.<>?\/])\s*#',
        '#[;,]([\]\}])#',
        '#\btrue\b#', '#\bfalse\b#', '#\b(return\s?)\s*\b#',
        '#\b(?:new\s+)?Array\((.*?)\)#', '#\b(?:new\s+)?Object\((.*?)\)#'
    ], [
        '$1',
        '$1',
        '!0', '!1', '$1',
        '[$1]', '{$1}'
    ], $input);
}

function dtb_minify_css($lot) {
    return fn_dtb_minify_css($lot);
}
function dtb_minify_html($lot) {
    return fn_dtb_minify_html($lot);
}
function dtb_minify_js($lot) {
    return fn_dtb_minify_js($lot);
}