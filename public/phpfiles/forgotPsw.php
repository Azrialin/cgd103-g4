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

$string = isset($_POST['email']) ? $_POST['email'] : '';
$email = strtolower(trim(mb_convert_kana($string, 'as', 'UTF-8')));

// email 格式正確
// if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    require_once("./connect_cgd103g4.php");
    $sql = "select * from `member` where mem_email = :mem_email";
    
    $find = $pdo->prepare($sql);
    $find->bindParam(":mem_email", $email);
    $find->execute();
    
    if ($find->rowCount() > 0) {
        // 生成亂數密碼
        $length = 16;
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $randomString = str_shuffle($chars);
        $newPsw = substr($randomString, 0, $length);
    
        // 修改資料庫密碼
        $sql = "update `member`
                set mem_psw = :mem_psw
                where mem_email = :mem_email";
        $editPsw = $pdo->prepare($sql);
        $editPsw->bindParam(":mem_email", $email);
        $editPsw->bindParam(":mem_psw", $newPsw);
        $editPsw->execute();
    
        $mail = new PHPMailer(true);
        // 設置 SMTP 伺服器資訊
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        // 信件內容的編碼方式       
        $mail->CharSet = "utf-8";
    
        // OutLook 信箱一
        // $mail->Host = 'smtp.office365.com';
        // $mail->Username = 'tibametest@outlook.com';
        // $mail->Password = 'cgd103g4';
        // $mail->SMTPSecure = 'tls';
        // $mail->Port = 587;
        // Mailer error: SMTP Error: Could not authenticate.

        // OutLook 信箱四
        $mail->Host = 'smtp.office365.com';
        $mail->Username = 'cgd103_jetspeed@outlook.com';
        $mail->Password = 'cgd103g4';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        // Mailer error: SMTP Error: Could not authenticate.

        // mailersend 信箱五 Godaddy 阻擋
        // $mail->Host = 'smtp.mailersend.net';
        // $mail->Username = 'MS_Py2LMd@jetspeed.cc';
        // $mail->Password = 'CmBA4CYOh6O6VABN';
        // $mail->SMTPSecure = 'tls';
        // $mail->Port = 587;
    
        // 設置郵件內容
        // $mail->setFrom('tibametest@outlook.com', 'Jet Speed'); // 信箱一
        $mail->setFrom('cgd103_jetspeed@outlook.com', 'Jet Speed'); // 信箱四
        // $mail->setFrom('MS_Py2LMd@jetspeed.cc', 'Jet Speed'); // 信箱五

        $mail->addAddress($email, 'Recipient Name');
        $mail->Subject = '忘記密碼通知';
        $mail->Body = "尊敬的會員您好，我們收到了您的忘記密碼申請，以下是系統為您生成的新密碼：$newPsw, 請在登入後修改密碼，https://tibamef2e.com/cgd103/g4/front/login";

        try {
            // 寄出郵件
            if ($mail->send()) {
                // 傳送郵件成功
                $msg = "已收到您的忘記密碼申請，請至註冊信箱查收新密碼。";
            } else {
                // 傳送郵件失敗
                $msg = "很抱歉，傳送郵件時發生錯誤，請稍後再試或聯絡客服人員 00-0000-0000。";
            }
        }
        // 成功連上後，如果有錯會跳訊息
        catch (Exception $e) {
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
// echo $msg;
$result = ["msg"=>$msg];
echo json_encode($result);
?>