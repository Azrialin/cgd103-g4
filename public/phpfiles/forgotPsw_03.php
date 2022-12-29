<?php
// 解決跨域問題
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

// 引入 PHPmailer 類
require_once("PHPMailer.php");
require_once("PHPMailer_SMTP.php");
require_once("PHPMailer_Exception.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\PHPMailer_SMTP;
use PHPMailer\PHPMailer\PHPMailer_Exception;
// trim 去除前後空格
// strtolower 大寫轉小寫
// (filter_var($email, FILTER_VALIDATE_EMAIL)) 檢驗email格式
// mb_convert_kana() 全形轉半形
// $email = strtolower(trim(mb_convert_kana($_POST['mem_email'], 'as', 'UTF-8')));
// $mail = new PHPMailer(true);
// var_dump($_POST);
// exit();
$email = $_GET["mem_email"];
// if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

    // email 格式正確
    require_once("./connect_cgd103g4.php");
    $sql = "select * from `member` where mem_email = :mem_email";
    
    $find = $pdo->prepare($sql);
    // $find->bindValue(":mem_email", );
    $find->bindParam(":mem_email", $email);
    $find->execute();
    
    if ($find->rowCount() > 0) {
        // 生成亂數密碼
        $length = 16;
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $randomString = str_shuffle($chars);
        $newPsw = substr($randomString, 0, $length);
        // $msg = "有找到帳號，新密碼是:$newPsw";
    
        // 修改資料庫密碼
        $sql = "update `member`
                set mem_psw = :mem_psw
                where mem_email = :mem_email";
        $editPsw = $pdo->prepare($sql);
        $editPsw->bindValue(":mem_email", $email);
        $editPsw->bindParam(":mem_psw", $newPsw);
        $editPsw->execute();
    
        $mail = new PHPMailer(true);
        // 設置 SMTP 伺服器資訊
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        // 信件內容的編碼方式       
        $mail->CharSet = "utf-8";
    
        // OutLook 成功寄出
        $mail->Host = 'smtp.office365.com';
        $mail->Username = 'dontpig@hotmail.com.tw';
        $mail->Password = 'just2pig';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
    
        // 設置郵件內容
        $mail->setFrom('dontpig@hotmail.com.tw', 'Jet Speed');
        $mail->addAddress('chubbytobey@gmail.com', 'Recipient Name');
        $mail->Subject = '忘記密碼通知';
        // $mail->Body = "尊敬的會員您好，我們收到了您的忘記密碼申請，以下是系統為您生成的新密碼：$newPsw, 請在登入後修改密碼，https://tibamef2e.com/cgd103/g4/front/login";
        $mail->Body = "123";

        try {
            // 寄出郵件
            $mail->send();
            echo "Email sent";
        }
        catch (Exception $e) {
            // $msg = "錯誤行號 : ".$e->getLine()."<br>錯誤訊息 : ".$e->getMessage();
            $msg = "Mailer error: " . $mail->ErrorInfo;
        }
    }else{
        $msg = "此帳號並未註冊，請確認是否拼寫正確。若無法解決問題，請聯絡客服人員 00-0000-0000。";
    }
// } else {
//     // email 格式不正確
//     $msg = "很抱歉，您註冊所使用的信箱並非正確格式，無法收取郵件，請聯絡客服人員進行後續處理 00-0000-0000。";
// }

// 輸出結果
$result = ["msg"=>$msg];
echo json_encode($result);
?>