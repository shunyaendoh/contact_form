<?php
// このページが表示された時の送信方法
// GET or POST の確認
// もしGETの場合は入力画面に戻す

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    header('Location: index.html');

}

// function.phpを読み込む
require_once('functions.php');

// スーパーグローバル変数
// PHPがもともと持っている変数

// 送信されてきた値の取得
// エスケープ処理をして,XSSの対策をする


// エスケープ処理:html special character


// global $username,$email,$content;
$username = h($_POST['username']);
$email = h($_POST['email']);
$content = h($_POST['content']);

// ユーザー名がからかチェック
if ($username == '') {
    $usernameResult = 'ユーザー名が入力されていません';
} else {
    $usernameResult = $username;
}

if ($email == '') {
    $emailResult = 'メールアドレスが入力されていません';
} else {
    $emailResult = $email;
}

if ($content == '') {
    $contentResult = 'お問い合わせ内容が入力されていません';
} else {
    $contentResult = $content;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>入力内要確認</title>
</head>
<body>
    <h1>入力内容確認</h1>

    <p>名前: <?php echo $usernameResult ?></p>
    <p>メールアドレス: <?php echo $emailResult ?></p>
    <p>内容: <?php echo $contentResult ?></p>

    <form action="./thanks.php" method="POST">
        <input type="hidden" value="<? echo $username ?>" name="username">
        <input type="hidden" value="<? echo $email ?>" name="email">
        <input type="hidden" value="<? echo $content ?>" name="content">
        <button type="button" onClick="history.back()">戻る</button>
        <input type="submit" value="OK">
    </form>
</body>
</html>