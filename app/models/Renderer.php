<?php

class Renderer
{
    public static function render($file, $data)
    {
        /* $file - текущее представление */
        ob_start();
        include($file);
        return ob_get_clean();
    }

}