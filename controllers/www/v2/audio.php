<?php

include("include/config.php");

$play = $_GET["play"];
$random = $_GET["random"];
$vol = $_GET["vol"];

if(isset($vol)) {
   $url = "http://localhost:5000/audio/volume/".$vol;
   $handle = fopen($url, "r");
}


if(isset($play)) {
   echo "Playing.... $play\n";
   $url = "http://localhost:5000/audio/".$play;
   $handle = fopen($url, "r");
}

if(isset($random)) {
   echo "Playing.... $play\n";
   $url = "http://localhost:5000/audio/random/".$random;
   $handle = fopen($url, "r");
}

$url = "http://localhost:5000/audio/volume";
$fh = fopen($url, "r");
echo "Current Volume: ".round(stream_get_contents($fh), 2)."<br />";
echo "<a href=\"?page=audio&vol=up\">Volume Up</a> | <a href=\"?page=audio&vol=down\">Volume Down</a>";

$url = "http://localhost:5000/audio/list";
$fh = fopen($url, "r");
$files = str_getcsv(str_replace(" ", "", stream_get_contents($fh)), ",");
//$files = str_getcsv($filelist, ",");
sort($files);
# $files = array_diff(scandir($sound_dir), array('..', '.'));
$num_files=sizeof($files);
$num_rows=($num_files/$num_cols)+1;

echo "<table id='table' cols=11>\n";
echo "<tr>\n";
echo " <td><a href=\"?random=alarm\">Alarm</a></td>\n";
echo " <td><a href=\"?random=happy\">Happy</a></td>\n";
echo " <td><a href=\"?random=hum\">Hum</a></td>\n";
echo " <td><a href=\"?random=misc\">Misc</a></td>\n";
echo " <td><a href=\"?random=quote\">Quotes</a></td>\n";
echo " <td><a href=\"?random=razz\">Razz</a></td>\n";
echo " <td><a href=\"?random=sad\">Sad</a></td>\n";
echo " <td><a href=\"?random=sent\">Sent</a></td>\n";
echo " <td><a href=\"?random=ooh\">Oooh</a></td>\n";
echo " <td><a href=\"?random=proc\">Proc</a></td>\n";
echo " <td><a href=\"?random=whistle\">Whistle</a></td>\n";
echo " <td><a href=\"?random=scream\">Scream</a></td>\n";
echo "</tr>\n";
echo "</table>\n";

echo "<table id='table' cols=$num_cols>\n";

for ($i = 0 ; $i < $num_rows ; $i++) {
   $start_num = $i*$num_cols;
   echo "<tr>\n";
   echo " <td><a href=\"?play=".$files[$start_num]."\">".$files[$start_num]."</a></td>\n";
   echo " <td><a href=\"?play=".$files[$start_num+1]."\">".$files[$start_num+1]."</a></td>\n";
   echo " <td><a href=\"?play=".$files[$start_num+2]."\">".$files[$start_num+2]."</a></td>\n";
   echo " <td><a href=\"?play=".$files[$start_num+3]."\">".$files[$start_num+3]."</a></td>\n";
   echo " <td><a href=\"?play=".$files[$start_num+4]."\">".$files[$start_num+4]."</a></td>\n";
   echo " <td><a href=\"?play=".$files[$start_num+5]."\">".$files[$start_num+5]."</a></td>\n";
   echo "</td>\n";
} 

?>
  </table>


