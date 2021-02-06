<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Whats color?</title>
</head>

<body>
<?php

error_reporting(0);
function rgb2hex($rgb) {
   $hex = "#";
   $hex .= str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT);
   $hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT);
   $hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT);

   return $hex; // returns the hex value including the number sign (#)
}

 

$path = "2.jpg";


// histogram options

$maxheight = 300;
$barwidth = 2;

$im = ImageCreateFromJpeg($path);

$imgw = imagesx($im);
$imgh = imagesy($im);

// n = total number or pixels

$n = $imgw*$imgh;

$histo = array();

for ($i=0; $i<$imgw; $i++)
{
        for ($j=0; $j<$imgh; $j++)
        {

                // get the rgb value for current pixel

                $rgb = ImageColorAt($im, $i, $j);
                //echo $rgb."<br>";
                // extract each value for r, g, b

                $r = ($rgb >> 16) & 0xFF;
                $g = ($rgb >> 8) & 0xFF;
                $b = $rgb & 0xFF;

                // get the Value from the RGB value

                $V = round(($r + $g + $b) / 3);
                //echo $V."<br>";
                // add the point to the histogram

                $histo[$V] += $V / $n;
                $histo_color[$V] = rgb2hex([$r,$g,$b]);

        }
}

// find the maximum in the histogram in order to display a normated graph

$max = 0;
for ($i=0; $i<255; $i++)
{
        if ($histo[$i] > $max)
        {
                $max = $histo[$i];
        }
}
//Убрал вывод гистограммы из-за ненадобности
//echo "<div style='width: ".(256*$barwidth)."px; border: 2px solid'>";
for ($i=0; $i<255; $i++)
{
        $val += $histo[$i];

        $h = ( $histo[$i]/$max )*$maxheight;

//        echo "<img src=\"img.gif\" width=\"".$barwidth."\"
//height=\"".$h."\" border=\"0\">";
}
//echo "</div>";

$key = array_search ($max, $histo);
$col = $histo_color[$key];

?> 
<div>
<h1><p align="center" style="min-width:100px; min-height:100px; background-color:<?php echo $col?>;">Самый распространенный цвет <?php echo $col?></p></h1>
<img src="<?php echo $path?> "style="display: block; margin: 0 auto;"></div>
</body>
</html>