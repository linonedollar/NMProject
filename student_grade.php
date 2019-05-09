<?php
    include("header.php");


    $servername = "localhost";
    $dbname = "nightmarket";
    $account = "root";
    $password = "1234";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $account, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("SELECT * FROM lesson_stu_list WHERE student_id = :uid"); //prepareStatement

    $stmt->bindParam(':uid', $user_id); //加入參數

    $stmt->execute(); //執行查詢

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>成績單</title>
</head>
<body>
    <table>
        <tr>
            <th>課程名稱</th>
            <th>上課時間</th>
        </tr>
            <?php
                foreach ($result as $key) {
                    echo "<tr>";
                        echo "<td>".$key['lesson_name']."</td>";
                        echo "<td>".$key['lesson_time']."</td>";
                    echo "</tr>";
                }
            ?>
    </table>
</body>
</html>