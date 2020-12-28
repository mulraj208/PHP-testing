<?php

namespace App;

class TagParser
{
    public function parse($str) {
        return preg_split('/ ?[,|] ?/', $str);
    }
}