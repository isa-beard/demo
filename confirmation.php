<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>テスト</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/contents.css">
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="js/yubinbango.js"></script>
</head>
<body>
    

<?php

    $aodamo =$_GET['aodamo'];
    $momizi =$_GET['momizi'];
    $name = $_GET['name'];
    $address =$_GET['address'];



    require_once('db_connect.php');

    try {
        // データベースに接続
        $dbh = db_connect();
    
        //例外処理を投げるようにする（throw）
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO users (name, address) VALUES (:name, :address)";

        $statement = $dbh->prepare($sql);

        $statement->bindParam(':name', $name);
        $statement->bindParam(':address', $address);

        $statement->execute();


        $sql2 = "SELECT id FROM users WHERE name=:name AND address=:address";

        $user_inf = $dbh->prepare($sql2);

        $user_inf->bindParam(':name', $name);
        $user_inf->bindParam(':address', $address);

        $user_inf->execute();

        $row = $user_inf->fetchAll(PDO::FETCH_ASSOC);

        foreach($row as $loop){

           /* $sql3 = "SELECT genre_id, content, inquiry_status FROM Inquirys WHERE user_id=:id";

            $order = $dbh->prepare($sql3);

            $comment->bindParam(':id', $loop['id'], PDO::PARAM_INT);
            $comment->execute();*/


            if(!empty($aodamo)){

                $merchandise = "アオダモ";

                $sql3 = "SELECT * FROM merchandise WHERE merchandise=:aodamo";
                
                $order = $dbh->prepare($sql3);

                $order->bindParam(':aodamo', $merchandise);

                $order->execute();

                $orderLoop = $order->fetchAll(PDO::FETCH_ASSOC);

                foreach($orderLoop as $merchandiseLoop){

                    $total = $merchandiseLoop['price'] * $aodamo;

                    $sql4 = "INSERT INTO `order` (user_id, merchandise_id, purchase, pieces) VALUES (:user_id, :merchandise_id, :purchase, :pieces)";

                    $purchase = $dbh->prepare($sql4);

                    $purchase->bindParam(':user_id', $loop['id'], PDO::PARAM_INT);
                    $purchase->bindParam(':merchandise_id', $merchandiseLoop['merchandise_id'], PDO::PARAM_INT);
                    $purchase->bindParam(':purchase', $aodamo, PDO::PARAM_INT);
                    $purchase->bindParam(':pieces', $total, PDO::PARAM_INT);

                    $purchase->execute();


                }

            }elseif(!empty($momizi)){

                $merchandise = "モミジ";
    
                $sql3 = "SELECT * FROM merchandise WHERE merchandise=:momizi";
                    
                $order = $dbh->prepare($sql3);
    
                $order->bindParam(':momizi', $merchandise);
                $order->execute();
    
                $orderLoop = $order->fetchAll(PDO::FETCH_ASSOC);
    
                foreach($orderLoop as $merchandiseLoop){

                    $total = $merchandiseLoop['price'] * $momizi;
    
                    $sql4 = "INSERT INTO `order` (user_id, merchandise_id, purchase, pieces) VALUES (:user_id, :merchandise_id, :purchase, :pieces)";
    
                    $purchase = $dbh->prepare($sql4);
    
                    $purchase->bindParam(':user_id', $loop['id'], PDO::PARAM_INT);
                    $purchase->bindParam(':merchandise_id', $merchandiseLoop['merchandise_id'], PDO::PARAM_INT);
                    $purchase->bindParam(':purchase', $momizi, PDO::PARAM_INT);
                    $purchase->bindParam(':pieces', $total, PDO::PARAM_INT);
    
                    $purchase->execute();
    
    
                }
    

            }else{

                break;
            }



            
        }



        //データベース接続切断
        $statement = null;
        $dbh = null;
    
    } catch (PDOException $e) {
        header('Content-Type: text/plain; charset=UTF-8', true, 500);
        // エラー内容は本番環境ではログファイルに記録して， Webブラウザには出さないほうが望ましい
        exit($e->getMessage()); 
    }
?>
            <table class="table">
                <tr>
                    <th></th>
                    <td><a href="index.php" class="cof__botton">ショップ画面に戻る</a></td>
                </tr>
            </table>

</body>
</html>