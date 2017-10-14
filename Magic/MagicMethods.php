<?php

namespace Magic;

class MagicMethods {

    private $person;
    public $object1;

    public function __construct($name, $email, $age) {
        echo "Constructor called! Let's assign name, email and age as $name, $email and $age!" . PHP_EOL;
        $this->person['name'] = $name;
        $this->person['email'] = $email;
        $this->person['age'] = $age;
    }

    public function __destruct() {
        echo "Destructor is called! It is executed when the all references are freed, or when the script terminates." . PHP_EOL;
    }

    public function __call($name, $arguments) {
        echo "Call method with a name - $name and values: " . implode(" ", $arguments) . PHP_EOL ;
    }

    public static function __callStatic($name, $arguments) {
        echo "Static call method ith a name - $name and values: " . implode(" ", $arguments) . PHP_EOL ;
    }

    public function __get($key) {
        if (array_key_exists($key, $this->person)) {
            return $this->person[$key];
        }
        return null;
    }

    public function __set($key, $value) {
        echo "Changing $key" . PHP_EOL;
        $this->person[$key] = $value;
    }

    public function __isset($key) {
        echo "Is $key set?" . PHP_EOL;
        return isset($this->person[$key]);
    }

    public function __unset($key) {
        echo "Unset $key" . PHP_EOL;
        unset($this->person[$key]);
    }

    public function __sleep() {
        echo "Invoke sleep of this object after serialize() method was called." . PHP_EOL;
        return array('person');
    }

    public function __wakeup() {
        echo "Wake up when unserialize() method is called." . PHP_EOL;
    }

    public function __toString() {
        return "Must return a String! E-mail: " . $this->person['email'] . PHP_EOL;
    }

    public function __invoke($message) {
        echo $message;
    }

    public static function __set_state($array) {
        $new_obj = new MagicMethods($array['person']['name'],
            $array['person']['email'], $array['person']['age']);
        return $new_obj;
    }

    public function __clone() {
        $this->object1 = clone $this->object1;
        foreach ($this->person as &$value) {
            $value = "cloned->" . $value;
        }
        unset($value);
        echo "Clone object so it will not reference the same instance. Also change cloned object params." . PHP_EOL;
    }

    public function __debugInfo() {
        echo "Return object properties that should be shown. Must be an array:" . PHP_EOL;
        return $this->person;
    }

}

class ClonedClass {

    public $fruits;

    public function __construct()
    {
        $this->fruits = "Apples";
    }

}