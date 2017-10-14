<?php

namespace Magic;

include "Magic/MagicMethods.php";

// construct, destruct
echo " __construct():" . PHP_EOL;
$obj = new MagicMethods("Magic", "magic@methods.com", 25);


// call, callStatic
setTitle("__call(), __callStatic():");
$obj->magicCall("This", "is", "call");
MagicMethods::magicStaticCall("This", "is", "static", "call");


// get, set, isset, unset
setTitle("__get(), __set(), __isset(), __unset():");
echo $obj->name . PHP_EOL;

var_dump(isset($obj->name));
unset($obj->name);
var_dump(isset($obj->name));

$obj->name = "Sasha";
echo "Name: " . $obj->name . PHP_EOL;


// sleep, wakeup
setTitle("__sleep(), __wakeup():");
$session_simulation = serialize($obj);
$obj = null; // destroy previous object
$obj = unserialize($session_simulation);
echo "Person name: " . $obj->name . PHP_EOL; // TEST


// toString
setTitle("__toString():");
echo $obj;


// invoke
setTitle("__invoke():");
echo $obj("Object called as a function") . PHP_EOL;


// set_state
setTitle("__set_state():");
$new_obj = [];
eval('$new_obj = ' . var_export($obj, true) . ';');
echo "Exported properties was assigned to a new Object. Age: " .  $new_obj->age . PHP_EOL;
$new_obj = null; // destroy


// clone
setTitle("__clone():");
$obj->object1 = new ClonedClass();
$new_obj = clone $obj;
$obj->object1->fruits = "Grapes";
echo "There are " . $obj->object1->fruits . " in one class object and "
    . $new_obj->object1->fruits . " in another." . PHP_EOL; // TEST
$new_obj = null;


// debugInfo
setTitle("__debugInfo():");
var_dump($obj);


setTitle("__destruct():");



function setTitle($message) {
    echo PHP_EOL . $message . PHP_EOL;
}
