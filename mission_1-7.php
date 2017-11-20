<?php
$fp = fopen('write.txt', 'r');
while (!feof($fp)) {
 $line = fgets($fp);
 print $line;
 print "<br>\n";
}
 fclose($fp);
?>