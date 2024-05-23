<?php

namespace hollisho\wp\plugin\inc\Base;

class Activate
{
    public static function handler()
    {
        flush_rewrite_rules();
    }
}