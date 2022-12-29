<?php
// 解決跨域問題
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{
	require_once("./connect_cgd103g4.php");
	// sql 指令
	$sql = "update member 
			set mem_psw = :mem_psw, 
			where mem_no = :mem_no";	
	// 編譯, 執行
	$faq = $pdo->prepare($sql);
	$faq->bindValue(":mem_no", $_POST["mem_no"]);
	$faq->bindValue(":mem_psw", $_POST["mem_psw"]);
	$msg = "已成功修改密碼";
}
// 成功連上後，如果有錯會跳訊息
catch (PDOException $e) {
	$msg = "錯誤行號 : ".$e->getLine().", 錯誤訊息 : ".$e->getMessage();
}

// 輸出結果
$result = ["msg"=>$msg];
echo json_encode($result);
?>