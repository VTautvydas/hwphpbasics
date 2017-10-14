<?php


namespace Fruits;
use Fruits\Berries\Grapes\Green;
use function Fruits\Berries\EggPlants\getBerrie as func;

require "vendor/autoload.php";

echo $eggplants = new Berries\EggPlants\Green();
echo $green_grapes = new Berries\Grapes\Green();
echo $green_grapes2 = new Green();
echo $white_grapes = new Berries\Grapes\White();

echo Berries\Grapes\White::staticWhiteGrape();
echo Berries\Grapes\Green::GREEN;

echo $apple = new Apples\All();

echo func();
echo Berries\EggPlants\getBerrie();
