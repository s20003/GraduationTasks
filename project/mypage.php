<?php
session_start();
require_once './classes/UserLogic.php';
require_once './functions.php';

//　ログインしているか判定し、していなかったら新規登録画面へ返す
$result = UserLogic::checkLogin();

if (!$result) {
  $_SESSION['login_err'] = 'ユーザを登録してログインしてください！';
  header('Location: signup.php');
  return;
}

$login_user = $_SESSION['login_user'];

?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="src/css/style.css" />
    <title>ひまッチ ― マイページ</title>
  </head>
  <body>
    <header class="header">
      <div class="header-inner">
        <h1 class="header-logo"><a href="index.php">ひまッチ</a></h1>
        <!-- /.header-logo -->
        <nav class="header-nav">
          <ul class="nav-list">
            <li class="list-item"><a href="search.html">検索</a></li>
            <!-- /.list-item -->
            <li class="list-item"><a href="post.php">投稿</a></li>
            <!-- /.list-item -->
            <li class="list-item" id="modal-btn"><a>アカウント</a></li>
            <!-- /.list-item -->
          </ul>
          <!-- /.nav-list -->
        </nav>
        <!-- /.header-nav -->
      </div>
      <!-- /.header-inner -->
    </header>
    <!-- /.header -->
    <h2>マイページ</h2>
    <p>ログインユーザ：<?php echo h($login_user['name']) ?></p>
    <p>メールアドレス：<?php echo h($login_user['email']) ?></p>
    <form action="./logout.php" method="POST">
      <input type="submit" name="logout" value="ログアウト" />
      <a href="./index.php">ホームに戻る</a>
    </form>
    <script text="javascript" src="src/js/script.js"></script>
  </body>
</html>
