<?php

include("include/config.php");

 $panels = array("TopArm", "BotArm", "LLD", "RLD", "PWR", "AUX", "DATA", "ENABLE_DRIVE");
 $servo_list = file_get_contents("http://localhost:5000/servo/body/list");
 $convert = explode("\n", $servo_list);

 for ($i=0;$i<count($convert);$i++)  
 {
    $data = str_getcsv($convert[$i]);
    $list[$i] = $data[0];
 }

 $servo_name=$_GET["servo_name"];
 $value=$_GET["value"];

 if (isset($servo_name)) {
   $url = "http://localhost:5000/servo/body/".$servo_name."/".$value."/0";
   $handle = fopen($url, "r");
 }


?>

 <body>
 <div id="diagram">
  <img border=0 src="images/Body.png">
 </div>
 <div id="menu">
  <table border=1>
   <tr>
    <th>Panel</th>
    <th colspan=2>Control</th>
   </tr>
  <?php

    foreach ($panels as $panel) {
      if (in_array($panel, $list)) {
         echo "<tr>\n";
         echo " <td>$panel</td>\n";
         echo " <td><a href=\"?page=body&servo_name=$panel&value=0.9\">Open</a></td>\n";
         echo " <td><a href=\"?page=body&servo_name=$panel&value=0\">Close</a></td>\n";
         echo "</tr>\n";
      } else {
         echo "<tr>\n";
         echo " <td><i>$panel</i></td>\n";
         echo " <td>-</td><td>-</td>\n";
         echo "</tr>\n";
      }
    }
  ?>
  </table>
 </div>


