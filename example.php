<?php
$location = realpath(dirname(__FILE__));
require_once $location . '/function.php';
$currentPermutation = array('');
$validCharacters = array('a','b','c');
$n = 1;
while ($n < 100){
	$n++;
	$return = nextPermutation($currentPermutation, $validCharacters);
	var_dump($return);
	$currentPermutation = $return;
}