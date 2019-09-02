<?php

require_once('functions.php');
require_once('dbconnect.php');

$username = '';

if (isset($_GET['username'])) {
    $username = $_GET['username'];
}


$stmt = $dbh->prepare('SELECT * FROM surveys WHERE username = ?');

$stmt->execute([$username]);

$results = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>検索画面</title>
</head>
<body>
    <h1>検索画面</h1>
    <form action="" method="get">
        <p>検索したい名前を入力してください</p>
        <input type="text" name="username">
        <input type="submit" value="検索">
    </form>

    <h2>検索結果</h2>
<?php foreach($results as $result) { ?>
    <p>名前: <?php echo h($result['username'])?></p>
    <p>メールアドレス: <?php echo h($result['email'])?></p>
    <p>内容: <?php echo h($result['content'])?></p>
    <hr>
<?php
} ?>

</body>
</html>