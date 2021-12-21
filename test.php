<?php


include "./src/TopSdk.php";



use DecisionTree\Service\ExclusiveService;
use DecisionTree\Tree\LeafTree;



$run = new ExclusiveService();


$node = (new LeafTree())->get();

$userData = [
    'id'     => 1,
    'age'    => "33",
    "gender" => "man" 
];
$result = $run->process($node, $userData);

$userData = [
    'id'     => 2,
    'age'    => "33",
    "gender" => "woman" 
];
$result = $run->process($node, $userData);

$userData = [
    'id'     => 3,
    'age'    => "11",
    "gender" => "woman" 
];
$result = $run->process($node, $userData);


$userData = [
    'id'     => 4,
    'age'    => "11",
    "gender" => "man" 
];
$result = $run->process($node, $userData);

$userData = [
    'id'     => 5,
    'age'    => "13",
    "gender" => "woman" 
];
$result = $run->process($node, $userData);


$userData = [
    'id'     => 6,
    'age'    => "13",
    "gender" => "man" 
];
$result = $run->process($node, $userData);




$userData = [
    'id'     => 7,
    'age'    => "66",
    "gender" => "woman" 
];
$result = $run->process($node, $userData);


$userData = [
    'id'     => 8,
    'age'    => "66",
    "gender" => "man" 
];
$result = $run->process($node, $userData);