<?php
/// Symbols: _ . : ; o * & 8 # @
function loadImageFile($path)
{
  $image = @imagecreatefromjpeg($path);
  if (!$image) {
    echo "Error while loading " . $path .".";
  }
  return $image;
}
function average($colorVal) {    // binary hex rgb

  $r = $g = $b = 0;

  $r = ($colorVal >> 16) & 0xff;
  $g = ($colorVal >> 8) & 0xff;
  $b = $colorVal & 0xff;
//  echo($r . " " . $g . " " . $b . " <br>");
  $hue = $r * 0.299 + $g * 0.587 + $b * 0.114;
  //echo $hue;
  //return "";
  return floor(($hue * 10) / 256);
}

function imageToString($file)
{
  $img = loadImageFile($file);
  list($width, $height) = getimagesize($file);
  $sym = array_reverse(array("_", ".", ":", "*","+", "0", "s", "8", "&amp;", "#"));
  $string = "";
  for ($row=0; $row < $height; $row++) {
    for ($column=0; $column < $width ; $column++) {
      $farbe = imagecolorat($img, $column, $row);
      $string .= $sym[average($farbe)];
    }
    $string .= "<br>";
  }
  return $string;
}


function color_inverse($color){
    $color = str_replace('#', '', $color);
    if (strlen($color) != 6){ return '000000'; }
    $rgb = '';
    for ($x=0;$x<3;$x++){
        $c = 255 - hexdec(substr($color,(2*$x),2));
        $c = ($c < 0) ? 0 : dechex($c);
        $rgb .= (strlen($c) < 2) ? '0'.$c : $c;
    }
    return '#'.$rgb;
}


$file = "./image.jpg";


 ?>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
    <?php
      if(isset($_GET["hex"])){
        $mono = $_GET["hex"];
      }
      else {
        $mono = "000000";
      }
      echo ("<style>body{color: #" . $mono . "; background-color: " . color_inverse($mono) ."}</style>");
     ?>
    <style>
    body{
    font-family: monospace;
    line-height: .74;
      font-size: 5px;}</style>
  </head>
  <body>
    <?php echo imageToString($file); ?>
    <img src="image.jpg" />
  </body>
</html>
