<?php 
 	//跨域(正式開發不能這樣)
	 header('Access-Control-Allow-Origin:*');
	 header("Content-Type:application/json;charset=utf-8");
	 
	//  require_once("./connectG4.php");
	// require_once("connect_cgd103g4.php"); //本地端
	require_once("./connect_cgd103g4.php");


	$sql = "select * from news";
	$products = $pdo->prepare($sql);
	$products->execute();
	$prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($prodRows);


?>