<html lang="en">
<head>
    <title>Sorter page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<?php

function selectionSort(&$arr)
{
    $length = sizeof($arr);

    for ($i = 0; $i < $length - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < $length; $j++) {
            if ($arr[$minIndex] > $arr[$j]) {
                $minIndex = $j;
            }
        }

        $temp = $arr[$minIndex];
        $arr[$minIndex] = $arr[$i];
        $arr[$i] = $temp;
    }
    return $arr;
}


if (isset($_GET['array'])) {
    $array_str = $_GET['array'];
    $array = explode(",", $array_str);

    if ($array[0] == 0) {
        echo 'Неправильный формат ввода';
        exit(0);
    }
    for($i = 0; $i < count($array); $i++){
        $array[$i] = (int)$array[$i];
    }


    echo 'Что получили: ' . implode(',', $array) . '<br>Что сделали: ' . implode(',', selectionSort($array));
} else echo "Вы не ввели массив"
?>

</body>
</html>
