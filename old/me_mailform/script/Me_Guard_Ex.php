<?php
require_once 'Me_Guard.php';
class Me_Guard_Ex extends Me_Guard
{
    public static function render($html, $convert_char_code, $char_code, $system_char_code)
    {
        $link_elem = $html->find('#powered_by_me', 0);
        $link_elem->outertext = '';
        echo $html;
    }
}
