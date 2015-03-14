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
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="js/jquery.tablesorter.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <style>
  .tar{text-align:right;}
  .number-yen:after{
    content: '円';
    padding-left: 5px;
  }
  .header:after{
    padding-left: 5px;
    content: '↕';
  }
  .headerSortUp:after{
    padding-left: 5px;
    content: '↑';
  }
  .headerSortDown:after{
    padding-left: 5px;
    content: '↓';
  }
  </style>
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
  <h1>一覧画面</h1>
  <table class="tablesorter table table-striped">
    <thead>
      <tr>
        <th>日付</th>
        <th>内容</th>
        <th class="tar">出金</th>
        <th class="tar">入金</th>
        <th class="tar">削除</th>
      </tr>
    </thead>
    <tbody>
<?php
$files = scandir('items');
foreach ($files as $f) {
  if ( $f !== "." && $f !== ".."){
    $path = 'items/' . $f;
    $texts = explode(',', file_get_contents($path) );
    echo '<tr>';
    for ($i=0; $i <= 1; $i++) {
      echo '<td>' . htmlspecialchars($texts[$i]) . '</td>';
    }
    for ($i=2; $i <= 3; $i++) {
      echo '<td class="tar number-format">' . htmlspecialchars($texts[$i]) . '</td>';
    }
    echo '<td class="tar"><a href="" class="delete-btn">del<span class="hide">' . $f . '</span></a></td>';
    echo '</tr>';
  }
}
?>
    </tbody>
  </table>
</div>
<script>
$(function(){
  $('.number-format').each(function() {
    num = $(this).text();
    if(num == 0){
      $(this).text('');
    }else if (num.length > 3){
      $(this).text(Number(num).toLocaleString());
    }
    if(num > 0){
      $(this).addClass('number-yen');
    }
  });
  $(".tablesorter").tablesorter({
    headers: {
      4: {sorter: false}
    }
  });
  $('.delete-btn').on('click', function(e){
    e.preventDefault();
    var file = $(this).find('span').text();
    var deleteRow = $(this).parents('tr');
    $.ajax({
      url: 'delete.php',
      type: 'POST',
      data: {file: file},
    })
    .done(function(){
      deleteRow.remove();
    });
  });
});
</script>
</body>
</html>