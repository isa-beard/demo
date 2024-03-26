<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>管理画面</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/contents.css">

  <script src="js/jquery-3.7.1.min.js"></script>
</head>
<body>

<div class="container-xl">
    <div class="container-lg">
            <table class="m__table">
                <tr>
                    <th>ID</th>
                    <th>名前</th>
                    <th>住所</th>
                    <th>アオダモ</th>
                    <th>モミジ</th>
                    <th>キャンセル</th>
                </tr>

<?php

    require_once('db_connect.php');

    try {
        // データベースに接続
        $dbh = db_connect();

        //例外処理を投げるようにする（throw）
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM `order` o LEFT JOIN users u ON o.user_id=u.id LEFT JOIN merchandise m ON o.merchandise_id=m.merchandise_id";

        $users_select = $dbh->prepare($sql);

        

        $users_select->execute();

        $row = $users_select->fetchAll(PDO::FETCH_ASSOC);

        foreach($row as $loop){

                    print '
                    <tr>
                        <form action="update.php" method="post">
                            <td><input type="number" class="" name="id[]" value="'.$loop['order_id'].'" readonly></td>
                            <td><input type="text" class="" name="name[]" value="'.$loop['name'].'" readonly></td>
                            <td><input type="text" class="management__table" name="address[]" value="'.$loop['address'].'" readonly></td>
                            <td><input type="text" class="management__table" name="purchase[]" value="'.$loop['purchase'].'" readonly></td>
                            <td><input type="text" class="management__table" name="purchase[]" value="'.$loop['purchase'].'" readonly></td>
                            <td><button type="submit" class="delete__button" name="delete">キャンセル</button></td> 
                        </form>    
                    </tr>
                    ';

        }

        
    } catch (PDOException $e) {
        header('Content-Type: text/plain; charset=UTF-8', true, 500);
        // エラー内容は本番環境ではログファイルに記録して， Webブラウザには出さないほうが望ましい
        exit($e->getMessage()); 
    }

?>
            </table>
    </div>
</div>

<script src="js/management.js"></script>
</body>
</html>