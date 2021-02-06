<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title>Числа</title>
  <link type = "text/css" rel = "stylesheet" href = "style.css">
 </head>
 
<?php

$arr = [1, 212, 3876, 481, 75, 36, 24, 76, 81, 2734, 6751, 53,
    76, 4512, 364, 51826, 374, 61, 93, 26, 4517, 26, 3, 5, 4, 1, 
    23465, 851, 56253, 76, 41, 783, 26, 9461, 238, 674, 51, 95, 2, 39764];

$array =[7638, 2710, 4157, 82, 36017, 6397562, 93, 47, 519, 37985,
    716038,  479176, 345872,  653486,  53, 48, 652, 9, 7, 4369278, 36, 48576, 2934765
    , 62973, 645, 62, 5364, 9, 7, 562, 9387, 465, 927346, 957, 2364, 9572, 69347, 956];
   
    $value=array_sum($arr)/count($arr);
        //echo ceil($value);
   
     function hight_value($value, $array) {
        if (array_search($value, $array)) {
            return $value;
        } else {
            $array[] = $value;
            sort($array);
            $key = array_search($value, $array);
            if ($key == 0) { return $array[$key+1]; }
            if ($key == sizeof($array)-1) { return $array[$key-1]; }
            $dist_to_ceil = $array[$key+1]-$value;
            $dist_to_floor = $value-$array[$key-1];
            if ($dist_to_ceil <= $dist_to_floor) {
                return $array[$key+1];
                
            } else {
                return $array[$key-1];
            }
            
        }
        
     }
    ?>

<body>
  <table>
   <tr><th>Среднее первого массива(округлено)</th><th>min($second)>Среднее первого массива</th></tr>
   <tr><td><?php echo ceil($value)?></td><td><?php echo hight_value($value, $array)?></td></tr>
  </table>
 </body>
</html>

