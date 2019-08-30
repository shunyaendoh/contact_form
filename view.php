<?php
// 目的: 画面にお問い合わせの一覧を出す
require_once('functions.php');
require_once('dbconnect.php');

$stmt = $dbh->prepare('SELECT * FROM surveys');

$stmt->execute();

$results = $stmt->fetchAll();

// var_dump($results);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ一覧</title>
</head>
<body>
    <h1>一覧</h1>

    <!-- 一覧表示 -->
<?php foreach($results as $result) { ?>     
    <p>名前: <?php echo h($result['username'])?></p>
    <p>メールアドレス: <?php echo h($result['email'])?></p>
    <p>内容: <?php echo h($result['content'])?></p>

    <hr>
    <?php 
} ?> 

    
</body>
</html>