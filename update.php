<?php

$id =$_POST['id'];

print_r($id);

for($i = 0;$i < count($id);$i++){

   if(isset($id[$i])){
      require_once('db_connect.php');
   
            try {
               // データベースに接続
               $dbh = db_connect();
           
               //例外処理を投げるようにする（throw）
               $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
               $sql = "DELETE FROM `order` WHERE order_id=".$id[$i]."";
       
               $statement = $dbh->prepare($sql);
       
               $statement->execute();
       
               //データベース接続切断
               $statement = null;
               $dbh = null;
           
           } catch (PDOException $e) {
               header('Content-Type: text/plain; charset=UTF-8', true, 500);
               // エラー内容は本番環境ではログファイルに記録して， Webブラウザには出さないほうが望ましい
               exit($e->getMessage()); 
           }

   }

   break;
}


      

   header('Location:admin.php');





?>