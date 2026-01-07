<?php

$isStudent = 1;
var_dump($isStudent , true , $isStudent === true);

$scores = [85, "90", 95.5];
var_dump($scores, $scores[0] + $scores[1] + $scores[2]);

$scores2 = [85, (int)"90", 95.5];
var_dump($scores2, $scores2[0], $scores2[1], $scores2[2]);

$total = $scores2[0] + $scores2[1] + $scores2[2];
var_dump($scores2, $total);

echo "Total score is: $total \n";