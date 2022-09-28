<?php

include './Person.php';

/**
 * call the __construct
 */
$person = new \App\OOP\Person('Init name');
/**
 * call the __isset
 */
isset($person->name);
/**
 * call the __unset
 */
unset($person->name);
/**
 * call the __set
 */
$person->name = 'packie set up';
/**
 * call the __call
 */
$person->getName();
/**
 * call the __callStatic
 */
$person::getName();
/**
 * call the __get
 */
echo sprintf('get property name : %s', $person->name), PHP_EOL;
/**
 * call the __toString
 */
echo $person;
/**
 * call the __invoke
 */
$person();
/**
 * call __set_state
 */
var_export($person, true);
echo PHP_EOL;
/**
 * call __sleep or __serialize , define __serialize, the __sleep dun exec
 */
echo $str = serialize($person), PHP_EOL;
/**
 * call __wakeup or __unserialize , define __unserialize, __wakeup dun exec
 */
var_dump(unserialize($str));
/**
 * call __clone
 */
clone $person;

