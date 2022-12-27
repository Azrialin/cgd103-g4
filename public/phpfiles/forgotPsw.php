<?php
// 解決跨域問題
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

// 比對 email
require_once("./connect_cgd103g4.php");
$sql = "select * from `member` where mem_email = :mem_email";

$find = $pdo->prepare($sql);
$find->bindValue(":mem_email", $_POST["mem_email"]);
$find->execute();

// 引入 PHPmailer 類
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\PHPMailer_SMTP;
use PHPMailer\PHPMailer\PHPMailer_Exception;
require_once("PHPMailer.php");
require_once("PHPMailer_SMTP.php");
require_once("PHPMailer_Exception.php");

if ($find->rowCount() > 0) {
    // 生成亂數密碼
    $length = 16;
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $randomString = str_shuffle($chars);
    $newPsw = substr($randomString, 0, $length);
    $msg = "有找到帳號，新密碼是:$newPsw";

    // 修改資料庫密碼
    $sql = "update `member`
    		set mem_psw = :mem_psw
    		where mem_email = :mem_email";
    $editPsw = $pdo->prepare($sql);
    $editPsw->bindValue(":mem_email", $_POST["mem_email"]);
    $editPsw->bindParam(":mem_psw", $newPsw);
    $editPsw->execute();

    $mail = new PHPMailer(true);
    // 設置 SMTP 伺服器資訊
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    // 信件內容的編碼方式       
    $mail->CharSet = "utf-8";

    // Gmail 權限問題
    // $mail->Host = 'smtp.gmail.com';
    // $mail->Username = '';
    // $mail->Password = '';
    // $mail->SMTPSecure = 'ssl';
    // $mail->Port = 487;
    // 465 驗證不通過
    // 587 無法連線到主機

    // OutLook 成功寄出
    $mail->Host = 'smtp.office365.com';
    $mail->Username = 'dontpig@hotmail.com.tw';
    $mail->Password = 'just2pig';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Yahoo 連不上
    // $mail->Host = 'smtp.mail.yahoo.com';
    // $mail->Username = 'railwaytour@yahoo.com';
    // $mail->Password = 'cgd103_g4';
    // $mail->SMTPSecure = 'tls';
    // $mail->Port = 465;
    
    // $newPsw = "123"; // 測試用

    // 設置郵件內容
    // $mail->setFrom('chubytobey@gmail.com', 'Jet Speed');
    $mail->setFrom('dontpig@hotmail.com.tw', 'Jet Speed');
    // $mail->setFrom('railwaytour@yahoo.com', 'Jet Speed');
    $mail->addAddress('chubbytobey@gmail.com', 'Recipient Name');
    $mail->Subject = '忘記密碼通知';
    $mail->Body = "尊敬的會員您好，我們收到了您的忘記密碼申請，以下是系統為您生成的新密碼：$newPsw, 請在登入後修改密碼，https://tibamef2e.com/cgd103/g4/front/login";

}else{
    $msg = "此帳號並未註冊，請確認是否拼寫正確。若您一直無法解決問題，請洽客服人員。";
}

try {
    // 寄出郵件
    $mail->send();
}
// 成功連上後，如果有錯會跳訊息
catch (PDOException $e) {
	$msg = "錯誤行號 : ".$e->getLine()."<br>錯誤訊息 : ".$e->getMessage();
    echo "Mailer error: " . $mail->ErrorInfo;
}

// 輸出結果
$result = ["msg"=>$msg];
echo json_encode($result);
?>