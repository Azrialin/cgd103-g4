<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
  	
	try{
		require_once("./connect_cgd103g4.php");
		//sql 指令
		$sql = "update member set mem_name = :mem_name,
								  mem_e_name = :mem_e_name,
								  mem_psw = :mem_psw,
								  mem_email = :mem_email,
								  mem_address = :mem_address,
								  mem_phone = :mem_phone,
								  mem_nation = :mem_nation,
								  mem_passport_no = :mem_passport_no


				where mem_no = :mem_no";
		//編譯, 執行
									// price = :price, 
									// author = :author, 
									// pages = :pages, 
									// image = :image 
		//有没有更改圖檔
		$products = $pdo->prepare($sql);
		$products->bindValue(":mem_no", $_POST["mem_no"]);
		$products->bindValue(":mem_name", $_POST["mem_name"]);
		$products->bindValue(":mem_e_name", $_POST["mem_e_name"]);
		$products->bindValue(":mem_psw", $_POST["mem_psw"]);
		$products->bindValue(":mem_email", $_POST["mem_email"]);
		$products->bindValue(":mem_address", $_POST["mem_address"]);
		$products->bindValue(":mem_phone", $_POST["mem_phone"]);
		$products->bindValue(":mem_nation", $_POST["mem_nation"]);
		$products->bindValue(":mem_passport_no", $_POST["mem_passport_no"]);
		$products->execute();
	    $msg = "異動成功";
		
	} catch (PDOException $e) {
		$msg = "錯誤行號 : ".$e->getLine().", 錯誤訊息 : ".$e->getMessage();
	}	echo $msg;
?>    