<?php

$Origin = isset($_SERVER['HTTP_ORIGIN'])?$_SERVER['HTTP_ORIGIN']:"*";   // HTTP_HOST,HTTP_ORIGIN,SERVER_NAME
header("Access-Control-Allow-Origin: {$Origin}");           // 如果$origin为*号时,则跨域访问不支持cookie的发送
header("Access-Control-Allow-Methods:POST,GET,OPTIONS");    // 允许请求的类型
header("Access-Control-Allow-Credentials:true");            // 跨域访问是否允许带cookie的发送
header("Content-Type:application/json;charset=utf-8");      // cors请求时,谷歌浏览器包含的头信息
// header("Access-Control-Allow-Origin:*");
// header("Content-Type:application/json;charset=utf-8");
try{
require_once("./connect_cgd103g4.php");

  $sql = "select * from `member` where mem_email=:signupEmail"; 
  $member = $pdo->prepare($sql);
  $member->bindValue(":signupEmail", $_POST["signupEmail"]);
  $member->execute();
//   echo $member->rowCount();
$rows = $member->rowCount();

  if( $rows){ //有該帳號(回傳false)
	$result_array = ["code"=>"0"];
    echo json_encode($result_array);
  }else{ //註冊成功
    $sql2 = "insert into `member` (`mem_name`, `mem_email`, `mem_psw`, `mem_phone`) VALUES 
	(:signupName, :signupEmail, :signupPsw, :signupTel); "; 
  	$member2 = $pdo->prepare($sql2);
  	$member2->bindValue(":signupName", $_POST["signupName"]);
  	$member2->bindValue(":signupEmail", $_POST["signupEmail"]);
  	$member2->bindValue(":signupPsw", $_POST["signupPsw"]);
  	$member2->bindValue(":signupTel", $_POST["signupTel"]);
  	$member2->execute();


	  $nowTime = time();
            // $token = md5($resArray["mem_account"].$resArray["mem_psw"].$nowTime);
            session_start();
            // session_unset();

	$sql3 = "select mem_no from `member` where mem_email='{$_POST["signupEmail"]}'";

    $result = $pdo->query($sql3);
    $resArray = $result->fetch(PDO::FETCH_ASSOC);
	$result_array = ["code"=>"1", "mem_no" =>"{$resArray["mem_no"]}"];
	$_SESSION = $resArray;
    
	  echo json_encode($result_array);//送出json字串
  }
}catch (PDOException $e) {
	$msg = "錯誤行號 : ".$e->getLine().", 錯誤訊息 : ".$e->getMessage();

	//輸出結果
	$result = ["msg"=>$msg];
	echo json_encode($result);
}
?>