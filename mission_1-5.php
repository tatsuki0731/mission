<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<form action="mission_1-5.php" method="post"  >
  <textarea name="contents" cols="40" rows="20"></textarea>
  <input type="submit" value="‘—M" />
</form>

<?php
$contents = $_POST['contents'];
if ($contents) {
  $fp = fopen('write.txt', 'w');
  fputs($fp, $contents);
  fclose($fp);
  print "‘‚«ž‚ÝŠ®—¹‚µ‚Ü‚µ‚½";
}
?>

</body>
</html>