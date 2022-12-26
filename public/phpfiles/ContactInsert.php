<?php 
// session_start();
$Origin = isset($_SERVER['HTTP_ORIGIN'])?$_SERVER['HTTP_ORIGIN']:"*";   // HTTP_HOST,HTTP_ORIGIN,SERVER_NAME
header("Access-Control-Allow-Origin: {$Origin}");           // 如果$origin为*号时,则跨域访问不支持cookie的发送
header("Access-Control-Allow-Methods:POST,GET,OPTIONS");    // 允许请求的类型
header("Access-Control-Allow-Credentials:true");            // 跨域访问是否允许带cookie的发送
header("Content-Type:application/json;charset=utf-8");      // cors请求时,谷歌浏览器包含的头信息
// header('Access-Control-Allow-Origin:*');
// header("Content-Type:application/json;charset=utf-8");
try {
	require_once("./connect_cgd103g4.php");
	$sql = "insert into `opinion`.`customer` values (
		Null,
		CURRENT_TIMESTAMP(),
		:opinion_name, 
		:opinion_tel,
		:opinion_mail, 
		:opinion_detail, 
		:opinion_selecttopic)";
	//編譯, 執行
	$items = $pdo->prepare($sql);
	$items->bindValue(":opinion_name", $_POST["opinion_name"]);
	$items->bindValue(":opinion_tel", $_POST["opinion_tel"]);
	$items->bindValue(":opinion_mail", $_POST["opinion_mail"]);
	$items->bindValue(":opinion_detail", $_POST["opinion_detail"]);
	$items->bindValue(":opinion_selecttopic", $_POST["opinion_selecttopic"]);
	$items->execute();	
	$msg="新增成功";
} catch (PDOException $e) {
	$msg = "錯誤行號 : ".$e->getLine().", 錯誤訊息 : ".$e->getMessage();
}
echo json_encode($msg);
?>