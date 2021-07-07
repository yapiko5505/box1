<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ろくまる農園</title>
</head>
<body>
    <?php
            $pro_code = $_GET['procode'];

            $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
            $user = 'root';
            $password = '';
            
        try
        {
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'SELECT name, price FROM mst_product WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $pro_code;
            $stmt->execute($data);

            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $pro_name=$rec['name'];
            $pro_price=$rec['price'];

            $dbh = null;

        }
        catch (Exception $e)
        {
            print 'ただいま障害により大変ご迷惑をおかけしております。';
            exit();
        }
    ?>

    <p>商品修正<br></p>
    <p>商品コード<br></p>
    <?php print $pro_code; ?><br><br>
    <form method="post" action="pro_edit_check.php">
        <input type="hidden" name="code" value="<?php print $pro_code; ?>">
        <p>商品名<br></p>
        <input type="text" name="name" style="width:200px" value="<?php print $pro_name; ?>"><br>
        <p>価格</p>
        <input type="text" name="price" style="width:50px" value="<?php print $pro_price; ?>"><br>
        <br>
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK" >
    </form>
</body>

</html>