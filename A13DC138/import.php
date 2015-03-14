<?php
require_once('util.php');
session_start();
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
  <h1>出納データインポート</h1>
  <p><?php echo $_POST['username'] ?>でログインしています。</p>
  <form action="import2file.php" method="POST" enctype="multipart/form-data">
    <fieldset>
      <legend>出納CSVファイルアップロード</legend>
      <div class="form-group">
        <input type="file" name="attachment">
      </div>
    </fieldset>
    <button tupe="submit" class="btn btn-primary">アップロード</button>
  </form>
</div>



</body>
</html>