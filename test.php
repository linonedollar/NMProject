<?php
	$id = $_COOKIE["login"];

	$ans = $_GET['data'];
	$data_arr = json_decode($ans,true);
	
 	$start = date("Y-m-d H:i:s"); 

    $servername = "localhost";
    $dbname = "nightmarket";
    $account = "root";
    $password = "1234";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $account, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("Insert into lesson_stu_list(student_id,lesson_name,lesson_time) value(:student_id,:lesson_name,:lesson_time)"); //prepareStatement

    $stmt->bindParam(':student_id', $id); //加入參數
    $stmt->bindParam(':lesson_name', $ans);
    $stmt->bindParam(':lesson_time', $start);

    $stmt->execute(); //執行查詢

    //header("Refresh:1,url=index.php");
    header("Location: ./index.php");
?>