<?php

function valid($value)
{
    $check = '/^[0-9]+$/m';
    if (!preg_match_all($check, $value, $matches, PREG_SET_ORDER, 0)) {
        echo "Value $value is invalid \n\r";
        return false;
    }

    return true;
}




function sum(string $stringA, string $stringB)
{
    if (!valid($stringA) or !valid($stringB)) {
        return null;
    }

    $arrayA = str_split($stringA);
    $arrayB = str_split($stringB);

    $arrayC = [];

    $max = max(count($arrayA), count($arrayB));

    $arrayA = array_reverse($arrayA);
    $arrayB = array_reverse($arrayB);

    for ($i = 0; $i < $max; $i++)
    {
        $arrayC[] = ($arrayA[$i] ?? 0) + ($arrayB[$i] ?? 0);
    }

    $arrayResult = [];
    $tmp = 0;
    foreach ($arrayC as $item) {
        $item = (string) ((int)$item + (int)$tmp);

        if (strlen($item) === 1) {
            $arrayResult[] = $item;
            $tmp = 0;
        } else {
            $arrayResult[] = $item[1];
            $tmp = $item[0];
        }
    }

    if ($tmp) {
        $arrayResult[]  = $tmp;
    }

    $stringResult = array_reverse($arrayResult);

    echo implode('', $stringResult) . "\n\r";
}


sum(
    '89',
    '135'
);
sum(
    '100000000000000000000000000000',
    '100000000000000000000000000000100000000000000000000000000000100000000000000000000000000000'
);
sum(
    '100000000000000000000000000000',
    '100000000000000000000000000000100000000000000000000000000000100000000000000000000000000000'
);
sum(
    '900000000000000000000000000000',
    '100000000000000000000000000000100000000000000000000000000000100000000000000000000000000000'
);
sum(
    '900000000000000000000000000000000000000000000000000000000000000000000000000000000000000000',
    '2 100000000000000000000000000000100000000000000000000000000000100000000000000000000000000000'
);
sum(
    '900000000000000000000000000000000000000000000000000000000000000000000000000000000000000000',
    '2100000000000000000000000000000100000000000000000000000000000100000000000000000000000000000'
);
sum(
    's9',
    '1'
);
