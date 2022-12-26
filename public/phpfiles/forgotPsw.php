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
		require("./class.phpmailer.php");
		//Send mail using gmail
		$mail = new PHPMailer(true);
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->SMTPAuth = true; // enable SMTP authentication
		$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
		$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
		$mail->Port = 465; // set the SMTP port for the GMAIL server
		$mail->Username = "chubbytobey@gmail.com"; // =====GMAIL username
		$mail->Password = "just2pig"; // =====GMAIL password

		//Typical mail data
		$mail->AddAddress("chubbytobey@gmail.com"); //========
		$mail->SetFrom("chubbytobey@gmail.com"); //========
		$mail->Subject = "忘記密碼通知"; //========
		$mail->Body = `尊敬的會員您好，我們收到了您的忘記密碼申請，以下是系統為您生成的新密碼：$newPsw, 請在登入後修改密碼，https://tibamef2e.com/cgd103/g4/front/login`; //========

		// if(!$mail->Send()){
		// 	echo "Mail error: " . $mail->ErrorInfo;     
		// }else{
		// 	echo "Success!";     
		// } 
		
		// try {
		// 	$mail->Send();
		// 	echo "Success!";
		// } catch (Exception $e) {
		// 	//Something went bad
		// 	echo "Fail - " . $mail->ErrorInfo;
		// }


		// 以下有錯
		require_once("./PHPMailer.php");
		// 產生 Mailer 實體
		$mail = new PHPMailer(true);
		// 設定為 SMTP 方式寄信
		$mail->IsSMTP();
		// SMTP 伺服器的設定，以及驗證資訊
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";
		$mail->Host = "smtp.gmail.com"; //請填您有指過到大朵主機的網址名稱
		$mail->Port = 465; //大朵主機的郵件伺服器port為 25 
		$mail->SMTPSecure = false;

		// 信件內容的編碼方式       
		// $mail->CharSet = "utf-8";

		// 信件處理的編碼方式
		// $mail->Encoding = "base64";

		// SMTP 驗證的使用者資訊
		$mail->Username = "chubbytobey@gmail.com";  //在cpanel新增mail的帳號（需要完整的mail帳號，含@後都要填寫）
		$mail->Password = "just2pig";  //在cpanel新增mail帳號時設定的密碼，請小心是否有空格，空格也算一碼。

		// 信件內容設定  
		$mail->From = "chubbytobey@gmail.com"; //需要與上述的使用者資訊相同mail
		$mail->FromName = "Jet Speed"; //此顯示寄件者名稱
		$mail->Subject = "忘記密碼通知"; //信件主旨
		$mail->Body = `尊敬的會員您好，我們收到了您的忘記密碼申請，以下是系統為您生成的新密碼：$newPsw, 請在登入後修改密碼，https://tibamef2e.com/cgd103/g4/front/login`;   //信件內容 
		$mail->IsHTML(true);

		// 收件人
		$mail->AddAddress("chubbytobey@gmail.com", "忘記密碼通知"); //此為收件者的電子信箱及顯示名稱

		// 顯示訊息
		// if(!$mail->Send()){
		// 	echo "Mail error: " . $mail->ErrorInfo;     
		// }else{
		// 	echo "Mail sent";     
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