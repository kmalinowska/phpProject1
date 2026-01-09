<?php

$size = "M";

switch($size) {
    case "S":
    case "M":
        echo "Small or Medium size\n";
        break;
    case "L":
    case "XL":
        echo "Large or Extra Large size\n";
        break;
    default:
        echo "Unknown size\n";
}

if ("M" == $size) {
    echo "Small or Medium size\n";
} elseif ("L" == $size || "XL" == $size) {
    echo "Large or extra large size\n";
} else {
    echo "Unknown size\n";
}

$badAttempts = 3;

switch ($badAttempts) {
    case 3:
        echo "You are blocked!\n";
    default:
        echo "Bad atttempt detected!\n";
}