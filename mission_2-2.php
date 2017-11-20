<html>
<body>
<form action = "mission_2-2.php" method = "post">
  名前 : <br />
  <input type = "text" name = "name" size = 30 value = "" /><br />
  コメント : <br />
  <textarea name = "comment" cols = "30" rows = "5"></textarea><br />
  <br />
  <input type = "submit" value = "送信する" />
</form>
 
<?php
if (((isset($_POST["name"])) && ($_POST["name"] != "")) or ((isset($_POST["comment"])) && ($_POST["comment"] != "")))
{
if (isset($_POST["name"]))
{
$name = $_POST["name"];
if( get_magic_quotes_gpc() ) { $name = stripslashes("$name"); }
$name = htmlspecialchars ($name);
$name = mb_substr ($name, 0, 30, 'UTF-8');
}
if (isset($_POST["comment"]))
{
$comment = $_POST["comment"];
if( get_magic_quotes_gpc() ) { $comment = stripslashes("$comment"); }
$comment = mb_substr ($comment, 0, 200, 'UTF-8');
}

$fp = fopen("write.txt", "r");
$number = fgets($fp);
$i = $number+1;
fclose ($fp);
$time = date("Y/n/j G:i");
$write = $i . "<>" . $name . "<>" . $comment . "<>" . $time .PHP_EOL ;
$fp = fopen ("./log.txt","a+");
flock ($fp, LOCK_EX);
fputs ($fp,$write);
flock ($fp, LOCK_UN);
fclose ($fp);
}

?>

<?php
if (((isset($_POST["name"])) && ($_POST["name"] != "")) or ((isset($_POST["comment"])) && ($_POST["comment"] != "")))
{

  $fp = fopen('write.txt', 'r');
  $number = fgets($fp);
  $i = $number+1;
  fclose($fp);
  $fp = fopen('write.txt', 'w');
  fputs($fp, $i);
  fclose($fp);
  print "書き込み完了しました";
}
?>




</body>
</html>