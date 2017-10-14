<?php

namespace Fruits\Berries\Grapes;


class White
{

    public function __toString() {
        return "White Grapes!" . PHP_EOL . PHP_EOL;
    }

    static function staticWhiteGrape() {
        return "Static white Grape!" . PHP_EOL;
    }

}