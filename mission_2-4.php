<?php
$dataFile = 'log.txt';

function h($s)
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

if (isset($_POST['toukou'])){

    $lines = file('log.txt');
    $fp = fopen("write.txt", "r");
    $number = fgets($fp);
    $num = $number+1;
    fclose ($fp);

    $message = $_POST['message'];
    $user = $_POST['user'];
    $time = date("Y/m/d H:i:s");


    $newData = "{番号}" . "<" . $num . ">" . "\t" . "{名前}" . "<" . $user . ">" . "\t" . "{コメント}" . "<" . $message . ">" . "\t" . $time . "\n";

     write($dataFile, $newData, "a");
}

$posts = file($dataFile, FILE_IGNORE_NEW_LINES);
$posts = array_reverse($posts);

if (isset($_POST['delete']))
{
    for ($i = 0; $i < count($posts); $i++)
    {
        $items = explode("\t", $posts[$i]);
        if($items[0] == "{番号}<{$_POST['delno']}>")
        {
            $posts[$i] = "";
        }
    }
    
    $newData = array_reverse($posts);
    $newData = implode("\n", $newData) . "\n";

    write($dataFile, $newData, "w");
}

$all_posts = count($posts);
foreach($posts as $post)
{
    if(empty($post)){ $all_posts--; }
}

function write($dataFile, $newData, $mode)
{
    $fp = fopen($dataFile, $mode);
    fwrite($fp, $newData);
    fclose($fp);
}

?>
<?php
if (((isset($_POST["user"])) && ($_POST["user"] != "")) or ((isset($_POST["message"])) && ($_POST["message"] != "")))
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

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>2-4</title>
    </head>
    <body>
        
        <form action="" method="post">
            名前：<br />
		<input type="text" size = 30  name="user"><br/>
            コメント：<br/>
		<textarea name ="message" cols = "30" rows = "5"></textarea><br />
		<br />
            <input type="submit" name="toukou" value="送信する"><br />
		<br />
        </form>
        <form method="post" action="">
            削除対象番号：<input type="text" name="delno"> <input type="submit" name="delete" value="削除">
        </form>
      
        <ul>
<?php if (count($posts)): ?>
    <?php foreach ($posts as $post): ?>
        <?php if (empty($post)) continue; ?>
        <?php list($cnt, $user, $message, $time) = explode("\t", $post); ?>
                    <li><?php echo h($cnt); ?> <?php echo h($user); ?> <?php echo h($message); ?><?php echo h($time)?></li>
                <?php endforeach ?>
            <?php else: ?>
                <li>まだ投稿はありません。</li>
            <?php endif; ?>
        </ul>
    </body>
</html>    