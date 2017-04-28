<?php

include_once dirname(__DIR__) . '/vendor/autoload.php';

$lumper = new \Bavix\Lumper\Lumper();
$slice = new \Bavix\Slice\Slice([7]);

function fibonacci($a)
{
    if ($a <= 2)
    {
        return 1;
    }

    return fibonacci($a - 1) + fibonacci($a - 2);
}

function fibonacciFrom($slice)
{
    var_dump($slice);
    
    $results = [];

    foreach ($slice as $slouse)
    {
        $results = fibonacci($slouse);
    }var_dump($results);

    return $results;
}

$result = $lumper->once('fibonacciFrom', $slice);
$result = $lumper->once('fibonacciFrom', $slice);

var_dump($result);
