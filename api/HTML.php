<?php

class HTML
{
    static private $folder = __DIR__;

    static public function render($template, $data = array(), $folder = false) {
        if ($folder) self::$folder = __DIR__ . "/$folder";
        $content = file_get_contents(self::$folder."/{$template}.html");
        $content = self::design_render_text($content, $data);
        self::$folder = __DIR__;
        return $content;
    }

    static private function design_render_text($content, $data = array()) {
        $content = self::design_parse_function($content, $data);
        $content = self::design_parse($content, $data);
        return $content;
    }

    static private function design_parse_function($content, $data = array()) {
        preg_match_all('/\<\<(.*?)\>\>/is', $content, $res);
        if (@$res[1])
        foreach ($res[1] as $el) {
            $middle = self::design_parse($el, $data);
            $middle = '$result = '.$middle.';';
            eval($middle);

            $content = str_ireplace('<<'.$el.'>>', $result, $content);
        }
        return $content;
    }

    static private function design_parse($content, $data) {
        preg_match_all('/\%\%(.*?)\%\%/si', $content, $res);
        if (@$res[1])
        foreach ($res[1] as $el) $content = str_ireplace('%%'.$el.'%%', $data[$el], $content);
        return $content;
    }
}