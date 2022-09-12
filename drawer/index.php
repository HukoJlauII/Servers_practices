<html lang="en">
<head>
    <title>Drawer page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<?php

if (isset($_GET['number'])) {
    if (!is_numeric($_GET['number'])) {
        echo 'Неправильный формат ввода';
        exit(0);
    }
    $number = (int)$_GET['number'];

    // инициализируем данные
    $form = $number & 3;
    $color = $number >> 2 & 3;
    $length = $number >> 4 & 3;
    $width = $number >> 6 & 3;

    echo '<table>
    <tr><th>Form</th><th>Color</th><th>Length</th><th>Width</th></tr>';
    echo '<tr><th>' . $form . '</th><th>' . $color . '</th><th>' . $length . '</th><th>' . $width . '</th></tr></table>';

    $length = 100 + $length * 100;
    $width = 100 + $width * 100;


    $brush = "pink";
    switch ($color) {
        case 0:
            $brush = "yellow";
            break;
        case 1:
            $brush = "red";
            break;
        case 2:
            $brush = "blue";
            break;
        case 3:
            $brush = "green";
            break;
        default:
            $brush = "black";
            break;
    }

    $svg_code = '<svg width = "' . $length . '" height= "' . $width . '">';
    switch ($form) {
        case 0:
            $svg_code .= '<rect x="0" y="0" width="' . $length . '" height="' . $width . '" fill="' . $brush . '" />';
            break;

        case 1:
            $svg_code .= '<ellipse cx="' . $length / 2 . '" cy ="' . $width / 2 . '" rx="' . $length / 2 . '" ry="' . $width / 2 . '" fill = "' . $brush . '" />';
            break;
        case 2:
            if ($length > $width) {
                $length = $width;
            } else {
                $width = $length;
            }
            $svg_code .= '<circle cx="' . $length / 2 . '" cy ="' . $width / 2 . '" r="' . $length / 2 . '" fill = "' . $brush . '" />';
            break;
        case 3:
            if ($length > $width) {
                $length = $width;
            } else {
                $width = $length;
            }
            $svg_code .= '<rect x="0" y="0" width="' . $length . '" height="' . $width . '" fill="' . $brush . '" />';
            break;
    }

    $svg_code .= '</svg>';
    echo $svg_code;
} else {
    echo "Вы не ввели параметр number";
}
?>

</body>
</html>
