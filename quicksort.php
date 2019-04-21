<?php
//error_reporting(-1);
function quickSort($arr)
{

  if(count($arr) <= 1) return $arr;
  else {
    $pivot = array_shift($arr);
//var_dump("pivot" . $pivot);
    $leftOutput = $rightOutput = array();
    for ($i=0; $i < count($arr); $i++) {
//var_dump("i" . $arr[$i]);
      if ($arr[$i] < $pivot) {
        array_push($leftOutput ,$arr[$i]);
        //print_r($leftOutput);
         //print("pivot<" . $arr[$i] . "<br>");
      }
      else {
        array_push($rightOutput , $arr[$i]);
        //print_r($rightOutput);
        //print("pivot>" . $arr[$i] . "<br>");
      }
    }
    //echo "Left: "; print_r($leftOutput); echo "<br>Right: "; print_r($rightOutput);
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
<h1>Source Code</h1>
<style>body{margin: 0px;}</style>
<div style="background-color: #2ee6c2;">
<pre>
  //error_reporting(-1);
  function quickSort($arr)
  {

    if(count($arr) <= 1) return $arr;
    else {
      $pivot = array_shift($arr);
  //var_dump("pivot" . $pivot);
      $leftOutput = $rightOutput = array();
      for ($i=0; $i < count($arr); $i++) {
  //var_dump("i" . $arr[$i]);
        if ($arr[$i] < $pivot) {
          array_push($leftOutput ,$arr[$i]);
          //print_r($leftOutput);
           //print("pivot<" . $arr[$i] . "<br>");
        }
        else {
          array_push($rightOutput , $arr[$i]);
          //print_r($rightOutput);
          //print("pivot>" . $arr[$i] . "<br>");
        }
      }
      //echo "Left: "; print_r($leftOutput); echo "<br>Right: "; print_r($rightOutput);
      return  array_merge(quickSort($leftOutput),array($pivot),quickSort($rightOutput));
    }
  }
  $inputArray = array(24,0, 20, 1, 13, 5, 22, 24, 14,5,5,5,5,5,5);
  $sortedArray = quickSort($inputArray);
</pre>
</div>
