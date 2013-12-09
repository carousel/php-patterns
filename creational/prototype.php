<?php
class SubObject
{
    static $instances = 0;
    public $instance;
    public function __construct() {
        $this->instance = ++self::$instances;
    }
    public function __clone() {
        $this->instance = ++self::$instances;
    }
}

class MyCloneable
{
    public $object1;
    public $object2;
    function __clone() {
        // Force a copy of this->object, otherwise it will point to same object.
        $this->object1 = clone $this->object1;
    }
}

$obj = new MyCloneable();

$obj->object1 = new SubObject();
$obj->object2 = new SubObject();

$obj2 = clone $obj;

echo "Original Object:\n"."<br/>";
foreach ($obj as $o) {
    print_r($o);
}

echo "Cloned Object:\n"."<br/>";
foreach ($obj2 as $o) {
    print_r($o);
}

?>
