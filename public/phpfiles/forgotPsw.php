<?php
// 解決跨域問題
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{
	require_once("./connect_cgd103g4.php");
	// sql 指令
    $email = $_POST['email'];
	$sql = "select * from `customer` where opinion_mail = :email";
	// 編譯, 執行
	$find = $pdo->prepare($sql);
	$find->bindParam(":email", $email);
	$find->execute();

    if($find->rowCount()>0){
		$length = 16;
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		$randomString = str_shuffle($chars);
		$newPsw = substr($randomString, 0, $length);

		$msg = "有找到帳號，新密碼是:$newPsw";

		$sql = "update `customer`
				set opinion_datail = :opinion_datail
				where opinion_mail = :email";
		$editPsw = $pdo->prepare($sql);
		$editPsw->bindParam(":email", $email);
		$editPsw->bindParam(":opinion_datail", $newPsw); // 暫時用這個欄位測試
		$editPsw->execute();

		// $subject = "已收到您的忘記密碼申請";  // 電子郵件的主旨
		// $message = "您的新密碼是：$newPsw, 請點此(https://tibamef2e.com/cgd103/g4/front/login)重新登入並修改密碼。";  // 電子郵件的內容
		// $headers = "From: chubbytobey@gmail.com";  // 傳送者的電子郵件地址
	
		// // 傳送電子郵件
		// if(mail($email, $subject, $message, $headers)) {
		// 	$msg = "有找到帳號，傳送成功";
		// }else{
		// 	$msg = "有找到帳號，傳送失敗";
		// }
    }else{
        $msg = "查無此帳號";
    }
}
// 成功連上後，如果有錯會跳訊息
catch (PDOException $e) {
	$msg = "錯誤行號 : ".$e->getLine()."<br>錯誤訊息 : ".$e->getMessage();
}

// 輸出結果
$result = ["msg"=>$msg];
echo json_encode($result);
?>