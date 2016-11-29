<?php
/*
@author Ayomide Ikechukwu Daniels
@life.of.an.island on instagram
@ age2ho@gmail.com
@https://lifeofanisland.herokuapp.com
*/
require 'lib/autoload.php';
#
use Lifeofanisland\Elyon\Lib\NumberController as numsort;
#
$numsort = new numsort;
$numbers = [3,
            1000,
            2.5,
            1/2,
            11,
            1000000];
echo  $numsort->sortNumber($numbers);
?>