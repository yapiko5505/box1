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
        try
        {
            $staff_code=$_POST['code'];
            $staff_name=$_POST['name'];
            $staff_pass=$_POST['pass'];

            $dsn = 'mysql:dbname = shop; host = localhost; charset=utf8';
            $user = 'root';
            $password = '';

            $dbh = new PDO($dsn, $user, $password);
            $dbh->query('PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION');

            $staff_name=htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
            $staff_pass=htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');

            $sql = 'UPDATE mst_staff SET name=?, password=?; WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $staff_name;
            $data[] = $staff_pass;
            $data[] = $staff_code;
            $stmt->execute($data);

            $dbh = null;


        }
        catch (Exception $e)
        {
            print 'ただいま障害により大変ご迷惑をおかけしております。';
            exit();
        }
        
    ?>

    <p>修正しました。</p><br><br>
    <a href = "staff_list.php">戻る</a>  

</body>
</html>