<?php
require_once('util.php');
session_start();

if (!signed_in()) {
  redirect_to('login.php');
}
?>
<html>
<head>
    <meta charset="utf-8" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
<div class="container">
<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
  <ul class="nav navbar-nav">
    <li>
      <a class="navbar-brand">Webプログラミング演習1<br />前期期末試験</a>
    </li>
    <li>
      <a href="login.php">ログイン</a>
    </li>
    <li>
      <a href="index.php">メニュー</a>
    </li>
    <li>
      <a href="record.php">登録画面</a>
    </li>
    <li>
      <a href="list.php">一覧画面</a>
    </li>
<?php if ($_SESSION['username'] == 'admin') { ?>
    <li>
      <a href="import.php">インポート画面</a>
    </li>
<?php } ?>
  </ul>
  <ul class="nav navbar-nav navbar-right">
    <li><a href="logout.php">ログアウト</a></li>
    <li><a>A13DC138</a></li>
  </ul>
</nav>
</div>
</header>

<div class="container">
  <h1>家計簿メニュー</h1>
  <p><?php echo $_SESSION['username'] ?>でログインしています。</p>
  <ul>
    <li><a href="record.php">登録する</a></li>
    <li><a href="list.php">家計簿を見る</a></li>
<?php if ($_SESSION['username'] == 'admin') { ?>
    <li><a href="import.php">インポート</a></li>
<?php } ?>
  </ul>
</div>



</body>
</html>