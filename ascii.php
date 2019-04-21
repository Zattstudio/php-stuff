<?php
/// Zeichen: _ . : ; o * & 8 # @
function loadImageFile($path)
{
  $image = @imagecreatefromjpeg($path);
  if (!$image) {
    echo "Fehler beim laden des von " . $path .".";
  }
  return $image;
}
function average($farbwert) {    // binär hex rgb

  $r = $g = $b = 0;

  $r = ($farbwert >> 16) & 0xff;
  $g = ($farbwert >> 8) & 0xff;
  $b = $farbwert & 0xff;
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
  $zeichen = array_reverse(array("_", ".", ":", "*","+", "0", "s", "8", "&amp;", "#"));
  $string = "";
  for ($zeilen=0; $zeilen < $height; $zeilen++) {
    for ($spalten=0; $spalten < $width ; $spalten++) {
      $farbe = imagecolorat($img, $spalten, $zeilen);
      $string .= $zeichen[average($farbe)];
      ///var_dump( $farbe );
      //echo average($farbe) . "<br>";
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
//$bild = "./photo.jpg";
//echo(loadImageFile("photo.jpg"));
//echo ("Breite: " . $width . "<br>Höhe: " . $height . "<br>");


//echo imageToString($img);


 ?>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
    <?php
      if(isset($_GET["hex"])){
        $monofarbe = $_GET["hex"];
      }
      else {
        $monofarbe = "000000";
      }
      echo ("<style>body{color: #" . $monofarbe . "; background-color: " . color_inverse($monofarbe) ."}</style>");
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
