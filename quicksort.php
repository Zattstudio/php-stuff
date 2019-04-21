<?php
//error_reporting(-1);
function quickSort($arr)
{

  if(count($arr) <= 1) return $arr;
  else {
    $pivot = array_shift($arr);
    $leftOutput = $rightOutput = array();
    for ($i=0; $i < count($arr); $i++) {
      if ($arr[$i] < $pivot) {
        array_push($leftOutput ,$arr[$i]);
      }
      else {
        array_push($rightOutput , $arr[$i]);
      }
    }
    return  array_merge(quickSort($leftOutput),array($pivot),quickSort($rightOutput));
  }
}
$inputArray = array(23, 457, 990, 12, 67980, 34, 6677, 8, 10);
$sortedArray = quickSort($inputArray);
echo "<pre>";
echo "Init: ";
print_r($inputArray);
echo "Sorted: ";
print_r($sortedArray);
echo "</pre>";
?>
