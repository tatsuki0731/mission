<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<form action="mission_1-6.php" method="post"  >
  <textarea name="contents" cols="10" rows="5"></textarea>
  <input type="submit" value="‘—M" />
</form>

<?php
$contents = $_POST['contents'];
if ($contents) { 
 $a = fopen ("write.txt", "a" );
 fputs($a, $contents . PHP_EOL);
 fclose($a);
 print"’Ç‰Á‚µ‚Ü‚µ‚½"; 
 }
?>

</body>
</html>