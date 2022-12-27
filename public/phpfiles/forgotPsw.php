<?php
// 解決跨域問題
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try {
	require_once("./connect_cgd103g4.php");
	$sql = "select * from `member` where mem_email = :mem_email";
 
	$find = $pdo->prepare($sql);
	$find->bindValue(":mem_email", $_POST["mem_email"]);
	$find->execute();
	
	if ($find->rowCount() > 0) {
		$length = 16;
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		$randomString = str_shuffle($chars);
		$newPsw = substr($randomString, 0, $length);
		$msg = "有找到帳號，新密碼是:$newPsw";

		$sql = "update `member`
				set mem_psw = :mem_psw
				where mem_email = :mem_email";
		$editPsw = $pdo->prepare($sql);
		$editPsw->bindValue(":mem_email", $_POST["mem_email"]);
		$editPsw->bindParam(":mem_psw", $newPsw);
		$editPsw->execute();
		
		// 以下有錯
		require("./phpMailer.php.php");
		//Send mail using gmail
		$mail = new PHPMailer(true);
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->SMTPAuth = true; // enable SMTP authentication
		// $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
		$mail->Host = "smtp.qq.com"; // sets GMAIL as the SMTP server
		$mail->CharSet = "UTF-8";
		$mail->Port = 587; // set the SMTP port for the GMAIL server
		$mail->Username = "2457025646@qq.com"; // =====GMAIL username
		$mail->Password = "1u,6gj831p4"; // =====GMAIL password

		//Typical mail data
		$mail->AddAddress("2457025646@qq.com"); //========
		$mail->SetFrom("chubbytobey@gmail.com"); //========
		$mail->Subject = "忘記密碼通知"; //========
		$mail->Body = `尊敬的會員您好，我們收到了您的忘記密碼申請，以下是系統為您生成的新密碼：$newPsw, 請在登入後修改密碼，https://tibamef2e.com/cgd103/g4/front/login`; //========

		// $mail->Send();
		// echo "Success!";

		}else{
		    $msg = "查無此帳號";
    }
}
// 成功連上後，如果有錯會跳訊息
catch (PDOException $e) {
	$msg = "錯誤行號 : ".$e->getLine()."<br>錯誤訊息 : ".$e->getMessage();
	// echo "Fail - " . $mail->ErrorInfo;
}

// 輸出結果
$result = ["msg"=>$msg];
echo json_encode($result);
?>