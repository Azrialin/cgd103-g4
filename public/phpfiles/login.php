<?php
// session_start();
$Origin = isset($_SERVER['HTTP_ORIGIN'])?$_SERVER['HTTP_ORIGIN']:"*";   // HTTP_HOST,HTTP_ORIGIN,SERVER_NAME
header("Access-Control-Allow-Origin: {$Origin}");           // 如果$origin为*号时,则跨域访问不支持cookie的发送
header("Access-Control-Allow-Methods:POST,GET,OPTIONS");    // 允许请求的类型
header("Access-Control-Allow-Credentials:true");            // 跨域访问是否允许带cookie的发送
header("Content-Type:application/json;charset=utf-8");      // cors请求时,谷歌浏览器包含的头信息
// header('Access-Control-Allow-Origin:*');
// header("Content-Type:application/json;charset=utf-8");
/**
 * 前台會員登陸接口
 * $_SESSION 參考網站:https://ithelp.ithome.com.tw/articles/10207241
 * CORS 參考網站:https://blog.huli.tw/2021/02/19/cors-guide-3/
*/
  try{
  require_once("./connect_cgd103g4.php");
  $login_account = empty( $_GET["mem_email"] ) ? ( $_POST["mem_email"] ?? "" ) : $_GET["mem_email"];
  $login_psw = empty( $_GET["mem_psw"] ) ? ( $_POST["mem_psw"] ?? "" ) : $_GET["mem_psw"];

  if($login_account != "" && $login_psw != "") {

        $sql = " SELECT * FROM member WHERE mem_email = '{$login_account}' AND mem_psw = '{$login_psw}'; ";
        $result = $pdo->query($sql);
        $resArray = $result->fetch(PDO::FETCH_ASSOC);
        $mem_psw = $resArray["mem_psw"]??"";

        if($mem_psw == $login_psw) {
            //產生一個令牌
            $nowTime = time();
            // $token = md5($resArray["mem_account"].$resArray["mem_psw"].$nowTime);
            session_start();
            // session_unset();
            $_SESSION = $resArray;
            // echo $resArray["mem_psw"];
            $result_array = ["code"=>"1", "msg"=>"登陸成功", "account" =>"{$login_account}", "mem_no" =>"{$resArray["mem_no"]}"];//, "token"=>$token
            echo json_encode($result_array);
        }
        // else if ($mem_psw == $login_psw && $mem_psw > 10) {
        //   // 忘記密碼的人會收到一組 16 碼亂數當新密碼，其他用戶註冊時最多只能 10 碼
        //   $result_array = ["code"=>"2","msg"=>"歡迎回來，請重新設定您的登入密碼。"];
        //   echo json_encode($result_array);
        // }
        else {
            $result_array = ["code"=>"0","msg"=>"帳號或密碼錯誤"];
            echo json_encode($result_array);
        }
        // $connect -> close();
    // }
  }else {
    $result_array = ["code"=>"0", "msg"=>"帳號或密碼錯誤"];
    echo json_encode($result_array);
  }
}catch (PDOException $e) {
  $msg = "錯誤行號 : ".$e->getLine().", 錯誤訊息 : ".$e->getMessage();
  echo $msg;
}	
//catch(PDOException $e){
//  echo $e->getMessage();
//} 

?>